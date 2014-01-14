<?php
/* How To Use this File:
 * After bind in you can write a Log with
 * $GLOBALS['LOG']($message); -> this will  produce a Log as Info entry
 * $GLOBALS['LOG']($message, "WARN"); -> will make a entry as warning 
 * if you want to see Whats happend use this:
 * System\Logging::getLog(); -> will show the last 20 Entrys
 * System\Logging::getLog(200, "WARN"); -> Will show the last 200 Warnings
 * And the Last Function is System\Logging::deleteLogFile();
 * This will Delete the Logfile 
 */
namespace System;

class Logging{
    static $logfile;
    static $logLevel = 'INFO';
    static $fileHandle;

    public function __construct() {
        self::$logfile = PROJECT_DOCUMENT_ROOT.'/inc/class/Logging/'.date("d_m_y",time()).'_log.txt';
    }
    public function destruct() {
        if(self::$fileHandle){\fclose(self::$fileHandle);}
    }
    public function __invoke($message, $level="INFO") {
        if(!self::$fileHandle){
            self::$fileHandle=@fopen(self::$logfile,'a+');
        }
        if((self::$logLevel == $level) OR ($level == 'WARN')){
            $string = strToUpper($level).'::'.\date("d_m_y H:i:s",\time()).' - '.$message.' - '.$_SERVER['SCRIPT_FILENAME']."\r\n";
            \fwrite(self::$fileHandle,$string);
        }
    }
    public static function getLog($count=20, $level="INFO"){
        if(!self::$fileHandle){self::$fileHandle=@fopen(self::$logfile,'a+');}
        $entries = \file(self::$logfile);
        $displayedMessages = 0;
        for($i = count($entries);$i > 0; $i--){
            if($displayedMessages >= $count){return true;}
            if(!isset($entries[$i-1])){return true;}
            if($level == "INFO"){echo $entries[$i-1].'<br />';$displayedMessages++;}
            else if(\substr($entries[$i-1],0,4)=='WARN'){echo $entries[$i-1].'<br />';$displayedMessages++;}
        }}
    public static function deleteLogFile(){
        if(self::$fileHandle){\fclose(self::$fileHandle);}
        \unlink(self::$logfile);
    }
}
$log = new Logging();