var w;
$(document).ready(function(){
    if(typeof(Worker) !== "undefinded")
    {
         if(typeof(w) == "undefined")
        {
            w = new Worker("/hol/style/js/worker_news.js");
        }
        w.onmessage = function (event){
            if(event.data !== 100){
                document.getElementById("ressource").innerHTML = event.data;
            }
            else{
                w.terminate();
            }
        };
    }
    else{
        alert("Sie können keine Nachrichten Ingame Empfangen bitte wechseln sie auf Chrome");
    }
});

function getMenue(what, target){
    $.post("ajax.php",
    {
        what: what
    },
    function(data){
        $("#"+target).html(data);
    }
    );
}
