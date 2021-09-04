<?php 
session_start();

    $bdd = new PDO('mysql:host=localhost;dbname=test','root','');
    if(isset($_POST['connecter'])){
        $email=$_POST['email'];
        $mot_de_passe=$_POST['mot_de_passe'];
    $select=$bdd->prepare("SELECT * FROM client WHERE email='$email' and mot_de_passe='$mot_de_passe'");
    $select->setFetchMode(PDO::FETCH_ASSOC);
    $select->execute();
    $data=$select->fetch();
        if($data['email']!=$email and $data['mot_de_passe']!=$mot_de_passe){
            echo "le mot de passe ou l'email incorrect";
        }
        elseif($data['email']==$email and $data['mot_de_passe']==$mot_de_passe){
            $_SESSION['email']=$data['email'];
            $_SESSION['nom']=$data['nom'];
            header("location:menubleu.php");
        }
    }


?>

<html>
<head>
<meta charset="utf-8"/>
<title>Untitled Document</title>
</head>
<body>

    




</body>
</html>
