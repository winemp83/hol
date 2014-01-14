<?php
require_once 'common.php';
if(!System\Security::isAjax()){
System\HTML::printMainHeader();
}else{
    require_once PROJECT_DOCUMENT_ROOT.'/inc/functions/Ajax/function.AjaxMain.php';
    System\HTML::insertDiv("test2","test1","background:silver;");
}    
System\HTML::printMainBody();
echo  "<a href='#' onMouseover='javascript:fenster1();'>Test</a><br/>";
echo  "<a href='#' onMouseover='javascript:fenster2();'>Test</a><br/>";
echo  "<a href='#' onMouseover='javascript:fenster3();'>Test</a><br/>";
System\HTML::insertDiv("test","test2","background:red;height:80px;");
System\HTML::closeDiv();
System\HTML::closeDiv();
System\HTML::printMainFooter();

