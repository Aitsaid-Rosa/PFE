 <!-- ******************  celle du projet  ************************ -->
<?php
$bdd = new PDO('mysql:host=localhost;dbname=test','root','');

    if(isset($_POST['inscription']))
    {
           $nom = htmlspecialchars($_POST['nom']);
           $prenom = htmlspecialchars($_POST['prenom']);
           $date_de_naissance= htmlspecialchars($_POST['date_de_naissance']);
           $adresse = htmlspecialchars($_POST['adresse']);
           $email = htmlspecialchars($_POST['email']);
           $telephone =htmlspecialchars($_POST['telephone']);
           $mot_de_passe1 = ($_POST['mot_de_passe1']);
           $mot_de_passe2 = ($_POST['mot_de_passe2']);
        
       if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['date_de_naissance']) AND !empty($_POST['adresse']) AND !empty($_POST['email']) AND !empty($_POST['telephone']) AND !empty($_POST['mot_de_passe1']) AND !empty($_POST['mot_de_passe2']))
       {  
          $nomlength = strlen($nom);
           if($nomlength <= 255)
           { 
               
           $prenomlength = strlen($prenom);
           if($prenomlength <= 255)
           {
                 if(filter_var($email, FILTER_VALIDATE_EMAIL))
                 {
                     $reqmail = $bdd->prepare("SELECT * FROM client WHERE email=?");
                     $reqmail->execute(array($email));
                     $mailexist = $reqmail->rowCount();
                     if($mailexist == 0)
                     {
                     
                       if($mot_de_passe1 == $mot_de_passe2)
                       {
                        $insertmbr = $bdd->prepare("INSERT INTO client(nom_cl, prenom_cl,date_nais, adresse, email, num_tel, mot_de_passe) VALUES(?,?,?,?,?,?,?)");
                        $insertmbr-> execute(array($nom,$prenom,$date_de_naissance, $adresse, $email, $telephone, $mot_de_passe1));
                       /* $erreur = "Votre compte a ien été créé!"; */
                     $_SESSION['comptecree'] = "Votre compte a bien été créé!";
                     header('Location:ensavoirplus.php');
                    
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
                       <input type="submit" name="retour" class="valid" value="Annuler" />

                          <input type="submit" name="inscription" class="valid" value="Je m'inscris" />


                      </div>

<center>
    <br><br><br>
    <?php  
        if(isset($_POST['retour'])){
         header('Location:ensavoirplus.php');

        }

    ?>
    
    
    
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