<?php
    session_start();
    try
    {
        $_SESSION["result"] = array(
            "gender"=>$_POST["gender"], 
            "age"=>$_POST["age"], 
            "bpd"=>$_POST["bpd"], 
            "bps"=>$_POST["bps"], 
            "anti"=>isset($_POST["anti"])?true:false, 
            "smoker"=>isset($_POST["smoker"])?true:false, 
            "diabates"=>isset($_POST["diabetes"])?true:false, 
            "hdl"=>$_POST["hdl"], 
            "tdl"=>$_POST["tdl"]);
    }
    catch(Exception $e)
    {}
    header("location: result.php");
?>