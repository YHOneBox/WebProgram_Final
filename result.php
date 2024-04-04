<?php
    session_start();
    require "loginCheck.php";
    require "CharCheck.php";
    require_once "admin.php";
    require_once "class_character.php";
?>
<!doctype html>
<html>
    <head>
        <meta charset = "UTF-8"/>
        <title>
            <?php
                echo getWord("Framingham Cardiovascular Disease Risk Evaluation");
            ?>
        </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"/>
        <link rel="stylesheet" type="text/css" href="css/appearance.css">
        <link rel="stylesheet" href="css/select_char.css"/>
        <link rel="stylesheet" href="css/dialog.css"/>
        <link rel="stylesheet" href="css/result.css"/>
        <link rel="stylesheet" href="css/header.css"/>
        <link rel="stylesheet" href="css/placeholder.css"/>
    </head>
    <body>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

        <?php require("header.php"); ?>

        <div class = "container" style = "margin-top: 30px">
            <div class = "text_center">
                <h2><?php echo getWord("Result") ?></h2>
                <div><?php echo getWord("Gender").": ".getWord($_SESSION["result"]["gender"])?></div>
                <div><?php echo getWord("Age").": ".$_SESSION["result"]["age"]?></div>
                <div>
                    <?php
                        if( $_SESSION["result"]["anti"])
                        {
                            echo getWord("No High Blood Pressure Medicine");
                            $anti = 0;
                        } 
                        else
                        {
                            echo getWord("Has High Blood Pressure Medicine");
                            $anti = 1;
                        }
                    ?>
                </div>
                <div>
                    <?php
                        if( $_SESSION["result"]["smoker"])
                        {
                            echo getWord("No Smoke");
                            $smoker = 0;
                        } 
                        else
                        {
                            echo getWord("Has Smoke");
                            $smoker = 1;
                        }
                    ?>
                </div>
                <div>
                    <?php
                        if( $_SESSION["result"]["diabates"])
                        {
                            echo getWord("No Diabates");
                            $diabates = 0;
                        } 
                        else
                        {
                            echo getWord("Has Diabates");
                            $diabates = 1;
                        }
                    ?>
                </div>
                <div><?php echo getWord("Diastolic").": ".$_SESSION["result"]["bpd"]?></div>
                <div><?php echo getWord("Systolic").": ".$_SESSION["result"]["bps"]?></div>
                <div><?php echo getWord("HDL").": ".$_SESSION["result"]["hdl"]?></div>
                <div><?php echo getWord("TDL").": ".$_SESSION["result"]["tdl"]?></div>
                <hr/>
                <?php
                    define("AgeScore", [
                        ["min", "max", "boy", "girl"],
                        [0, 34, -1, -9],
                        [35, 39, 0, -4],
                        [40, 44, 1, 0],
                        [45, 49, 2, 3],
                        [50, 54, 3, 6],
                        [55, 59, 4, 7],
                        [60, 64 , 5, 8],
                        [65, 69, 6, 8],
                        [70, 100, 7, 8]
                    ]);

                    define("MalePressure", [
                        ["pressure", "<80", "80-84", "85-89", "90-99", "100+"],
                        ["<120", 0, 0, 1, 2, 3],
                        ["120-129", 0, 0, 1, 2, 3],
                        ["130-139", 1, 1, 1, 2, 3],
                        ["140-159", 2, 2, 2, 2, 3],
                        ["160+", 3, 3, 3, 3, 3]
                    ]);

                    define("FemalePressure", [
                        ["pressure", "<80", "80-84", "85-89", "90-99", "100+"],
                        ["<120", -3, 0, 0, 2, 3],
                        ["120-129", 0, 0, 0, 2, 3],
                        ["130-139", 0, 0, 0, 2, 3],
                        ["140-159", 2, 2, 2, 2, 3],
                        ["160+", 3, 3, 3, 3, 3]
                    ]);

                    define("HDL", [
                        ["hdl", "male", "female"],
                        ["<35", 2, 5],
                        ["35-44", 1, 2],
                        ["45-49", 0, 1],
                        ["50-59", 0, 0],
                        ["60+", -2, 3]
                    ]);

                    define("TDL", [
                        ["tdl", "male", "female"],
                        ["<160", -3, -2],
                        ["160-199", 0, 0],
                        ["200-239", 1, 1],
                        ["240-279", 2, 1],
                        ["280+", 3, 3]
                    ]);

                    define("Diabates", [
                        ["diabates", "male", "female"],
                        ["no", 0, 0],
                        ["yes", 2, 4]
                    ]);

                    define("Smoke", [
                        ["smoke", "male", "female"],
                        ["no", 0, 0],
                        ["yes",2 , 2]
                    ]);

                    define("Total", [
                        ["score", "male", "female"],
                        [-2, 2, 1],
                        [-1, 2, 2],
                        [0, 3, 2],
                        [1, 3, 2],
                        [2, 4, 3],
                        [3, 5, 3],
                        [4, 7, 4],
                        [5, 8, 4],
                        [6, 10, 5],
                        [7, 13, 6],
                        [8, 16, 4],
                        [9, 20, 8],
                        [10, 25, 10],
                        [11, 31, 11],
                        [12, 37, 13],
                        [13, 45, 15],
                        [14, 53, 18],
                        [15, 53, 20],
                        [16, 53, 24],
                        [17, 53, 27],
                    ]);
                    
                    $totalScore = 0;

                    function findData($arrayData, $xData, $yData) : int
                    {
                        $x = array_search($xData, $arrayData[0]);
                        $y = array_search($yData, array_column($arrayData, 0));

                        return $arrayData[$y][$x];
                    }
                ?>
                <div>
                    <?php
                        echo getWord("Age Score").": ";
                        foreach(AgeScore as $column)
                        {
                            if($_SESSION["result"]["age"] >= $column[0] && $_SESSION["result"]["age"] <= $column[1])
                            {
                                if($_SESSION["result"]["gender"] == "male")
                                {
                                    echo $column[2];
                                    $totalScore += $column[2];
                                }
                                else
                                {
                                    echo $column[3];
                                    $totalScore += $column[3];
                                }
                                break;
                            }
                        }
                    ?>
                </div>
                <div>
                    <?php
                        echo getWord("Blood Score").": ";
                        if($_SESSION["result"]["gender"] == "male")
                        {
                            $temp = findData(MalePressure, $_SESSION["result"]["bpd"], $_SESSION["result"]["bps"]);
                            $totalScore += $temp;
                            echo $temp;
                        }
                            
                        else
                        {
                            $temp = findData(FemalePressure, $_SESSION["result"]["bpd"], $_SESSION["result"]["bps"]);
                            $totalScore += $temp;
                            echo $temp;
                        }
                    ?>
                </div>
                <div>
                    <?php
                        echo getWord("HDL Score").": ";
                        $temp = findData(HDL, $_SESSION["result"]["gender"], $_SESSION["result"]["hdl"]);
                        $totalScore += $temp;
                        echo $temp;
                    ?>
                </div>
                <div>
                    <?php
                        echo getWord("TDL Score").": ";
                        $temp = findData(TDL, $_SESSION["result"]["gender"], $_SESSION["result"]["tdl"]);
                        $totalScore += $temp;
                        echo $temp;
                    ?>
                </div>
                <div>
                    <?php
                        echo getWord("Diabetes Score").": ";
                        $_SESSION["result"]["diabates"] ? $check = "yes": $check = "no";
                        $temp = findData(Diabates, $_SESSION["result"]["gender"], $check);
                        $totalScore += $temp;
                        echo $temp;
                    ?>
                </div>
                <div>
                    <?php
                        echo getWord("Smoke Score").": ";
                        $_SESSION["result"]["smoker"] ? $check = "yes": $check = "no";
                        $temp = findData(Smoke, $_SESSION["result"]["gender"], $check);
                        $totalScore += $temp;
                        echo $temp;
                    ?>
                </div>
                <hr/>
                <div id = "risk-total-result" class = "button-clicked">
                    <div>
                        <?php
                            echo getWord("Total Score").": ".$totalScore;
                            $scoreStore = $totalScore;
                        ?>
                    </div>
                    <div>
                        <?php
                            echo getWord("Total Risk").": ";
                            if($_SESSION["result"]["gender"] == "male")
                            {
                                if($totalScore < 0)
                                    $totalScore = -1;
                                elseif($totalScore > 13)
                                    $totalScore = 14;
                            }
                            else
                            {
                                if($totalScore < -1)
                                    $totalScore = -2;
                                elseif($totalScore > 16)
                                    $totalScore = 17;
                            }
                            $riskScore = findData(Total, $_SESSION["result"]["gender"], $totalScore);
                            echo $riskScore;
                        ?>
                    </div>
                </div>
                <?php
                    $playDialog = "show_bad";
                    if($riskScore < 10)
                    {
                        $playDialog = "show_good";
                    }
                    $my_char = $_SESSION["character"];
                    $char = new Character();
                    $data = $char->getCharacterDialog($my_char, $playDialog);
                ?>

                <?php require_once("character_data.php");?>
                <div>
                    <button class = "btn btn-secondary" id = "show-result-button" type = "button" onClick = "ActionFunc()"><?php echo getWord("See Result")?></button>
                </div>
            </div>
        </div>
        <?php
            // enter database
            $data = array(
                "sex"=>$_SESSION["result"]["gender"], 
                "age"=>$_SESSION["result"]["age"], 
                "diastolic"=>$_SESSION["result"]["bpd"], 
                "systolic"=>$_SESSION["result"]["bps"], 
                "anti-hypertensive"=>$anti, 
                "smoker"=>$smoker, 
                "diabetes"=>$diabates, 
                "hdl"=>$_SESSION["result"]["hdl"], 
                "tdl"=>$_SESSION["result"]["tdl"], 
                "score"=>$totalScore, 
                "risk"=>$riskScore,
                "userID"=>$_SESSION["user"]);
            storeDataToMySQL($data, "heart");
        ?>
        
        <audio id = "myAudio" src="music/<?php echo $my_char."/".$playDialog ?>.mp3" hidden>
            <p>If you are reading this, it is because your browser does not support the audio element.</p>
        </audio>
        <script>
            var active;
            var char = document.getElementsByClassName("imageAlwaysFront")[0];
            char.addEventListener('mouseover', function () {
                if(active == "block")
                {
                    this.style.cursor = 'pointer';
                }
            })

            var x = document.getElementById("myAudio");
            function ActionFunc()
            {
                DialogFunc();
                messageOn();
            }

            function DialogFunc()
            {
                x.play();
            }

            function AudioFunc()
            {
                active = document.getElementById("risk-total-result").style.display;
                if(active == "block")
                {
                    x.play();
                }
            }

            function messageOn()
            {
                var boxes;
                boxes = document.getElementsByClassName("dialogFrame");
                boxes[0].setAttribute("style", "display:block");
                
                boxes = document.getElementsByClassName("button-clicked");
                boxes[0].setAttribute("style", "display:block");

                document.getElementById("show-result-button").style.display = "none";
                // boxes[0].setAttribute("style", "display:none");
            }
        </script>
    </body>
</html>