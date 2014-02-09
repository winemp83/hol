<?php
session_start();
require_once '../../../common.php';
if(\System\Security::isLogin()){
    getDataforRess();
}else{
    \System\Security::anError(101);
}

function getDataforRess(){
    $a = new \System\Daten\land($_SESSION['data'][0]['id']);
        $data = $a->getLandData();
        $help = msg();
        echo "<table id='table_ress'>".
             "<tr><td width='50%' align='left'>Name</td>".
             "<td align='right'>".$data[0]['name']."</td></tr>".
             "<tr><td width='50%' align='left'>Freie Bauplätze</td>".
             "<td align='right'>".$data[0]['groesse']."</td></tr>".
             "<tr><td width='50%' align='left'>Einwohner</td>".
             "<td align='right'>".$data[0]['einwohner']."</td></tr>".
             "<tr><td width='50%' align='left'>Zufriedenheit</td>".
             "<td align='right'>".$data[0]['zf']."</td></tr>".
             "<tr><td width='50%' align='left'>Steuern</td>".
             "<td align='right'>".$data[0]['steuer']."</td></tr>".
             "<tr><td width='50%' align='left'>Wachstum</td>".
             "<td align='right'>".$data[0]['wachstum']."</td></tr>".
             "<tr><td width='50%' align='left'>Nahrung</td>".
             "<td align='right'>".$data[0]['nahrung']."</td></tr>".
             "<tr><td width='50%' align='left'>Metall</td>".
             "<td align='right'>".$data[0]['metall']."</td></tr>".
             "<tr><td width='50%' align='left'>Oel</td>".
             "<td align='right'>".$data[0]['oel']."</td></tr>".
             "<tr><td width='50%' align='left'>Geld</td>".
             "<td align='right'>".$_SESSION['data'][0]['money']."</td></tr>".
             "<tr><td width='50%' align='left'>Nachrichten</td>".
             "<td align='right'>".$help[1].$help[0]."</a></span></td></tr>".
             "</table>";
             print_r($GLOBALS['DATABASE']->lastSQLError);
}
function msg(){
    $result = $GLOBALS['DATABASE']->query("SELECT COUNT(*) FROM message WHERE owner='".$_SESSION['data'][0]['id']."' AND is_read=0");
    foreach($result as $data){
        $a[0] = $data['COUNT(*)'];
    }
    if ($a[0] < 0){
        $_POST['what'] = 'msg';
        $a[1] = '<span style="color:black;"><a href="#" onClick="javascript:getMenue(\'msg\');">'; 
    }
    else{
        $_POST['what'] = 'msg';
        $a[1] = '<span style="color:green;"><a href="#" onClick="javascript:getMenue(\'msg\');">';
    }
    return $a;
}