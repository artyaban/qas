<?php
  include("../session.php");
  include("../model/Partes.php");
  $caja = $_GET["numcaja"];
  $serie=$_GET["numserie"];
  $estado = "";

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
<title>MEXQ</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="../style.css" rel="stylesheet" type="text/css" />
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
</script>

<link href="../css/bootstrap.min.css" rel="stylesheet">
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
    <hr>
      <h4  widht="500"><br>Consulta de Numero de parte (Caja completa): <br><br> Numero de parte (Caja): <?php echo $caja ?><br> <br> Numero de serie (Caja): <?php echo $serie ?></h4>
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
      <button type="submit"  class='btn btn-success' value="Reporte">Reporte</button>
    </form>
    <br>
    <input type="hidden" id="superpass" value="<?php echo $superpassword ?>">
    <p> Regresar a la pantalla anterior </p>
    <form action="cons_parte.php" method="get">
     <button type="submit"  class='btn btn-danger' value="Reporte">Regresar</button>
    </form>

</div>

    <div class="body_resize">
      <div class="left" height="300">
      <table >
      <tr><td><label> Total piezas </label></td>
      </tr>
      <tr><td>
      <label>  OK : </label></td><td> <input type="text"  class="text" readonly size="4" value="<?php echo $totok?>"></td>
      </tr>
      <tr><td>
      <label>  NG : </label></td><td><input type="text" class="text" readonly size="4" value="<?php echo $totng?>">
      </td></tr>
      <tr><td>
      <label>  ERROR : </label></td><td> <input type="text" class="text" readonly size="4" value="<?php echo $toterror?>"></td></tr>
      </table>
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
 



<footer>
&nbsp;<br>
<div class="col-md-3"></div>
<div class='col-md-6'  ">
 <img src="../images/footer.png">
</div>
<div class="col-md-3">
</div>
</footer>



</div>
</html>
