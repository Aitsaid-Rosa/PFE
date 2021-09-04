<?php 
session_start();
 $id=$_POST['ref_prod'];

$bdd = new PDO('mysql:host=localhost;dbname=test','root','');

$result=$bdd->query('SELECT * FROM produit WHERE ref_prod='.$_POST['ref_prod']);
$produit=$result->fetch();

require_once'panier.php';

$panier=new Panier('produit');

$valeurs=array(
'nom_prod' => $produit['nom_prod'],
'prix' => $produit['prix'],
'qte' => $_POST['qte'],
'ref_prod' => $produit['ref_prod']

);
$panier->set($_POST['ref_prod'],$valeurs);


header('location:votre_panier.php');
?>