<?php 
session_start();     
$bdd = new PDO('mysql:host=localhost;dbname=test','root','');
        
    if(isset($_POST['connecter']))
    {
          
       if(!empty($_POST['email']) AND !empty($_POST['mot_de_passe']))
       {  
        $email=$_POST['email'];
        $mot_de_passe=$_POST['mot_de_passe'];
    $select=$bdd->prepare("SELECT * FROM client WHERE email='$email' and mot_de_passe='$mot_de_passe'");
    $select->setFetchMode(PDO::FETCH_ASSOC);
    $select->execute();
    $user=$select->fetch();
           
        if($user['email']!=$email and $user['mot_de_passe']!=$mot_de_passe){
            $erreur ="le mot de passe ou l'email incorrect";
        }
        elseif($user['email']==$email and $user['mot_de_passe']==$mot_de_passe){
                   

            $_SESSION['email']=$user['email'];
            $_SESSION['nom_cl']=$user['nom_cl'];
            $_SESSION['prenom_cl']=$user['prenom_cl'];
            $_SESSION['num_cl']=$user['num_cl'];
            $_SESSION['date_nais']=$user['date_nais'];
            $_SESSION['adresse']=$user['adresse'];
            $_SESSION['num_tel']=$user['num_tel'];
             $_SESSION['mot_de_passe']=$user['mot_de_passe'];
            $email=$POST['newemail'];

            $mot_de_passe=$POST['newmot_de_passe'];

            header("location:afficherproduit.php");
       }
                 

    }



                      
      else
          {
              $erreur = "Tous les champs doivent d'etre complétés";
          }
    
            
    
    }
        ?>



<html>
    <head>
        <meta charset="utf-8">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    
     <link href="menubleu.css" rel="stylesheet">
        <link href="cssmenuvisiteur.css" rel="stylesheet">
<!------ Include the above in your HEAD tag ---------->
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
        }
        body{
            background: url(images2/ordinateurs/ultrbook/background-informatique-4.jpg);
        }
        
    </style>
    </head>
    <body>
        
    <form method="post" action="" class="form-horizontal" style="margin-top:200px;">


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Email</label>  
  <div class="col-md-4">
  <input id="textinput" name="email" type="email" placeholder="saisissez votre email" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Mot de passe</label>  
  <div class="col-md-4">
  <input id="textinput" name="mot_de_passe" type="password" placeholder="saisissez votre mot de passe" class="form-control input-md">
    
  </div>
</div>
 


  
 <center>

<div align="center" >
                      <br />

                          <input type="submit" name="connecter" class="valid" value="Se connecter" />


                      </div>
   
        </center>
</form>
   
        

        
        

   
    
    
 <center>   
 <?php
            if(isset($erreur))
            {
                echo '<font color="red">'.$erreur.'</font>';
            }
           ?>  
        </center>
    </body>
</html>