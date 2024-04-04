<?php
    session_start();
    $_SESSION["user"] = "00BCD";
?>
<!doctype html>
<html>
    <head>
        <meta charset = "UTF-8">
        <title>
            <?php
                require("admin.php");
                echo getWord("Framingham Cardiovascular Disease Risk Evaluation");
            ?>
        </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"/>
        <link rel="stylesheet" type="text/css" href="css/appearance.css">
    </head>
    <body>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

        <div class = "container">
            <footer class = "text-center">
                <?php require("header.php"); ?>
            </footer>
        </div>

        <div class = "container">
            <div class="row align-items-start">
                <div class = "col"></div>
                <div class = "col">
                    <div class = "text_center">請選擇語言：</div>
                    <div class = "text_center">Please choose the languages: </div>
                    <br/>
                    <form id = "form_1"action = "major.php" method = "get">
                        <!-- <input type = "submit" value = "en" name = "language"/>
                        <input type = "submit" value = "cn" name = "language"/> -->
                    </form>
                    <div class = "text_center">
                        <button class = "btn btn-primary" type="submit" name="language" value="cn" form = "form_1">中文</button>
                        <button class = "btn btn-primary" type="submit" name="language" value="en" form = "form_1">English</button>
                    </div>
                </div>
                <div class = "col"></div>
            </div>
        </div>
        <div class = "container">
            <footer class = "text-center">
                <?php require("footer.php"); ?>
            </footer>
        </div>
    </body>
</html>