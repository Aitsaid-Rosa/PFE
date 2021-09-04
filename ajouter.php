 <!-- ******************  celle du projet  ************************ -->
<?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=informatique','root','');

    if(isset($_POST['valider']))
    {
           $nom = htmlspecialchars($_POST['nom']);
           $type = htmlspecialchars($_POST['type']);
           $prix = htmlspecialchars($_POST['prix']);
           
        
       if(!empty($_POST['nom']) AND !empty($_POST['type']) AND !empty($_POST['prix']))
       {  
          $nomlength = strlen($nom);
           if($nomlength <= 255)
           { 
               
           $typelength = strlen($type);
           if($typelength <= 255)
           {
          
                          if(isset($_post['ordinateur']))
                          {
                            $insertmbr = $bdd->prepare("INSERT INTO ordinateur(nom, type, prix)     VALUES(?,?,?,?)");
                              $insertmbr-> execute(array($nom,$type, $prix));
                             /* $erreur = "Votre compte a bien été créé!"; */
                             $_SESSION['comptecree'] = "Votre compte a bien été créé!";
                             header('Location: accueil.php'); 
                          }
                          
                          if(isset($_post['tablette']))
                          {
                            $insertmbr = $bdd->prepare("INSERT INTO tablette(nom, type, prix)     VALUES(?,?,?,?)");
                              $insertmbr-> execute(array($nom,$type, $prix));
                             /* $erreur = "Votre compte a bien été créé!"; */
                             $_SESSION['comptecree'] = "Votre compte a bien été créé!";
                             header('Location: accueil.php'); 
                          }
                          
                          if(isset($_post['smartphone']))
                          {
                            $insertmbr = $bdd->prepare("INSERT INTO smartphone(nom, type, prix)     VALUES(?,?,?,?)");
                              $insertmbr-> execute(array($nom,$type, $prix));
                             /* $erreur = "Votre compte a bien été créé!"; */
                             $_SESSION['comptecree'] = "Votre compte a bien été créé!";
                             header('Location: accueil.php'); 
                          }
                        
                    
                       }
                       else 
                       {
                          $erreur = "vous devez choisir le type de ce matériel!";
                       }
                     }
                     else
                     {
                         $erreur = "le type indiquer est trés long!";
                     }
                 }
                 else
                 {
                     $erreur ="le nom indiquer est trées long !";
                 }
             }
             
     
           
        
        else
        {
            $erreur = "Tous les champs doivent d'etre complétés";
        }
    
?>


<html>
    <head>
        <title> ajout</title>
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
        <p><b>Remplissez le formulaire d'ajout</b></p>
            <form method="POST" action="" class="myform" id="myform">
               
                     
                      <div class="champ flex"> 
                        <div>  
                      <label for="nom"> Nom : </label>
                      <input type="text" placeholder="Votre nom" id="nom" name="nom" value="<?php if(isset($nom)){ echo $nom; } ?> "/>
                        </div>
                        <div > 
                      <label for="type"> Type : </label>                    
                      <input type="text" placeholder="Votre prenom" id="prenom" name="type" value="<?php if(isset($type)){ echo $type; } ?> "/>
                        </div>
                        <div > 
                      <label for="type"> prix : </label>                    
                      <input type="text" placeholder="Votre prenom" id="prenom" name="prix" value="<?php if(isset($prix)){ echo $prix; } ?> "/>
                        </div>
                      </div>
                   
                
                    <!--  <div class="champ flex">
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
                          
                      <div  class="champ">
                      <div > 
                      <label for="date_dep">Date de naissance</label>
                      <input type="date" name="date_nais" id="date_nais" >
                      </div>
                      </div> -->

                    
                       <div align="left" >   
                      <label for="sexe" > ce matériel est:</label>
                      <input type="radio" name="ordinateur"  /> Ordinateur
                      <input type="radio" name="tablette"  /> Tablette
                      <input type="radio" name="smartphone"  /> Smartphone
                      <input type="radio" name="composant"  /> Composant
                      <input type="radio" name="peripherique"  /> Peripherique
                      </div>
                    
                      
                      <div align="center" >
                      <br />
                      <input type="submit" name="valider" class="valid" value="ajouter" />
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