<?php
    class Delete
    {
        public function __construct()
        {}

        public static function deleteData(int $id, string $tableName)
        {
            include_once("mysql.php");
            $database = new Database();
            $database->dataDelete($id, $tableName);
        }
    }

    Delete::deleteData($_GET["id"], $_GET["tn"]);
    header("location: show.php");
?>