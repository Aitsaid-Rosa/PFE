<?php
session_start();

?>

<html>
    <head>
        <meta charset="utf-8">
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
               <a class="visible" href="h2.php"style="color: white;" > <i class="fa fa-home" style="font-size:30px; color:white;"></i></a>
           </li>
            <li>
               <a class="visible" href="">PARAMETRES</a>
             <ul class="soumenu"style="" >
                <li><a href="tab_android.html">GESTION COMMANDES</a></li>
                <li><a href="tab_ios.html">GESTION FACTURES</a></li>
                <li><a href="tab_windows.html">GESTION LIVRAISONS</a></li>
               
            </ul>
           </li>
            <li>
               <a class="visible" href="profiladmin.php">PROFIL</a>
               
           </li>
             <li>
               <a class="visible" href="gererclient.php">GERER CLIENT</a>
               
           </li>
            <li>
               <a class="visible" href="gererproduit.php">GERER PRODUIT</a>
               
           </li>
            <li>
               <a class="visible" href="deconnexion.php">DECONNEXION</a>
              
           </li>
                  <p style="color:white; text-transform:capitalize;"><b> <?php
                echo $_SESSION['pseudo'];
 ?> </b></p> 
          <li>
                <form action="/search" id="searcht" method="get" style="margin-left:0px; margin-top:20px; ">
                    <input id="search" name="R" type="text" placeholder="search " style="border-radius: 50px; width:200px;"  />
 <i class="fa fa-search" style="font-size:20px; color:white;"></i>           </form>
            
          
             
           </li>
        </ul>
     </div>
        </nav>
    
    
       
    </body>
    </html>