<?
//------- vos variables personnelles à renseigner ci-dessous

$membreid="xxxxxxxx";        // --- votre Membre ID N° 1tpe en bas de la page "configuration" de votre compte
$code1tpeapi="xxxxxx";     // --- votre Code activation API 1en bas de la page "configuration" de votre compte
$facture="xxxxxxxxxxx"; // --- le numéro de la facture du client dont vous voulez les informations

//-- Si vous désirez effectuer des tests avec une facture fictive, utilisez le numéro de facture suivant :   2222266665555544


//----------------  appel de votre API 1tpe ne pas modifier ------------------
include("1tpe-acces-api.php");
//----------------  fin appel de votre API 1tpe ne pas modifier--------------


//----------------  récupération des données pour votre utisation  --------------

///// vous pouvez utiliser une ou plusieurs des variables ci-dessous dans vos scripts php /////
//// dans l'exemple ci dessous on les affiche toutes simplement sur la page                   /////
	
     
echo $ce1tpe."<br>";                     //---- Message de confirmation / REPONSES :
                                                                                     // demande valide = VALIDE
										     // erreur connection = ERREUR MEMBRE 
										     // numéro facture invalide = ERREUR FACTURE
echo $amountc."<br>";                   //---- Montant de la facture en euros
echo $datec."<br>";                       //---- Date de la commande
echo $heurec."<br>";                     //---- Heure de la commande
echo $nomprodc."<br>";                 //---- Nom du produit commandé
echo $affic."<br>";                        //---- Affilié ayant vendu le produit
echo $vendc."<br>";                      //---- Vendeur du produit
echo $trackc."<br>";                     //---- Variable de tracking :TK
echo $nomc."<br>";                      //---- Nom du client
echo $adressc."<br>";                   //---- Adresse du client
echo $codepc."<br>";                    //---- Code postal du client
echo $villec."<br>";                       //---- Ville du client
echo $paysc."<br>";                      //---- Pays du client
echo $emailc."<br>";                     //---- Email du client
echo $datac."<br>";                      //---- Variable info client DATA
echo $rembc."<br>";                     //---- Achat remboursé / REPONSES : OUI - NON
echo $numprodc."<br>";                //---- Numéro du produit dans le catalogue
echo $gainsvendc."<br>";               //---- Gains versés au vendeur en euros
echo $gainsaffc."<br>";                  //---- Commission versée à l'affilié en euros
?>