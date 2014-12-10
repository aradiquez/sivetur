var marked_row = new Array;

function setPointer(theRow, theRowNum, theAction, theDefaultColor, thePointerColor, theMarkColor)
{
    var theCells = null;

    // 1. Pointer and mark feature are disabled or the browser can't get the
    //    row -> exits
    if ((thePointerColor == '' && theMarkColor == '')
        || typeof(theRow.style) == 'undefined') {
        return false;
    }

    // 2. Gets the current row and exits if the browser can't get it
    if (typeof(document.getElementsByTagName) != 'undefined') {
        theCells = theRow.getElementsByTagName('td');
    }
    else if (typeof(theRow.cells) != 'undefined') {
        theCells = theRow.cells;
    }
    else {
        return false;
    }

    // 3. Gets the current color...
    var rowCellsCnt  = theCells.length;
    var domDetect    = null;
    var currentColor = null;
    var newColor     = null;
    // 3.1 ... with DOM compatible browsers except Opera that does not return
    //         valid values with "getAttribute"
    if (typeof(window.opera) == 'undefined'
        && typeof(theCells[0].getAttribute) != 'undefined') {
        currentColor = theCells[0].getAttribute('bgcolor');
        domDetect    = true;
    }
    // 3.2 ... with other browsers
    else {
        currentColor = theCells[0].style.backgroundColor;
        domDetect    = false;
    } // end 3

    // 4. Defines the new color
    // 4.1 Current color is the default one
    if (currentColor == ''
        || currentColor.toLowerCase() == theDefaultColor.toLowerCase()) {
        if (theAction == 'over' && thePointerColor != '') {
            newColor              = thePointerColor;
        }
        else if (theAction == 'click' && theMarkColor != '') {
            newColor              = theMarkColor;
            marked_row[theRowNum] = true;
        }
    }
    // 4.1.2 Current color is the pointer one
    else if (currentColor.toLowerCase() == thePointerColor.toLowerCase()
             && (typeof(marked_row[theRowNum]) == 'undefined' || !marked_row[theRowNum])) {
        if (theAction == 'out') {
            newColor              = theDefaultColor;
        }
        else if (theAction == 'click' && theMarkColor != '') {
            newColor              = theMarkColor;
            marked_row[theRowNum] = true;
        }
    }
    // 4.1.3 Current color is the marker one
    else if (currentColor.toLowerCase() == theMarkColor.toLowerCase()) {
        if (theAction == 'click') {
            newColor              = (thePointerColor != '')
                                  ? thePointerColor
                                  : theDefaultColor;
            marked_row[theRowNum] = (typeof(marked_row[theRowNum]) == 'undefined' || !marked_row[theRowNum])
                                  ? true
                                  : null;
        }
    } // end 4

    // 5. Sets the new color...
    if (newColor) {
        var c = null;
        // 5.1 ... with DOM compatible browsers except Opera
        if (domDetect) {
            for (c = 0; c < rowCellsCnt; c++) {
                theCells[c].setAttribute('bgcolor', newColor, 0);
            } // end for
        }
        // 5.2 ... with other browsers
        else {
            for (c = 0; c < rowCellsCnt; c++) {
                theCells[c].style.backgroundColor = newColor;
            }
        }
    } // end 5
    return true;
} // end of the 'setPointer()' function

var ventana;
var cont=0;

/***************************************************************************************************/
 function PopUp(img,enca){
	  foto1= new Image();
	  foto1.src=(img);
	  Control(img,enca);
  }

function Control(img,enca){
	if((foto1.width!=0)&&(foto1.height!=0)){
	  verFoto(img,enca);
	}
	else{
		funcion="Control('"+img+"','"+enca+"')";
		intervalo=setTimeout(funcion,01);
	}
}
/***************************************************************************************************/
 function redimensionar(ancho,alto){
    ventana.resizeTo(ancho+12,alto+28);
    ventana.moveTo((screen.width-ancho)/2,(screen.height-alto)/2);
  } 
/***************************************************************************************************/  
function verFoto(img,enca){
  ancho=foto1.width;
  alto=foto1.height;
  
  if(cont==1){
            cont=0;
            ventana.close();
            ventana=null;
    } 
  ventana = window.open("ver_foto.php?foto="+img+"&an="+ancho+"&al="+alto+"&tit="+enca,"Imagen","width="+ancho+",height="+alto+",left=190,top=110,scrollbars=no,menubars=no,statusbar=NO,status=NO,resizable=NO,location=NO");
  
   cont++;
  }

/***************************************************************************************************/
function checkLen(Input,countInput,limit){

                  //alert(idd);
		if(Input.value.length <=limit){
			//countInput.value =Input.value.length + ' de ' + limit + ' caracteres';
		         
                         //cambiaTexto(idd);
                         var texto=Input.value.length + ' de ' + limit + ' caracteres';
		         
                         
                         var objetoSPAN = document.getElementById(countInput);
                          if(Input.value.length > 0){
                          objetoSPAN.innerHTML = texto;
                          }else
                          objetoSPAN.innerHTML = "Maximo de caracteres 255.";

                         
                }else{
			Input.value = Input.value.substring(0, limit);
		}
	}	
/**************************************************************************************************/
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

/*===================================================*/
/*function cargarRuta(Input,ruta){	
  Input.value =ruta;
}*/
/**********************************************************************************************/	

 // NOTE: Backspace = 8, Enter = 13, '0' = 48, '9' = 57,46='.', 44=','
var nav4 = window.Event ? true : false;  

function SoloNum(evt){ 
    var key = nav4 ? evt.which : evt.keyCode;
    return (key <= 13 || (key >= 48 && key <= 57)||key==46);
}
function SoloNumEnt(evt){ 
    var key = nav4 ? evt.which : evt.keyCode;
    return (key <= 13 || (key >= 48 && key <= 57));
}
/****************************  SOLO PARA PRUEBAS *********************************************/
function cerrar()
{
	window.close();
}

/*function openWindow(theURL,winName) { //v2.
  var ancho=300;
  var alto=250;
  
  ventana =window.open(theURL,winName,"width="+ancho+",height="+alto+",left=190,top=110,scrollbars=no,menubars=no,statusbar=NO,status=NO,resizable=NO,location=NO");
  
  ventana.moveTo((screen.width - ancho)/2,(screen.height - (alto))/2)//centra la ventana
}*/
/*====================================================================================  */
var i=0; 
var filename="";
var nc=0;

function seleccionar(){
	if(nc==1){
			uncheckall();
			//window.alert("click "+nc);
			nc=0;
		}
	else{
			checkall();
			//window.alert("click "+nc);
			nc++
		};
}

function checkall(swch){
	len=document.frmPrincipal.elements.length;
	for (i=0;i<len;i++){
		if (document.frmPrincipal.elements[i].type=='checkbox'){
			document.frmPrincipal.elements[i].checked=true;
		};
	};
	document.getElementById('bntborrar').disabled = false;
};

function uncheckall(swch){
	len=document.frmPrincipal.elements.length;
	for (i=0;i<len;i++){
		if (document.frmPrincipal.elements[i].type=='checkbox'){
			document.frmPrincipal.elements[i].checked=false;
		};
	};
	document.getElementById('bntborrar').disabled = true;
};

function habilitar(){
	var n=0;
	len=document.frmPrincipal.elements.length;
	for (i=0;i<len;i++){
		if (document.frmPrincipal.elements[i].type=='checkbox' && document.frmPrincipal.elements[i].checked==true){
			n++;
		};
	};
	if (n >=1){//si hay uno o mas
			document.getElementById('bntborrar').disabled = false;
		}else{
			document.getElementById('bntborrar').disabled = true;
			}
};

function adjust_popup()
{
	var w, h, fixedW, fixedH, diffW, diffH;
	if (document.all) {
			fixedW = document.body.clientWidth;
			fixedH = document.body.clientHeight;
			window.resizeTo(fixedW, fixedH);
			diffW = fixedW - document.body.clientWidth;
			diffH = fixedH - document.body.clientHeight;
	} else {
			fixedW = window.innerWidth;
			fixedH = window.innerHeight;
			window.resizeTo(fixedW, fixedH);
			diffW = fixedW - window.innerWidth;
			diffH = fixedH - window.innerHeight;
	}
	w = fixedW + diffW;
	h = fixedH + diffH;
	if (h >= screen.availHeight) w += 16;
	if (w >= screen.availWidth)  h += 16;
	w = Math.min(w,screen.availWidth);
	h = Math.min(h,screen.availHeight);
	window.resizeTo(w,h);
	window.moveTo((screen.availWidth-w)/2, (screen.availHeight-h)/2);
}


/*===========================================================================================*/
var numero = 1; //Esta es una variable de control para mantener nombres
            //diferentes de cada campo creado dinamicamente.
evento = function (evt) { //esta funcion nos devuelve el tipo de evento disparado
   return (!evt) ? event : evt;
}

//Aqui se hace lamagia... jejeje, esta funcion crea dinamicamente los nuevos campos file
addCampo = function () { 
	num = ++numero;
//Creamos un nuevo div para que contenga el nuevo campo
   nDiv = document.createElement('div');
//con esto se establece la clase de la div
   nDiv.className = 'archivo';
//este es el id de la div, aqui la utilidad de la variable numero
//nos permite darle un id unico
   nDiv.id = 'file' + num;
//creamos el input para el formulario:
   nCampo = document.createElement('input');
//le damos un nombre, es importante que lo nombren como vector, pues todos los campos
//compartiran el nombre en un arreglo, asi es mas facil procesar posteriormente con php
   nCampo.name = 'archivos[]';
//Establecemos el tipo de campo
   nCampo.type = 'file';
   nCampo.id = 'foto' + num;
   
   nCampotxt = document.createElement('input');
//le damos un nombre, es importante que lo nombren como vector, pues todos los campos
//compartiran el nombre en un arreglo, asi es mas facil procesar posteriormente con php
   nCampotxt.name = 'descripciones[]';
//Establecemos el tipo de campo
   nCampotxt.type = 'text';
   nCampotxt.id = 'descfoto_e' + num;
   nbr = document.createElement('br');
//Ahora creamos un link para poder eliminar un campo que ya no deseemos
   a = document.createElement('a');
//El link debe tener el mismo nombre de la div padre, para efectos de localizarla y eliminarla
   a.name = nDiv.id;
//Este link no debe ir a ningun lado
   a.href = '#';
//Establecemos que dispare esta funcion en click
   a.onclick = elimCamp;
//Con esto ponemos el texto del link
   a.innerHTML = 'Eliminar';

//Bien es el momento de integrar lo que hemos creado al documento,
//primero usamos la función appendChild para adicionar el campo file nuevo
   nDiv.appendChild(nCampo);
//Adicionamos el Link
   nDiv.appendChild(a);
   
  nDiv.appendChild(nbr);
   
//Adicionamos el campo de texto   
   nDiv.appendChild(nCampotxt);
   
//Ahora si recuerdan, en el html hay una div cuyo id es 'adjuntos', bien
//con esta función obtenemos una referencia a ella para usar de nuevo appendChild
//y adicionar la div que hemos creado, la cual contiene el campo file con su link de eliminación:
   container = document.getElementById('adjuntos');
   container.appendChild(nDiv);
}
//con esta función eliminamos el campo cuyo link de eliminación sea presionado
elimCamp = function (evt){
   evt = evento(evt);
   nCampo = rObj(evt);
   div = document.getElementById(nCampo.name);
   div.parentNode.removeChild(div);
}
//con esta función recuperamos una instancia del objeto que disparo el evento
rObj = function (evt) { 
   return evt.srcElement ?  evt.srcElement : evt.target;
}
//-->