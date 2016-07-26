<?php
  include("../session.php");
  include("../model/Partes.php");
  $caja = $_GET["numcaja"];
  $cadenaverif = $_GET["verifica"];
  $estado=$_GET["estado"];
  $serie=$_GET["serie"];

  $superpassword = $_SESSION["superpass"];
  $model_parte = new ModeloPartes();

  //obtenemos la fecha:
  $dia = date("d");
  $mes = date("m");
  $anio = date("Y");
  $fecha = $anio."/".$mes."/".$dia;

  $piezasok = $model_parte->obtenerpiezasok($caja,$serie);
  $piezasng = $model_parte->obtenerpiezasng($caja,$serie);
  $piezaserror = $model_parte->obtenerpiezaserror($caja,$serie);
  //numcaja
  $totok=$model_parte->obtenertotalok($caja,$serie);
  $totng=$model_parte->obtenertotalng($caja,$serie);
  $toterror=$model_parte->obtenertotalerror($caja,$serie);
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="../css/bootstrap.min.css" rel="stylesheet">
<title>MEXQ</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="../style.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src='../js/howler.js'></script>
<script type='text/javascript' src='../js/howler.min.js'></script>
<script>
  function validacion(){
    var pass = prompt("Ingresa la contraseña de Administrador:");

    var superpass = document.getElementById("superpass").value;
    
    if(pass == superpass){
      return true;
    }else{
      alert("Contraseña equivocada...");
      return false;
    }
  }

  function validacaracteres(){
    var parte = document.getElementById("numparte").value;
    if(parte.length == 14){
      return true;
    }else{
      playsound();
      return false;
    }
  }

 function playsound(){
  var sound = new Howl({
    urls: ['../sounds/warning.wav'],
    autoplay: true,
    volume: 1,
    onplay: function ok(){ 
              var cadena = 'OK';
              var parte = document.getElementById("numparte").value;
              var pass = prompt('El numero de parte '+parte+' no debe contener menos de 14 caracteres, ESCRIBE \"OK\" CUANDO TE HAYAS ENTERADO:');
              if(pass == cadena){
                document.getElementById("numparte").value = "";
                return false;       
              }else{
                ok();
              }
            }
    });
  }
</script>
</head>
<body>
<div class="main">
  <div class="header_resize">
    <div class="header">
      <div class="logo"><a href="#"><img src="../images/logoqas.png" width="338" height="70" border="0" alt="" /></a></div>
      <div class="menu">
        <ul>
          <li><a href="index_home.php" ><span>Inicio</span></a></li>
          <li><a href="add_box.php" class="active"><span>Registro </span></a></li>
          <li><a href="cons_parte.php"><span> Consulta </span></a></li>
          
        </ul>
      </div>
      <div class="clr"></div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="clr"></div>
  <div class="header_blog2">
    <div class="header">
      <h2  widht="500">Registro de piezas</h2>
      <p>QAS MEXICO le da la bienvenida al registro de cajas</p>
    </div>
    <div class="clr"></div>
  </div>
  <div class="clr"></div>
  <div class="body">
<div class="right">
    <p> Generar Reporte: </p>
    <form action="../controller/ReporteCajas.php" method="GET">
      <input type="hidden" name="numcaja" value="<?php echo $caja ?>">
      <input type="hidden" name="numserie" value="<?php echo $serie ?>">
      <input type="submit" value="Reporte">
    </form>

    <input type="hidden" id="superpass" value="<?php echo $superpassword ?>">
    <p> Modificar info de alguna pieza: </p>
    <form action="modificar.php" method="get">
      <input type="hidden" name="verifica" value="<?php echo $cadenaverif ?>">
      <input type="hidden" name="numcaja" value="<?php echo $caja ?>">
      <input type="hidden" name="fecha" value="<?php echo $fecha ?>">
      <input type="hidden" name="estado" value="<?php echo $estado ?>">
      <input type="hidden" name="numserie" value="<?php echo $serie ?>">
      <input type="submit" value="Modificar" onClick="return validacion();">
    </form>

</div>

    <div class="body_resize">
      <div class="left" height="300">
        
<form action="../controller/Ingresa_Parte.php" method="get" onsubmit="return validacaracteres();">
    <span id="dummy">
          <table border="0">
              <tr><td><label for="name">Numero de parte <span class="red">*</span></label></td>
              <td><input id="numparte" name="numparte" class="text" maxlength="14" autofocus/></td></tr>
            <tr><td>
			  <tr><td><input type="radio" name="status" value="1" <?php if($estado==1){echo "checked";}?>>OK</td></tr>
			  <tr><td><input type="radio" name="status" value="2" <?php if($estado==2){echo "checked";}?>>NG</td></tr>
			</table>
			<input type="hidden" name="verifica" value="<?php echo $cadenaverif ?>">
			<input type="hidden" name="numcaja" value="<?php echo $caja ?>">
      <input type="hidden" name="numserie" value="<?php echo $serie ?>">

    </span>

			<!--
            <li class="buttons">
              <input type="image" src="../images/send.gif" class="send" />
              <div class="clr"></div>
            </li>-->
          
</form>
      </div>
      <div class="right" height="300">
      <table >
      <tr><td><label> Total piezas </label></td>
      </tr>
      <tr><td>
      <label>  OK : </label></td><td> <input type="text"  class="text" readonly size="4"value="<?php echo $totok?>"></td>
      </tr>
      <tr><td>
      <label>  NG : </label></td><td><input type="text" class="text" readonly size="4" value="<?php echo $totng?>">
      </td></tr>
      <tr><td>
      <label>  ERROR : </label></td><td> <input type="text" class="text" readonly size="4" value="<?php echo $toterror?>"></td></tr>
      </table>

<?php
  //echo "<script> alert('ok :".$totok." ng :".$totng."error :".$toterror."');</script>" ;
?>
      </div>
      <div class="clr"></div>
    </div>
  </div>

  <div class="clr"></div>
  <div class="body_bottom">
    <div class="body_bottom_resize">
      <div class="block"> <img src="../images/OK.png" alt="" width="49" height="49" />
        <h2>OK<br />
          <span>Piezas en buen estado </span> </h2>
        <div class="bg"></div>
        <p>
          <?php
            if(!empty($piezasok)){
              foreach($piezasok as $data){
                echo $data["num_lista"].".- ".$data["num_parte"];
                echo "<br>";
              }
            }else{
              echo "-";
            }
          ?>
         <br />
        </p>
      </div>
      <div class="block"> <img src="../images/NG.png" alt="" width="49" height="49" />
        <h2>NG<br />
          <span>Piezas "No Good"</span></h2>
        <div class="bg"></div>
        <p><?php
            if(!empty($piezasng)){
              foreach($piezasng as $data){
                echo $data["num_lista"].".- ".$data["num_parte"];
                echo "<br>";
              }
            }else{
              echo "-";
            }
          ?><br />
        </p>
      </div>
      <div class="block"> <img src="../images/Error.png" alt="" width="49" height="49" />
        <h2>Error<br />
          <span>Piezas que no pertenecen a la caja</span></h2>
        <div class="bg"></div>
        <p><?php
            if(!empty($piezaserror)){
              foreach($piezaserror as $data){
                echo $data["num_lista"].".- ".$data["num_parte"];
                echo "<br>";
              }
            }else{
              echo "-";
            }
          ?><br />
        </p>
       </div>
      <div class="clr"></div>
    </div>
   <div class="clr"></div>
  </div>
  <div class="footer">
    <div class="footer_resize">
      <p class="leftt">© Copyright QAS México<br /></p>
    </div>
    <div class="clr"></div>
  </div>
</div>
</html>
