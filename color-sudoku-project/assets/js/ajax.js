/** XHConn - Simple XMLHTTP Interface - bfults@gmail.com - 2005-04-08        **
 ** Code licensed under Creative Commons Attribution-ShareAlike License      **
 ** http://creativecommons.org/licenses/by-sa/2.0/                           **/
function XHConn()
{
  var miAleatorio=parseInt(Math.random()*99999999);
  var xmlhttp, bComplete = false;
  try { xmlhttp = new ActiveXObject("Msxml2.XMLHTTP"); }
  catch (e) { try { xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); }
  catch (e) { try { xmlhttp = new XMLHttpRequest(); }
  catch (e) { xmlhttp = false; }}}
  if (!xmlhttp) return null;
  this.connect = function(sURL, sMethod, sVars, fnDone){
	  
    if (!xmlhttp) return false;
    bComplete = false;
    sMethod = sMethod.toUpperCase();

    try { 
		
      if (sMethod == "GET"){
        xmlhttp.open(sMethod, sURL+"?"+sVars+ "&rand=" + miAleatorio, true);
	    sVars = "";
		
      }else{
        xmlhttp.open(sMethod, sURL+"?rand=" + miAleatorio, true);
        xmlhttp.setRequestHeader("Method", "POST "+sURL+"?rand=" + miAleatorio+" HTTP/1.1");
        xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            }//FIN ELSE
			
      xmlhttp.onreadystatechange = function(){
		  
        if (xmlhttp.readyState == 4&& !bComplete){
          bComplete = true;
          fnDone(xmlhttp);
		  
		                                         }
		  
		  };
      xmlhttp.send(sVars);
	  
         }//FIN TRY  
	
	
    catch(z) { return false; }
    return true;
  };
  return this;
}



//---------------------------------------------
var peticion = false;  
  try {  peticion = new XMLHttpRequest();  }
   catch (trymicrosoft) { 
    try {		
	peticion = new ActiveXObject("Msxml2.XMLHTTP");  }
	 catch (othermicrosoft) { 
	  try { peticion = new ActiveXObject("Microsoft.XMLHTTP");  }
	   catch (failed) {		peticion = false;} }}
     if (!peticion)  alert("INITIALIZE ERROR!");


function loadup(fragment_url, element_id) {
   var element = document.getElementById(element_id);   
   element.innerHTML = '<center<img src="../images/cargando.gif" /></center>';   
   peticion.open("GET", fragment_url,true);   
   peticion.onreadystatechange = function() { 
   			if (peticion.readyState == 4) 
   			{  
			  	if (peticion.status == 200)
	             {
   			  element.innerHTML = peticion.responseText; 
			  }else{
			element.innerHTML = '<center><div id="msj_error">Sorry the requested document was not found</div></center>';  
		}
   			}else{
				element.innerHTML = '<center><img src="../images/cargando.gif" /></center>';  
			}
   } 
   peticion.send(null); 
}
