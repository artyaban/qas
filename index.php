<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>MEXQ</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/jquery.cycle.all.min.js"></script>

<link href="../css/bootstrap.min.css" rel="stylesheet">

<script type="text/javascript">
$(document).ready(function(){
    $('#slideshow').cycle({
        fx:     'fade',
        speed:  'slow',
        timeout: 5000,
        pager:  '#slider_nav',
        pagerAnchorBuilder: function(idx, slide) {
            // return sel string for existing anchor
            return '#slider_nav li:eq(' + (idx) + ') a';
        }
    });
});



function pagina()
{
 document.getElementById('ayuda').style.display = '';
  document.getElementById('todo').style.display = 'none';

}

function cerrar()
{
 document.getElementById('ayuda').style.display = 'none';
   document.getElementById('todo').style.display = ''; 
}


</script>

</head>


<body style="background-color: #fff;">


<header>
<div class="col-md-12" style="text-align:center; background-color:#fff;box-shadow: 3px 3px 3px #aaa;">
<p> <br></p>
<img src="images/logo.png">
<h4 style="color:#052467;"><em><u>"Piensa en calidad , Piensa MEXQ"</u></em></h4>
<p> <br></p>
</div>
</header>


<div id='ayuda' style="display:none;">

<div class="col-md-12" style="margin:30px; border:solid green 4px;">
<h3 align="center">AYUDA</h3><hr>

<h4>1.- Ingresa tu contraseña en la pagina de inicio. <br><br>Si no recuerdas tu usuario y contraseña es : <br>

nombre de usuario : primerturno <br>contraseña : CKpiva01<br>
<br><hr>
2.- Ingresa la opción que requieras .<br>
<br>
<ul>
<li>Consultar Parte.</li>
<li>Registrar Parte.</li>
<li>Cerrar Sesión</li>
</ul>
<br><hr>
3.- Consultar Parte.<br><br>
Consultar Parte Especifica.<br><br>
Ingresa el número de parte a consultar y da clic en consultar<br>
Los detalles se muestran a detalle da clic en Reporte para generar el reporte<br>
El reporte se guardara en formato PDF<br>

<br>Consultar Caja Especifica.<br><br>

Ingresa el número de parte de la caja<br>
Ingresa el número de serie de la caja<br>
Da clic en el botón Consultar <br>
Se mostraran los detalles de la caja registrada<br>
Genera el reporte el cual se guardara en formato PDF<br><br>
<hr>
4.-Registrar Caja<br><br>
Cierra el Mensaje (REVISALO BIEN).<br>
Escanea el código de la caja es el primer código de barras de la caja <br>
Escanee el número de Serie de la caja es el código de barras en la parte de abajo de la etiqueta del lado izquierdo<br>
Da clic en el botón<br>
<br><br>
Elije OK o NG de la pieza.<br>
Escanea el código de barras de la pieza<br>
Puedes generar el reporte de la caja.<br>
Revisa que las piezas pertenezcan a la caja si no pertenece a la caja retírala y escribe ok en el cuadro que aparecerá.<br>
Al ser 160 pieza OK en la caja la caja estará llena y no se pueden registrar mas piezas para esa caja<br><br> 
<hr>5.-Cerrar Sesión<br><br>
Al terminar Cierra Sesión para regresar a la pagina donde deberás de poner tu contraseña para volver a ingresar.<br><br>
</h4>

<hr><button class="btn btn-success btn-lg" onclick='cerrar();'>CERRAR</button><hr>
</div>


</div>

<div id='todo'>

<div class="col-md-3"></div>


<div class="col-md-6" style="align:center;"> 
      <hr><br>
        <form action="controller/IngresoUsuario.php" method='get'><!--controller/IngresoUsuario.php-->
        <label class="col-md-4" style="color:#052467;">Usuario: <input type="text" class="form-control"  name="usrname"display="line" aling="left"> </label>
         <label class="col-md-4" style="color:#052467;">Contraseña:  <br> <input type="password" class="form-control"  name="ctr" display="line" aling="left"> </label>
         <br>
        <button type="submit" class='btn btn-success' > Aceptar</button>
        </form>
      <br>  <br>  
</div>

<div class="col-md-3"></div>




<div class="col-md-12" align='center'>
<button class="btn btn-primary btn-lg" onclick="pagina();"> AYUDA</button>
 </div>


</div>


<footer>
<div class="col-md-12">
&nbsp;<br>
<div class="col-md-3"></div>
<div class='col-md-6'  ">
 <img src="../images/footer.png">
</div>
<div class="col-md-3">
</div>


</div>
</footer>


</body>
</html>

