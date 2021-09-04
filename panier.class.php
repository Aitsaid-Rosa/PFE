<?php
class panier{
    public function __construct(){
        if(!isset($_SESSION)){
            
        }
        if(isset($_SESSION['panier'])){
            $_SESSION['panier']=array();
        }
    }
    
}

?>