<?php
namespace System\HTML;

class BuildSite{
    private $MainSite;
    private $Navigation;
    private $UserForms;
    
    public function __construct() {
        $method =  filter_input(INPUT_POST, 'what', FILTER_SANITIZE_STRING);
        $this->Navigation = new \System\HTML\Navigation();
        $this->UserForms = new \System\HTML\UserForms();
        if(!isset($method)){$this->MainSite = $this->createMainSiteOut();}
        else{
            try{$this->MainSite = $this->selectSite($method);}
            catch(Exception $e){$GLOBALS['LOG']($e->getMessage(), "WARN");
                $this->selectSite('home');}
        }
    }
    
    private function createMainSiteOut(){
        \System\HTML::printMainHeader();
        \System\HTML::addMeta("author", "Sascha Köhne");
        \System\HTML::addMeta("keywords", "Browsergame, browsergame, Spiel, Hacking, hacking");
        \System\HTML::addMeta("description", "Das neue Browsergame, entdecke die Möglichkeiten eines Hackers");
        \System\HTML::addScript("prototype");
        \System\HTML::addScript("effects");
        \System\HTML::addScript("window");
        \System\HTML::addScript("window_effects");
        \System\HTML::addStyle("default");
        \System\HTML::addStyle("spread");
        \System\HTML::addStyle("darkX");
        \System\HTML::addStyle("alert");
        \System\HTML::printMainBody();
        \System\HTML::addScript("main");
        \System\HTML::insertDiv("", "Header", "");
        \System\HTML::insertImg("header_bg.gif", "LOGO");
        \System\HTML::closeDiv();
        \System\HTML::insertDiv("","Menue","");
        $this->Navigation->showMenue();
        \System\HTML::closeDiv();
        \System\HTML::insertDiv("", "wrapper");
        \System\HTML::insertDiv("", "menue_two");
        echo "Hier werden mal Statistiken stehen!";
        \System\HTML::closeDiv();
        \System\HTML::insertDiv("", "ressource");
        echo "hier werden einmal News stehen";
        \System\HTML::closeDiv();
        \System\HTML::insertDiv("", "Content", "");
        echo "<h2>Willkommen bei Hack the Legend a new Adventure</h2>".
             "<p>Aktuell befindet sich dieses Browsergame noch im Aufbau.<br/>&nbsp;<br/>".
             "Sobald das Spiel in den Beta Modus wechselt werden wir eine Globalse Bekanntmachung in all unseren Service und Angeboten veröffentlichen.<br/>".
             "Bis dahin freuen wir uns aber über jeden Besucher!</p>";
        \System\HTML::closeDiv();
        \System\HTML::closeDiv();
        \System\HTML::printMainFooter();
    }
    
    private function selectSite($nr = null){
        if($nr == null){
            throw new \Exception('Aufruf der Unterseiten ohne übergabe(kein Post)');
        }
        switch($nr){
            case 'login'    :
                $this->login();break;
            case 'news'     :
                $this->news();break;
            case 'info'     :
                $this->info();break;
            case 'register' :
                $this->register();break;
            case 'register_true' :
                $this->register_true();break;
            case 'register_false' :
                $this->register_false();break;
            default         :
                break;
        }
    }
    private function login(){
        $this->UserForms->printLoginForm("game.php");
    }
    private function register(){
        $this->UserForms->printRegisterForm("register.php");
    }
    
    private function info(){
        \System\HTML::insertDiv("<h3>Willkommen bei Hack the Legend</h3>", "info", "");
        echo "<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>";
        \System\HTML::closeDiv();
        
    }
    
    private function news(){
        $result = $GLOBALS['DATABASE']->query("SELECT * FROM news ORDER BY id DESC LIMIT 3");
        \System\HTML::insertDiv("", "news", "");
        foreach ($result as $data){
            \System\HTML::insertDiv($data['title'], "news_title", "");
            \System\HTML::closeDiv();
            \System\HTML::insertDiv(date("d.m.Y G:i", $data['insertTime']), "news_time", "");
            \System\HTML::closeDiv();
            \System\HTML::insertDiv("<p>", "news_content", "");
            echo $data['content']."</p>";
            \System\HTML::closeDiv();
        }
        echo "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet."; 
        \System\HTML::closeDiv();
    }
    
    private function register_true(){
        \System\HTML::printMainHeader();
        \System\HTML::addMeta("author", "Sascha Köhne");
        \System\HTML::addMeta("keywords", "Browsergame, browsergame, Spiel, Hacking, hacking");
        \System\HTML::addMeta("description", "Das neue Browsergame, entdecke die Möglichkeiten eines Hackers");
        \System\HTML::addScript("prototype");
        \System\HTML::addScript("effects");
        \System\HTML::addScript("window");
        \System\HTML::addScript("window_effects");
        \System\HTML::addStyle("default");
        \System\HTML::addStyle("spread");
        \System\HTML::addStyle("darkX");
        \System\HTML::addStyle("alert");
        \System\HTML::printMainBody();
        \System\HTML::addScript("main");
        \System\HTML::insertDiv("", "Header", "");
        \System\HTML::insertImg("header_bg.gif", "LOGO");
        \System\HTML::closeDiv();
        \System\HTML::insertDiv("","Menue","");
        $this->Navigation->showMenue();
        \System\HTML::closeDiv();
        \System\HTML::insertDiv("", "Content", "");
        echo "<h2>Willkommen bei Hack the Legend a new Adventure</h2>".
             "<p>Wir haben an  folgende E-Mail Addresse ist eine Email versendet mit ihren Zugangsdaten :<br/>".
             $_SESSION['email']."<br/>".
             "Aus der Email können Sie ihren 'Einmalschlüßel' entnehmen welchen sie nach der ersten Anmeldung benötigen.<br/>".
             "Sollte der Schlüßel nicht binnen 7 Tage genutzt werden, wird ihr Account automatisch gelöscht".
             "</p>";
        \System\HTML::closeDiv();
        \System\HTML::printMainFooter();
    }
    
    private function register_false(){
        $error = $_SESSION['error'];
        \System\HTML::printMainHeader();
        \System\HTML::addMeta("author", "Sascha Köhne");
        \System\HTML::addMeta("keywords", "Browsergame, browsergame, Spiel, Hacking, hacking");
        \System\HTML::addMeta("description", "Das neue Browsergame, entdecke die Möglichkeiten eines Hackers");
        \System\HTML::addScript("prototype");
        \System\HTML::addScript("effects");
        \System\HTML::addScript("window");
        \System\HTML::addScript("window_effects");
        \System\HTML::addStyle("default");
        \System\HTML::addStyle("spread");
        \System\HTML::addStyle("darkX");
        \System\HTML::addStyle("alert");
        \System\HTML::printMainBody();
        \System\HTML::addScript("main");
        \System\HTML::insertDiv("", "Header", "");
        \System\HTML::insertImg("header_bg.gif", "LOGO");
        \System\HTML::closeDiv();
        \System\HTML::insertDiv("","Menue","");
        $this->Navigation->showMenue();
        \System\HTML::closeDiv();
        \System\HTML::insertDiv("", "Content", "");
        echo "<h2>Willkommen bei Hack the Legend a new Adventure</h2>".
             "<p>Folgender Fehler ist bei der Registration aufgetretten : <br/>".$error."<br/>Bitte versuchen Sie es erneut oder wenden sie sich an einen Administrator!</p>";
        \System\HTML::closeDiv();
        \System\HTML::printMainFooter();
    }
}