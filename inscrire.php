 <!-- ******************  celle du projet  ************************ -->
<?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=test','root','');

    if(isset($_POST['inscription']))
    {
           $nom = htmlspecialchars($_POST['nom']);
           $prenom = htmlspecialchars($_POST['prenom']);
           $email = htmlspecialchars($_POST['email']);
           $email2 = htmlspecialchars($_POST['email2']);
           $mdp = sha1($_POST['mdp']);
           $mdp2 = sha1($_POST['mdp2']);
        
       if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['email']) AND !empty($_POST['email2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']))
       {  
          $nomlength = strlen($nom);
           if($nomlength <= 255)
           { 
               
           $prenomlength = strlen($prenom);
           if($prenomlength <= 255)
           {
             if($email == $email2)
             {
                 if(filter_var($email, FILTER_VALIDATE_EMAIL))
                 {
                     $reqmail = $bdd->prepare("SELECT * FROM client WHERE email=?");
                     $reqmail->execute(array($email));
                     $mailexist = $reqmail->rowCount();
                     if($mailexist == 0)
                     {
                     
                       if($mdp == $mdp2)
                       {
                        $insertmbr = $bdd->prepare("INSERT INTO client(nom, prenom, email, mdp) VALUES(?,?,?,?)");
                        $insertmbr-> execute(array($nom,$prenom, $email, $mdp));
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
                 $erreur = "vos adresses mail ne correspondent pas !";
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
        <title> inscription </title>
        <meta charset="utf-8">
        
    <style>
        .flex {
            display: flex;
            justify-content: space-between;
        }
        .flex div {
            width: 45%;
        }
        .flex input {
            width: 100%;
        }
        .container {
            margin: 20px;
            width: 500px;
            margin: 0 auto;
            background: #ecf0f1;
            padding: 25px 50px;
            color: #333;
            border-radius: 3px;
            margin-top: 45px;
        }
        .container p {
            font-size: 30px;
            font-family: sans-serif;
            padding-bottom: 30px;
            margin: 0;
        }
        .champ {
            margin-bottom: 20px;
        }
        .champ input {
            background: #fff;
            border: none;
            height: 35px;
            width: 100%;
            padding: 0 10px;
        }
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
        
        .myform {
            margin-top: 10px;
        }
        .myform label {
            float:left;
            display:block;
            margin-bottom: 2px;
            margin-left: 5px;
            font-size: 14px;
            font-weight: 600;
        }
        
        
        </style>
    </head>
    <body>
        
        <div align="center">
            <div class="container">
        <p><b>Remplissez le formulaire</b></p>
            <form method="POST" action="" class="myform" id="myform">
               
                     
                      <div class="champ flex"> 
                        <div>  
                      <label for="nom"> Nom : </label>
                      <input type="text" placeholder="Votre nom" id="nom" name="nom" value="<?php if(isset($nom)){ echo $nom; } ?> "/>
                        </div>
                        <div > 
                      <label for="prenom"> Prenom : </label>                    
                      <input type="text" placeholder="Votre prenom" id="prenom" name="prenom" value="<?php if(isset($prenom)){ echo $prenom; } ?> "/>
                        </div>
                      </div>
                   
                
                      <div class="champ flex">
                         <div> 
                      <label for="mail"> Votre email : </label>
                      <input type="email" placeholder="Votre mail" id="email" name="email" value="<?php if(isset($email)){ echo $email; } ?> "/> 
                         </div>
                         <div> 
                      <label for="mail2">Confirmez votre email : </label>
                      <input type="email" placeholder="confirmation de Votre mail" id="email2" name="email2" value="<?php if(isset($email2)){ echo $email2; } ?> "/>
                         </div>
                      </div>      
                    
                      <div class="champ flex"> 
                        <div>
                      <label for="mdp">Mot de passe : </label>
                      <input type="password" placeholder="votre mot de passe" id="mdp" name="mdp"/>
                        </div>
                        <div>                           
                      <label for="mdp2">confirmez votre mot de passe : </label>
                      <input type="password" placeholder="confirmez votre mot de passe" id="mdp2" name="mdp2"/>
                        </div> 
                      </div>
                          
                  <!--    <div  class="champ">
                      <div > 
                      <label for="date_dep">Date de naissance</label>
                      <input type="date" name="date_nais" id="date_nais" >
                      </div>
                      </div> -->

                    
                      <div align="left" >   
                      <label for="sexe" > Sexe :</label>
                      <input type="radio" name="radio"  /> Femme
                      <input type="radio" name="radio"  /> Homme
                      </div>
                    
                      
                      <div align="center" >
                      <br />
                      <input type="submit" name="inscription" class="valid" value="Je m'inscris" />
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