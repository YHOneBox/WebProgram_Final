<?php
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] == false)
    {
        header("location: index.php");
    }

    if($_SESSION["loggedin"])
    {
    }
?>