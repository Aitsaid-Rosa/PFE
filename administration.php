
<?php
session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=administration','root','');

$membre = $bdd->query('SELECT * FROM membre ORDER BY is DESC');
?>

<html >
  <head> 
    <meta charset="utf-8">

    <title>administration</title>
  </head>

  <body>
      
       <ul>
         <?php while($m=$membre->fetch()){
         
    
        }
           
           
         ?>
       
       </ul>
      
     
    <form >
        <p><b> Connectez-vous: </b></p>
      <input type="email" id="mail" name="mail" placeholder="email" >
      <input type="password" id="mdp" name="mdp" placeholder="Mot de passe" >
      <button type="submit" name="formconnexion" class="valid">Sign in</button>
    </form>
  </body>
</html>
