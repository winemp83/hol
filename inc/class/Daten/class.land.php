<?php
namespace System\Daten;

class land{
    public $land = array();
    
    public function __construct($user) {
        $result = $GLOBALS['DATABASE']->query("SELECT * FROM land WHERE owner_id = '".$user."' LIMIT 1");
        foreach($result as $data){
            array_push($this->land, $data);
        }
    }
    
    public function getLandData(){
        return $this->land;
    }
    
    public function setLandData($field, $value, $nr){
        $sql = "UPDATE land SET ".
                        $field. "='".$value."'".
                        " WHERE id = '".$this->user[$nr]['id']."';";
        $GLOBALS['DATABASE']->query($sql);
    }
    public function setStadtData(){
        print_r($this->land);
    }
}