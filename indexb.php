<?php 
$bdd = new PDO('mysql:host=localhost;dbname=test','root','');
$result=$bdd->query('SELECT * FROM produit');

?>

<a href="votrepanier.php">votre panier</a>

<ul>
 
    while($data=$result->fetch_assoc()){?> 
    <li><a href="produit.php?id=<?php print $produit['id']?>"><?php print $produit['nom']?></a></li>
    <?php}?>

</ul>
 