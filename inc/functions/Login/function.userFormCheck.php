<?php
namespace System;

class UserFormCheck{
    public function checkLoginData(){
        $firstChar = substr($_POST['login'],0,1);
        $result = $GLOBALS['DATABASE']->query("SELECT login,password FROM user WHERE login LIKE '".$firstChar."%'");
        $login = trim(substr($_POST['login'],0,100));
        $password = trim(substr($_POST['password'],0,100));
        foreach($result as $combi){
            if($login === $combi['login'] && md5($password) === $combi['password']){
                $_SESSION['login'] = md5(true);
                $_SESSION['aktivetime'] = (time()+(60*5));
                return true;
            }
        }
        return false; 
    }
    public function checkLogout(){
        session_destroy();
        header ("Location: http://hol.spaceoflegends.de/hol/index.php");
        exit();
    }
    
    public function checkregisterData(){
        $Data = $this->escapeData();
        if($this->userNameCheck($Data[0])){
            if($this->passwordCheck($Data[1], $Data[2])){
                $this->registerUser($Data);
                if($GLOBALS['DATABASE']->lastSQLStatus){
                    return true;
                }
                $GLOBALS['LOG']("Es ist ein Fehler beim Regestrieren Aufgetretten","WARN");
            }
            else{
                return ("Leider übereinstimmen die beiden Passwörter nicht!");}
        }
        else{
            return ("Leider wird ihr Username schon verwendet!");}
    }
    
    private function registerUser($array){
        $ktNr = mt_rand(1000000000,9999999999);
        $data = $array;
        $GLOBALS['DATABASE']->query(
                "INSERT INTO user SET ".
                "login = '".$data[0]."',".
                "password = '".md5($data[1])."',".
                "mail = '".$data[3]."',".
                "bank_ktnr = '".$ktNr."',".
                "bank_inst = '1' ; ");
        $result = $GLOBALS['DATABASE']->query("SELECT * FROM user WHERE login='".$data[0]."'");
        foreach ($result as $kunde){
            $GLOBALS['DATABASE']->query("INSERT INTO bank SET ".
                                        "ktnr_id = '".$ktNr."',".
                                        "kt_inh = '".$kunde['id']."',".
                                        "bank_in = 1 ;");
            
        }
        print_r($GLOBALS['DATABASE']);
    }   
    
    private function passwordCheck($pass1, $pass2){
        if($pass1 != $pass2){
            return false;
        }
        return true;
    }
    
    private function escapeData(){
        $user = $GLOBALS['DATABASE']->escapeText($_POST['user']);
        $passA = $GLOBALS['DATABASE']->escapeText($_POST['passA']);
        $passB = $GLOBALS['DATABASE']->escapeText($_POST['passB']);
        $mail = $GLOBALS['DATABASE']->escapeText($_POST['mail']);
        $array = array();
        array_push($array, $user);
        array_push($array, $passA);
        array_push($array, $passB);
        array_push($array, $mail);
        return $array;
    }
    
    private function userNameCheck($name){

        $result = $GLOBALS['DATABASE']->query("SELECT COUNT(*) FROM user WHERE login='".$name."'");
        foreach($result as $data){
            if($data['COUNT(*)'] != 0){
                return false;
            }
        }
        return true;
    }
}