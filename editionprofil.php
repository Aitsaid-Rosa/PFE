<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=test','root','');
if(isset($_SESSION['id']))
{
  $requser = $bdd->prepare("SELECT * FROM client WHERE id=?");
  $requser->execute(array($_SESSION['id']));
  $user = $requser->fetch();
  
  if(isset($_POST['newnom']) AND !empty($_POST['newnom']) AND $_POST['newnom'] != $user['nom'])
  {
      $newnom= htmlspecialchars($_POST['newnom']);
      $insertnom=$bdd->prepare("UPDATE client SET nom=? WHERE id=?");
      $insertnom->execute(array($newnom, $_SESSION['id']));
      header("Location: afficherproduit.php?id=".$_SESSION['id']);
  }
  if(isset($_POST['newprenom']) AND !empty($_POST['newprenom']) AND $_POST['newprenom'] != $user['prenom'])
  {
      $newprenom= htmlspecialchars($_POST['newprenom']);
      $insertprenom=$bdd->prepare("UPDATE client SET prenom=? WHERE id=?");
      $insertprenom->execute(array($newprenom, $_SESSION['id']));
      header("Location: afficherproduit.php?id=".$_SESSION['id']);
  }    
  
    
  if(isset($_POST['newemail']) AND !empty($_POST['newemail']) AND $_POST['newemail'] != $user['email'])
  {
      $newemail= htmlspecialchars($_POST['newemail']);
      $insertemail=$bdd->prepare("UPDATE client SET email=? WHERE id=?");
      $insertemail->execute(array($newemail, $_SESSIOemailN['id']));
      header("Location: afficherproduit.php?id=".$_SESSION['id']);
  }
    
  if(isset($_POST['newmot_de_passe']) AND !empty($_POST['newmot_de_passe']) AND isset($_POST['newmot_de_passe2']) AND !empty($_POST['newmot_de_passe']))
  {
      $mot_de_passe=$_POST['newmot_de_passe'];
      $mot_de_passe2=$_POST['newmot_de_passe2'];
      if($mot_de_passe == $mot_de_passe2)
      {
         $insertmot_de_passe=$bdd->prepare("UPDATE client SET motdepasse=? WHERE id=?");
         $insertmot_de_passe->execute(array($mot_de_passe, $_SESSION['id']));
         header("Location: afficherproduit.php?id=".$_SESSION['id']);
      }
      else
      {
          $msg = "vos mot de passe ne correspondent pas";
      }
  }
  if(isset($_POST['newemail']) AND $_POST['newemail'] == $user['email'])
  {
      header("Location: afficherproduit.php?id=".$_SESSION['id']);
  }
?>
<html>
    <head>
        <title> Profil </title>
        <meta charset="utf-8">
    </head>
    <body>
        <div align="center">
            <div class="container">
            <h2> edition de mon profil : </h2>  
                <form method="POST" action="">
                    <div align="left">
                <label> Nom :</label>
                  <input type="text" name="newnom" placeholder="nom" value=" <?php echo $user['nom']; ?> "/><br /><br />
                <label> Prenom :</label>
                  <input type="text" name="newprenom" placeholder="prenom" value=" <?php echo $user['prenom']; ?> "/><br /><br />
                 <label> Nouveau mail :</label> 
                  <input type="mail" name="newemail" placeholder="mail" value=" <?php echo $user['email']; ?> "/><br /><br />
                 <label> Nouveau mot de passe :</label> 
                  <input type="password" name="newmot_de_passe" placeholder="mot de passe" /><br /><br />
                    
                 <label> Confirmer votre mot de passe :</label>   
                  <input type="password" name="newmot_de_passe2" placeholder="confirmer le mot de passe"/><br /><br />
                 
                  <input type="submit" value="mettre a jour mon profil"/>
                    </div>
                </form>
                <?php
                if(isset($msg)){ echo $msg; }
                ?>
        </div>
        </div>
    </body>
</html>
<?php
}
else
{
    header("Location:"); 
}
?>