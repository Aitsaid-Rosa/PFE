  <!-- *********** celle de projet *************** -->
<?php

session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=inscription','root','');

if(isset($_GET['id']) AND $_GET['id']>0)
{
  $getid= intval($_GET['id']);  
  $requser=$bdd->prepare('SELECT * FROM membre WHERE id=?');
  $requser->execute(array($getid));    
  $userinfo=$requser->fetch();
    
?>
<html>
    <head>
        <title> Profil </title>
        <meta charset="utf-8">
    </head>
    <body>
        
        <div align="center">
            <div class="container">
        <p><b> Votre profil : <?php echo $userinfo['nom']; ?> </b></p>
            <h2> nom : <?php echo $userinfo['nom']; ?></h2>
            <h2> prenom : <?php echo $userinfo['prenom']; ?></h2>    
            <h2> Mail : <?php echo $userinfo['mail']; ?> </h2>    
             <br/>   
            <?php
            if(isset($_SESSION['id']) AND $userinfo['id']==$_SESSION['id'])
            {
                ?>
                <a href="#">Editer mon profil</a>
                <br/> 
                <a href="deconnexion.php">Se deconnecter</a>
                <?php
            }
            ?>
        </div>
        </div>
    </body>
</html>
<?php
}
?>