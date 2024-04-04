<?php 
    require_once "mysql.php";
    require_once "admin.php"; 
?>
<?php
    class Character
    {
        public static function getCharacterImg()
        {
            $my_char = getSpecificDataFromMySQLWithUser($_SESSION["user"], "personal_data", "character");
            $my_char = $my_char[0]["character"];
            $imagHTML = "";
            switch($my_char)
            {
                case "emilia":
                    $imagHTML = "<img class = \"imageAlwaysFront\" src = \"image/emilia_full.png\" alt = \"emilia\" onClick = \"AudioFunc(this)\" role=\"button\" tabIndex=\"0\"/>";
                    break;
                case "rem":
                    $imagHTML = "<img class = \"imageAlwaysFront\" src = \"image/rem_full.png\" alt = \"rem\" onClick = \"AudioFunc(this)\" role=\"button\" tabIndex=\"0\"/>";
                    break;
                case "ram":
                    $imagHTML = "<img class = \"imageAlwaysFront\" src = \"image/ram_full.png\" alt = \"ram\" onClick = \"AudioFunc(this)\" role=\"button\" tabIndex=\"0\"/>";
                    break;
                default:
                    break;
            }
            return $imagHTML;
        }

        public static function checkCharacterSession()
        {
            if(!isset($_SESSION["character"]))
            {
                $_SESSION["character"] = "emilia";
            }
        }

        //database
        private function SelectSpecificConnectToDataBase(string $name, string $place)
        {
            $dbObj = new Database();
            $connData = $dbObj->getConnection();
            $conn = new mysqli($connData["server"], $connData["user"], $connData["pass"], $connData["db"]);
            $sql = "SELECT `dialog` FROM `character` WHERE `name` = \"".$name."\" AND place = \"".$place."\";";
            $result = $conn->query($sql);
            $result = $result->fetch_all(MYSQLI_ASSOC);
            $conn->close();
            return $result;
        }

        public function getCharacterDialog(string $name, string $place)
        {
            $result = self::SelectSpecificConnectToDataBase($name, $place);
            return getWord($result[0]["dialog"]);
        }
    }
?>