<?php
  include('../model/ModelReporte.php'); 
  $mode_usr = new  ModelReporte();

  $caja = $_GET["numcaja"];
  $serie = $_GET["numserie"];

  $mode_usr->crearpdfcajas($caja,$serie);

  
?>