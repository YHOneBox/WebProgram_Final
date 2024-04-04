<?php
    session_start();
    require "loginCheck.php";
    require "CharCheck.php";
?>
<!doctype html>
<html>
    <head>
        <meta charset = "UTF-8" name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <title>
            <?php
                require "admin.php";
                echo getWord("Framingham Cardiovascular Disease Risk Evaluation");
            ?>
        </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"/>
        <link rel="stylesheet" type="text/css" href="css/appearance.css">
        <link rel="stylesheet" href="css/select_char.css"/>
        <link rel="stylesheet" href="css/dialog.css"/>
        <link rel="stylesheet" href="css/header.css"/>
        <link rel="stylesheet" href="css/placeholder.css"/>
    </head>
    <body>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

        <?php require("header.php"); ?>
        <div class = "placeholder-main"></div>

        <?php
            define("SHEET_TITLE", ["Risk Factor", "Unit", "Data"]);
            $data = array(
                array("Sex", NULL, "radio"),
                array("Age", "years old", "option_age"),
                array("Blood Pressure Diastolic", "mmHg", "option_bpd"),
                array("Blood Pressure Systolic", "mmHg", "option_bps"),
                array("Anti-hypertensives", NULL, "checkbox_anti"),
                array("Smoker", NULL, "checkbox_smoker"),
                array("Diabetes", NULL, "checkbox_dia"),
                array("HDL", "mg/dl", "option_hdl"),
                array("TDL", "mg/dl", "option_tdl")
                )
        ?>
        <div class = "container">
            <div class = "row justify-content-center">
                <div class = "col col-lg-2"></div>
                <div class = "col-md-auto">
                    <form id = "form_2" method = "post" action = "bridge_result.php">
                        <table class = "shadow p-3 mb-5 bg-light rounded" width = "500" border = "1">
                            <tr>
                                <?php
                                    foreach(SHEET_TITLE as $value)
                                    {
                                        echo "<td>".getWord($value)."</td>";
                                    }
                                ?>
                            </tr>
                            <?php
                                function selectOption($data)
                                {
                                    echo '<select name = "'.$data["name"].'">';
                                    foreach( $data as $key=>$value )
                                    {
                                        if( $key != "name")
                                            echo '<option value ="'.$key.'">'.$key.'</option>';
                                    }
                                    echo '</select>';
                                }

                                function checkbox($data)
                                {
                                    echo '<input type = "checkbox" name = "'.$data.'"/>'.getWord("Yes");
                                }

                                foreach($data as $row)
                                {
                                    echo "<tr>";
                                    foreach($row as $key=>$value)
                                    {   
                                        if($key == 0 || $key == 1)
                                        {
                                            if($value != NULL)
                                                echo "<td>".getWord($value)."</td>";
                                            else
                                                echo "<td></td>";
                                        }
                                        else
                                        {
                                            echo "<td>";
                                            switch($value)
                                            {
                                                case "radio":
                                                    echo '<input type = "radio" value = "male" name = "gender" checked = "true"/>'.getWord("Male");
                                                    echo '<input type = "radio" value = "female" name = "gender"/>'.getWord("Female");
                                                    break;

                                                case "option_age":
                                                    echo '<select name = "age">';
                                                    for( $i = 10 ; $i < 100 ; $i++ )
                                                    {
                                                        echo '<option value = "'.$i.'">'.$i.'</option>';
                                                    }
                                                    echo '</select>';
                                                    break;

                                                case "option_bpd":
                                                    $optionValue = array("name"=>"bpd", "<80"=>79, "80-84"=>82, "85-89"=>87, "90-99"=>95, "100+"=>100);
                                                    selectOption($optionValue);
                                                    break;

                                                case "option_bps":
                                                    $optionValue = array("name"=>"bps", "<120"=>119, "120-129"=>125, "130-139"=>135, "140-159"=>150, "160+"=>160);
                                                    selectOption($optionValue);
                                                    break;
                                                
                                                case "checkbox_anti":
                                                    checkbox("anti");
                                                    break;
                                                
                                                case "checkbox_smoker":
                                                    checkbox("smoker");
                                                    break;
                                                
                                                case "checkbox_dia":
                                                    checkbox("diabates");
                                                    break;
                                                
                                                case "option_hdl":
                                                    $optionValue = array("name"=>"hdl", "<35"=>34, "35-44"=>40, "45-49"=>47, "50-59"=>55, "60+"=>60);
                                                    selectOption($optionValue);
                                                    break;

                                                case "option_tdl":
                                                    $optionValue = array("name"=>"tdl", "<160"=>159, "160-199"=>180, "200-239"=>215, "240-279"=>260, "280+"=>280);
                                                    selectOption($optionValue);
                                                    break;
                                            }
                                            echo '</td>';
                                        }
                                    }
                                    echo "</tr>";
                                }
                            ?>
                        </table>
                    </form>
                    <button class = "btn btn-primary" type = "submit" form = "form_2"><?php echo getWord("Submit")?></button>
                    <button class = "btn btn-secondary" type = "reset" form = "form_2"><?php echo getWord("Reset")?></button>
                </div>
                <div class="col col-lg-2"><div>
            </div>
        </div>
        <!-- <div class = "container">
            <footer class = "text-center">
                <?php require("footer.php"); ?>
            </footer>
        </div> -->
        <?php require_once("character_data.php");?>
        <script>
            document.getElementById("dialogFrame").style.display = "none";
        </script>
    </body> 
</html>