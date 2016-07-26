<?php
	session_start();

	if(!empty($_SESSION["nombre"])){

	}else{
		echo "<script>
  			alert('Inicia sesion porfavor');
  			window.location.href = '/qas/index.php';
  		  </script>";
	}
?>