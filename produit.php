<?php 
session_start();
 $id=$_GET['ref_prod'];
$bdd = new PDO('mysql:host=localhost;dbname=test','root','');
$result=$bdd->query('SELECT * FROM produit WHERE ref_prod='.$_GET['ref_prod']);
$produit=$result->fetch();

require_once'panier.php';
$panier=new Panier('produit');
$qte=1;
 if($produitPanier = $panier->get($_GET['ref_prod'])){
  $qte = $produitPanier['qte'];  
 }
?>
<a href="afficherproduit.php">Accueil</a>|<a href="votre_panier.php">votre panier</a>
<h3><?php print $produit['nom_prod']?>|<?php print $produit['prix']?>DA</h3>
<p><?php print $produit['description']?></p>

<!--formulaire traitement pour l'ajout-->
<form action="ajouter_panier.php" method="post">
 
 <p>
  <lable>Quantité :</lable> 
  <input type="text" name=qte value="<?php print $qte ?>"/>
 </p>
    
 <p>
  <input type="hidden" name='ref_prod' value="<?php print $_GET['ref_prod']?>"/>

  <input type="submit" value="acheter" />
        
   
 </p>

    
</form>