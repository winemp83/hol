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
    public static function getUsername($id){
        if($id == 1){
            return "System";
        }
        elseif($id == 2){
            return "Regierung";
        }
        elseif($id == 3){
            return "Support";
        }
        else{
            $result = $GLOBALS['DATABASE']->query("SELECT (login) FROM user WHERE id='".$id."'");
            foreach($result as $User){
                return $User['login'];
            }
        }
    }
}