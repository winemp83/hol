<?php
namespace System\Daten;

class User{
    public $user = array();
    
    public function __construct($user) {
        $result = $GLOBALS['DATABASE']->query("SELECT * FROM user WHERE login = '".$user."'");
        foreach($result as $data){
            $result1 = $GLOBALS['DATABASE']->query("SELECT * FROM bank WHERE kt_inh = '".$data['id']."'");
            foreach($result1 as $data1){
                array_push($this->user, $data1);
            }
            array_push($this->user, $data);
        }
    }
    
    public function getUserData(){
        return $this->user;
    }
    
    public function setUserData($field, $value){
        $sql = "UPDATE user SET".
                        $field. "='".$value."'".
                        "WHERE id = '".$this->user['id']."';";
        $GLOBALS['DATABASE']->query($sql);
    }
    
}