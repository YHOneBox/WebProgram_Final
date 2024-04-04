<?php
    session_start();
    require_once "admin.php";
    require_once "storage.php";
    require_once "mysql.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset = "UTF-8"/>
        <title>
            <?php echo getWord("Framingham Cardiovascular Disease Risk Evaluation"); ?>
        </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"/>
        <link rel="stylesheet" type="text/css" href="css/appearance.css">
        <link rel="stylesheet" href="css/header.css"/>
        <link rel="stylesheet" href="css/placeholder.css"/>
    </head>
    <body>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

        <div class="fixed-top">
            <?php require("header.php"); ?>
        </div>
        <div class = "placeholder-main"></div>
        <div class = "container">
            <div class = "row justify-content-center">
                <div class = "col col-lg-2"></div>
                <div class = "col-md-auto">
                    <table class = "shadow p-3 mb-5 bg-light rounded" width = "1000" border = "1">
                        <div class = "w-auto">
                        <?php
                            $dbObj = new Database();
                            $connData = $dbObj->getConnection();
                            $conn = new mysqli($connData["server"], $connData["user"], $connData["pass"], $connData["db"]);
                            $sql = "SELECT * FROM `heart` WHERE userID = \"".$_SESSION["user"]."\";";
                            $data = $conn->query($sql);
                        ?>
                        <tr>
                            <td><?php echo getWord("id") ?></td>
                            <?php
                                foreach(Storage::$columnInTable["heart"] as $column)
                                {
                                    if($column != "userID")
                                        echo "<td>".getWord($column)."</td>";   
                                }
                            ?>
                            <td><?php echo getWord("EDIT") ?></td>
                            <td><?php echo getWord("DEL") ?></td>
                        </tr>
                        <?php
                            foreach($data as $ref)
                            {
                                echo "<tr>";
                                foreach($ref as $assoc=>$value)
                                {
                                    if($assoc != "userID")
                                        echo "<td>".$value."</td>";
                                }
                                echo "<td><a href=\"edit.php?id=".$ref["id"]."&tn=heart\">".getWord("EDIT")."</td>";
                                echo "<td><a href=\"delete.php?id=".$ref["id"]."&tn=heart\">".getWord("DEL")."</td>";
                                echo "</tr>";
                            }
                        ?>
                    </table>
                </div>
                <div class = "col col-lg-2"></div>
            </div>
        </div>
    </body>
</html>