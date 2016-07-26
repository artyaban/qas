<?php
  include('../model/Usuarios.php'); 
  $mode_usr = new  ModeloAutentificaUsuario();

  $usuario = $_GET["usrname"];
  $password = $_GET["ctr"];

  $sesion = $mode_usr->valida($usuario,$password);

  if(!empty($sesion)){
  	//Entras
  	session_start();
  	foreach($sesion as $data){
  		$_SESSION["nombre"] = $data["nombre"];
  	}

    $_SESSION["superpass"] = "MEXQ_AGUASCALIENTES";

  	echo "<script>
  			window.location.href = '../view/index_home.php';
  		  </script>";
  }else{
  	//Error
  	echo "<script>
  			alert('Usuario o contrasenia incorrecto');
  			window.location.href = '../index.php';
  		  </script>";
  }

?>