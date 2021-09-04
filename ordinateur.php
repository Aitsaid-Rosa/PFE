<?php 
$bdd = new PDO('mysql:host=localhost;dbname=test','root','');
$req=$bdd->query('SELECT * FROM produit WHERE type="ordinatteur"');
   while($donnees=$req->fetch()){
       
          echo'<form method="get">';
       echo "<div id='img_div'>";
       echo "<img src='images2/ordinateurs/bureaux/".$donnees['image']."'>";
       echo '<div class=nom>'.'<p>'.$donnees['nom_prod'].'<p>'.'</div>';
        echo '<p>'.$donnees['description'].'<p>';
       echo '<div class=prix>'.'<p>'.'<b>prix:</b> ' .$donnees['prix'].'<p>'.'</div>';
    
        

              

       echo"</div>";
       echo'</form>';
   }
    
   

?>
<html>
<head>
    
<style >
    body{
        padding: 5px;
        margin: 5px;
        position:relative;
    }
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
        }
   
    
    </style>    
    </head>

</html>