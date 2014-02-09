<?php
namespace Game;

class Forms{
    
    private function jsForForms($name = null){
        $data = "var frm = $('#".$name."');frm.submit(function (ev) {
                $.ajax({
                type: frm.attr('method'),
                url: frm.attr('action'),
                data: frm.serialize(),
                success: function (data) {
                $('#Content').html(data);".
                //For DEBUG only --> /*
                "alert(data);".
                // */ <--
                "}});ev.preventDefault();});";
        \System\HTML::addScript($data, true);
    }
    
    public function printPlayerOptions($checkScript = null){
        $data = '<center><legend>Persönliche Einstellungen</legend><form id="option_player" action="'.$checkScript.'" method="post">
                <input type="hidden" class="standartField" name="what" value="option_player_send"><br />
                <input type="submit" onfocus="blur();" class="standartSubmit" name="doSend" value="Ändern">
                <input type="reset" onfocus="blur();" class="standartSubmit" name="doReset" value="Rückgängig">
                </form></center>';
        $this->jsForForms('option_player');
        echo $data;
    }
    public function printGameOptions($checkScript = null){
        $data = '<center><legend>Spiel Einstellungen</legend><form id="option_game" action="'.$checkScript.'" method="post">
                <input type="hidden" class="standartField" name="what" value="option_game_send"><br />
                <input type="submit" onfocus="blur();" class="standartSubmit" name="doSend" value="Ändern">
                <input type="reset" onfocus="blur();" class="standartSubmit" name="doReset" value="Rückgängig">
                </form></center>';
       $this->jsForForms('option_game');
        echo $data;
    }
    public function printHolidayOptions($checkScript = null){
        $data = '<center><legend>Urlaubs Einstellungen</legend><form id="option_holiday" action="'.$checkScript.'" method="post">
                <input type="hidden" class="standartField" name="what" value="option_holiday_send"><br />
                <input type="submit" onfocus="blur();" class="standartSubmit" name="doSend" value="Eingeben">
                </form></center>';
        $this->jsForForms('option_holiday');
        echo $data;
    }
    public function printDelOptions($checkScript = null){
        $data = '<center><legend>Account Löschen</legend><form id="option_del" action="'.$checkScript.'" method="post">
                <input type="hidden" class="standartField" name="what" value="option_del_send"><br />
                <input type="submit" onfocus="blur();" class="standartSubmit" name="doSend" value="Account Löschen">
                </form></center>';
        $this->jsForForms('option_del');
        echo $data;
    }
    public function printLogoutForm($checkScript = null){
        $data = '<center><legend>Logout</legend><form id="noSpaces" action="'.$checkScript.'" method="post">
                <input type="hidden" class="standartField" name="logout" value="true"><br />
                <input type="submit" onfocus="blur();" class="standartSubmit" name="doLogout" value="Logout">
                </form></center>';
        echo $data;
    }
    public function printAktienBuyForm($checkScript = null){
        $data = '<center><legend>Aktien Kaufen</legend><form id="bank_aktien_buy" action="'.$checkScript.'" method="post">
                Anzahl : <input type="number" min="0" max="100" required="required" name="aktien"><br/ >
                <input type="hidden" class="standartField" name="what" value="bank_aktien_buy_send"><br />
                <input type="submit" onfocus="blur();" class="standartSubmit" name="doSend" value="Aktien Kaufen">
                </form></center>';
        $this->jsForForms('bank_aktien_buy');
        echo $data;
    }
    public function printAktienSellForm($checkScript = null){
        $data = '<center><legend>Aktien Kaufen</legend><form id="bank_aktien_sell" action="'.$checkScript.'" method="post">
                Anzahl : <input type="number" min="0" max="100" required="required" name="aktien"><br/ >
                <input type="hidden" class="standartField" name="what" value="bank_aktien_sell_send"><br />
                <input type="submit" onfocus="blur();" class="standartSubmit" name="doSend" value="Aktien verkaufen">
                </form></center>';
        $this->jsForForms('bank_aktien_sell');
        echo $data;
    }
    public function printPayinForm($checkScript = null){
        $data = '<center><legend>Aktien Kaufen</legend><form id="bank_payin" action="'.$checkScript.'" method="post">
                Empfänger : <input type="text" class="standartField" name="become" size="29" maxlength="100"><br />
                Art : <select size="1" form="bank_payin">
                <option value="alliance">Allianz</option>
                <option value="player" selected="selected">Spieler</option>
                </select><br/>
                Summe : <input type="number" min="1" max="10000" required name="summe"><br/ >
                <input type="hidden" class="standartField" name="what" value="bank_payin_buy_send"><br />
                <input type="submit" onfocus="blur();" class="standartSubmit" name="doSend" value="Einzahlen">
                </form></center>';
        $this->jsForForms('bank_payin');
        echo $data;
    }
    public function printMarktBuyForm($checkScript = null){
        $data = '<center><legend>Rohstoffe Kaufen</legend><form id="markt_buy" action="'.$checkScript.'" method="post">
                Art : <select size="1" form="markt_buy">
                <option value="met">Metall</option>
                <option value="oil" selected="selected">Öl</option>
                <option value="nah">Nahrung</option>
                </select><br/>
                Summe : <input type="number" min="1" max="10000" required name="summe"><br/ >
                <input type="hidden" class="standartField" name="what" value="markt_buy_send"><br />
                <input type="submit" onfocus="blur();" class="standartSubmit" name="doSend" value="Kaufen">
                </form></center>';
        $this->jsForForms('markt_buy');
        echo $data;
    }
    public function printMarktSellForm($checkScript = null){
        $data = '<center><legend>Rohstoffe Verkaufen</legend><form id="markt_sell" action="'.$checkScript.'" method="post">
                Art : <select size="1" form="markt_sell">
                <option value="met">Metall</option>
                <option value="oil" selected="selected">Öl</option>
                <option value="nah">Nahrung</option>
                </select><br/>
                Summe : <input type="number" min="1" max="10000" required name="summe"><br/ >
                <input type="hidden" class="standartField" name="what" value="markt_sell_send"><br />
                <input type="submit" onfocus="blur();" class="standartSubmit" name="doSend" value="Verkaufen">
                </form></center>';
        $this->jsForForms('markt_sell');
        echo $data;
    }
    public function printTraderForm($checkScript = null){
        $data = '<center><legend>Schrotthändler</legend><form id="markt_trader" action="'.$checkScript.'" method="post">
                Art : <select size="1" form="markt_trader">
                <option value="tro">Truppen</option>
                <option value="fah" selected="selected">Fahrzeuge</option>
                <option value="flu">Flugzeuge</option>
                </select><br/>
                Summe : <input type="number" min="1" max="10000" required name="summe"><br/ >
                <input type="hidden" class="standartField" name="what" value="markt_trader_send"><br />
                <input type="submit" onfocus="blur();" class="standartSubmit" name="doSend" value="Verkaufen">
                </form></center>';
        $this->jsForForms('markt_trader');
        echo $data;
    }
    public function printOffiziereForm($checkScript = null){
        $data = '<center><legend>Offiziere</legend><form id="markt_offiziere" action="'.$checkScript.'" method="post">
                Art : <select size="1" form="markt_offiziere">
                <option value="Generall">Generall</option>
                <option value="Lagerist" selected="selected">Lagerist</option>
                <option value="Hacker">Hacker</option>
                </select><br/>
                <input type="hidden" class="standartField" name="what" value="markt_offiziere_send"><br />
                <input type="submit" onfocus="blur();" class="standartSubmit" name="doSend" value="Verkaufen">
                </form></center>';
        $this->jsForForms('markt_offiziere');
        echo $data;
    }
    public function printTroopsForm($checkScript = null){
        $data = '<center><legend>Truppen Ausbilden</legend><form id="build_trooper" action="'.$checkScript.'" method="post">
                Art : <select size="1" form="build_trooper">
                <option value="1">Scharfschützen</option>
                <option value="2" selected="selected">MG-Schütze</option>
                <option value="3">Panzerabwehreinheit</option>
                </select><br/>
                Summe : <input type="number" min="1" max="10000" required name="summe"><br/ >
                <input type="hidden" class="standartField" name="what" value="build_trooper_send"><br />
                <input type="submit" onfocus="blur();" class="standartSubmit" name="doSend" value="Ausbilden">
                </form></center>';
        $this->jsForForms('build_trooper');
        echo $data;
    }
    public function printFactoryForm($checkScript = null){
        $data = '<center><legend>Fabrik</legend><form id="build_factory" action="'.$checkScript.'" method="post">
                Art : <select size="1" form="build_factory">
                <option value="1">Geländewagen</option>
                <option value="2" selected="selected">Panzer</option>
                <option value="3">Transporter</option>
                </select><br/>
                Summe : <input type="number" min="1" max="10000" required name="summe"><br/ >
                <input type="hidden" class="standartField" name="what" value="build_factory_send"><br />
                <input type="submit" onfocus="blur();" class="standartSubmit" name="doSend" value="Produzieren">
                </form></center>';
        $this->jsForForms('build_factory');
        echo $data;
    }
    public function printHangarForm($checkScript = null){
        $data = '<center><legend>Fabrik</legend><form id="build_shipyard" action="'.$checkScript.'" method="post">
                Art : <select size="1" form="build_shipyard">
                <option value="1">Jagdflugzeug</option>
                <option value="2" selected="selected">Bomber</option>
                <option value="3">Abfangjäger</option>
                </select><br/>
                Summe : <input type="number" min="1" max="10000" required name="summe"><br/ >
                <input type="hidden" class="standartField" name="what" value="build_shipyard_send"><br />
                <input type="submit" onfocus="blur();" class="standartSubmit" name="doSend" value="Produzieren">
                </form></center>';
        $this->jsForForms('build_shipyard');
        echo $data;
    }
    public function printMSGOverview(){
        $a = new \Game\Message();
        $a->getMsg($_SESSION['data'][0]['id']);
        $i = 0;
        $data = '<center><table id="msg">'.
                '<tr id="msg_overview">'.
                '<td id="msg_oc_one">Anzahl</td>'.
                '<td id="msg_oc_two">Inhalt</td>'.
                '<td id="msg_oc_three">Freunde</td>'.
                '</tr>'.
                '<tr id="msg_content">'.
                '<td id="msg_cc_one">';
                 $data .= implode("<br/>", $a->MSG);
       $data .= '</td>'.
                '<td id="msg_cc_two"></td>'.
                '<td id="msg_cc_three"></td>'.
                '</tr>'.
                '</table></center>';
        echo $data;
        
    }
}