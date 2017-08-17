<?
//------------------------------------------------------------------------------------------------ ne rien modifier du code ci-dessous
$fp = fsockopen('1tpe.com', 80);
$vars = array(
    'idmbr' => $membreid,
    'code1tpeapi' => $code1tpeapi,
    'idfac' => $facture   
);
$content = http_build_query($vars);

fwrite($fp, "POST /api-1tpe.php HTTP/1.1\r\n");
fwrite($fp, "Host: 1tpe.com\r\n");
fwrite($fp, "Content-Type: application/x-www-form-urlencoded\r\n");
fwrite($fp, "Content-Length: ".strlen($content)."\r\n");
fwrite($fp, "Connection: close\r\n");
fwrite($fp, "\r\n");
fwrite($fp, $content);

while (!feof($fp)) {
$encoded=fgets($fp, 1024);
if (preg_match("!@@@(.*)@@@!Ui",$encoded,$matches)) {
$dataapi=str_replace('@@@', '', $matches[0]);
$result1tpe=explode("&&",$dataapi);
    
$ce1tpe=$result1tpe[0];									        
if(isset($result1tpe[1])){$amountc=$result1tpe[1];}else{$amountc="";}		
if(isset($result1tpe[2])){$datec=$result1tpe[2];}else{$datec="";}			
if(isset($result1tpe[3])){$heurec=$result1tpe[3];}else{$heurec="";}			
if(isset($result1tpe[4])){$nomprodc=$result1tpe[4];}else{$nomprodc="";}	        
if(isset($result1tpe[5])){$affic=$result1tpe[5];}else{$affic="";}				
if(isset($result1tpe[6])){$trackc=$result1tpe[6];}else{$trackc="";}			
if(isset($result1tpe[7])){$nomc=$result1tpe[7];}else{$nomc="";}			
if(isset($result1tpe[8])){$adressc=$result1tpe[8];}else{$adressc="";}			
if(isset($result1tpe[9])){$codepc=$result1tpe[9];}else{$codepc="";}			
if(isset($result1tpe[10])){$villec=$result1tpe[10];}else{$villec="";}			
if(isset($result1tpe[11])){$paysc=$result1tpe[11];}else{$paysc="";}			
if(isset($result1tpe[12])){$emailc=$result1tpe[12];}else{$emailc="";}			
if(isset($result1tpe[13])){$datac=$result1tpe[13];}else{$datac="";}			
if(isset($result1tpe[14])){$rembc=strtoupper($result1tpe[14]);}else{$rembc="";}
if(isset($result1tpe[15])){$vendc=$result1tpe[15];}else{$vendc="";}	
if(isset($result1tpe[16])){$numprodc=$result1tpe[16];}else{$numprodc="";}
if(isset($result1tpe[17])){$gainsvendc=$result1tpe[17];}else{$gainsvendc="";}
if(isset($result1tpe[18])){$gainsaffc=$result1tpe[18];}else{$gainsaffc="";}
}
}
//------------------------------------------------------------------------------------------------ FIN rien modifier du code ci-dessous
?>