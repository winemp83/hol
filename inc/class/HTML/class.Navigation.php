<?php
namespace System\HTML;

class Navigation{
    public function showMenue($nr = 1){
        $data = $this->selectMenue($nr);
        print_r($data);
    }
    private function selectMenue($nr){
        switch($nr){
            case 1 : $data = $this->menueOut();
                    break;
            case 2 : $data = $this->menueIn();
                    break;
            case 3 : $data = $this->bank_menue();
                    break;
            case 4 : $data = $this->build_menue();
                    break;
            case 5 : $data = $this->markt_menue();
                    break;
            case 6 : $data = $this->options_menue();
                    break;
            case 7 : $data = $this->alliance_menue(false);
                    break;
            case 8 : $data = $this->alliance_menue(true);
                    break;
        }
        return $data;
    }
    private function menueOut(){
        $data = '<center>'.\System\HTML::addScript("out").
                '<table id="nav"><tr>'.
                '<td id="nav"><a href="index.php" >'.LNG_HOME.'</a></td>'.
                '<td id="nav"><a href="#" onClick="javascript:Out1();">'.LNG_LOGIN.'</a></td>'.
                '<td id="nav"><a href="#" onClick="javascript:Out2();">'.LNG_REGISTER.'</a></td>'.
                '<td id="nav"><a href="#" onClick="javascript:Out4();">'.LNG_NEWS.'</a></td>'.
                '<td id="nav"><a href="#" onClick="javascript:Out3();">'.LNG_INFO.'</a></td>'.
                '</tr></table></center>';
        return $data;
    }
    private function menueIn(){
        $data = '<center>'.\System\HTML::addScript("in").
                '<table id="nav">'.
                '<tr><td id="nav"><a href="game.php" >'.LNG_HOME.'</a></td></tr>'.
                '<tr><td id="nav"><a href="#" onClick="javascript:getMenue(\'msg\', \'Content\');">'.LNG_MSG.'</a></td></tr>'.
                '<tr><td id="nav"><a href="#" onClick="javascript:getMenue(\'alliance\', \'menue_two\');">'.LNG_ALLIANZ.'</a></td></tr>'.
                '<tr><td id="nav"><a href="#" onClick="javascript:getMenue(\'build\', \'menue_two\');">'.LNG_BUILD.'</a></td></tr>'.
                '<tr><td id="nav"><a href="#" onClick="javascript:getMenue(\'markt\', \'menue_two\');">'.LNG_MARKT.'</a></td></tr>'.
                '<tr><td id="nav"><a href="#" onClick="javascript:getMenue(\'bank\', \'menue_two\');">'.LNG_BANK.'</a></td></tr>'.
                '<tr><td id="nav"><a href="#" onClick="javascript:getMenue(\'option\', \'menue_two\');">'.LNG_OPTION.'</a></td></tr>'.
                '<tr><td id="nav"><a href="#" onClick="javascript:getMenue(\'adm\', \'menue_two\');">'.LNG_ADM.'</a></td></tr>'.
                '</table></center>';
        return $data;
    }
    private function alliance_menue($no_alliance = true){
        if($no_alliance){
            $data = '<center>'.
                    '<table id="nav">'.
                    '<tr><td id="nav"><a href="#" onClick="javascript:getMenue(\'main\', \'menue_two\');">'.LNG_BACK.'</a></td></tr>'.
                    '<tr><td id="nav"><a href="#" onClick="javascript:getMenue(\'alliance_build\');">'.LNG_ALLIANCE_BUILD.'</a></td></tr>'.
                    '<tr><td id="nav"><a href="#" onClick="javascript:getMenue(\'alliance_search\');">'.LNG_ALLIANCE_SEARCH.'</a></td></tr>'.
                    '</table></center>';
        }
        else{
            $data = '<center>'.
                    '<table id="nav">'.
                    '<tr><td id="nav"><a href="#" onClick="javascript:getMenue(\'main\', \'menue_two\');">'.LNG_BACK.'</a></td></tr>'.
                    '<tr><td id="nav"><a href="#" onClick="javascript:getMenue(\'alliance_overview\');">'.LNG_ALLIANCE_OVERVIEW.'</a></td></tr>'.
                    '<tr><td id="nav"><a href="#" onClick="javascript:getMenue(\'alliance_bonus\');">'.LNG_ALLIANCE_BONUS.'</a></td></tr>'.
                    '<tr><td id="nav"><a href="#" onClick="javascript:getMenue(\'alliance_news\');">'.LNG_ALLIANCE_NEWS.'</a></td></tr>'.
                    '<tr><td id="nav"><a href="#" onClick="javascript:getMenue(\'alliance_forum\');">'.LNG_ALLIANCE_FORUM.'</a></td></tr>'.
                    '<tr><td id="nav"><a href="#" onClick="javascript:getMenue(\'alliance_options\');">'.LNG_ALLIANCE_OPTION.'</a></td></tr>'.
                    '</table></center>';
        }
        return $data;
    }
    private function bank_menue(){
        $data = '<center>'.
                '<table id="nav">'.
                '<tr><td id="nav"><a href="#" onClick="javascript:getMenue(\'main\', \'menue_two\');">'.LNG_BACK.'</a></td></tr>'.
                '<tr><td id="nav"><a href="#" onClick="javascript:getMenue(\'bank_aktien\');">'.LNG_BANK_AKTIEN.'</a></td></tr>'.
                '<tr><td id="nav"><a href="#" onClick="javascript:getMenue(\'bank_set\');">'.LNG_BANK_SET.'</a></td></tr>'.
                '<tr><td id="nav"><a href="#" onClick="javascript:getMenue(\'bank_get\');">'.LNG_BANK_GET.'</a></td></tr>'.
                '<tr><td id="nav"><a href="#" onClick="javascript:getMenue(\'bank_overview\');">'.LNG_BANK_OVERVIEW.'</a></td></tr>'.
                '<tr><td id="nav"><a href="#" onClick="javascript:getMenue(\'reserve\');">'.LNG_RESERVE.'</a></td></tr>'.
                '</table></center>';
        return $data;
    }
    private function build_menue(){
        $data = '<center>'.
                '<table id="nav">'.
                '<tr><td id="nav"><a href="#" onClick="javascript:getMenue(\'main\', \'menue_two\');">'.LNG_BACK.'</a></td></tr>'.
                '<tr><td id="nav"><a href="#" onClick="javascript:getMenue(\'build_troops\');">'.LNG_BUILD_TROOPS.'</a></td></tr>'.
                '<tr><td id="nav"><a href="#" onClick="javascript:getMenue(\'build_buildings\');">'.LNG_BUILD_BUILDINGS.'</a></td></tr>'.
                '<tr><td id="nav"><a href="#" onClick="javascript:getMenue(\'build_factory\');">'.LNG_BUILD_FACTORY.'</a></td></tr>'.
                '<tr><td id="nav"><a href="#" onClick="javascript:getMenue(\'build_shipyard\');">'.LNG_BUILD_SHIPYARD.'</a></td></tr>'.
                '</table></center>';
        return $data;
    }
    private function markt_menue(){
        $data = '<center>'.
                '<table id="nav">'.
                '<tr><td id="nav"><a href="#" onClick="javascript:getMenue(\'main\', \'menue_two\');">'.LNG_BACK.'</a></td></tr>'.
                '<tr><td id="nav"><a href="#" onClick="javascript:getMenue(\'markt_buy\');">'.LNG_MARKT_BUY.'</a></td></tr>'.
                '<tr><td id="nav"><a href="#" onClick="javascript:getMenue(\'markt_sell\');">'.LNG_MARKT_SELL.'</a></td></tr>'.
                '<tr><td id="nav"><a href="#" onClick="javascript:getMenue(\'markt_trader\');">'.LNG_MARKT_TRADER.'</a></td></tr>'.
                '<tr><td id="nav"><a href="#" onClick="javascript:getMenue(\'markt_offiziere\');">'.LNG_MARKT_OFFIZIERE.'</a></td></tr>'.
                '<tr><td id="nav"><a href="#" onClick="javascript:getMenue(\'markt_ebay\');">'.LNG_MARKT_EBAY.'</a></td></tr>'.
                '</table></center>';
        return $data;
    }
    private function options_menue(){
        $data = '<center>'.
                '<table id="nav">'.
                '<tr><td id="nav"><a href="#" onClick="javascript:getMenue(\'main\', \'menue_two\');">'.LNG_BACK.'</a></td></tr>'.
                '<tr><td id="nav"><a href="#" onClick="javascript:getMenue(\'option_player\');">'.LNG_OPTION_PLAYER.'</a></td></tr>'.
                '<tr><td id="nav"><a href="#" onClick="javascript:getMenue(\'option_game\');">'.LNG_OPTION_GAME.'</a></td></tr>'.
                '<tr><td id="nav"><a href="#" onClick="javascript:getMenue(\'option_holiday\');">'.LNG_OPTION_HOLIDAY.'</a></td></tr>'.
                '<tr><td id="nav"><a href="#" onClick="javascript:getMenue(\'option_del\');">'.LNG_OPTION_DEL.'</a></td></tr>'.
                '<tr><td id="nav"><a href="#" onClick="javascript:getMenue(\'logout\', \'menue_two\');">'.LNG_LOGOUT.'</a></td></tr>'.
                '</table></center>'.\System\HTML::addScript("in");
        return $data;
    }
}