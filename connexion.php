<?php
session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace-membre','root','');

if(isset($_POST['formconnexion']))
{
  $mailconnect=htmlspecialchars($_POST['mailconnect']);
  $mdpconnect=($_POST['mdpconnect']);  
    if(!empty($mailconnect) AND !empty($mdpconnect))
    {
        $requser=$bdd->prepare("SELECT * FROM membre WHERE mail=? AND motdepasse=?");
        $requser->execute(array($mailconnect, $mdpconnect));
        $userexist=$requser->rowCount();
        if($userexist == 1)
        {
            $userinfo=$requser->fetch();
            $_SESSION['id']=$userinfo['id'];
            $_SESSION['pseudo']=$userinfo['pseudo'];
            $_SESSION['mail']=$userinfo['mail'];
            header("Location: achat.php?id=".$_SESSION['id']);
        }
        else
        {
           $erreur="ce compte n'existe pas!"; 
        }
    }
    else
    {
         $erreur="tous les champs doivent etre complétés";
    }
}
?>
<html>
    <head>
        <title> Connexion </title>
        <meta charset="utf-8">
    </head>
    <body>
            <div align="center">
            <div class="container">
        <p><b> Connectez-vous : </b></p>
            <form method="POST" action="">
                
               <input type="email" name="mailconnect" placeholder="Mail" />
                
               <input type="password" name="mdpconnect" placeholder="Mot de passe" />

               <input type="submit" name="formconnexion" value="Se connecter" />

            </form>
            <?php
            if(isset($erreur))
            {
                echo '<font color="red">'.$erreur.'</font>';
            }
            ?>
        </div>
        </div>
        
    </body>
</html>