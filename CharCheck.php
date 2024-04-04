<?php
    if(!isset($_SESSION["choose_char"]) || $_SESSION["choose_char"] == 0)
    {
        header("location: select_char.php");
    }
?>