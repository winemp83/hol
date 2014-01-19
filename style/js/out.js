function Out1(){
    win1 = new Window({
            className: "darkX",
            title: "Login",
            width: 230,
            height: 150,
            destroyOnClose: true,
            recenterAuto:false,
            gridX:1,
            gridY:1,
            minimizable:false,
            maximizable:false,
            resizable:false,
            top:100,
            left:50
        });
    win1.setAjaxContent("index.php",{method: 'post', parameters: {what: 'login'}});
    win1.show();
}
function Out2(){
    win1 = new Window({
            className: "darkX",
            title: "Registrieren",
            width: 230,
            height: 250,
            destroyOnClose: true,
            recenterAuto:false,
            gridX:1,
            gridY:1,
            minimizable:false,
            maximizable:false,
            resizable:false,
            top:100,
            left:50
        });
    win1.setAjaxContent("index.php",{method: 'post', parameters: {what: 'register'}});
    win1.show();
}
function Out3(){
    win1 = new Window({
            className: "darkX",
            title: "Informationen",
            width: 400,
            height: 250,
            destroyOnClose: true,
            recenterAuto:false,
            gridX:1,
            gridY:1,
            minimizable:false,
            maximizable:false,
            resizable:false,
            top:100,
            left:50
        });
    win1.setAjaxContent("index.php",{method: 'post', parameters: {what: 'info'}});
    win1.show();
}
function Out4(){
    win1 = new Window({
            className: "darkX",
            title: "Neuigkeiten",
            width: 400,
            height: 250,
            destroyOnClose: true,
            recenterAuto:false,
            gridX:1,
            gridY:1,
            minimizable:false,
            maximizable:false,
            resizable:false,
            top:100,
            left:50
        });
    win1.setAjaxContent("index.php",{method: 'post', parameters: {what: 'news'}});
    win1.show();
}


