<?php include('administrateur.php');  ?>
<?php 

    $bdd = new PDO('mysql:host=localhost;dbname=test','root','');
   $reponse=$bdd->query('SELECT * FROM produit');
   while($donnees=$reponse->fetch()){
              $id=$donnees["ref_prod"];

       echo "<div id='img_div'>";
       echo"<form method='get'>";
       echo "<img src='images2/ordinateurs/bureaux/".$donnees['image']."'>";
       echo '<div class=nom>'.'<p>'.$donnees['nom_prod'].'<p>'.'</div>';
        echo '<p>'.$donnees['description'].'<p>';
       echo '<div class=prix>'.'<p>'.'<b>prix:</b> ' .$donnees['prix'].'<p>'.'</div>';
       echo ' <input type="submit" name="modifierprix" class="valid" value="Modifier" />';

       
        echo " <a href='deleteproduit.php?ref_prod=$id' class='valid' onclick='return confirm(\"voulez-vous vraiment supprimer ce produit\");'>supprimer</a>";
     echo'  <input class="input" type="hidden" name="ref_prod" placeholder="ref_prod" value=<?php echo $id; ?> ';
       echo"</form>";
      
       echo"</div>";
   }
?>
<html>
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