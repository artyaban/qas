<?php
  include("../session.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<link href="../css/bootstrap.min.css" rel="stylesheet">

<title>MEXQ</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="../style.css" rel="stylesheet" type="text/css" />


</head>


<body style="background-color:#fff;">

<div style="margin:30px;">



<ul class="list-inline" style=" margin:20px; z-index: 3; right:0; position:absolute;">
          <li><h4><a href="index_home.php" style="color:#052467;" >Inicio |</a></h3></li>
          <li><h4><a href="add_box.php" style="color:#052467;">Registro | </a></h3></li>
          <li><h4><a href="cons_parte.php" style="color:#052467;">Consulta | </a></h3></li>
</ul>


<div class="logo"><a href="#"><img src="../images/logo.png"  border="0" alt=""  style="position:absolute;" /></a></div>
<br><br>
<h4 style="color:#052467;"><em><u>"Piensa en calidad , Piensa MEXQ"</u></em></h4>

  
</div>

<div class="col-md-4">
      <img src="../images/banner1.jpg" style="width:100%;">
</div>
<div class="col-md-4">
      <img src="../images/banner2.jpg" style="width:100%;">
</div>
<div class="col-md-4">
      <img src="../images/banner3.jpg" style="width:100%;">
</div>

  
    
  </div>








  
  <div class="col-md-12">

  <div class="col-md-4">
 
   <h2>Consultar Parte<br /></h2>
    
   <p>Ingrese a esta opción para consultar la información de una pieza </p>
  <a href="cons_parte.php" class="btn btn-success">Consultar</a>

  
  </div>


  <div class="col-md-4">
  <h2>Registrar Caja<br />


          <!--<span>Sed congue, dui vel tristique mollis... </span>--></h2>
      
        <p>Ingrese a esta opción para registrar una caja y sus partes</p>
        <a href="add_box.php" class="btn btn-success">Registrar</a>
    
</div>

  <div class="col-md-4">


      <br>
      
        <h2>Cerrar Sesion<br />
          <!--<span>Sed congue, dui vel tristique mollis... </span>--> </h2>
        <a href="../cerrar_session.php" class="btn btn-danger">Cerrar Sesión</a>
  </div>

</div>
 

<footer>
&nbsp;<br>
<br><br>
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

