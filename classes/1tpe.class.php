<?php

class Api1TPE
{
    private $member_id;
    private $api_key;
    
    private $factures = array();
    
    public function __construct($member_id = '', $api_key = '')
    {
        $this->member_id = $member_id;
        $this->api_key = $api_key;
    }
    
    public function get_facture($facture_id, $force_request = false)
    {
        // Si la facture a déjà été chargée et qu'on ne demande pas à forcer la requête,
        // alors on renvoi le tableau déjà chargé
        if(isset($this->factures[$facture_id]) && $force_request == false)
        {
            return $this->factures[$facture_id];
        }
        
        // Sinon, on lance la requête sur le serveur 1TPE.com
        else
        {
            $facture_fields = array(
                'STATUS',
                'AMOUNT',
                'ORDER_DATE',
                'ORDER_TIME',
                'PRODUCT_NAME',
                'AFFILIATE',
                'TRACKING',
                'CUSTOMER_NAME',
                'CUSTOMER_ADDRESS',
                'CUSTOMER_ZIP',
                'CUSTOMER_CITY',
                'CUSTOMER_COUNTRY',
                'CUSTOMER_EMAIL',
                'CUSTOMER_DATA',
                'REFUNDED',
                'SELLER',
                'PRODUCT_ID',
                'SELLER_COMMISSION',
                'AFFILIATE_COMMISSION'
            );
            
            try
            {
                $data = $this->get_facture_remote($facture_id);
                
                if($data===false)
                    return false;
                
                $array_facture = array();
                foreach($facture_fields as $i => $field_name)
                {
                    $value = $data[$i];
                    if($field_name=='REFUNDED')
                        $value = $value=='OUI' ? true : false;
                    
                    if($field_name=='ORDER_DATE')
                        $value = substr($value,0,4).'-'.substr($value,4,2).'-'.substr($value,6,2);
                        
                    if($field_name=='ORDER_TIME')
                        $value = substr($value,0,2).':'.substr($value,2,2);
                    
                    $array_facture[strtolower($field_name)] = $value;
                }
                
                $this->factures[$facture_id] = (object)$array_facture;
                
                return $this->factures[$facture_id];
            }
            catch(Exception $e)
            {
                print "Erreur : ".$e->getMessage();
                return false;
            }
            
        }
    }
    
    
    private function get_facture_remote($facture_id)
    {
        $fp = fsockopen('1tpe.com', 80);
        if($fp === false)
        {
            throw new Exception("Impossible d'établir une connexion avec l'API 1TPE");
        }
        
        $vars = array(
            'idmbr'         => $this->member_id,
            'code1tpeapi'   => $this->api_key,
            'idfac'         => $facture_id   
        );
        $content = http_build_query($vars);
        
        fwrite($fp, "POST /api-1tpe.php HTTP/1.1\r\n");
        fwrite($fp, "Host: 1tpe.com\r\n");
        fwrite($fp, "Content-Type: application/x-www-form-urlencoded\r\n");
        fwrite($fp, "Content-Length: ".strlen($content)."\r\n");
        fwrite($fp, "Connection: close\r\n");
        fwrite($fp, "\r\n");
        if(fwrite($fp, $content) === false)
        {
            throw new Exception("Erreur de communication avec le serveur 1TPE");
        }
        
        while (!feof($fp))
        {
            $encoded=fgets($fp, 1024);
            if (preg_match("!@@@(.*)@@@!Ui",$encoded,$matches))
            {
                $dataapi    = str_replace('@@@', '', $matches[0]);
                $result1tpe = explode("&&",$dataapi);
                
                if($result1tpe[0] !== 'VALIDE')
                {
                    return false;
                }
                else
                {
                    return $result1tpe;
                }
            }
        }
        
        fclose($fp);
        
        throw new Exception("Aucune réponse de l'API");
    }
    
}

