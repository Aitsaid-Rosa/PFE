 <!-- ******************  celle du projet  ************************ -->
<?php
 $msg="";


$bdd = new PDO('mysql:host=localhost;dbname=test','root','');


    if(isset($_POST['ajouter']))
    {
        $target="images2/".basename($_FILES['image']['name']);
           $nom = htmlspecialchars($_POST['nom']);
           $marque = htmlspecialchars($_POST['marque']);
           $type = htmlspecialchars($_POST['type']);
           $description = htmlspecialchars($_POST['description']);
           $prix = $_POST['prix'];
           $quantite = $_POST['quantite'];
           $image =$_FILES['image']['name'];
        
       if(!empty($_POST['nom']) AND !empty($_POST['marque']) AND !empty($_POST['type']) AND !empty($_POST['description']) AND !empty($_POST['prix']) AND !empty($_POST['quantite']))
       {  
          $nomlength = strlen($nom);
           if($nomlength <= 255)
           { 
               
           $marquelength = strlen($marque);
           if($marquelength <= 255)
           {
                
              $insertmbr = $bdd->prepare("INSERT INTO produit (nom_prod,marque,type,description,prix, quantite,image) VALUES (?,?,?,?,?,?,?)");
              $insertmbr-> execute(array($nom, $marque, $type, $description, $prix, $quantite, $image));
              if(move_uploaded_file($_FILES['tmp_name']['image'], target)){
                      $msg="image uploaded successfully";
                    }
             
                       /* $erreur = "Votre compte a bien été créé!"; */
                     $_SESSION['ajouterproduit'] = "le produit a été bien ajouter!";
                     header('Location:ajouterproduit.php');
                    
             }
                       
                    
             else
           {
               $erreur = "la marque est long"; 
           }
           
           
            }
       else
           {
               $erreur = "le nom est long"; 
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
    <?php
     $bdd = new PDO('mysql:host=localhost;dbname=test','root','');
     $insertmbr = $bdd->prepare("SELECT * FROM produit");

    ?>
<form method="post" action="ajouterproduit.php" class="form-horizontal " enctype="multipart/form-data">


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Nom</label>  
  <div class="col-md-4">
  <input id="textinput" name="nom" type="text" placeholder="le nom de produit" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Marque</label>  
  <div class="col-md-4">
  <input id="textinput" name="marque" type="text" placeholder="entrez sa marque" class="form-control input-md">
    
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Type</label>
  <div class="col-md-4">
    <select id="selectbasic" name="type" class="form-control">
      <option>ordinateur</option>
      <option>tablette</option>
      <option>smartphone</option>
      <option>peripherique</option>
      <option>composants</option>

    </select>
  </div>
</div>
    
    
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Description</label>  
  <div class="col-md-4">
  <textarea id="textinput"  name="description" type="text" placeholder="" class="form-control input-md">
      </textarea>
    
  </div>
</div>
    
    
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Prix</label>  
  <div class="col-md-4">
  <input id="textinput" name="prix" type="number" placeholder="entrer le prix" class="form-control input-md">
    </div>
</div>   
      
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Quantité</label>  
  <div class="col-md-4">
  <input id="textinput" name="quantite" type="number" placeholder="" class="form-control input-md">
    
  </div>
</div>

      

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Image</label>  
  <div class="col-md-4">
  <input id="textinput" name="image" type="file" value="" class="form-control input-md">
    
  </div>
</div>

    
 

<div align="center" >
                      <br />
                      <input type="submit" name="ajouter" class="valid" value="Ajouter à la base" />
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