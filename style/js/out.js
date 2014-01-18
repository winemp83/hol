function Out1(){
    win1 = new Window({
            className: "darkX",
            title: "Login",
            width: 220,
            height: 150,
            destroyOnClose: true,
            recenterAuto:false,
            gridX:1,
            gridY:1,
            minimizable:false,
            maximizable:false,
            resizable:false
        });
    win1.setAjaxContent("index.php",{method: 'post', parameters: {what: 'login'}});
    win1.showCenter();
}


