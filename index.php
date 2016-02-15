<?php
$sercon = file_get_contents(dirname(__FILE__).'/chat/protected/server.json');
$sercon = json_decode($sercon,true);
foreach($sercon['root'] as $data){
    $_CONNECTION['HOST'] = $data['name'];
    $_CONNECTION['USERNAME'] = $data['usr'];
    $_CONNECTION['PASSWORD'] = $data['pass'];    
}
$connect = new mysqli($_CONNECTION['HOST'],$_CONNECTION['USERNAME'],$_CONNECTION['PASSWORD']);
//CHECK IF SUCCESSFULLY CONNECTED
if(!$connect->connect_error){
    $sql = "USE `chat`";
    if($connect->query($sql)){
        header('Location:./chat/');
    }
    else{
        $createDB = "CREATE DATABASE `chat`";
        if($connect->query($createDB)){
            header('Location:./chat/');
        }
        else{
            echo "SOME PROBLEM OCCURED CONTACT SERVICE PROVIDER";
        }
    }
}
$connect->close();
?>
