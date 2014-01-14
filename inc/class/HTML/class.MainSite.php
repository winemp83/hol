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
        echo '<script src="'.PROJECT_HTTP_ROOT.'/style/js/prototype.js" type="text/javascript"></script>';
        echo '<script src="'.PROJECT_HTTP_ROOT.'/style/js/effects.js" type="text/javascript"></script>';
        echo '<script src="'.PROJECT_HTTP_ROOT.'/style/js/window.js" type="text/javascript"></script>';
        echo '<script src="'.PROJECT_HTTP_ROOT.'/style/js/window_effects.js" type="text/javascript"></script>';
        echo '<link rel="stylesheet" type="text/css" href="'.PROJECT_HTTP_ROOT.'/style/css/default.css">';
        echo '<link rel="stylesheet" type="text/css" href="'.PROJECT_HTTP_ROOT.'/style/css/spread.css">';
        echo '<link rel="stylesheet" type="text/css" href="'.PROJECT_HTTP_ROOT.'/style/css/darkX.css">';
        echo '<link rel="stylesheet" type="text/css" href="'.PROJECT_HTTP_ROOT.'/style/css/alert.css">';
    }
    
    public static function printMainBody($onload = null){
        echo '</head>';
        echo '<body ';
        if($onload != null){
            echo 'onload="'.$onload.';"';
        }
        echo '>';
        echo '<script src="'.PROJECT_HTTP_ROOT.'/style/js/main.js" type="text/javascript"></script>';
    }
    
    public static function printMainFooter(){
        echo '</body>';
        echo '</html>';
    }
    
    public static function insertDiv( $content = null,$id = null,$style = null){
        echo '<div ';
        if($id != null){
            echo "id='".$id."' ";
        }
        if($style != null){
            echo "style='".$style."'";
            
        }
        echo ">".$content;
    }
    
    public static function closeDiv(){
        echo "</div>";
    }
}