<?php
    function getDetect()
    {
        if(array_key_exists("language", $_GET))
        {
            $_SESSION["language"] = $_GET["language"];
        }
    }

    function sessionDetect()
    {
        if(!array_key_exists("language", $_SESSION))
        {
            $_SESSION["language"] = "en";
        }
    }

    function getWord($word)
    {
        $sqlAllowed = true;
        $word;
        if($sqlAllowed)
        {
            $word = getWordUseSQL($word);
            $word = replaceWord($word);
            return $word;
        }
        else
            return getWordNoSQL($word);
    }

    function getWordUseSQL($word)
    {
        sessionDetect();
        getDetect();
        $word = checkWord($word);
        $conn = new mysqli(server, user, pass, db) or die("Connection Failed"); 

        if( $_SESSION["language"] == "en" )
        {
            $conn->close();
            return $word;
        }
        else
        {
            $sql = $result = $row = null;
            try 
            {
                $sql = "SELECT * FROM `language` WHERE `english` = '".$word."';";
                // echo $sql;
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                $conn->close();
                if($row["chinese"] == NULL)
                {
                    return $word;
                }
                return $row["chinese"];
            }
            catch(Exception $e)
            {
                errorDetect($e);
            }
        }
    }

    function checkWord($word)
    {
        return str_replace("'","\\'",$word);
    }

    function replaceWord($word)
    {
        return str_replace("\'","'",$word);
    }

    // function storeData($data)
    // {
    //     $conn = new mysqli(server, user, pass, db) or die("Connection Failed");
    //     $sql = "INSERT INTO `heart`(score, risk) VALUES(".$data[0].",".$data[1].")";
    //     $conn->query($sql);
    //     $conn->close();
    // }

    // strore data into mysql
    // input argument should be "data(data should me assoc array), table name"
    function storeDataToMySQL($data, $tableName)
    {
        include_once("mysql.php");
        require_once("storage.php");
        $database = new Database();
        $database->dataInsert($data, $tableName);
    }
    
    // get all the datas from mysql
    // input argument should be "table name"
    // output argument may be array
    function getAllDataFromMySQL($tableName)
    {
        include_once("mysql.php");
        $database = new Database();
        $data = $database->dataSelectAll($tableName);

        if($data != null)
            return $data;
        else
            return null;
    }

    function getSpecificDataFromMySQLWithUser(string $userName, string $tableName, string $columnName)
    {
        include_once("mysql.php");
        $database = new Database();
        $data = $database->dataSelectSpecificWithUser($userName, $tableName, $columnName);

        if($data != null)
            return $data;
        else
            return null;
    }

    function modifyDataFromMySQL(int $id,string $tableName, $data)
    {
        include_once("mysql.php");
        require_once("storage.php");
        $database = new Database();
        $database->dataModify($id, $tableName, $data);
    }

    // count the values of rows in two dimentional array
    // input argument should be "data array"
    // output argument should be "the result of the values of rows"
    function countTwoDimentionalArrayRow($data): int
    {
        // if the argument input isn't array it should return 0
        if(!is_array($data))
        {
            return 0;
        }

        $temp = array();
        foreach($data as $ref)
        {
            array_push($temp, reset($ref));
        }
        $result = count($temp);
        return $result;
    }

    function getWordNoSQL($word)
    {
        sessionDetect();
        getDetect();
        
        if($_SESSION["language"] == "en")
        {
            return $word;
        }
        else
        {
            $temp = array_search($word, array_column(Language, 0));
            $cn_word = Language[$temp][1];
            if(  $temp == 0 || $cn_word == NULL )
            {
                return $word;
            }
            return Language[$temp][1];
        }
    }

    function errorDetect($errorMessage)
    {   
        echo "Here is Something Wrong: ".$errorMessage."<br/>";
    }

    function getChar($charName)
    {
        
    }

    define("server", "localhost");
    define("user", "id20867491_1101021517");
    define("pass", "@ADt1101021517");
    define("db", "id20867491_1101021517");

    define("Language", [
        ["English", "Chinese"],
        ["Framingham Cardiovascular Disease Risk Evaluation", "心血管疾病風險預測"],
        ["Risk Factor", "危險因子"],
        ["Unit", "單位"],
        ["Data", "資料"],
        ["Sex", "性別"],
        ["Male", "男性"],
        ["Female", "女性"],
        ["male", "男性"],
        ["female", "女性"],
        ["Age", "年齡"],
        ["years old", "歲"],
        ["Blood Pressure Diastolic", "血壓舒張壓"],
        ["Blood Pressure Systolic", "血壓收縮壓"],
        ["Anti-hypertensives", "是否服用高血壓藥物"],
        ["Smoker", "是否吸菸"],
        ["Diabetes", "是否有糖尿病"],
        ["HDL", "高密度膽固醇"],
        ["TDL", "總膽固醇"],
        ["mmHg", NULL],
        ["mg/dl", NULL],
        ["Submit", "送出"],
        ["Reset", "重置"],
        ["Gender", "性別"],
        ["No High Blood Pressure Medicine", "沒有服用高血壓藥物"],
        ["No Smoke", "沒有吸菸"],
        ["No Diabates", "沒有糖尿病"],
        ["Has High Blood Pressure Medicine", "有服用高血壓藥物"],
        ["Has Smoke", "有吸菸"],
        ["Has Diabates", "有糖尿病"],
        ["Diastolic", "舒張壓"],
        ["Systolic", "收縮壓"],
        ["Age Score", "年齡分數"],
        ["Blood Score", "血壓分數"],
        ["HDL Score", "高密度膽固醇分數"],
        ["TDL Score", "總膽固醇分數"],
        ["Diabetes Score", "糖尿病分數"],
        ["Smoke Score", "吸菸分數"],
        ["Total Score", "總分數"],
        ["Total Risk", "危險指數"],
        ["Yes", "是"],
        ["Result", "結果顯示"],
        ["Made by ADT110115 Explosion", "ADT110115 萬宸維製作"]
    ])
?>