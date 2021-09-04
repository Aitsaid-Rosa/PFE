<html>
<head>
   <meta charset="utf-8">
    <link href="mat.css" rel="stylesheet">
    <style>
     
    .centre {
        width: 1230px;
    }
    /*positionner les raccourcies de l'accueil comme arrière plans pour pouvoir ajouter le "+" et la transparence au survole */
    
    .b1,
    .b1 a {
        background-image: url(images2/Ordinateur.jpg);
        width: 233px;
        height: 231px;
        margin-bottom: 20px;
    }
    
    .b2,
    .b2 a {
        background-image: url(images2/tablette.jpg);
        width: 233px;
        height: 231px;
        margin-bottom: 20px;
    }
    
    .b3,
    .b3 a {
        background-image: url(images2/smartphone.jpg);
        width: 233px;
        height: 231px;
        margin-bottom: 20px;
    }
    
    .b4,
    .b4 a {
        background-image: url(images2/p%C3%A9r%C3%A9pherique.jpg);
        width: 233px;
        height: 231px;
        margin-bottom: 20px;
    }
    
    .b5,
    .b5 a {
        background-image: url(images2/composant.jpg);
        width: 233px;
        height: 231px;
        margin-bottom: 20px;
    }
    
    .b6,
    .b6 a {
        background-image: url(images2/bons%20plans.jpg);
        width: 233px;
        height: 231px;
        margin-bottom: 20px;
    }
    /*changer le background au survole*/
    
    .b1:hover {
        background-image: url(images2/Ordinateur+.jpg);
    }
    
    .b2:hover {
        background-image: url(images2/tablette+.jpg);
    }
    
    .b3:hover {
        background-image: url(images2/smartphone+.jpg);
    }
    
    .b4:hover {
        background-image: url(images2/p%C3%A9r%C3%A9pherique+.jpg);
    }
    
    .b5:hover {
        background-image: url(images2/composant+.jpg);
    }
    
    .b6:hover {
        background-image: url(images2/bons%20plans+.jpg);
    }
    
    .accueil {
        margin: auto;
        margin-top: 82px;
        display: flex;
        flex-wrap: wrap;
        width: 900px;
        justify-content: space-around;
        padding-top: 20px;
        color: #f5f5f5;
    }
            
    
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
    background-color: black;
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
/*
.principale :: after{
     content:"";
    display: block;
    clear: both;
    
    
}
*/
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
    background-color: RGBa(228,77,38,0,15);
    
}
.visible .soumenu{
    background-color: RGB(230,100,40);
}
    
    
    </style>
    </head>


<body>
    
    <nav>
        
          <div class="header2" style="height:90px;">
        <ul  class="principale" >
           <li>
               <a class="visible" href="ensavoirplus.php"style="color: white;" > <i class="fa fa-home" style="font-size:30px; color:white;"></i></a>
           </li>
            <li>
               <a class="visible" href="authentificationclient.php">CONNEXION</a>
               
           </li>
            <li>
               <a class="visible" href="formulaire1.php">INSCRIPTION</a>        
           </li>
                  <li>
                <form action="/search" id="searcht" method="get" style="margin-left:200px; margin-top:20px;">
                    <input id="search" name="R" type="text" placeholder="Saisissez un produit, une marque ou une référence " style="border-radius: 50px;"  />
 <i class="fa fa-search" style="font-size:20px; color:white;"></i>           </form>
            
          
             
           </li>
        </ul>
     </div>
        </nav>
    
 <div class="centre">
        <div class="accueil">
            <a class="b1" href="ordinateur.php"></a>
            <a class="b2" href="tablettes.php"></a>
            <a class="b3" href="smartphone.php"></a>
            <a class="b4" href="peripheriques.php"></a>
            <a class="b5" href="composants.php"></a>
<!--            <a class="b6" href="bon%20plans.html"></a>-->
        </div>
        
    </div>
<!--   -->
    </body>
    </html>