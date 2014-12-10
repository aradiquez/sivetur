
/******************************************************************************************/
function checkLen(Input,countInput,limit){
    //alert(idd);
	if(Input.value.length <=limit){
		
		var texto = Input.value.length + ' of ' + limit + ' characters.';
	
		var objetoSPAN = document.getElementById(countInput);
		if(Input.value.length > 0){
		objetoSPAN.innerHTML = texto;
		}else
		objetoSPAN.innerHTML = "Limit to "+ limit +" character spaces." ;
	
	}else
		Input.value = Input.value.substring(0, limit);
}	
/*****************************************************************************************/
/*quita los blancos al inicio */
function quitaBlancos(Input){	
  while(''+Input.value.charAt(0)==' ')
  {Input.value=Input.value.substring(1,Input.value.length);}
}


function cambiaTexto(idd)
{
//var objetoSPAN = document.getElementById(idd);
var objetoSPAN = document.getElementById('t2');
if(objetoSPAN.innerHTML=="ESTE ES UN TEXTO DE PRUEBA")
objetoSPAN.innerHTML = newTexto;
else
objetoSPAN.innerHTML = "ESTE ES UN TEXTO DE PRUEBA"
return true;
}

/*****************************************************************************************/

 // NOTE: Backspace = 8, Enter = 13, '0' = 48, '9' = 57,46='.', 44=',' 
function permite(elEvento, permitidos)
{
  // Variables que definen los caracteres permitidos
  var numeros = "0123456789.";
  var caracteres = " abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
  var numeros_caracteres = numeros + caracteres;
  var teclas_especiales = [8, 9, 37, 39, 46, 44, 13];
  var telefonos = "1234567890-()+";
  var date = "1234567890-/";
  //  46 = Supr, 37 = flecha izquierda, 39 = flecha derecha, 9=Tab
 
 
  // Seleccionar los caracteres a partir del parámetro de la función
  switch(permitidos) {
    case 'num':
      permitidos = numeros;
      break;
    case 'car':
      permitidos = caracteres;
      break;
    case 'tel':
      permitidos = telefonos;
      break;
    case 'num_car':
      permitidos = numeros_caracteres;
    case 'date':
      permitidos = date;
      break;
  }
 
  // Obtener la tecla pulsada 
  var evento = elEvento || window.event;
  var codigoCaracter = evento.charCode || evento.keyCode;
  var caracter = String.fromCharCode(codigoCaracter);
  //window.alert(codigoCaracter);//pruebas
  
  // Comprobar si la tecla pulsada es alguna de las teclas especiales
  // (teclas de borrado y flechas horizontales)
  var tecla_especial = false;
  for(var i in teclas_especiales) {
    if(codigoCaracter == teclas_especiales[i]) {
      tecla_especial = true;
      break;
    }
  }
 
  // Comprobar si la tecla pulsada se encuentra en los caracteres permitidos
  // o si es una tecla especial
  return permitidos.indexOf(caracter) != -1 || tecla_especial;
}

// Retorna la cantidad de días entre las fechas
// Recibe 2 objetos Date como parametro
// restarFechas(Date fechaInicio, Date fechaFin)
function restarFechas(fechaInicio,fechaFin)
{
	var diferencia = fechaFin.getTime() - fechaInicio.getTime();
	var dias = Math.round(diferencia/86400000);
	if(dias < 0) dias=1;
	return dias;
}

/************************************************************/

function txtBuscar(input,texo)
{	if(input.value == texo){input.value = '';}
	else
	if(input.value == '') {input.value = texo;}	
}

function jsbuscar(txtbusq)
{
	if(!document.getElementById){return false;}
	var txtbusq = null;
	txtbusq = body.document.getElementById(input.toString());
	txtbusq.onclick=function(){txtBuscar(this,this.title);}
	txtbusq.onfocus=function(){txtBuscar(this,this.title);}
	txtbusq.onblur=function(){txtBuscar(this,this.title);}
}

function verificar_checks(form)
{
	var chekeados = true;//cambiarlo a false
	
	if(!document.getElementById){alert('Your browser doesn\'t support the DOM');return false;}
	
	var nodes = document.getElementById(form.toString()).getElementsByTagName('INPUT');
	
	for(var i=0; i<nodes.length; i++)
	{
        if (nodes[i].type=='checkbox')
			if (!nodes[i].checked)chekeados = false;
    }

	//var node = document.getElementById(form.toString());
	//node.getElementsByTagName('input')
	
	/*var len = node.childNodes.length;
	//alert(len);
	
	for(i=0;i<len;i++)
	{
		if (node.childNodes[i].nodeType =='checkbox')
		{
			if (node.childNodes[i].checked)
			{}
			else
				chekeados = false;
		}else
		{
			alert(node.childNodes[i].tagName);
		}
	};*/
	
	if (chekeados==true)
		return true;
	else
	{
		alert("You have to read and be agree to terms, conditions and instructions. Let's check the boxes at the end of the form.");
		return false;
	}
}

function externalLinks(){
 if (!document.getElementsByTagName) return; 
 var anchors = document.getElementsByTagName("a");
 for (var i=0; i<anchors.length; i++) { 
   var anchor = anchors[i];
   if (anchor.getAttribute("href") && anchor.getAttribute("rel") == "external")
     anchor.target = "_blank";
 }
}

/*************************/
function addLoadEvent(func){var oldOnload=window.onload;if(typeof window.onload!='function'){window.onload = func;}
else{window.onload=function(){oldOnload();func();}}}

/*jsbuscar("buspp");jsbuscar("buskey");*/
addLoadEvent(function(){externalLinks();});
