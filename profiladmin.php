<?php
 include('administrateur.php');echo'<br>';
  $bdd = new PDO('mysql:host=localhost;dbname=test','root','');

        if(isset($_SESSION['id_admin']))
{ 
  $reponse = $bdd->prepare("SELECT * FROM administrateur WHERE id_adminl=?");
  $reponse->execute(array($_SESSION['id_admin']));
  $user = $reponse->fetch();
  
  
    
  if(isset($_POST['newpseudo']) AND !empty($_POST['newpseudo']) AND $_POST['newpseudo'] != $user['pseudo'])
  {
      $newpseudo= htmlspecialchars($_POST['newpseudo']);
      $insertpseudo=$bdd->prepare("UPDATE administrateur SET pseudo=? WHERE id_admin=?");
      $insertpseudo->execute(array($newpseudo, $_SESSION['id_admin']));
            $_SESSION['pseudo']=$newpseudo;

      header("Location:profiladmin.php?id_admin=".$_SESSION['id_admin']);
  }
    
  if(isset($_POST['newmot_de_passe']) AND !empty($_POST['newmot_de_passe']) AND isset($_POST['newmot_de_passe2']) AND !empty($_POST['newmot_de_passe']))
  {
      $mot_de_passe=$_POST['newmot_de_passe'];
      $mot_de_passe2=$_POST['newmot_de_passe2'];
      if($mot_de_passe == $mot_de_passe2)
      {
         $insertmot_de_passe=$bdd->prepare("UPDATE administrateur SET mot_de_passe=? WHERE id_admin=?");
         $insertmot_de_passe->execute(array($mot_de_passe, $_SESSION['id_admin']));
                $_SESSION['mot_de_passe']=$newmot_de_passe;

         header("Location:profiladmin.php?id_admin=".$_SESSION['id_admin']);
      }
      else
      {
          $msg = "vos mot de passe ne correspondent pas";
      }
  }
  if(isset($_POST['newpseudo']) AND $_POST['newpseudo'] == $user['pseudo'])
  {
      header("Location:profiladmin.php?id_admin=".$_SESSION['id_admin']);
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
                <form method="post" action="profiladmin.php" style="margin-left:300px;">
                    <div align="left">
                 
                        <input class="input" type="hidden" name="id_admin" placeholder="id_admin" value=<?php echo $user['id_admin']; ?> >
               
                        
                <label> Pseudo :</label>
                  <input class="input" type="text" name="newpseudo" placeholder="pseudo" value=" <?php echo $user['pseudo']; ?> " style="margin-left:180px;"/><br /><br /><br>
                
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
    header("Location:profiladmin.php"); 
}
?>
</html>