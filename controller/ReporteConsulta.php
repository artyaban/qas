<?php
  include('../model/ModelReporte.php'); 
  $mode_usr = new  ModelReporte();

  $parte = $_GET["numparte"];

  $mode_usr->crearpdfconsulta($parte);

?>