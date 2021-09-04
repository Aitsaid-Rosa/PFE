 <!-- ******************  celle du projet  ************************ -->
<?php
$bdd = new PDO('mysql:host=localhost;dbname=test','root','');

    if(isset($_POST['ajout']))
    {
           $nom = htmlspecialchars($_POST['nom']);
           $marque = htmlspecialchars($_POST['marque']);
           $type= htmlspecialchars($_POST['type']);
           $description = htmlspecialchars($_POST['description']);
           $prix = htmlspecialchars($_POST['prix']);
           $quantite =htmlspecialchars($_POST['quantite']);
           
        
       if(!empty($_POST['nom']) AND !empty($_POST['marque']) AND !empty($_POST['type']) AND !empty($_POST['description']) AND !empty($_POST['prix']) AND !empty($_POST['quantite']))
       {  
          $nomlength = strlen($nom);
           if($nomlength <= 255)
           { 
               
           $marquelength = strlen($marque);
           if($marquelength <= 255)
           {
                        $insertmbr = $bdd->prepare("INSERT INTO produit(nom, ,date_nais, adresse, email, num_tel, mot_de_passe) VALUES(?,?,?,?,?,?,?)");
                        $insertmbr-> execute(array($nom,$prenom,$date_de_naissance, $adresse, $email, $telephone, $mot_de_passe1));
                       /* $erreur = "Votre compte a bien été créé!"; */
                     $_SESSION['comptecree'] = "Votre compte a bien été créé!";
                     header('Location: accueil.php');
                    
                       }
                       else 
                       {
                          $erreur = "vos mots de passe ne correspondent pas !";
                       }
                     }
                     else
                     {
                         $erreur = "Adresse mail déja utilisée !";
                     }
                 }
                 else
                 {
                     $erreur ="votre adresse n'est pas valide !";
                 }
           }
           else
           {
               $erreur = "votre prenom est long"; 
           }
           
           
           
       }
       else
           {
               $erreur = "votre nom est long"; 
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
    <meta charset="utf-8"/>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
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
    </style>
    </head>
<body>
<form method="post" action="" class="form-horizontal">


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Nom</label>  
  <div class="col-md-4">
  <input id="textinput" name="nom" type="text" placeholder="saisissez votre nom" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Prénom</label>  
  <div class="col-md-4">
  <input id="textinput" name="prenom" type="text" placeholder="saisissez votre prénom" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Date de naissance</label>  
  <div class="col-md-4">
  <input id="textinput" name="date_de_naissance" type="date" placeholder="saisissez votre date de naissance" class="form-control input-md">
    
  </div>
</div>
    
    
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Adresse</label>  
  <div class="col-md-4">
  <input id="textinput" name="adresse" type="text" placeholder="saisissez votre adresse" class="form-control input-md">
    
  </div>
</div>
    
    
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Email</label>  
  <div class="col-md-4">
  <input id="textinput" name="email" type="email" placeholder="saisissez votre email" class="form-control input-md">
    </div>
</div>   
      
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Téléphone</label>  
  <div class="col-md-4">
  <input id="textinput" name="telephone" type="tel" placeholder="saisissez votre numéro de téléphone" class="form-control input-md">
    
  </div>
</div>
      
      
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Mot de passe</label>  
  <div class="col-md-4">
  <input id="textinput" name="mot_de_passe1" type="password" placeholder="entrez un mot de passe" class="form-control input-md">
    
  </div>
</div>
      
      
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Confirmer mot de passe</label>  
  <div class="col-md-4">
  <input id="textinput" name="mot_de_passe2" type="password" placeholder="confirmez votre mot de passe" class="form-control input-md">
    
  </div>
</div>
    
 

<div align="center" >
                      <br />
                      <input type="submit" name="inscription" class="valid" value="Je m'inscris" />
                      </div>

<center>
    <br><br><br>
 <?php
            if(isset($erreur))
            {
                echo '<font color="red">'.$erreur.'</font>';
            }
           ?>  
    </center>
</form>
   
    </body>
</html>