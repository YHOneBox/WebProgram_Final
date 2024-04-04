<?php
    session_start();
    require "loginCheck.php";
    require_once "admin.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset = "UTF-8"/>
        <title>
            <?php echo getWord("Framingham Cardiovascular Disease Risk Evaluation");?>
        </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"/>
        <link rel="stylesheet" type="text/css" href="css/appearance.css">
        <link rel="stylesheet" href="css/select_char.css"/>
        <link rel="stylesheet" href="css/choose_char.css"/>
        <link rel="stylesheet" href="css/header.css"/>
    </head>
    <body>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
        <?php require_once "header.php";?>
        <form id = "form_main" action = "show_char.php" method = "post"></form>
        <div class = "placeholder-1"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="d-flex justify-content-center">
                        <input type="button" class = "image" id = "backgroundEmilia" value = "emilia" onClick = "sendValue(this)">
                    </div>
                    <div class = "picture-text"><?php echo getword("Emilia")?></div>
                </div>
                <div class="col-sm-4">
                    <div class="d-flex justify-content-center">
                        <input type="button" class = "image" id = "backgroundRem" value = "rem" onClick = "sendValue(this)">
                    </div>
                    <div class = "picture-text"><?php echo getword("Rem")?></div>
                </div>
                <div class="col-sm-4">
                    <div class="d-flex justify-content-center">
                        <input type="button" class = "image" id = "backgroundRam" value = "ram" onClick = "sendValue(this)">
                    </div>
                    <div class = "picture-text"><?php echo getword("Ram")?></div>            
                </div>
                <div class="button-submit">
                    <button class = "btn btn-success" id = "send_data" type = "submit" form = "form_main" name = "my_char" value = "emilia"><?php echo getword("Next")?></button>
                </div>
            </div>
        </div>
        <script>
            var data;
            const character = ["backgroundEmilia", "backgroundRem", "backgroundRam"];
            function sendValue(obj)
            {
                data = obj.value;
                document.getElementById('send_data').value = data;
                changeClassToActive(data);
            }

            function changeClassToActive(value)
            {
                let change = 0;
                switch(value)
                {
                    case "emilia":
                        change = 0;
                            break;
                    case "rem":
                        change = 1;
                            break;
                    case "ram":
                        change = 2;
                            break;
                }

                const boxes = document.getElementsByClassName("imageActive");
                if(boxes.length != 0)
                    boxes[0].setAttribute("class", "image");
                document.getElementById(character[change]).className = "imageActive";
            }
        </script>
    </body>
</html>