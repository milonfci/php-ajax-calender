// JavaScript Document
var Apost_office_one;

function makeRequest(url, parameters) {
      http_request = false;
      if (window.XMLHttpRequest) { // Mozilla, Safari,...
         http_request = new XMLHttpRequest();
         if (http_request.overrideMimeType) {
            http_request.overrideMimeType('text/xml');
         }
      } else if (window.ActiveXObject) { // IE
         try {
            http_request = new ActiveXObject("Msxml2.XMLHTTP");
         } catch (e) {
            try {
               http_request = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {}
         }
      }
      if (!http_request) {
         alert('Cannot create XMLHTTP instance');
         return false;
      }

      http_request.onreadystatechange = alertContents;
      http_request.open('GET', url + parameters, true);
      http_request.send(null);
}
   

function alertContents() {
      if (http_request.readyState == 4) {
         if (http_request.status == 200) {
			 //alert(Apost_office_one);
            //alert(http_request.responseText);
            result = http_request.responseText;
		document.getElementById(Apost_office_one).innerHTML = "";
            document.getElementById(Apost_office_one).innerHTML = result;
         } else {
            alert('There was a problem with the request.');
         }
      }
}

