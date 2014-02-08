<?php
header("Content-Type: text/css");
?>

body{
    background: #424242;
    overflow:hidden;
}
#Content{
    position: relative;
    border-radius:10px;
    padding: 5px;
    background:silver;
    height:75%;
    width: 78%;
    top: -310px;
    left: 20%;
    border:groove;
}
#ressource{
    position: relative;
    border-radius: 10px;
    padding: 5px;
    background:silver;
    height: 300px;
    width: 200px;
    left: 0px;
    top: 10px;
    border:groove;
}
#info{
    color:#7CFC00;
    overflow-style:marquee,panner;
    overflow:auto;
    height:240px;
    width:400px;
    display:block;
}
#news_title{
    width:400px;
    text-align:center;
}
#news_time{
    width:380px;
    text-align:right;
}
#news_content{
    width:380px;
    text-align:left;
}
#news{
    color:#7CFC00;
    overflow-style:marquee,panner;
    overflow:auto;
    height:250px;
    width:400px;
    display:block;
}
#Menue{
    background:url('http://hol.spaceoflegends.de/hol/style/img/menue_bg.png');
    height:40px;
    text-align:center;
}
#Header{
    color:gold;
    font-weight:bold;
    height:75px;
    width:100%;
    text-shadow: #000 3px 3px 5px;
    text-align:center;
}
table#nav{
    height:40px;
    vertical-align:middle;
}

td#nav{
    border-style:groove;
    background:
    url('http://hol.spaceoflegends.de/hol/style/img/table_menue.png');
    text-align: center;
    width:100px;
}

td#nav:hover{
    border-style:groove;
    background:
    url('http://hol.spaceoflegends.de/hol/style/img/table_menue_hover_2.png');
    text-align: center;
    width:100px;
    color:gold;
}
a, visit{
    text-decoration:none;
    color: #000;
}
a:hover{
    color:gold;
}
input.standartField{
    box-shadow: 2px 2px 2px darkgrey;
    background-image:url(http://hol.spaceoflegends.de/hol/style/img/table_menue_hover_4.png);
    background-color:transparent;
    color:black;
    text-shadow: 2px 2px 2px gold;
    width: 215px;
}
input.standartSubmit{
    background: 
    url('http://hol.spaceoflegends.de/hol/style/img/table_menue_hover.png') 
    top left;
    background-color: transparent;
    border: none;
    color:black;
}
input.standartSubmit:hover{
    background: 
    url('http://hol.spaceoflegends.de/hol/style/img/table_menue_hover_2.png') 
    top left;
    background-color: transparent;
    border: none;
    color:gold;
}