<?php
$sercon = file_get_contents(dirname(__FILE__).'/protected/server.json');
$sercon = json_decode($sercon,true);
foreach($sercon['root'] as $data){
    $_CONNECTION['HOST'] = $data['name'];
    $_CONNECTION['USERNAME'] = $data['usr'];
    $_CONNECTION['PASSWORD'] = $data['pass'];    
    $_CONNECTION['DB'] = $data['DB'];
}

//CREATE CONNECTION 
$connect = new mysqli($_CONNECTION['HOST'],$_CONNECTION['USERNAME'],$_CONNECTION['PASSWORD'],$_CONNECTION['DB']);
//CHECK IF CONNECTED
if($connect->connect_error){
    die("connection Failed : ".$connect->connect_error);
}
$login = "SELECT * FROM login WHERE user = '".$_POST['user']."' AND pass = '".$_POST['pass']."'";
$log = $connect->query($login);

if($log->num_rows >0){
    
    session_start();
    $_SESSION['loginAs'] = 'chatuser';
    $_SESSION['user'] = $_POST['user'];
    echo '<script>window.location = "chatspace.php"</script>';
}else{echo " !login failed ";}
?>