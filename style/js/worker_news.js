function getMessage(){
    setRequest('test');
    setTimeout("getMessage()", 10000);
}
function setRequest(value) {
		request = new XMLHttpRequest(); // Mozilla, Safari, Opera

	// überprüfen, ob Request erzeugt wurde
	if (!request) {
		alert("Kann keine XMLHTTP-Instanz erzeugen");
		return false;
	} else {
		var url = "../../inc/functions/Ajax/msg.php";
		// Request öffnen
		request.open('post', url, true);
		// Request senden
		request.send();
		// Request auswerten
		request.onreadystatechange = interpretRequest;
	}
}
function interpretRequest() {
	switch (request.readyState) {
		// wenn der readyState 4 und der request.status 200 ist, dann ist alles korrekt gelaufen
		case 4:
			if (request.status != 200) {
				alert("Der Request wurde abgeschlossen, ist aber nicht OK\nFehler:"+request.status);
			} else {
                                var value = request.responseText
                                
				// den Inhalt des Requests in das <div> schreiben
				postMessage(value);
			}
			break;
		default:
			break;
	}
}
getMessage();