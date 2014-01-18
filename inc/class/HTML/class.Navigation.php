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
        }
        return $data;
    }
    private function menueOut(){
        $data = '<script src="'.PROJECT_HTTP_ROOT.'/style/js/out.js" type="text/javascript"></script>'.
                '<table><tr>'.
                '<td><a href="index.php" >'.LNG_HOME.'</a></td>'.
                '<td><a href="#" onClick="javascript:Out1();">'.LNG_LOGIN.'</a></td>'.
                '<td><a href="#" onClick="javascript:Out2();">'.LNG_REGISTER.'</a></td>'.
                '<td><a href="#" onClick="javascript:Out3();">'.LNG_NEWS.'</a></td>'.
                '<td><a href="#" onClick="javascript:Out4();">'.LNG_INFO.'</a></td>'.
                '</tr></table>';
        return $data;
    }
    private function menueIn(){
        $data = '<script src="'.PROJECT_HTTP_ROOT.'/style/js/in.js" type="text/javascript"></script>'.
                '<table><tr>'.
                '<td><a href="index.php" >'.LNG_HOME.'</a></td>'.
                '<td><a href="#" onClick="javascript:In1();">'.LNG_LOGOUT.'</a></td>'.
                '<td><a href="#" onClick="javascript:In2();">'.LNG_BUILD.'</a></td>'.
                '<td><a href="#" onClick="javascript:In3();">'.LNG_MARKT.'</a></td>'.
                '<td><a href="#" onClick="javascript:In4();">'.LNG_BANK.'</a></td>'.
                '<td><a href="#" onClick="javascript:In5();">'.LNG_OPTION.'</a></td>'.
                '<td><a href="#" onClick="javascript:In6();">'.LNG_ADM.'</a></td>'.
                '</tr></table>';
        return $data;
    }
}