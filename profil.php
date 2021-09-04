<?php
 include('menu.php');echo'<br>';
echo'<h2 style="margin-left:500px;">MES DONNEES</h2>';
 echo'<div class="info">';
echo'<tr>';
echo'<td>';
echo'<ul class="liste1" style="margin-left:100px;">';
       echo '<li><b>Nom :</b>'.$_SESSION['nom_cl'].'</li>';
       echo '<li><b>prenom :</b>'.$_SESSION['prenom_cl'].'</li>';
       echo '<li><b>date naissance :</b>'.$_SESSION['date_nais'].'</li>';
       echo'</ul>';
echo'</td>';
echo'<td>';
echo'<ul class="liste2" style="margin-left:200px;">';     
       echo '<li><b>email :</b>'.$_SESSION['email'].'</li>';
       echo '<li><b>adresse :</b>'.$_SESSION['adresse'].'</li>';
echo '<li><b>num tel :</b>'.$_SESSION['num_tel'].'</li>';
echo '</ul>';
echo'</td>';
echo'</tr>';
echo'</div>';
echo'<h2 style="margin-left:420px;">MODIFIER MES INFORMATIONS</h2>';

echo'<div class="information">';

            $bdd = new PDO('mysql:host=localhost;dbname=test','root','');

        if(isset($_SESSION['num_cl']))
{ 
  $reponse = $bdd->prepare("SELECT * FROM client WHERE num_cl=?");
  $reponse->execute(array($_SESSION['num_cl']));
  $user = $reponse->fetch();
  
  if(isset($_POST['newnom']) AND !empty($_POST['newnom']) AND $_POST['newnom'] != $user['nom_cl'])
  {
      $newnom= htmlspecialchars($_POST['newnom']);
      $insertnom=$bdd->prepare("UPDATE client SET nom_cl=? WHERE num_cl=?");
      $insertnom->execute(array($newnom, $_SESSION['num_cl']));
      $_SESSION['nom_cl']=$newnom;

      header("Location:profil.php?num_cl=".$_SESSION['num_cl']);
  }
  if(isset($_POST['newprenom']) AND !empty($_POST['newprenom']) AND $_POST['newprenom'] != $user['prenom_cl'])
  {
      $newprenom= htmlspecialchars($_POST['newprenom']);
      $insertprenom=$bdd->prepare("UPDATE client SET prenom_cl=? WHERE num_cl=?");
      $insertprenom->execute(array($newprenom, $_SESSION['num_cl']));
            $_SESSION['prenom_cl']=$newprenom;

      header("Location:profil.php?num_cl=".$_SESSION['num_cl']);
  }  
            
     if(isset($_POST['newdate']) AND !empty($_POST['newdate']) AND $_POST['newdate'] != $user['date_nais'])
  {
      $newdate= htmlspecialchars($_POST['newdate']);
      $insertdate=$bdd->prepare("UPDATE client SET date_nais=? WHERE num_cl=?");
      $insertdate->execute(array($newdate, $_SESSION['num_cl']));
      header("Location:profil.php?num_cl=".$_SESSION['num_cl']);
  } 
  
  
    
  if(isset($_POST['newemail']) AND !empty($_POST['newemail']) AND $_POST['newemail'] != $user['email'])
  {
      $newemail= htmlspecialchars($_POST['newemail']);
      $insertemail=$bdd->prepare("UPDATE client SET email=? WHERE num_cl=?");
      $insertemail->execute(array($newemail, $_SESSION['num_cl']));
            $_SESSION['email']=$newemail;

      header("Location:profil.php?num_cl=".$_SESSION['num_cl']);
  }
    
  if(isset($_POST['newmot_de_passe']) AND !empty($_POST['newmot_de_passe']) AND isset($_POST['newmot_de_passe2']) AND !empty($_POST['newmot_de_passe']))
  {
      $mot_de_passe=$_POST['newmot_de_passe'];
      $mot_de_passe2=$_POST['newmot_de_passe2'];
      if($mot_de_passe == $mot_de_passe2)
      {
         $insertmot_de_passe=$bdd->prepare("UPDATE client SET mot_de_passe=? WHERE num_cl=?");
         $insertmot_de_passe->execute(array($mot_de_passe, $_SESSION['num_cl']));
                $_SESSION['mot_de_passe']=$newmot_de_passe;

         header("Location:profil.php?num_cl=".$_SESSION['num_cl']);
      }
      else
      {
          $msg = "vos mot de passe ne correspondent pas";
      }
  }
  if(isset($_POST['newemail']) AND $_POST['newemail'] == $user['email'])
  {
      header("Location:profil.php?num_cl=".$_SESSION['num_cl']);
  }
echo '</div>';



      

   
?>
<html>
    <meta charset="utf-8">
<head>
    <style>
        .info {
            border: 2px solid gray;
            
           
            
        }
        .info td{
            color:blue;
            border: 1px solid black;
            
        }
       .info ul{
            list-style: none;
            font-size: 20px;
            display: inline-block;
        }
        .info tr td .list1{
            margin-left: 100px;
        }
    </style>
    </head>

<html>
    <head>
        <title> Profil </title>
        <meta charset="utf-8">
               <style>
    .submit {
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
        <style> 
            label{
                font-weight: bold;
            }
            .input{
                padding-right: 100px;
            }
        </style>
        <div align="center">
            <div class="container" style="border:2px solid black;">
             <center>
                <form method="post" action="profil.php" style="margin-left:300px;">
                    <div align="left">
                 
                        <input class="input" type="hidden" name="num_cl" placeholder="num_cl" value=<?php echo $user['num_cl']; ?> >
                <label> Nom :</label>    
                  <input class="input" type="text" name="newnom" placeholder="nom" value="<?php echo $user['nom_cl']; ?>" style="margin-left:200px;"/><br /><br /><br>
                        
                <label> Prenom :</label>
                  <input class="input" type="text" name="newprenom" placeholder="prenom" value=" <?php echo $user['prenom_cl']; ?> " style="margin-left:180px;"/><br /><br /><br>
                        
                <label> Date de naissance :</label>
                  <input class="input" type="date" name="newdate" placeholder="date de naissance" value=" <?php echo $user['date_nais']; ?> " style="margin-left:110px; padding-right:125px;"/><br /><br /><br>            
                 <label> Nouveau mail :</label> 
                  <input class="input" type="mail" name="newemail" placeholder="mail" value=" <?php echo $user['email']; ?> " style="margin-left:135px;"/><br /><br /><br>
                 <label> Nouveau mot de passe :</label> 
                  <input class="input" type="password" name="newmot_de_passe" placeholder="mot de passe" style="margin-left:80px;" /><br /><br /><br><br>
                    
                 <label> Confirmer votre mot de passe :</label>   
                  <input class="input" type="password" name="newmot_de_passe2" placeholder="confirmer le mot de passe" style="margin-left:30px;"/><br /><br /><br>
                 
                  <input class="input" type="submit" name="submit" value="mettre a jour mon profil" style="border: none;
            background: none;
            font-size: 20px;
            padding: 10px 30px;
            background: rgb(64,128,128);
            border-radius: 3px;
            color: #
            cursor: pointer;"/>
                    </div>
                </form>
                 </center>
                <?php
                if(isset($msg)){ echo $msg; }
                ?>
        </div>
        </div>
    </body>

<?php
}
else
{
    header("Location:profil.php"); 
}
?>
</html>