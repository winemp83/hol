<?php
namespace Game;

class Build{
    private $MainSite;
    private $GameNavigation;
    private $GameForms;
    private $AjaxRequest;
    
    public function __construct() {
        $what = filter_input(INPUT_POST, 'what', FILTER_SANITIZE_STRING);
        $this->GameNavigation = new \System\HTML\Navigation();
        if(!isset($what)){$this->MainSite = $this->createMainSiteOut();}
            else{try{$this->MainSite = $this->selectSite($what);}
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
        \System\HTML::insertImg("test.png", "LOGO");
        \System\HTML::closeDiv();
        \System\HTML::insertDiv("","Menue","");
        $this->GameNavigation->showMenue(2);
        \System\HTML::closeDiv();
        \System\HTML::insertDiv("", "Content", "");
        echo "<h2>Willkommen bei Hack the Legend a new Adventure</h2>".
             "<p>Aktuell befindet sich dieses Browsergame noch im Aufbau.<br/>&nbsp;<br/>".
             "Sobald das Spiel in den Beta Modus wechselt werden wir eine Globalse Bekanntmachung in all unseren Service und Angeboten veröffentlichen.<br/>".
             "Bis dahin freuen wir uns aber über jeden Besucher!<br/></p>";
        \System\HTML::closeDiv();
        \System\HTML::printMainFooter();
    }
    
    private function selectSite($nr = null){
        if($nr == null){
            throw new \Exception('Aufruf der Unterseiten ohne übergabe(kein Post)');
        }
        switch($nr){
            case 'login'    :
                break;
            case 'news'     :
                break;
            case 'info'     :
                break;
            case 'register' :
                break;
            default         :
                break;
        }
    }
}

