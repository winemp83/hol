<?php
namespace System\Daten;

class config{
    public $config = array();
    
    public function __construct() {
        $this->getLandData();
        $this->getStadtData();
        $this->getUserData();
        $this->getMaxData();
    }
    
    private function getLandData(){
        
        $result = $GLOBALS['DATABASE']->query("SELECT * FROM config WHERE art = 'land'");
        foreach($result as $data){
            array_push($this->config, $data);
        }
    }
    private function getStadtData(){
        $result = $GLOBALS['DATABASE']->query("SELECT * FROM config WHERE art = 'stadt'");
        foreach($result as $data){
            array_push($this->config, $data);
        }
    }
    private function getUserData(){
        $result = $GLOBALS['DATABASE']->query("SELECT * FROM config WHERE art = 'user'");
        foreach($result as $data){
            array_push($this->config, $data);
        }
    }
    private function getMaxData(){
        $result = $GLOBALS['DATABASE']->query("SELECT * FROM config WHERE art = 'max'");
        foreach($result as $data){
            array_push($this->config, $data);
        }
    }
    
    public function setData($field, $value, $art){
        $sql = "UPDATE config SET ".
                "value ='".$value."'".
                " WHERE name = '".$field."' AND art = '".$art."';";
        $GLOBALS['DATABASE']->query($sql);
    }
    
    public function insertNewValue($name, $value, $art){
        $sql = "INSERT INTO config SET ".
               "art = '".$art."', ".
               "name = '".$name."', ".
               "value = '".$value."';";
        $GLOBALS['DATABASE']->query($sql);
    }
}
