<?php
    require_once "storage.php";

    class Database
    {   
        
        private const server = "localhost";
        private const user = "id20867491_1101021517";
        private const pass = "@ADt1101021517";
        private const db = "id20867491_1101021517";
        private $conn;

        // connect mysql and set total values of enum
        public function __construct()
        {
            $this->conn = new mysqli(self::server, self::user, self::pass, self::db) or die("Connection failed");
        }

        public function __destruct()
        {
            $this->conn->close();
        }

        // insert data into mysql 
        public function dataInsert($data, $tableName)
        {
            $sql = "";
            $sql = $this->sqlInsertSyntax($data, $tableName);
            try
            {
                $this->conn->query($sql);
            }
            catch(mysqli_sql_exception $e)
            {
                // echo $e."<br/>";
                // echo "SQL syntax: ".$sql."<br/>";
            }
        }

        // select data
        public function dataSelectAll(string $tableName)
        {
            $sql = "SELECT * FROM `".$tableName."`";
            $result = $this->conn->query($sql);
            $result = $result->fetch_all(MYSQLI_ASSOC);
            return $result;
        }

        public function dataSelectSpecificWithUser(string $userName, string $tableName, string $columnName)
        {
            $sql = "SELECT `".$columnName."` FROM `".$tableName."` WHERE userID = \"".$userName."\";";
            $result = $this->conn->query($sql);
            $result = $result->fetch_all(MYSQLI_ASSOC);
            return $result;
        }

        // delete data in mysql 
        // input argument should be "id, table name"
        public function dataDelete(int $id ,string $tableName)
        {
            $sql = "DELETE FROM `".$tableName."` WHERE `id` = ".$id;
            try
            {
                $this->conn->query($sql);
            }
            catch(Exception $e)
            {
                echo $e;
            }
        }

        public function dataModify(int $id,string $tableName, $data)
        {
            $sql = $this->sqlModifySyntax($id, $tableName, $data);
            $this->conn->query($sql);
        }

        private function sqlModifySyntax(int $id,string $tableName, $data): string
        {
            $column = Storage::$columnInTable[$tableName];
            $arrayCount = count($column);
            $counter = 0;
            $sql = "UPDATE `".$tableName."` SET ";
            foreach($column as $column)
            {
                $sql .= "`".$column."` = ";
                if(is_string($data[$column]))
                {
                    $sql .= "\"".$data[$column]."\"";
                }
                else
                {
                    $sql .= $data[$column];
                }

                $counter++;
                if( $arrayCount > $counter )
                {
                    $sql .= ", ";
                }
            }
            $sql .= " WHERE id = ".$id.";";

            return $sql;
        }

        // convert data to sql syntax
        private function sqlInsertSyntax($data, $tableName): string
        {
            $column = Storage::$columnInTable[$tableName];
            $arrayCount = count($column);
            $counter = 0;
            $sql = "INSERT INTO `".$tableName."`(";
            $sqlValue = "VALUES(";
            foreach($column as $column)
            {
                $sql .= "`".$column."`";
                $counter++;
                if(is_string($data[$column]))
                {
                    $sqlValue .= "\"".$data[$column]."\"";
                }
                else
                {
                    $sqlValue .= $data[$column];
                }

                if( $arrayCount > $counter )
                {
                    $sql .= ", ";
                    $sqlValue .= ", ";
                }
            }
            $sql .= ") ";
            $sqlValue .= ");";
            $sql .= $sqlValue;

            return $sql;
        }

        public function getConnection()
        {
            $connection = array("server"=>self::server, "user"=>self::user,"pass"=>self::pass, "db"=>self::db);
            // $connection = self::$conn;
            return $connection;
        }

        // only for bug testing
        public function bugTest($data)
        {
            
        }
    }
?>