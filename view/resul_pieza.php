<?php
  include("../session.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>MEXQ</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="../style.css" rel="stylesheet" type="text/css" />

<link href="../css/bootstrap.min.css" rel="stylesheet">


<?php
 //$numparte = $_GET["numparte"];
$parte=$_GET["part"];
$fecha=$_GET["fech"];
$hora=$_GET["hora"];
$estado=$_GET["edo"];
$caja=$_GET["box"];
$turno=$_GET["turno"];
$serie = $_GET["numserie"];
?>
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


  
      <h2>Parte: <?php echo $parte ?></h2>


    </div>
    <div class="clr"></div>
    
  </div>
  <div class="clr"></div>
  <?php
    if($fecha==""){
          echo "<h2 align='center'> PIEZA NO ENCONTRADA <h2>";
    }

    ?>
  <div class="body">
    <div class="right">

    <form action="../controller/ReporteConsulta.php" method="GET">
      <input type="hidden" name="numparte" value="<?php echo $parte ?>">
      <button type="submit" class="btn btn-success">Generar Reporte </button>
    </form>
</div>
    <div class="body_resize">
      <div class="left">
        <h2>Fecha: </h2>
        <p><?php echo $fecha; ?></p>
        <h2>Hora:</h2>
        <p><?php echo $hora;?></p>
        <h2>Turno:</h2>
        <p><?php 
        if(!empty($turno)){
          if($turno == 1){
            echo "Primer Turno";
          }else if($turno == 3){
            echo"Tercer Turno";
          }
        }else{
          echo "Sin Turno...";
        }
        ?>
        <h2>Estado:</h2>
        <p><?php 
        if(!empty($estado)){
          if($estado == 1){
            echo "OK";
          }else if($estado == 2){
            echo"NG";
          }
        }else{
          echo "Error por codigo";
        }
        //echo $estado;
        ?></p>
        <h2>Numero de Caja: </h2>
        <p><?php echo $caja; ?></p>
        <h2>Numero de Serie: </h2>
        <p><?php echo $serie; ?></p>
      <div class="clr"></div>
    </div>
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
</body>
</html>
