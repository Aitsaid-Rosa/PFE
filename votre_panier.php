<?php 
//session_start();
include('menu.php');

require_once 'panier.php';
$panier=new Panier('produit');
$listeProduits = $panier->getPanier();
?>

<?php if(!$listeProduits){ ?>
 <p>Votre panier est vide</p>
<?php } else{ ?>
<? php ?>
<form method="" action="commande.php">

<table border="1" width=50%>
    
  <tr>
     <td>Nom</td>
     <td>prix</td>
     <td>quantité</td>
      <td></td>
  </tr>   
 
  <?php foreach($listeProduits as $produit){?>
  <tr>
     <td><?php print $produit['nom_prod']?></td>
     <td><?php print $produit['prix']?></td>
     <td><?php print $produit['qte']?></td>
      <td><a href="produit.php?ref_prod=<?php print $produit['ref_prod']?>" class="valid">Modifier</a>
          <a href="supprimer_panier.php?ref_prod=<?php print $produit['ref_prod']?>" class="valid">Supprimer</a> </td>
      <?php
                                        
     $bdd = new PDO('mysql:host=localhost;dbname=test','root','');
    $insert = $bdd->prepare("INSERT INTO panier (num_com,ref_prod,nbr_prod) VALUES (?,?)");
    $insert-> execute(array($produit['ref_prod'], $produit['qte']));
                                            
                                            
   
       ?>

 <?php } ?>
</table><br><br>
    <input type="submit" name="commande" value="valider ma commande" class="valid" style="float:left;">
    
</form>

<?php } ?>

<style>
    .valid {
            border: none;
            background: none;
            font-size: 20px;
            padding: 10px 30px;
            background: rgb(64,128,128);
            border-radius: 3px;
            color: #fff;
            cursor: pointer;
         float: right;
         margin-right: 2px;
        }
</style>