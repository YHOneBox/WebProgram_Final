<?php
    session_start();
    require "loginCheck.php";
    require "CharCheck.php";
    require_once "storage.php";
    require_once "class_character.php";
    include_once "admin.php";

    $my_char = $_SESSION["character"];
    $char = new Character();
    $data = $char->getCharacterDialog($my_char, "person");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset = "UTF-8"/>
        <title><?php echo getWord("Framingham Cardiovascular Disease Risk Evaluation");?></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"/>
        <link rel="stylesheet" type="text/css" href="css/appearance.css">
        <link rel="stylesheet" href="css/select_char.css"/>
        <link rel="stylesheet" href="css/dialog.css"/>
        <link rel="stylesheet" href="css/personal_page.css"/>
        <link rel="stylesheet" href="css/header.css"/>
    </head>
    <body>
        <?php require_once "character_data.php";  ?>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
        <?php 
            require_once "header.php"; 
        ?>
        
        <audio id = "myAudio" src="music/<?php echo $my_char?>/person.mp3" hidden>
            <p>If you are reading this, it is because your browser does not support the audio element.</p>
        </audio>
        <!-- <embed src="music/test.mp3" width="180" height="90" loop="false" autostart="true" hidden="true" /> -->
        <!-- <form id = "form_major" action = "major.php" method = "post"></form>
        <form id = "form_show" action = "show.php" method = "post"></form>
        <form id = "form_select_char" action = "select_char.php" method = "post"></form>
        <button type = submit form = "form_major">Test Health</button>
        <button type = submit form = "form_show">Health Log</button>
        <button type = submit form = "form_select_char">Change Partner</button> -->
        <div class = "placeholder-1"></div>
        <div class = "button-main">
            <div class = "button"><a class = "btn btn-danger btn-lg" style = "width: 500px;" href = "major.php"><?php echo getword("Test Health")?></a></div>
            <div class = "button"><a class = "btn btn-danger btn-lg" style = "width: 500px;" href = "show.php"><?php echo getword("Health Log") ?></a></div>
            <div class = "button-bottom"><a class = "btn btn-danger btn-lg" style = "width: 500px;" href = "select_char.php"><?php echo getword("Change Partner") ?></a></div>
        </div>
        <script>
            var char = document.getElementsByClassName("imageAlwaysFront")[0];
            char.addEventListener('mouseover', function () {
                this.style.cursor = 'pointer';
            })

            var x = document.getElementById("myAudio");
            function AudioFunc(obj)
            {
                x.play();
                messageOn();
                x.onended = function(){
                    var boxes;
                    boxes = document.getElementsByClassName("dialogFrame");
                    boxes[0].setAttribute("style", "display:none");  
                }
            }

            function messageOn()
            {
                var boxes;
                boxes = document.getElementsByClassName("dialogFrame");
                boxes[0].setAttribute("style", "display:block");       
            }
        </script>
    </body>
</html>