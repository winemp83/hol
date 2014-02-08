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
                $_SESSION['login'] = $login;
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
        $_SESSION['name'] = $Data[0];
        $_SESSION['email'] = $Data[3];
        $_SESSION['password'] = $Data[1];
        $_SESSION['oneway'] = $Data[4];
        if($this->userNameCheck($Data[0])){
            if($this->passwordCheck($Data[1], $Data[2])){
                $this->registerUser($Data);
                if($GLOBALS['DATABASE']->lastSQLStatus){
                    $a = new \System\send_mail();
                    $a->sendRegisterMail();
                    if($a->lastStatus){
                        return true;
                    }
                    else{
                        $_SESSION['error'] = 'Leider konnte keine Email an ihr Konto versand werden';
                        return false;
                    }
                }
                $_SESSION['error'] = 'Es ist ein schwerwiegender Interner Fehler aufgetretten!';
                $GLOBALS['LOG']("Es ist ein Fehler beim Regestrieren Aufgetretten","WARN");
                return false;
            }
            else{
                $_SESSION['error'] = 'Ihre beiden Passwörter stimmen nicht über ein!';
                $GLOBALS['LOG']("Leider übereinstimmen die beiden Passwörter nicht!","INFO");
                return false;}
        }
        else{
            $_SESSION['error'] = 'Ihr Nutzername wird schon genutzt';
            $GLOBALS['LOG']("Leider wird ihr Username schon verwendet!","INFO");
            return false;}
    }
    
    private function registerUser($array){
        $koords = $this->createKoords();
        $koord_x = substr($koords, 0,3);
        $koord_y = substr($koords, 3,3);
        $data = $array;
        $GLOBALS['DATABASE']->query(
                "INSERT INTO user SET ".
                "login = '".$data[0]."',".
                "password = '".md5($data[1])."',".
                "mail = '".$data[3]."',".
                "money = '".floatval($GLOBALS['config'][22]['value'])."',".
                "level = '".intval($GLOBALS['config'][23]['value'])."',".
                "erfahrung = '".intval($GLOBALS['config'][24]['value'])."',".
                "avatar = '".$GLOBALS['config'][25]['value']."',".
                "oneway = '".$data[4]."',".
                "is_first = 1 ;");
        $result = $GLOBALS['DATABASE']->query("SELECT * FROM user WHERE login='".$data[0]."'");
        foreach ($result as $kunde){
            $GLOBALS['DATABASE']->query("INSERT INTO land SET ".
                                        "owner_id = '".$kunde['id']."' ,".
                                        "name = '".$GLOBALS['config'][0]['value']."' ,".
                                        "groesse =  '".$GLOBALS['config'][1]['value']."' ,".
                                        "einwohner = '".$GLOBALS['config'][2]['value']."' ,".
                                        "zf = '".$GLOBALS['config'][3]['value']."' ,".
                                        "steuer = '".$GLOBALS['config'][11]['value']."' ,".
                                        "wachstum = '".$GLOBALS['config'][4]['value']."' ,".
                                        "nahrung = '".$GLOBALS['config'][5]['value']."' ,".
                                        "metall = '".$GLOBALS['config'][6]['value']."' ,".
                                        "oel = '".$GLOBALS['config'][7]['value']."' ,".
                                        "n_pro = '".$GLOBALS['config'][8]['value']."' ,".
                                        "m_pro = '".$GLOBALS['config'][9]['value']."' ,".
                                        "o_pro = '".$GLOBALS['config'][10]['value']."' ,".
                                        "x_ko =  '".$koord_x."' ,".
                                        "y_ko =  '".$koord_y."' ,".
                                        "haus = '".$GLOBALS['config'][21]['value']."' ,".
                                        "farm = '".$GLOBALS['config'][12]['value']."' ,".
                                        "mine = '".$GLOBALS['config'][13]['value']."' ,".
                                        "oelfeld = '".$GLOBALS['config'][14]['value']."' ,".
                                        "n_lager = '".$GLOBALS['config'][18]['value']."' ,".
                                        "m_lager = '".$GLOBALS['config'][19]['value']."' ,".
                                        "o_lager = '".$GLOBALS['config'][20]['value']."' ,".
                                        "kaserne = '".$GLOBALS['config'][15]['value']."' ,".
                                        "fabrik = '".$GLOBALS['config'][16]['value']."' ,".
                                        "hangar = '".$GLOBALS['config'][17]['value']."';");
            
        }
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
        $oneway = mt_rand(100000, 999999);
        $array = array();
        array_push($array, $user);
        array_push($array, $passA);
        array_push($array, $passB);
        array_push($array, $mail);
        array_push($array, $oneway);
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
    
    private function createKoords(){
        do {$x = mt_rand(1,999);
            $y = mt_rand(1,999);}
        while ($this->checkKoords($y,$x));
        if (strlen($x) == 1){$x = '00'.$x;}
        elseif(strlen($x) == 2){$x = '0'.$x;}
        if (strlen($y) == 1){$y = '00'.$y;}
        elseif(strlen($y) == 2){$y = '0'.$y;}
        $ausgabe = $x.$y;
        return $ausgabe;
    }
    private function checkKoords($ykoords, $xkoords){
        $result = $GLOBALS['DATABASE']->query("SELECT COUNT(*) FROM land WHERE y_ko ='".$ykoords."' AND x_ko ='".$xkoords."'");
        foreach($result as $data){
            if($data['COUNT(*)'] != 0){
                return true;
            }
        }
        return false;
    }
}