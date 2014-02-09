<?php
namespace Game;

class Message{
    public $MSG = array();
    public $Friends;
    
    public function getMsg($user){
        $result = $GLOBALS['DATABASE']->query("SELECT * FROM message WHERE owner = '".$user."' ORDER BY id DESC");
        
        foreach($result as $msg){
            $Msg = "<a href='#' onClick='javascript:getMsg(\'id\');'>".$msg['id']." ". \System\Daten\User::getUsername($msg['sender'])."<br/>Datum</a><br/>";
            array_push($this->MSG, $Msg);
        }
    }
    
   
}