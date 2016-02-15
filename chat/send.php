<?php
session_start();
$conn = new mysqli("127.0.0.1","root","","chat");
if($conn->connect_error){
    die("connnection failed :".$conn->connect_error);
}
echo $_SESSION['user'].$_GET['msgto'].$_GET['msg'];
$user_sess = $_SESSION['user'];
$msgto = $_GET['msgto'];
$msg = $_GET['msg'];
$insert = "INSERT INTO chat_data(`from`, `to`, `msg`) VALUES('$user_sess','$msgto','$msg')";

if($conn->query($insert)){
    echo "msg sent";
}else{echo "some error occured please sent msg again again";}
?>