<?php 
session_start();
require_once 'panier.php';
$panier=new Panier('produit');
$panier->delete($_GET['ref_prod']);
header('location:votre_panier.php');
?>