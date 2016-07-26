<?php
  include('../model/Partes.php'); 
  $mode_usr = new  ModeloPartes();

  $id = $_GET["pieza"];
  $parte = $_GET["parte"];
  $caja = $_GET["numcaja"];
  $verify = $_GET["verifica"];
  $estado = $_GET["estado"];
  $serie = $_GET["serie"];

  $mode_usr->elimina_parte($id);

  echo "<script>
        alert('La pieza ".$parte." fue eliminada');
        window.location.href = '../view/reg_pieza.php?verifica=".$verify."&numcaja=".$caja."&estado=".$estado."&serie=".$serie."';
        </script>";

?>