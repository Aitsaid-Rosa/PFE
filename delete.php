<?php
if(isset($_GET['num_cl'])){
    $id=$_GET['num_cl'];
 $bdd = new PDO('mysql:host=localhost;dbname=test','root','');
    $requser=$bdd->prepare('DELETE from client where num_cl=?');
    $requser->execute(array($id));
    header('location:gererclient.php');

    
}
?>