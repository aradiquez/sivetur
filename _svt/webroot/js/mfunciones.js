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
	//funcion="Control('"+img+"')";
	//intervalo=setTimeout(funcion,20);
}
}
function verFoto(img,enca){
  ancho=foto1.width;
  alto=foto1.height;
  ventana = window.open("ver_foto.php?foto="+img+"&an="+ancho+"&al="+alto+"&tit="+enca,"Imagen","width="+ancho+",height="+alto+",left=190,top=110,scrollbars=no,menubars=no,statusbar=NO,status=NO,resizable=NO,location=NO")
  //ventana.moveTo((screen.width - ancho)/2,(screen.height - (alto))/2)//centra la ventana
  }

/***************************************************************************************************/
function checkLen(Input,countInput,limit){

		if(Input.value.length <=limit){
			countInput.value =Input.value.length + ' de ' + limit + ' caracteres';
		}else{
			Input.value = Input.value.substring(0, limit);
		}
	}	
/***************************************************************************************************/
/*quita los blancos al inicio */
function quitaBlancos(Input){	
  while(''+Input.value.charAt(0)==' ')
  {Input.value=Input.value.substring(1,Input.value.length);}
  
}
/***************************************************************************************************/	

 // NOTE: Backspace = 8, Enter = 13, '0' = 48, '9' = 57,46='.', 44=','
var nav4 = window.Event ? true : false;  
function SoloNum(evt){ 
    var key = nav4 ? evt.which : evt.keyCode;
    return (key <= 13 || (key >= 48 && key <= 57)||key==46||key==44);
}

function quitaBlancos(Input){	
  while(''+Input.value.charAt(0)==' ')
  {Input.value=Input.value.substring(1,Input.value.length);}
}