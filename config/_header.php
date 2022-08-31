<?php
//require ('config/commandes.php');
require 'config/db.class.php';
require 'config/panier.class.php';
$DB = new DB();
$panier = new panier($DB);
//$Produits = afficher();
?>