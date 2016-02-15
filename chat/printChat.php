<?php

session_start();
$sercon = file_get_contents(dirname(__FILE__).'/protected/server.json');
$sercon = json_decode($sercon,true);
foreach($sercon['root'] as $data){
    $_CONNECTION['HOST'] = $data['name'];
    $_CONNECTION['USERNAME'] = $data['usr'];
    $_CONNECTION['PASSWORD'] = $data['pass'];    
    $_CONNECTION['DB'] = $data['DB'];
}

$conn = new mysqli($_CONNECTION['HOST'],$_CONNECTION['USERNAME'],$_CONNECTION['PASSWORD'],$_CONNECTION['DB']);
if($conn->connect_error){
    die("connnection failed :".$conn->connect_error);
}
//echo $_SESSION['user'].$_GET['msgto'].$_GET['msg'];
$query = "SELECT * FROM chat_data WHERE id > (SELECT MAX(id)-20 FROM chat_data)";
$doit = mysqli_query($conn,$query);

?>
<table>
    <tr><th>from</th><th>to</th><th>msg</th></tr>
    <?php
    
    $row=mysqli_fetch_array($doit);
    
while ($row=mysqli_fetch_array($doit)){
    echo "<tr><td>".$row['from']."</td><td>".$row['to']."</td><td>".$row['msg']."</td></tr>";
}

?>