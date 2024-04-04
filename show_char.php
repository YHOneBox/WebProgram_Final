<?php
    session_start();
    require "loginCheck.php";
    require_once "storage.php";
    require_once "class_character.php";
    include_once "admin.php";

    $data = array("userID"=>$_SESSION["user"], "character"=>$_POST["my_char"]);
    try
    {
        storeDataToMySQL($data , "personal_data");
    }
    catch(Exception $e)
    {}
    
    $dbObj = new Database();
    $connData = $dbObj->getConnection();
    $conn = new mysqli($connData["server"], $connData["user"], $connData["pass"], $connData["db"]);
    $sql = "";
    if($_SESSION["choose_char"] == 1)
    {
        $sql = "UPDATE `personal_data` SET `character` = \"".$_POST["my_char"]."\" WHERE `userID` = \"".$_SESSION["user"]."\";";
    }
    else
    {
        $_SESSION["character"] = $_POST["my_char"];
        $_SESSION["choose_char"] =1;
        $sql = "UPDATE `account` SET `choose_char` = 1 WHERE `userID` = \"".$_SESSION["user"]."\";";
        $data = array("userID"=>$_SESSION["user"], "character"=>$_SESSION["character"]);
        storeDataToMySQL($data, "personal_data");
    }
    $conn->query($sql);
    $conn->close();

    $my_char = getSpecificDataFromMySQLWithUser($_SESSION["user"], "personal_data", "character");
    $my_char = $my_char[0]["character"];
    $_SESSION["character"] = $my_char;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset = "UTF-8"/>
        <title><?php echo getWord("Framingham Cardiovascular Disease Risk Evaluation");?></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"/>
        <link rel="stylesheet" href="css/select_char.css"/>
        <link rel="stylesheet" href="css/dialog.css"/>
        <link rel="stylesheet" type="text/css" href="css/appearance.css">
        <link rel="stylesheet" type="text/css" href="css/show_char.css">
    </head>
    <body>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
        <div>
            <img class = "click" src = "image/click.png" alt="click"/>
        </div>
        <div>
            <?php
                switch($my_char)
                {
                    case "emilia":
                        echo "<img class = \"imageFull\" src = \"image/emilia_full.png\" alt = \"emilia\" onClick = \"AudioFunc(this)\" role=\"button\" tabIndex=\"0\"/>";
                        break;
                    case "rem":
                        echo "<img class = \"imageFull\" src = \"image/rem_full.png\" alt = \"rem\" onClick = \"AudioFunc(this)\" role=\"button\" tabIndex=\"0\"/>";
                        break;
                    case "ram":
                        echo "<img class = \"imageFull\" src = \"image/ram_full.png\" alt = \"ram\" onClick = \"AudioFunc(this)\" role=\"button\" tabIndex=\"0\"/>";
                        break;
                    default:
                        echo "<img class = \"imageFull\" src = \"image/emilia_full.png\" alt = \"emilia\" onClick = \"AudioFunc(this)\" role=\"button\" tabIndex=\"0\"/>";
                        break;
                } 
            ?>
            <?php
                $char = new Character();
                $data = $char->getCharacterDialog($my_char, "choose");
            ?>
            <img class = "message" src = "image/message_frame.png" alt = "message_frame"/>
            <div class = "messageData"><?php echo $data ?></div>
        </div>
        <div class = "placehoder-1"></div>
        <div class = "buttonMoveDown">
            <form id = "form_main" action = "personal_page.php" method = "post"></form>
            <button class = "btn btn-secondary" type = "submit" form = "form_main"><?php echo getword("Next")?></button>
        </div>
        <audio id = "myAudio" src="music/<?php echo $my_char ?>/choose.mp3" hidden>
            <p>If you are reading this, it is because your browser does not support the audio element.</p>
        </audio>
        <script>
            var char = document.getElementsByClassName("imageFull")[0];
            char.addEventListener('mouseover', function () {
                this.style.cursor = 'pointer';
            })

            var x = document.getElementById("myAudio");

            function AudioFunc(obj)
            {
                x.play();
                messageOn();
                x.onended = function(){
                    boxes = document.getElementsByClassName("buttonMoveDown");
                    boxes[0].setAttribute("style", "display:block");  
                }
            }

            function messageOn()
            {
                var boxes;
                boxes = document.getElementsByClassName("message");
                boxes[0].setAttribute("style", "display:block");
                
                boxes = document.getElementsByClassName("messageData");
                boxes[0].setAttribute("style", "display:block");

                boxes = document.getElementsByClassName("click");
                boxes[0].setAttribute("style", "display:none");
            }
        </script>
    </body>
</html>
