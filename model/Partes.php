<?php
include('medoo.min.php');
/*Sintaxis de la Base de Datos
- Select : $this->base_datos->select("table" , "campos" , "where" ["campo" [restriccion] => "valor"]); Where opcional
- Insert : $this->base_datos->insert("table" , ["campo1" => "valor1", "campo2" => "valor2"]); 
- Delete : $this->base_datos->delete("table" , ["campo[condicion]" => "valor"]);
- Update : $this->base_datos->update("table" , ["campo1" => "valor1", "campo2" => "valor2"], ["campo[condicion]" => "valor"]);*/

class ModeloPartes{
	var $base_datos; //Variable para hacer la conexion a la base de datos
	var $resultado_datos; //Variable para traer resultados de una consulta a la BD

	function ModeloPartes() { //Constructor de la clase del modelo
		$this->base_datos = new medoo();
	}

//Conseguir el ultimo numero del registro
	function buscarMax($caja,$serie){
		$resultado_datos=$this->base_datos->max("parte", "num_lista", ["AND" => ["num_caja" => $caja,"num_serie" => $serie]]);
		return $resultado_datos;
	}
//Agregar nueva pieza
	function agregar_parte($caja,$estado,$parte,$fecha,$tiempo,$variableMaxima,$serie,$turno){
		$this->base_datos->insert("parte",[
			"num_caja" => $caja,
			"num_parte" => $parte,
			"fecha" => $fecha,
			"hora" => $tiempo,
			"estado" => $estado,
			"num_lista"=>$variableMaxima,
			"num_serie"=>$serie,
			"turno"=>$turno
			]);
	}

//Elimina la parte seleccionada
	function elimina_parte($id){
		$this->base_datos->delete("parte" , ["id[=]" => $id]);
	}

//Verificar la existencia de la parte en la caja
	function verificaExistencia($parte,$caja,$serie){
		$resultado =$this->base_datos->select("parte","*",["AND"=>["num_caja"=>$caja,"num_parte" => $parte,"num_serie" => $serie]]);
		return $resultado;
	}

//para contabilizar los totales de piezas de la caja que se esta registrando
	function obtenertotalok($caja,$serie){
		$resultado_datos = $this->base_datos->count("parte", ["AND"=>["num_caja"=>$caja, "estado" => 1,"num_serie" => $serie]]);		
		return $resultado_datos;
	}
	function obtenertotalng($caja,$serie){
		$resultado_datos = $this->base_datos->count("parte", ["AND"=>["num_caja"=>$caja, "estado" => 2,"num_serie" => $serie]]);		
		return $resultado_datos;
	}
	function obtenertotalerror($caja,$serie){
		$resultado_datos = $this->base_datos->count("parte", ["AND"=>["num_caja"=>$caja, "estado" => 0,"num_serie" => $serie]]);		
		return $resultado_datos;
	}

//para obtener las piezas registradas de la caja

	function obtenerpiezasok($caja,$serie){
		$resultado_datos = $this->base_datos->select("parte","*", ["AND"=>["num_caja"=>$caja, "estado" => 1,"num_serie" => $serie]]);		
		return $resultado_datos;
	}

  	function obtenerpiezasng($caja,$serie){
  		$resultado_datos = $this->base_datos->select("parte","*", ["AND"=>["num_caja"=>$caja, "estado" => 2,"num_serie" => $serie]]);		
		return $resultado_datos;
  	}

  	function obtenerpiezaserror($caja,$serie){
  		$resultado_datos = $this->base_datos->select("parte","*", ["AND"=>["num_caja"=>$caja, "estado" => 0,"num_serie" => $serie]]);		
		return $resultado_datos;
  	}
 //====================== Modificar ===============================
//para llenar el select de modificacion
	function obtenertotal($caja,$serie){
		$resultado_datos = $this->base_datos->select("parte", "*",["AND"=>["num_caja"=>$caja,"num_serie" => $serie] ,"ORDER"=>["num_lista ASC"]]);		
		return $resultado_datos;
	}
//Query para modificar el estado de la parte
  	function modifica_parte($id,$status){
  		$this->base_datos->update("parte",[
			"estado" => $status
			],["id" => $id]);
  	}
}	


?>