function fenster1(){
    win1 = new Window({
            className: "darkX",
            title: "Beispiel",
            width: 500,
            height: 350,
            destroyOnClose: true,
            recenterAuto:true
        });
    win1.setAjaxContent("index.php",{method: 'post', parameters: {option: 1}});
    win1.showCenter();
}
function fenster2(){
    win2 = new Window({
            className: "darkX",
            title: "Beispiel",
            width: 500,
            height: 350,
            destroyOnClose: true,
            recenterAuto:true
        });
    win2.setAjaxContent("index.php",{method: 'post', parameters: {option: 2}});
    win2.showCenter();
}
function fenster3(){
    win3 = new Window({
            className: "darkX",
            title: "Beispiel",
            width: 500,
            height: 350,
            destroyOnClose: true,
            recenterAuto:true
        });
    win3.setAjaxContent("index.php",{method: 'post', parameters: {option: 3}});
    win3.showCenter();
}
