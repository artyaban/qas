<?php
  include('../model/consulta_parte.php'); 
   
  $numparte = $_GET["numparte"];

 $mode_parte = new ModeloConsultaParte();
 $resultado = $mode_parte->consultar_parte($numparte);
 foreach ($resultado as $valor) {
 	//echo $valor["id"];
 	//echo $valor["num_caja"];
 	//echo $valor["num_parte"];
 	$parte=$valor["num_parte"];
 	//echo $valor["fecha"];
 	$fechapart=$valor["fecha"];
 	//echo $valor["hora"];
 	$horaparte=$valor["hora"];
 	//echo $valor["estado"];
 	$estado=$valor["estado"];
  $caja = $valor["num_caja"];
  $serie = $valor["num_serie"];
  $turno = $valor["turno"];
 	//echo "<br>";
 }
 //echo $numparte;
 if(!empty($resultado)){
  echo "<script>
    window.location.href = '../view/resul_pieza.php?part=".$parte."&fech=".$fechapart."&hora=".$horaparte."&edo=".$estado."&box=".$caja."&numserie=".$serie."&turno=".$turno."';
  </script>";
  }else{
  $parte="";
 	$fechapart="";
 	$horaparte="";
 	$estado="";
  $caja = "";
  $serie = "";
  $turno = "";
  	//Error
  	echo "<script>
  	 window.location.href = '../view/resul_pieza.php?part=".$parte."&fech=".$fechapart."&hora=".$horaparte."&edo=".$estado."&box=".$caja."&numserie=".$serie."&turno=".$turno."';
  	</script>";  		  
  }
  //window.location.href = '../view/cons_parte.php';	
  //alert('pieza encontrada')	;
  //alert('pieza no encontrada');
 ?>