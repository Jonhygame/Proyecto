
<!-- saved from url=(0069)https://tigger.itc.mx/conacad/cargas/GUVF681004UW4/46/capasMouse.html -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<script type="text/javascript">
function carga()
{ 
	posicion=0; elMovimiento=null;
}

function evitaEventos(event)
{
	// Funcion que evita que se ejecuten eventos adicionales
	if(navegador==1) event.preventDefault();
}

function comienzoMovimiento(event, id)
{ 
	elMovimiento=document.getElementById(id);
		cursorComienzoX=event.clientX+window.scrollX;
		cursorComienzoY=event.clientY+window.scrollY;
		document.addEventListener("mousemove", enMovimiento, true); 
		document.addEventListener("mouseup", finMovimiento, true);
	
	elComienzoX=parseInt(elMovimiento.style.left);
	elComienzoY=parseInt(elMovimiento.style.top);
	// Actualizo el posicion del elemento
	elMovimiento.style.zIndex=++posicion;
	evitaEventos(event);
}

function enMovimiento(event)
{  
	var xActual, yActual;
		xActual=event.clientX+window.scrollX;
		yActual=event.clientY+window.scrollY;
	
	elMovimiento.style.left=(elComienzoX+xActual-cursorComienzoX)+"px";
	elMovimiento.style.top=(elComienzoY+yActual-cursorComienzoY)+"px";
	evitaEventos(event);
}

function finMovimiento(event)
{
		document.removeEventListener("mousemove", enMovimiento, true);
		document.removeEventListener("mouseup", finMovimiento, true); 
}
</script>
</head>
<body onload="carga();">


<?
$letras_permitidas = "CDPT";
$i=1;
	for ($i = 1; $i <= 15; $i++) {
		$a = rand(1,9);
		echo'<div id="div'.$i.'" style="top: 200px; left: '.(180+$i*80).'px; width: 112px; height: 158px; position: absolute; background-color: black; cursor: move; " onmousedown="comienzoMovimiento(event, this.id);" onmouseover="this.style.cursor=&#39;move&#39;">
		<img src="'.$a.substr(str_shuffle($letras_permitidas),0,1).'.jpg">
		<input type="checkbox"/>
		</div>';
	}
?>

<input name="enviar" id="enviar" type="button" value="Enviar" onclick="alert(&#39;hay!&#39;)">

</body></html>