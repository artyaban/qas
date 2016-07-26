<?php
include('medoo.min.php');
/*Sintaxis de la Base de Datos
- Select : $this->base_datos->select("table" , "campos" , "where" ["campo" [restriccion] => "valor"]); Where opcional
- Insert : $this->base_datos->insert("table" , ["campo1" => "valor1", "campo2" => "valor2"]); 
- Delete : $this->base_datos->delete("table" , ["campo[condicion]" => "valor"]);
- Update : $this->base_datos->update("table" , ["campo1" => "valor1", "campo2" => "valor2"], ["campo[condicion]" => "valor"]);*/
class ModeloAutentificaUsuario{
	var $base_datos; //Variable para hacer la conexion a la base de datos
	var $resultado_datos; //Variable para traer resultados de una consulta a la BD

	function ModeloAutentificaUsuario() { //Constructor de la clase del modelo
		$this->base_datos = new medoo();
	}

	function valida($usrname,$password){
		$resultado_datos = $this->base_datos->select("usuarios","*", ["AND"=>["nom_usuario"=>$usrname , "contrasena" => $password]]);		
		return $resultado_datos;

	}
}

?>