<?php 
session_start();
require_once 'panierb.php';
$panier=new panier('produits');
$listeproduits=$panier->getpanier();
?>
<a href="indexb.php">accueil</a>
<?php 
if(!$listeproduits){?>
<p>votre panier est vide</p>
<?php} else{?>
<table border="1" width="50%">
<tr>
<td>nom</td> 
<td>prix</td>
<td>quantite</td>
<td></td>
</tr>
    <?php  foreach($listeproduits as $produit){?>
<tr>
<td><?php print $produit['nom']?></td> 
<td><?php print $produit['prix']?></td>
<td><?php print $produit['qte']?></td>
    <td><a href="produit.php?id=<?php print $produit['id']?>">modifier</a>|
        <a href="supprimer.php?id=<?php print $produit['id']?>">supprimer</a></td>
</tr>
    <?php }?>
</table>

    
<?php}?>
