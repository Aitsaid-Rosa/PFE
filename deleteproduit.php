<?php
if(isset($_GET['ref_prod'])){
    $id=$_GET['ref_prod'];
 $bdd = new PDO('mysql:host=localhost;dbname=test','root','');
    $requser=$bdd->prepare('DELETE from produit where ref_prod=?');
    $requser->execute(array($id));
    header('location:gererproduit.php');

    
}
?>