 <!-- *********** celle de primax *************** -->

<?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace-membre','root','');

    if(isset($_POST['forminscription']))
    {
           $pseudo = htmlspecialchars($_POST['pseudo']);
           $mail = htmlspecialchars($_POST['mail']);
           $mail2 = htmlspecialchars($_POST['mail2']);
           $mdp = ($_POST['mdp']);
           $mdp2 = ($_POST['mdp2']);
        
       if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']))
       {  
           $pseudolength = strlen($pseudo);
           if($pseudolength <= 255)
           {
             if($mail == $mail2)
             {
                 if(filter_var($mail, FILTER_VALIDATE_EMAIL))
                 {
                     $reqmail = $bdd->prepare("SELECT * FROM membre WHERE mail=?");
                     $reqmail->execute(array($mail));
                     $mailexist = $reqmail->rowCount();
                     if($mailexist == 0)
                     {
                     
                 if($mdp == $mdp2)
                 {
                     $insertmbr = $bdd->prepare("INSERT INTO membre(pseudo, mail, motdepasse) VALUES(?,?,?)");
                     $insertmbr-> execute(array($pseudo, $mail, $mdp));
                     $erreur = "Votre compte a bien été créé!<a href=\"connexion.php\"> Me connecter</a>";
                     /*
                     pour rediriger ma page vers une autre
                     
                     $_SESSION['comptecree'] = "Votre compte a bien été créé!";
                     header('Location: index.php');
                     */
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
               $erreur = "votre pseudo est long"; 
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
            font-family: sans-serif;
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
            background: rgb(0,128,192);
            border-radius: 3px;
            color: #fff;
            cursor: pointer;
        }
        </style>
    </head>
    <body>
        
        <div align="center">
            <div class="container">
        <p><b>Remplissez le formulaire</b></p>
            <form method="POST" action="">
                <table >
                   <tr> 
                      <td class="champ">   
                      <label for="pseudo"> Pseudo : </label>
                      </td>
                      <td class="champ">
                      <input type="text" placeholder="Votre pseudo" id="pseudo" name="pseudo" value="<?php if(isset($pseudo)){ echo $pseudo; } ?> "/>
                      </td>
                   </tr>
                   <!-- 
                    <div class="champ flex">
                    <label for="pseudo">Prénom</label>
                    <input type="text" name="pseudo" id="pseudo" required>
                    </div>
                    -->
                    <tr>
                      <td class="champ">   
                      <label for="mail"> Votre email : </label>
                      </td>
                      <td class="champ">
                      <input type="email" placeholder="Votre mail" id="mail" name="mail" value="<?php if(isset($mail)){ echo $mail; } ?> "/> 
                      </td>
                   </tr>
                  <!--  <div class="champ">
                <label for="mail">E-Mail</label>
                <input type="email" name="mail" placeholder="Votre mail" id="mail" value="<?php if(isset($mail)){ echo $mail; } ?> " >
                   </div>
                    -->
                    <tr> 
                        <td class="champ"> 
                      <label for="mail2">Confirmez votre email : </label>
                      </td >
                      <td class="champ">
                      <input type="email" placeholder="confirmation de Votre mail" id="mail2" name="mail2" value="<?php if(isset($mail2)){ echo $mail2; } ?> "/>
                      </td>
                   </tr>
                    
                   <tr> 
                      <td class="champ"> 
                      <label for="mdp">Mot de passe : </label>
                      </td>
                      <td class="champ">
                      <input type="password" placeholder="votre mot de passe" id="mdp" name="mdp"/>
                      </td>
                   </tr>
                    
                   <tr>                     
                      <td class="champ">                           
                      <label for="mdp2">confirmez votre mot de passe : </label>
                      </td>
                      <td class="champ">
                      <input type="password" placeholder="confirmez votre mot de passe" id="mdp2" name="mdp2"/>
                      </td>
                   </tr> 
                
                   <tr>
                      <td  class="champ">
                    <label for="date_dep">Date de naissance</label>
                      </td>
                      <td  class="champ">  
                    <input type="date" name="date_dep" id="date_dep">
                      </td> 
                  </tr>
                  <tr>
                      <td class="champ">
                    <label for="sexe" > <p> Sexe :</p></label>
                      </td>
                      <td>
                  <input type="radio" name="radio"  /> Femme
                  <input type="radio" name="radio"  /> Homme
                      </td>
                  </tr>
                    
                  <tr>
                      <td></td>
                      <td align="center" >
                        <br />
                        <input type="submit" name="forminscription" class="valid" value="Je m'inscris" />
                      </td>
                   </tr>
                 </table>
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