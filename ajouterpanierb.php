<?php 
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=test','root','');
$result=$bdd->query('SELECT * FROM produit WHERE id='$_POST['id']);
$produit=$result->fetch_assoc();
require_once 'panierb.php';
$panier=new panier(['produits']);
$valeurs=array(
'nom' ->produit['nom'],
'prix' ->produit['prix'],
    'qte' ->produit['qte'],
    'id' ->produit['id']
);
$panier->set($_POST['id'],$valeurs);
header('location:votrepanier.php');

?>