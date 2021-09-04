<?php include('administrateur.php'); ?>
<html> 
    
<meta charset="utf-8">
<?php 

    $bdd = new PDO('mysql:host=localhost;dbname=test','root','');
   $reponse=$bdd->query('SELECT * FROM client ');

    while($donnees=$reponse->fetch()){
       $id=$donnees["num_cl"];
  echo '<form method="get">' ;    
       echo "<div id='img_div'>";

    echo '<p>'.'<b>Nom:</b> '.$donnees['nom_cl'].'<p>';
        echo '<p>'.'<b>Prénom:</b> '.$donnees['prenom_cl'].'<p>';
       echo '<div class=>'.'<p>'.'<b>Date de naissance:</b> ' .$donnees['date_nais'].'<p>'.'</div>';
     echo '<p>'.'<b>Adresse:</b> '.$donnees['adresse'].'<p>';
    echo '<p>'.'<b>Email:</b> '.$donnees['email'].'<p>';
    echo '<p>'.'<b>Numéro de telephone:</b> '.$donnees['num_tel'].'<p>';
         echo " <a href='delete.php?num_cl=$id' class='valid' onclick='return confirm(\"voulez-vous vraiment supprimer ce client\");'>supprimer</a>";
     echo'  <input class="input" type="hidden" name="num_cl" placeholder="num_cl" value=<?php echo $id; ?> ';
       echo'</div>';
 echo '</form>';
        
    }
    
?>

<head>
     
<style >
    #img_div{
        width: 80%;
        padding: 5px;
        margin: 15px auto;
        border: 1px solid #cbcbcb;
        
    
    }
    img{
        float: left;
        margin: 5px;
        width: 300px;
        height: 140px;
    }
    #img_div:after{
        content: "";
        display: block;
        clear: both;
    }
    .prix{
        color: red;
        font-size: 20px;
    }
    .nom{
        color: blue;
        font-size: 25px;
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
         float: right;
         margin-right: 2px;
        }
   
    
    </style>    
    </head>
    <body>
    
    </body>

</html>