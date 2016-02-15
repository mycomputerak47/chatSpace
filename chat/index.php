<?php
session_start();
if(@$_SESSION['loginAs']=='chatuser'){
    header('Location:chatSpace.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <scrip src="js/bootstrap.min.js"></scrip>
        <link rel="stylesheet" type="text/css" href="style/bootstrap.css"/>
        <script src="js/jquery-2.2.0.min.js"></script>
        <link rel="stylesheet" type="text/css" href="style/w3.css"/>
        <style>
            html,body{
                width: 100%;
                height: 100%;
                margin: 0;
                padding: 0;
                overflow: hidden;
            }
            @media screen and (min-width:700px){
                form{
                    width: 30%;
                    margin-left: 35%
                }
            }
        </style>
        <script>
            $(document).ready(function(){
                $("#login").click(function(){
                    //alert("lll");
                    var userName = $("#user").val();
                    var passWord = $("#pass").val();
            //        alert(userName+passWord);
                    $.ajax({
                        type:"post",
                        url :"login.php",
                        data:"user="+userName+"&pass="+passWord,
                        success:function(result){if(result){$("#prof").html(result);}else{$("#prof").html("error occured");}}
                        });    
                    });
                });
            
        </script>
    </head>
    <body>
        <div id="prof"></div>
        
        <form role="form" action="" method="post">
            <h1>User Login Panel</h1>
  <div class="form-group">
    <label for="email">Username</label>
    <input type="text" class="form-control" name="user" id="user">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" name="pass" id="pass">
  </div>
  <button type="submit" class="btn btn-default"  name="login"id="login" onclick="loginchk()">login</button>
</form>
    </body>
</html>