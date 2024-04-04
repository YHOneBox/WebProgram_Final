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
<nav class="navbar navbar-expand-sm bg-dark p-3">

  <div class="container-fluid">
    <img src= "123.png" width="55px"/>
  
    <!-- Links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link text-light" href="https://zh.wikipedia.org/zh-tw/%E5%BF%83%E8%A1%80%E7%AE%A1%E7%96%BE%E7%97%85">了解心血管疾病</a>
        </li>
    </ul>
  </div>

</nav>
<div class="container">
            <div class="row justify-content-center">
            
            <div class="col-md-auto">
            <br>
            <br>
            <br>
    
 <?php
$conn=require_once("config.php");

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username=$_POST["username"];
    $password=$_POST["password"];
    //檢查帳號是否重複
    $check="SELECT * FROM account WHERE userID='".$username."'";
    if(mysqli_num_rows(mysqli_query($conn,$check))==0){
        $sql="INSERT INTO account (userID, password , choose_char)
            VALUES('".$username."','".$password."','0')";
        
        if(mysqli_query($conn, $sql)){
            echo "<h1 class='animate__animated animate__bounce'>註冊成功!</h1><br>";
            echo "<a class='animate__animated animate__rubberBand' href='index.php'>進入登入頁面</a>";
            // header("refresh:32;url=index.php");
            exit;
        }else{
            echo "Error creating table: " . mysqli_error($conn);
        }
    }
    else{
        echo "<h1 class='animate__animated animate__bounce'>該帳號已有人使用!</h1><br>";
        echo "<a class='animate__animated animate__rubberBand' href='register.html'>重新註冊</a>";
        // header('HTTP/1.0 302 Found');
        //header("refresh:3;url=register.html",true);
        exit;
    }
}


mysqli_close($conn);

function function_alert($message) { 
      
    // Display the alert box  
    echo "<script>alert('$message');
     window.location.href='index.php';
    </script>"; 
    
    return false;
} 
?>
</div>
</div>
</div>
</form>
</body>
</html>
