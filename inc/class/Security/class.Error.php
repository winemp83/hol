<?php
namespace System;

class Error{
    private $error_code;
    private $error_msg;
    public $lastError;
    
    public function __construct(){
        $this->error_code = 0;
        $this->error_msg = $this->setError($this->error_code);
        $this->lastError = false;
    }
    
    public function getErrorMsg(){
        if($this->lastError){
            $data = "Error Code : ".$this->error_code."<br/>Error Message : ".$this->error_msg."<br/>";
            return $data;
        }
        else{
            return null;
        }
    }
    
    public function checkError($nr = 0){
        $this->error_code = $nr;
        $this->error_msg = $this->setError($this->error_code);
        if($nr != 0){
            $this->lastError = true;
            $GLOBALS['LOG']("Error Code :".$this->error_code." - Error Message : ".$this->error_msg, 'INFO');
        }
        else{
            $this->lastError = false;
        }
    }
    
    private function setError($nr){
        switch($nr){
            case 1 :
                $data = "Unberechtigter Aufruf!";
                break;
            case 100 : 
                $data = "Falsche Login Daten";
                break;
            case 101 : 
                $data = "Session abgelaufen";
                break;
            default:
                $data = "Kein Fehler angegeben";
                break;
        }
        return $data;
    }
}