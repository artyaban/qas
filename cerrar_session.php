<?php
	include("session.php");

	session_destroy();	
	echo "<script>
  			alert('Adios!!! ');
  			window.location.href = 'index.php';
  		  </script>";
?>