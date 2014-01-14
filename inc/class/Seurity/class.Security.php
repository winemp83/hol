<?php
namespace System;

class Security {
    public static function escapeInput($Obj){
        return \htmlentities($Obj,\ENT_QUOTES,"UTF-8");
    }
    
    public static function isAjax(){
        if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) || $_SERVER['HTTP_X_REQUESTED_WITH'] != 'XMLHttpRequest'){
            return false;
        }
        else{
            return true;
        }
    }
}
