<?php
session_start();

?>

<html>
    <meta charset="utf-8">
<head>

  <link href="mat.css" rel="stylesheet">
    <style>
    
    .header2 ul{
 list-style-type: none;

  
    
}
.soumenu{
    display: none;
}
.header2 a{
    text-decoration: none;
    display: inline-block;
}
.header2 a:hover{
    text-decoration: none;

}
.header2 {
    display: flex;
    background-color: black;
    height: 90px;
    
}
.visible {
    color: white;
}
.principale{
     display: flex;
}

.principale :: after{
     content:"";
    display: block;
    clear: both;
    
    
}

.principale li:hover .soumenu{
    display: inline-block;
    position: absolute;
   z-index: 1000;
    
}
.soumenu li{
    color: white;
    border-bottom: 1px solid black;
}
.soumenu li a{
    color: black;
  padding: 15px 30px;
    font-size: 13px;
    width: 270px;
    background-color: ghostwhite;
    opacity: 0.9;
    
}
.soumenu li a:hover {

    
}
.visible:hover{
    
 border-top: 5px solid black;
    background-color: RGB(228,77,38);
    
}
.visible .soumenu{
    background-color: RGB(230,100,40);
}
        .recherche input{
            float: left;
            
        }        
    
    </style>
</head>
    <body>
 <nav>
        
          <div class="header2" style="height:90px;">
        <ul  class="principale" >
           <li>
               <a class="visible" href="accueil1.html  "style="color: white;" > <i class="fa fa-home" style="font-size:30px; color:white;"></i></a>
           </li>
            <li>
               <a class="visible" href="afficherproduit.php">PRODUIT</a>
             <ul class="soumenu"style="" >
                <li><a href="ordachat.php">ORDINATEURS</a></li>
                <li><a href="tabachat.php">TABLETTES</a></li>
                <li><a href="smartachat.php">SMARTPHONE</a></li>
                <li><a href="perachat.php">PERIPHERIQUES</a></li>
                <li><a href="comachat.php">COMPOSANTS</a></li>
            </ul>
           </li>
            <li>
               <a class="visible" href="profil.php">PROFIL</a>
               
           </li>
             <li>
               <a class="visible" href="votre_panier.php">PANIER</a>
               
           </li>
            <li>
               <a class="visible" href="deconnexion.php">DECONNEXION</a>
              
           </li>
            <p style="color:white; text-transform:capitalize;"><b> <?php
                echo $_SESSION['prenom_cl'];
 ?> </b></p> 
          <li>
                <form action="/search" id="searcht" method="get" style="margin-left:50px; margin-top:20px;">
                    <input id="search" name="R" type="text" placeholder="Saisissez un produit, une marque ou une référence " style="border-radius: 50px;"  />
 <i class="fa fa-search" style="font-size:20px; color:white;"></i>           </form>
            
          
             
           </li>
        </ul>
     </div>
        </nav>
        
    </body>
   
    
   
    
    
</html>