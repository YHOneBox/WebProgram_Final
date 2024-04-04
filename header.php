<?php
    require_once("admin.php");
    $_SESSION["current_page"] = "http://".$_SERVER["HTTP_HOST"].$_SERVER['REQUEST_URI'];
?>
<div class = "main">
    <div class = "canvas-middle">
        <div class = "title">
            <img class = "logo-image" src = "image/logo.jpg" alt = "logo" onClick="window.location.assign('personal_page.php')" role="button" tabIndex="0"/>
            <h3 class = "title-word" style = "font-weight:bold"><?php echo getWord("Framingham Cardiovascular Disease Risk Evaluation") ?></h3>
        </div>
        <form id = "form_1" action = "language.php" method = "get"></form>
        <form id = "form_out" action = "logout.php" method = "post"></form>
        <div class = "button-right">
            <div class = "button-placeholder" ></div>
            <button class="btn btn-secondary" type="submit" name="language" value="cn" form = "form_1">中文</button>
            <button class="btn btn-secondary" type="submit" name="language" value="en" form = "form_1">English</button>
            <button class="btn btn-primary" type="submit" form = "form_out">Log Out</button>
        </div>
    </div>
</div>
<script>
    var char = document.getElementsByClassName("logo-image")[0];
    char.addEventListener('mouseover', function () {
        this.style.cursor = 'pointer';
    })
</script>