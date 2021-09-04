<?php 
session_start();
require_once'panierb.php';
$panier=new panier('produits');
$panier->delete($_GET['id']);
header('location:votrepanier.php');
?>