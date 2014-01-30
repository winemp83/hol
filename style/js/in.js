$(document).ready(function(){
    
});

function getMenue(what){
    $.post("ajax.php",
    {
        what: what
    },
    function(data){
        $("#Content").html(data);
    }
    );
}
