# Classe PHP ApiTPE

## Introduction
Classe PHP de connexion à l'API 1tpe.com
Cette classe permet de récupérer des données concernant une vente sur votre compte vendeur ou affilié 1TPE.com.

## Utilisation

### Code source d'exemple

    <?php
    include_once('classes/1tpe.class.php');
    
    $api        = new Api1TPE('<ID_MEMBRE>', '<CLE_API>');
    $facture    = $api->get_facture('<ID_FACTURE>');
    ?>

### L'objet `$facture`

`$facture` est un objet dont les propriétés sont :

* `status` : VALIDE / ERREUR FACTURE / ERREUR MEMBRE
* `amount` : Montant de la commande (EUR)
* `order_date` : Date de la commande au format Y-m-d
* `order_time` : Heure de la commande au format H:i
* `product_name` : Titre du produit acheté
* `product_id` : ID du produit acheté
* `affiliate` : Login de l'affilié qui a généré la vente
* `affiliate_commission` : Montant (EUR) de la commissions reversée à l'affilié
* `seller` : Login du vendeur du produit
* `seller_commission` : Montant (EUR) de la commission reversée au vendeur
* `refunded` : Booléen indiquant si la commande a été remboursée au client (suite à une rétractation par exemple)
* `tracking` : Valeur personnalisée passée dans la variable **?tk=...** lors de la transaction
* `customer_name` : Nom du client
* `customer_address` : Adresse du client
* `customer_zip` : Code postal du client
* `customer_city` : Ville du client
* `customer_country` : Pays du client
* `customer_email` : Adresse email du client
* `customer_data` : Donnée supplémentaires transmises par le client

### Affichage des données

    <html>
        <head>
            <meta charset="utf-8">
            <title>API 1TPE.com</title>
        </head>
        <body>
            Commande réalisée le <?php echo $facture->order_date; ?> à <?php echo $facture->order_time; ?>.<br />
            Client : <?php echo $facture->customer_name; ?> (<?php echo $facture->customer_name; ?>)<br />
            Produit commandé : <?php echo $facture->product_name; ?> (#<?php echo $facture->product_id; ?>)<br />
            Montant dépensé : <?php echo $facture->amount; ?> EUROS.<br />
        </body>
    </html>
    
