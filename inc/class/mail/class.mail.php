<?php
namespace System;

class send_mail{
    private $text = '';
    private $empf = '';
    private $subj = '';
    private $header = '';
    public $lastStatus = true;
    
    public function setText($text){
        $this->text = wordwrap($text, 70);
    }
    
    public function setEmpf($empf){
        $this->empf = $empf;
    }
    
    public function setSubject($subject){
        $this->subj = $subject;
    }
    
    public function send(){
        $this->getHeader();
        $this->lastStatus = mail($this->empf, $this->subj, $this->text, $this->header);
        $this->lastStatus? $ok = true : $ok = false;
        return $ok;
    }
    private function getHeader(){
        $this->header = 'MIME-Version: 1.0' . "\r\n";
        $this->header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $this->header .= 'From: Nation-Domination <info@spaceoflegends.de>' . "\r\n";
        $this->header .= 'Reply-To: info@spaceoflegends.de' . "\r\n";
        
    }
    public function sendRegisterMail(){
        $this->empf = $_SESSION['email'];
        $this->subj = "Regiestration bei Nation - Domination";
        $this->text = "Herzlichen Glüchwunsch,<br/>\r\n".
                      "Sie haben sich erfolgreich bei : <a href='http://hol.spaceoflegends/hol/index.php'>Nation - Domination</a> regestriert.<br/>\r\n".
                      "Folgende Daten sind für sie angelegt worden: <br/>\r\n".
                      "Name : ".$_SESSION['name']."<br/>\r\n".
                      "Email : ".$_SESSION['email']."<br/>\r\n".
                      "Password : ".substr($_SESSION['password'], 0, 3)."*******<br/>\r\n".
                      "Einmal Schlüßel : ".$_SESSION['oneway']."<br/>\r\n".
                      "Bei ihrer ersten Anmeldung müssen sie den 'Einmal Schlüßel' nach dem ersten einlogen eingeben!<br/>\r\n".
                      "Sollten Sie sich nicht bei uns Regestriert haben sehen sie diese Email bitte als gegenstandslos an";
        if($this->send()){
            return null;
        }
        else{
            $GLOBALS['LOG']("Fehlerhafte Regestration, fehler trat beim Mailversand auf!","INFO");
            return null;
        }
    }
}