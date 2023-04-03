<?php
header('Access-Control-Allow-Origin: *');
// Allow to all website my APi
// header("Content-Type:application/json;charset=UTF-8");
header("Access-Control-Allow-Methods: *");
// controll Method 
header("Access-Control-Max-Age:3600");
// say to navigator to delete api after 3600 day
header("Access-Control-Allow-Headers:*");

require "../../model/dbcrud.php";
$object = new Crud;
$data=$object->clientnum();
$data2=$object->totalrv();
$data3=$object->adminnum();
$data4=$object->postnumber();
$chart_1_data=$object->villestatistic();
if(isset($_GET["key"])){
    if($_GET["key"]=="client"){
        print_r(json_encode($data));
    }elseif($_GET["key"]=="rv"){
        print_r(json_encode($data2));
    }elseif($_GET["key"]=="admin"){
        print_r(json_encode($data3));
    }elseif($_GET["key"]=="post"){
        print_r(json_encode($data4));
    }elseif($_GET["key"]=="Graph1"){
        print_r(json_encode($chart_1_data));
    }
    else{
        print_r(json_encode(["error"=>"Invalid api  password"]));
    }
}else{
    print_r(json_encode(["error"=>"something wrong!"]));
}







?>