<?php
session_start();  
$username=$_SESSION["username"];
if($username != "wanyirui")
{
  header("location: bridge.php");
}
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登入</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
  </head>
<body style="background-color: lightblue">
<?php
              require('navbar.php');
              ?>
    <div class="container">
        <div class="row justify-content-center">
        
        <div class="col-md-auto">
    <br><br>
<?php

if($username=="wanyirui"){
    echo "<h1 class='animate__animated animate__backInLeft'>歡迎".$username."管理員進入我們的網站 <br><br></h1>";
    // echo "<a href='show.php'>點我管理所有資料</a>";
    echo "<div class='card' style='width:300px'>
    <img class='card-img-top' src='setting.png' alt='Card image' width='60px'>
    <div class='card-body'>
      <h4 class='card-title'>點我管理所有資料</h4>
      <p class='card-text'>管理員專屬功能</p>
      <a href='showManage.php' class='btn btn-primary'>進入</a>
    </div>
  </div>";
}else{
    
}

?>

</div></div></div>

</body>
</html>