<?php
  include('../model/Partes.php'); 
  $mode_usr = new  ModeloPartes();

  $id = $_GET["pieza"];
  $parte = $_GET["parte"];
  $status = $_GET["status"];
  $caja = $_GET["numcaja"];
  $verify = $_GET["verifica"];
  $estado = $_GET["estado"];
  $serie = $_GET["serie"];

  $mode_usr->modifica_parte($id,$status);

  echo "<script>
        alert('La pieza ".$parte." fue modificada al estado: ".$status."');
        window.location.href = '../view/reg_pieza.php?verifica=".$verify."&numcaja=".$caja."&estado=".$estado."&serie=".$serie."';
        </script>";

?>