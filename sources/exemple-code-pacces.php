<?
// ------------------ récupération du numéro de facture dans  votre page d'accès

if (isset($_GET['c'])){$c=$_GET['c'];}else{$c="";}


//------- vos variables personnelles à renseigner ci-dessous

$membreid="xxxxxxxx";        // --- votre Membre ID N° 1tpe en bas de la page "configuration" de votre compte
$code1tpeapi="xxxxxx";     // --- votre Code activation API 1en bas de la page "configuration" de votre compte
$facture=$c;                                 // --- déclaration de la variable "$c" comme numéro de facture à intérroger


//----------------  appel de votre API 1tpe ne pas modifier ------------------
include("1tpe-acces-api.php");
//----------------  fin appel de votre API 1tpe ne pas modifier--------------


//----------------  récupération des données pour votre utisation  --------------
	

////////// ==> utilisation de seulement 2 variables, l'email du client et le nom du produit


if($ce1tpe=="VALIDE") {   // ---- si les données récupérées de la facture sont valides, envoyer un email au client


$message="Bonjour ".$emailc."

Merci d'avoir acheté notre produit :

".$nomprodc."

J'espère qu'il vous satisfera parfaitement.

Pour accéder à votre produit, cliquez sur
le lien ci-dessous :

http://www.xxxxx

et utilisez le mot de passe suivant : DFRT548DFG

Si vous avez des questions, contactez-nous
avec l'email : support@monsiteamoi.com

Cordialement

VOUS

PS : cet achat apparaitra sur votre relevé
de banque avec comme libellé SMCONSEILS

 ";
 
$to=$emailc;
$corps=$message;
$email1="VOTRE@EMAIL.ICI";
$sujet="SUJET DE VOTRE MESSAGE";
$headers = "From: 1tpe.com <VOTRE@EMAIL.ICI>\n";
$headers .= "Reply-To:".$email1."\n";
mail($to, $sujet, $corps, $headers);

} 				//----------- fin véfication facture valide

?>
<HTML>
<HEAD>
</HEAD>
<BODY>

Ici le contenu de votre page d'accès

</BODY>
</HTML>