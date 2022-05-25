<?php 

include_once('debug.php');

class Application {
    private $dbParams = array(
        'servername' => 'localhost',
        'username' => 'root',
        'password' => 'Babesoft89',
        'dbname' => 'airline2'
    );
    private $connection;
    private $connectionLive = false;

    public function __construct(){
        $this->connectDb();
    }

    private function connectDb() {
        $this->connection = new mysqli($this->dbParams['servername'], $this->dbParams['username'], $this->dbParams['password'], $this->dbParams['dbname']);
        if ($this->connection->connect_error) {
            die('Connection failed: '. $this->connection->connect_error);
        }
        $this->connectionLive = true;
    }

    protected function isDbConnectionLive(){
        return $this->connectionLive;
    }
    
    protected function getResultList($sql) {
        $resultList = array();
        $result = $this->connection->query($sql);        
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()) {
                $resultList[] = $row;
            }
        }else {
            $this->writeLog('nem talált értéket a lekérdezés', $sql);
        }
        return $resultList;
    }

    protected function getResultOne($sql) {
        
        $result = $this->connection->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()) {
                $resultList[] = $row;
            }
        }else {
            $this->writeLog('nem talált értéket a lekérdezés', $sql);
        }
        return $resultList;
    }

    protected function writeLog($string, $sql) {

    }

    protected function isValid($id){
        if (is_int($id) && $id > 0) {
            return true;
        } else {
            return false;
        }
    }
}





?>