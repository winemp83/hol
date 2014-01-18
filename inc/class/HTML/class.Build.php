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
        \System\HTML::printMainBody();
        \System\HTML::insertDiv("","Menue","background:gold;height:40px;");
        $this->Navigation->showMenue();
        \System\HTML::closeDiv();
        \System\HTML::insertDiv("", "Content", "background:silver;height:200px;");
        echo "Willkommen bei Hack the Legend a new Adventure";
        \System\HTML::closeDiv();
        \System\HTML::printMainFooter();
    }
    
    private function selectSite($nr = null){
        if($nr == null){
            throw new \Exception('Aufruf der Unterseiten ohne übergabe(kein Post)');
        }
        switch($nr){
            case 'home'     :
                break;
            case 'build'    :
                break;
            case 'markt'    :
                break;
            case 'bank'     :
                break;
            case 'option'   :
                break;
            case 'adm'      :
                break;
            case 'login'    :
                $this->login();break;
            case 'logout'   :
                break;
            case 'news'     :
                break;
            case 'info'     :
                break;
            default         :
                break;
        }
    }
    private function login(){
        $this->UserForms->printLoginForm();
    }
}