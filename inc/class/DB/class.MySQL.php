<?php
namespace Database;

class MySQL{
    public $MySQLiObj = null;
    public $lastSQLQuery = null;
    public $lastSQLStatus = null;
    
    public function __construct($server, $user, $password, $db, $port = '3306') {
        $this->MySQLiObj = new \mysqli($server, $user, $password, $db, $port);
        
        if(mysqli_connect_errno()){
            trigger_error("MySQL-Connection-Error", E_USER_ERROR);
            die();
        }
        
        $this->query("SET NAMES utf8");
    }
    
    public function __destruct() {
        $this->MySQLiObj->close();
    }
    
    public function query($sqlQuery, $resultset = false){
        $this->lastSQLQuery = $sqlQuery;
        $result = $this->MySQLiObj->query($sqlQuery);
        if($resultset == false){
            if($result == false){
                $this->lastSQLStatus = false;
            }else{
                $this->lastSQLStatus = true;}
            return $result;}
        $return = $this->makeArrayResult($result);
        return $return;
    }
    
    public function lastSQLError(){
        return $this->MySQLiObj->errno;
    }
    
    public function escapeText($text){
        return $this->MySQLiObj->real_escape_string($text);
    }
    
    private function makeArrayResult($ResultObj){
        if($ResultObj === false){$this->lastSQLStatus = false; return false;
        }else if($ResultObj === true){$this->lastSQLStatus = true; return true;
        }else if($ResultObj->num_rows == 0){$this->lastSQLStatus = true; return array();
        }else{$array = array();
            while($line = $ResultObj->fetch_array(\MYSQLI_ASSOC)){
                \array_push($array, $line);
            }
            $this->lastSQLStatus = true;return $array;}
    }
}