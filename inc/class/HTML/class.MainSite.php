<?php
namespace System;

class HTML {
    public static function printMainHeader(){
        header('Content-Type: text/html; charset=UTF-8');
        echo '<!DOCTYPE html>';
        echo '<html>';
        echo '<head>';
        echo '<title>'.HTML_TITLE.'</title>';
        echo '<meta http-equiv="content-type" content="text/html; charset=UTF-8">'."\n";
        echo '<link rel="stylesheet" type="text/css" href="'.PROJECT_HTTP_ROOT.'/style/css/default.css.php">';
    }
    public static function printGameHeader(){
        header('Content-Type: text/html; charset=UTF-8');
        echo '<!DOCTYPE html>';
        echo '<html>';
        echo '<head>';
        echo '<title>'.HTML_TITLE.'</title>';
        echo '<meta http-equiv="content-type" content="text/html; charset=UTF-8">'."\n";
        echo '<link rel="stylesheet" type="text/css" href="'.PROJECT_HTTP_ROOT.'/style/css/default.css_1.php">';
    }
    
    public static function printMainBody($onload = null){
        echo '</head>';
        echo '<body ';
        if($onload != null){echo 'onload="'.$onload.';"';}
        echo '>';
    }
    
    public static function addMeta($name, $content){
        echo '<meta name="'.$name.'" content="'.$content.'" />';
    }
    
    public static function addStyle($name){
        echo '<link rel="stylesheet" type="text/css" href="'.PROJECT_HTTP_ROOT.'/style/css/'.$name.'.css">';
    }
    
    public static function addScript($scriptName, $direct = false, $type = "text/javascript"){
        if($direct){echo '<script type="'.$type.'">'.$scriptName.'</script>';}
        else{echo '<script src="'.PROJECT_HTTP_ROOT.'/style/js/'.$scriptName.'.js" type="'.$type.'"></script>';}
    }
    
    public static function printMainFooter(){
        echo '</body>';
        echo '</html>';
    }
    
    public static function insertDiv( $content = null,$id = null,$style = null){
        echo '<div ';
        if($id != null){echo "id='".$id."' ";}
        if($style != null){echo "style='".$style."'";}
        echo ">".$content;
    }
    
    public static function insertImg($bildname = null, $alt = null, $style = null){
        echo '<img src="'.PROJECT_HTTP_ROOT.'/style/img/'.$bildname.'" alt="'.$alt.'" style="'.$style.'"/>';
    }
    
    public static function closeDiv(){
        echo "</div>";
    }
    
    public static function textToWindow($text, $textlen = 60){
        $helpA = strlen($text);
        $data = '';
        if ($helpA >= $textlen){$i = 0;while($helpA > 0){
                $helpA -= $textlen;
                $data .= substr($text, $i, $textlen);
                $i += $textlen;
                $data .= "<br/>";}
        }
        else{$data .= $text;}
        return $data;
    }
}