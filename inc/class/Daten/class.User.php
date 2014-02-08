<?php
namespace System\Daten;

class User{
    public $user = array();
    
    public function __construct($user) {
        $result = $GLOBALS['DATABASE']->query("SELECT * FROM user WHERE login = '".$user."'");
        foreach($result as $data){
            array_push($this->user, $data);
        }
    }
    
    public function getUserData(){
        return $this->user;
    }
    
    public function getSingleUserData($what, $user){
        $result = $GLOBALS['DATABASE']->query("SELECT ".$what." FROM user WHERE login = '".$user."'");
        foreach($result as $data){
            $a = $data;
        }
        return $a;
    }
    
    public function setUserData($field, $value){
        $sql = "UPDATE user SET ".
                        $field. "='".$value."'".
                        " WHERE id = '".$this->user[0]['id']."';";
        $GLOBALS['DATABASE']->query($sql);
    }
    
}