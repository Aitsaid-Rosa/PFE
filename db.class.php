<?php 
class db{
    private $host='localhost';
    private $username='root';
    private $password='';
    private $database='test';
    private $db;
    
    public function __construct($host=null,$username=null,$password=null,$database=null){
        if($host !=null){
            $this->host=$host;
             $this->username=$username;
             $this->password=$password;
        }
        $this->db=new PDO('mysql:host='.$this->host.';dbname='.$this->database, $this->username, $this->password, array());
    }
    public function query($sql, $data=array()){
        $req=$this->db->prepare('SELECT * FROM produit ');
        $req->execute($data);
         return $req->fetchAll(PDO::FETCH_OBJ);
    }
}

?>