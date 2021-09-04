<?php
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=test','root','');
if(isset($_GET['id']) AND $_GET['id']>0)
{
  $getid= intval($_GET['id']);  
  $requser=$bdd->prepare('SELECT * FROM client WHERE id=?');
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
            <h2> Nom : <?php echo $userinfo['nom']; ?></h2>
            <h2> Prénom : <?php echo $userinfo['prenom']; ?> </h2>
         <h2> Adresse: <?php echo $userinfo['adresse']; ?> </h2>    
            <h2>Numéro de telephone: <?php echo $userinfo['num_tel']; ?> </h2>    
         <h2> Mail : <?php echo $userinfo['email']; ?> </h2>    

             <br/>   
            <?php
            if(isset($_SESSION['id']) AND $userinfo['id']==$_SESSION['id'])
            {
                ?>
                <div>
                <a href="editionprofil.php">Editer mon profil</a>
                <br/> </div>
             
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