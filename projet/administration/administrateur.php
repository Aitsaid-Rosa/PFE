<?php

session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=administration','root','');

if(isset($_POST['formconnexion']))
{
  $pseudoconnect=htmlspecialchars($_POST['pseudoconnect']);
  $mdpconnect=sha1($_POST['mdpconnect']);  
    if(!empty($pseudoconnect) AND !empty($mdpconnect))
    {
        $requser=$bdd->prepare("SELECT * FROM administrateur WHERE pseudo=? AND motdepasse=?");
        $requser->execute(array($pseudoconnect, $mdpconnect));
        $userexist=$requser->rowCount();
        if($userexist == 1)
        {
            $userinfo=$requser->fetch();
            $_SESSION['id']=$userinfo['id'];
            $_SESSION['pseudo']=$userinfo['pseudo'];
            header("Location: admin.php?id=".$_SESSION['id']);
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
    <style>
    body
    {
            background-color: #f5f5f5;
    }
    .container {
            width: 350px;
            margin-left: 30px;
            margin-top: 100px;
            padding-top:50px;
            padding-left:50px;
            padding-right:50px;
            padding-bottom:20px;
            color: #333;
            border: 0.1px solid black;
            background-color: white;
    
        }
        .container p  {
            font-size: 22px;
            font-family: sans-serif;
            margin-top:10px;
            margin-bottom: 30px;
        }
        .champ {
            margin-bottom: 30px;
            text-align: left;
        }
        .champ input {
            border-color: black;
            height: 40px;
            width: 100%;
            padding: 10px;
        }
        .button {
            text-align:right;
        }
        .valid {
            width:120px;
            height: 40px;
            border: none;
            font-size: 14px;
            padding-top: 1px;
            padding-bottom: 2px;
            border-radius: 3px;
            color: #fff;
            background-color:darkslategrey;
            cursor: pointer;
        }
        #menu{
              background-color:black;
              height: 80px;
        }
        
    </style>
    <head>
        <title> Connexion Admin</title>
        <meta charset="utf-8">
    </head>
    <body>
        
       
        <div align="center">
            <div class="container">
        <p><b> Connectez-vous : </b></p>
            <form method="POST" action="">
               <div class="champ"> 
               <label for="pseudo"> <b>Votre e-mail : </b></label>   
               <input type="text" name="pseudoconnect" placeholder="pseudo" />
               </div>
                
               <div class="champ"> 
               <label for="mdp"> <b>Votre mot de passe : </b> </label>   
               <input type="password" name="mdpconnect" placeholder="Mot de passe" />            
               </div>    
               
               <div class="button">
               <input type="submit" name="formconnexion" class="valid" value="Se connecter" />
               </div>
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