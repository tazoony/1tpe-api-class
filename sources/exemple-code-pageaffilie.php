<?php
// ------------------ r�cup�ration du num�ro de facture dans votre page

if (isset($_POST['fac'])){$fac=$_POST['fac'];}else{echo "Facture�?"; exit();}

$membreid="xxxxxxxx"; // --- votre Membre ID N� 1tpe en bas de la page "configuration" de votre compte
$code1tpeapi="xxxxxx"; // --- votre Code activation API 1en bas de la page "configuration" de votre compte
$facture=$fac; // --- d�claration de la variable "$c" comme num�ro de facture � interroger

//---------------- appel de votre API 1tpe ne pas modifier ------------------
include("1tpe-acces-api.php");
//---------------- fin appel de votre API 1tpe ne pas modifier--------------


//---------------- r�cup�ration des donn�es pour votre utilisation --------------

if($ce1tpe=="VALIDE") { // ---- si les donn�es r�cup�r�es de la facture sont valides les afficher

echo "amount : ".$amountc."<BR />";
echo "date : ".$datec."<BR />";
echo "heure : ".$heurec."<BR />";
echo "nomprod : ".$nomprodc."<BR />";
echo "affi : ".$affic."<BR />";
echo "vend : ".$vendc."<BR />";
echo "track : ".$trackc."<BR />";
echo "nom : ".$nomc."<BR />";
echo "adress : ".$adressc."<BR />";
echo "codep : ".$codepc."<BR />";
echo "ville : ".$villec."<BR />";
echo "pays : ".$paysc."<BR />";
echo "email : ".$emailc."<BR />";
echo "data : ".$datac."<BR />";
echo "remb : ".$rembc."<BR />";
echo "numprod : ".$numprodc."<BR />";
echo "gainsvend : ".$gainsvendc."<BR />";
echo "gainsaff : ".$gainsaffc."<BR />";
}

?>