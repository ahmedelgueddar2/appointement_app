<?php
 @session_start();
class Crud{
    




   

    public function __toString(){
        return "
          <script>
          alert('this is a crud object From crud class');
          </script>
        ";
    }

    public function insert($name,$mail,$ville,$password,$src){
        require "connexion.php";
        $sql="INSERT INTO clients(nom,email,ville,pass,src)VALUES(?,?,?,?,?)";
        $req1=$db->prepare($sql);
        $req1->execute(array($name,$mail,$ville,$password,$src)); 
    
    }
    // Rendez vous
    public function insert2($id,$rdname,$rdser,$rdtime,$rdclt){
        require "connexion.php";
        $sql1="INSERT INTO rendez_vous(rd_id,rd_name,rd_service,rd_time,id_clt )VALUES(?,?,?,?,?)";
        $req3=$db->prepare($sql1);
        $req3->execute(array($id,$rdname,$rdser,$rdtime,$rdclt)); 
    
    }
    public function afficher($tablename){
        // bloc of code
        require "connexion.php";
        $req=$db->prepare("SELECT * FROM $tablename ");
        $req->execute();
        $data=$req->fetchAll();
        return $data;
    }
    public function checklog($l,$p){
        require "connexion.php";
       $req2=$db->prepare("SELECT * FROM clients WHERE email = ? AND pass = ?");
       $req2->execute(array($l,$p));
       $result=$req2->fetch();
       if(!$result){
           echo "you are not register"."<b> <a href='../views/login.php'>Login </a></b>";
          
       }else{
           echo "we will redirect you to client pannel in 2s";
           $_SESSION["id"]=$result["id"];
           $_SESSION["clt"]=$result["nom"];
           $_SESSION["mailclt"]=$result["email"];
           $_SESSION["ville"]=$result["ville"];
           $_SESSION["srcimg"]=$result["src"];
           $_SESSION["autoriser"]="oui";
           
           header("REFRESH:2;URL=../views/client.php");
       }
    }     
    public function checklogadmin($l,$p){
        require "connexion.php";
       $req2=$db->prepare("SELECT * FROM admin WHERE email = ? AND pass = ?");
       $req2->execute(array($l,$p));
       $result=$req2->fetch();
       if(!$result){
           echo "you are not admin";
          
       }else{
           echo "we will redirect you to admin pannel in 2s";
           $_SESSION["auto"]="oui";
           $_SESSION["idadmin"]=$result["id"];
           $_SESSION["nomadmin"]=$result["nom"];
           $_SESSION["autoriser"]="oui";
           $_SESSION["logtime"]=date("H:i");
           header("REFRESH:2;URL=../views/admin/index.php");
       }
    }     

public function affichrdv(){
    require "connexion.php";
    $query="SELECT * FROM rendez_vous WHERE rendez_vous.id_clt=?";
    $stmt=$db->prepare($query);
    $stmt->execute(array($_SESSION["id"]));
    $data=$stmt->fetchAll();
    return $data;
    
    
}


public function clientnum(){
    require "connexion.php";
    
    $stmt=$db->prepare("SELECT COUNT(*) FROM clients");
    $stmt->execute();
    $result=$stmt->fetch(PDO::FETCH_NUM);
    if($result){
     $data=$result;
    }else{
        $data=0;
    }
    return $data;
}
public function totalrv(){
    require "connexion.php";
    $stmt =$db->prepare("SELECT COUNT(*) FROM rendez_vous");
    $stmt->execute();
    $result=$stmt->fetch(PDO::FETCH_NUM);
    if($result){
        // $data=$result[0];
        return $result;
    }else{
        // $data=0;
    }
    // return $data;
}
public function adminnum(){
    require "connexion.php";
     $stmt=$db->prepare("SELECT COUNT(*) FROM admin");
     $stmt->execute();
     $result= $stmt->fetch(PDO::FETCH_NUM);
     if($result){
       return $result;
     }
}
public function addpost($titre,$desc,$imagesrc,$ladate){
    require "connexion.php";
    $req=$db->prepare("INSERT INTO posts(title,description,srcimg,datepost) VALUES(?,?,?,?)");
    $req->execute(array($titre,$desc,$imagesrc,$ladate));
   
}
public function selectpost(){
    require "connexion.php";
    $req=$db->prepare("SELECT * FROM posts ORDER BY num_post DESC");
    $req->execute();
    $result=$req->fetchAll(PDO::FETCH_ASSOC);
  return $result;
    
}
public function postnumber(){
    require "connexion.php";
    $req= $db->prepare("SELECT COUNT(*) AS numpost FROM posts");
    $req->execute();
    $result=$req->fetch(PDO::FETCH_NUM);
    if($result){
        return $result;
    }
}
public function rdv_clt(){
    require "connexion.php";
    $req=$db->prepare("SELECT rd_id,rd_name,
    rd_service,rd_time,clients.nom ,clients.id
    FROM rendez_vous
    INNER JOIN clients on clients.id=rendez_vous.id_clt ORDER BY clients.nom");
    $req->execute();
    $result=$req->fetchAll(PDO::FETCH_ASSOC);
    if($result){
        return $result;
    }
    
}
public function villestatistic(){
    require "connexion.php";
    $req=$db->prepare("SELECT ville, COUNT(nom) as \"client\" FROM clients GROUP BY ville ORDER BY COUNT(nom) DESC");
    $req->execute();
    $result=$req->fetchAll(PDO::FETCH_NUM);
    if($result){
        return $result;
    }
}

}




?>