<?php
  include("../session.php");
  include("../model/Partes.php");
  $caja = $_GET["numcaja"];
  $cadenaverif = $_GET["verifica"];
  $fecha = $_GET["fecha"];
  $estado = $_GET["estado"];
  $serie = $_GET["numserie"];
  //$estado=$_GET["estado"];
  $model_parte = new ModeloPartes();

  $piezas = $model_parte->obtenertotal($caja,$serie);
 // $piezasok = $model_parte->obtenerpiezasok($caja);
  //$piezasng = $model_parte->obtenerpiezasng($caja);
  //$piezaserror = $model_parte->obtenerpiezaserror($caja);
  //numcaja
  //$totok=$model_parte->obtenertotalok($caja);
  //$totng=$model_parte->obtenertotalng($caja);
  //$toterror=$model_parte->obtenertotalerror($caja);
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>MEXQ</title>

<link href="../css/bootstrap.min.css" rel="stylesheet">

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="../style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="main">


<header>
<div class="col-md-12" style="text-align:center; background-color:#fff;box-shadow: 3px 3px 3px #aaa;">
<p> <br></p>
<img src="../images/logo.png">
<h4 style="color:#052467;"><em><u>"Piensa en calidad , Piensa MEXQ"</u></em></h4>
<p> <br></p>
</div>
</header>




<ul class="list-inline" style=" margin:20px; z-index: 3; right:0; position:absolute;">
          <li><h4><a href="index_home.php" style="color:#052467;" >Inicio |</a></h3></li>
          <li><h4><a href="add_box.php" style="color:#052467;">Registro | </a></h3></li>
          <li><h4><a href="cons_parte.php" style="color:#052467;">Consulta | </a></h3></li>
</ul>




  <div class="col-md-12">
    <div class="header">
      <h2  widht="500">Registro de piezas</h2>
      <p></p>
    </div>
    <div class="clr"></div>
  </div>
  <div class="clr"></div>
  <div class="body">
    <div class="body_resize">
      <div class="left" height="300">
        <!-- ======================= Modificar NG o OK =========================== -->
        <p> Modificar Estado de una pieza </p>
        <form action="../controller/Modifica_Parte.php" method="get" >
          <table border="0">
            <tr><td>
                <SELECT name="pieza" id="pieza">
                  <?php 
                    foreach($piezas as $datos){
                          $parte = $datos["num_parte"];
                          echo "<option value= ".$datos["id"].">".$datos["num_lista"].".- ".$datos["num_parte"]."</option>";
                  }?>
                </select>
                <hr>
            </td></tr>
  			    <tr><td><input type="radio" name="status" value="1" checked="">OK</td></tr><br>
  			    <tr><td><input type="radio" name="status" value="2" >NG</td></tr>
    			</table>
    			<input type="hidden" name="verifica" value="<?php echo $cadenaverif ?>">
    			<input type="hidden" name="numcaja" value="<?php echo $caja ?>">
          <input type="hidden" name="estado" value="<?php echo $estado ?>">
          <input type="hidden" name="serie" value="<?php echo $serie ?>">
          <input type="hidden" name="parte" value="<?php echo $parte ?>">
          <br>
          <button type="submit" class='btn btn-warning' value="Modificar">Modificar</button>
        </form>
        <!-- ======================= Eliminar pieza =========================== -->
        <br>
        <p> Eliminar una pieza 
          <br>
          Selecciona la pieza a eliminar! <font color="red"><b>[Esta accion no se puede deshacer!!]</b></font></p>
        <form action="../controller/Elimina_Parte.php" method="get" >
          <table border="0">
            <tr><td>
                <SELECT name="pieza" id="pieza">
                  <?php 
                    foreach($piezas as $datos){
                          $parte = $datos["num_parte"];
                          echo "<option value= ".$datos["id"].">".$datos["num_lista"].".- ".$datos["num_parte"]."</option>";
                  }?>
                </select>
            </td></tr>
          </table>
          <input type="hidden" name="verifica" value="<?php echo $cadenaverif ?>">
          <input type="hidden" name="numcaja" value="<?php echo $caja ?>">
          <input type="hidden" name="estado" value="<?php echo $estado ?>">
          <input type="hidden" name="serie" value="<?php echo $serie ?>">
          <input type="hidden" name="parte" value="<?php echo $parte ?>"><br>
         <button type="submit" class='btn btn-danger' value="Modificar">Eliminar</button>
        </form>
        <div class="clr"></div>
    </div>
  







<footer>
&nbsp;<br>
<div class="col-md-3"></div>
<div class='col-md-6'  ">
 <img src="../images/footer.png">
</div>
<div class="col-md-3">
</div>
</footer>





</html>
