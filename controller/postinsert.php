<?php
session_start();
require "../model/dbcrud.php";
$object1=new Crud();
if(isset($_POST["postpub"])){
    $t=$_POST["titlepost"];
    $d=$_POST["descr"];
    $files=$_FILES["img"];
    $type=$files["type"];
    $name=$files["name"];
    $tmp=$files["tmp_name"];
    $ext=explode("/",$type);
    $extension=array("jpeg","png","jpg","gif");
    $time=Date("Y-m-d H:i");
    if(in_array($ext[1],$extension)){
        move_uploaded_file($tmp,"../images/".$name);
      $object1->addpost($t,$d,$name,$time);
            $_SESSION["post_success"]="<div class=\"d-flex justify-content-center mt-2\">
            <div class=\"alert alert-success mt-4\">
            <b>the last  Post inserted successfully 👌 at {$time}</B> 
            </div>
           </div>";
        header("location:../views/admin/postad.php");

        
    }else{
       echo "the type of the image is invalid";
       header("REFRESH:2;URL=../views/admin/postad.php");
    }

    

   
    
}



?>