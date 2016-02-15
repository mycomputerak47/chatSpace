<?php
session_start();
if(!$_SESSION['loginAs']){
    header('Location:index.php');
}
?>
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
                
            }
            @media screen and (min-width:700px){
                form{
                    width: 30%;
                    margin-left: 35%
                }
            }
        </style>
    </head>
    <body onload="myFunction();">
        <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header" style="color:#fff">
      <a class="navbar-brand" href="#">chatSpace</a>
        <?php
        echo $_SESSION['loginAs'];
        echo " logged in as :".$_SESSION['user'];

        ?>
    </div>
    
    <ul class="nav navbar-nav navbar-right">
 
      <li><a  onclick="window.location='logout.php'" style="cursor:pointer"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>
          <div class="row">
    <div class="col-sm-3" style="background-color:lavender;">
              <ul>
            <li>user - 11</li>
            <li>user - 13</li>
            <li>user - 15</li>
            <li>user - 17</li>
            <li>user - 19</li>
            <li>user - 21</li>
        </ul>
              </div>
    <div class="col-sm-9" style="background-color:lavenderblush;">
        <div class="row">
              <div class="col-sm-4">
                        <form class="chatform" onload="pritChat();">
                            <input name="msgto" placeholder="msg to" readonly value="11">
                            <input name="msg" placeholder="message">
                            <input name="send" type="submit" value="send message"/>
                    </form>
                </div>
                  <div class="col-sm-4">
                      <form class="chatform" onload="pritChat();">
                          <input name="msgto" placeholder="msg to" readonly value="13">  
                          <input name="msg" placeholder="message">
                            <input name="send" type="submit" value="send message"/>
                </form>            
                            </div>
                  <div class="col-sm-4">
                        <form class="chatform" onload="pritChat();">
                            <input name="msgto" placeholder="msg to" readonly value="15">
                            <input name="msg" placeholder="message">
                            <input name="send" type="submit" value="send message"/>
                </form>        
                    </div>
        </div>
    <div class="row">
                  <div class="col-sm-4">
                        <form class="chatform" onload="pritChat();">
                            <input name="msgto" placeholder="msg to" readonly value="17">
                            <input name="msg" placeholder="message">
                            <input name="send" type="submit" value="send message"/>
                </form>        
                    </div>
                    <div class="col-sm-4">
                        <form class="chatform" onload="pritChat();">
                            <input name="msgto" placeholder="msg to" readonly value="19">
                            <input name="msg" placeholder="message">
                            <input name="send" type="submit" value="send message"/>
                        </form>
                    </div>
                    <div class="col-sm-4">
                        <form class="chatform" onload="pritChat();">
                            <input name="msgto" placeholder="msg to" readonly value="21">
                            <input name="msg" placeholder="message">
                            <input name="send" type="submit" value="send message"/>
                        </form>        
                    </div>
        </div>
              

              </div>
  </div>

        
<div id="chat"></div>
<div id="chathis"></div>
        
<script src="js/jquery-2.2.0.min.js"></script>
<script>
    $(document).ready(function(){
        $(".chatform").submit(function(){
            var msgto = this.msgto.value;
            var msg = this.msg.value;
            //alert(msg+msgto);
            $.ajax({
                type:"get",
                url:"send.php",
                data:"msg="+msg+"&msgto="+msgto,
                success:function(result){if(result){$("#chat").html(result);}else{$("#chat").html("error");}}
            });
            return false;
            
        });
    });
</script>
<script>
    
       function printChat(){
           $.ajax({
               type:"get",
               url:"printChat.php",
               data:"trigger=1",
               success:function(gotit){if(gotit){$("#chathis").html(gotit);}else{$("#chathis").html("loading...")}}
           });
           
       }
        
function myFunction() {
    setInterval(printChat, 1000);
}
    
</script>
</body></html>