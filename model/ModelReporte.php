<?php
include('medoo.min.php');
include('mpdf60/mpdf.php');
/*Sintaxis de la Base de Datos
- Select : $this->base_datos->select("table" , "campos" , "where" ["campo" [restriccion] => "valor"]); Where opcional
- Insert : $this->base_datos->insert("table" , ["campo1" => "valor1", "campo2" => "valor2"]); 
- Delete : $this->base_datos->delete("table" , ["campo[condicion]" => "valor"]);
- Update : $this->base_datos->update("table" , ["campo1" => "valor1", "campo2" => "valor2"], ["campo[condicion]" => "valor"]);*/
class ModelReporte{
	var $base_datos; //Variable para hacer la conexion a la base de datos
	var $resultado_datos; //Variable para traer resultados de una consulta a la BD

	function ModelReporte() { //Constructor de la clase del modelo
		$this->base_datos = new medoo();
	}

	function crearpdfcajas($caja,$num_serie){

		$month = ["1" => "Enero","2" => "Febrero","3" => "Marzo","4" => "Abril","5" => "Mayo","6" => "Junio","7" => "Julio","8" => "Agosto","9" => "Septiembre","10" => "Octubre","11" => "Noviembre","12" => "Diciembre"];
		$dia = date("d");
		$mes = date("m");
    $mont = $mes - 1;
    $mes = $mont + 1;
		$anio = date("Y");
		$fecha = $anio."-".$mes."-".$dia;
		/*Obtenemos las piezas por fecha
		$ok = $this->base_datos->select("parte","*", ["AND"=>["num_caja"=>$caja, "estado" => 1,"fecha" => $fecha]]);
  	$ng = $this->base_datos->select("parte","*", ["AND"=>["num_caja"=>$caja, "estado" => 2,"fecha" => $fecha]]);
  	$err = $this->base_datos->select("parte","*", ["AND"=>["num_caja"=>$caja, "estado" => 0,"fecha" => $fecha]]);

		//totalpiezasok
		$totalok = $this->base_datos->count("parte", ["AND"=>["num_caja"=>$caja, "estado" => 1,"fecha" => $fecha]]);	
		//totalpiezasng
		$totalng = $this->base_datos->count("parte", ["AND"=>["num_caja"=>$caja, "estado" => 2,"fecha" => $fecha]]);
		//totalpiezaserror
		$totalerror = $this->base_datos->count("parte", ["AND"=>["num_caja"=>$caja, "estado" => 0,"fecha" => $fecha]]);*/

    //Obtenemos las piezas
    $ok = $this->base_datos->select("parte","*", ["AND"=>["num_caja"=>$caja, "estado" => 1,"num_serie" => $num_serie]]);
    $ng = $this->base_datos->select("parte","*", ["AND"=>["num_caja"=>$caja, "estado" => 2,"num_serie" => $num_serie]]);
    $err = $this->base_datos->select("parte","*", ["AND"=>["num_caja"=>$caja, "estado" => 0,"num_serie" => $num_serie]]);

    //totalpiezasok
    $totalok = $this->base_datos->count("parte", ["AND"=>["num_caja"=>$caja, "estado" => 1,"num_serie" => $num_serie]]);  
    //totalpiezasng
    $totalng = $this->base_datos->count("parte", ["AND"=>["num_caja"=>$caja, "estado" => 2,"num_serie" => $num_serie]]);
    //totalpiezaserror
    $totalerror = $this->base_datos->count("parte", ["AND"=>["num_caja"=>$caja, "estado" => 0,"num_serie" => $num_serie]]);

    //Nombre del archivo
    $filename = "R_".$caja."_".$fecha.".pdf";


		$mpdf = new mPDF();

		$html = '<div style="text-align: left; font-weight: bold;">
							  <table border="0" style="width:100%"> 
  							  <tr>
                    <td><img src="../images/logo.png"/></td>
  							    <td style="text-align: center; font-weight: bold;" width = "500">
                      <p>Servicios de Aseguramiento de Calidad Muñing S.C</p>
                      <p>Fecha de creación: '.$dia.' de '.$month[$mes].' del '.$anio.' </p>
                      <p> <font color="red"> Numero de Parte (Caja): '.$caja.' </font></p>
                      <p> <font color="Gray"> Numero de Serie (Caja): '.$num_serie.' </font></p>
                    </td>
  							  </tr>
							  </table>
							  <br>
							  <table border="0">
							  <tr><th><font size="2">Total OK: </font></th><td><font size="2">'.$totalok.'</font></td><td>|</td><th><font size="2">Total NG: </font></th><td><font size="2">'.$totalng.'</font></td><td>|</td><th><font size="2">Total Error: </font></th><td><font size="2">'.$totalerror.'</font></td></tr>
							  </table>
							  <table border="0">
							  <tr><td><p><font >En este PDF se muestran los resultados de la inspeccion de la caja mencionada anteriormente</p></td></tr>
							  </table>
							  <br>

							  </div>'; 

		$html = $html.'<br> Piezas OK:
				<table border="1" style="width:100%;">
                <tr>
                   <th> Pieza </th>
                   <th> Num_Parte-(Caja)</th>
                   <th> Num_Parte-(Pieza)</th>                   
                   <th> Num_Lote </th>
                   <th> Fecha </th>
                   <th> Hora </th>
                   <th> Turno </th>
                   <th> Estado </th>
               </tr>';
               foreach($ok as $datos){
                    $html = $html."<tr>
                          <td> ".$datos["num_lista"]."</td>
                          <td> ".$datos["num_caja"]."</td>
                          <td> ".$datos["num_parte"]."</td>                          
                          <td> ".$datos["num_serie"]."</td>
                          <td> ".$datos["fecha"]."</td>
                          <td> ".$datos["hora"]."</td>";
                          if($datos["turno"] == 1){
                            $html = $html."<td> Primero </td>";
                          }else if($datos["turno"] == 3){
                            $html = $html."<td> Tercero </td>";
                          }
                          if($datos["estado"] == 0){
                            $html = $html."<td> Error </td>                           
                          </tr>";
                          }else if($datos["estado"] == 1){
                             $html = $html."<td> OK </td>                           
                          </tr>";
                          }else if($datos["estado"] == 2){
                             $html = $html."<td> NG </td>                           
                          </tr>";
                          }
                    }
            $html = $html."</table>";
            $html = $html.'<br> Piezas NG:
				<table border="1" style="width:100%;" autosize="2">
                <tr>
                   <th> Pieza </th>
                   <th> Num_Parte-(Caja)</th>
                   <th> Num_Parte-(Pieza)</th>                   
                   <th> Num_Lote </th>
                   <th> Fecha </th>
                   <th> Hora </th>
                   <th> Turno </th>
                   <th> Estado </th>
               </tr>';
               foreach($ng as $datos){
                    $html = $html."<tr>
                          <td> ".$datos["num_lista"]."</td>
                          <td> ".$datos["num_caja"]."</td>
                          <td> ".$datos["num_parte"]."</td>                          
                          <td> ".$datos["num_serie"]."</td>
                          <td> ".$datos["fecha"]."</td>
                          <td> ".$datos["hora"]."</td>";
                          if($datos["turno"] == 1){
                            $html = $html."<td> Primero </td>";
                          }else if($datos["turno"] == 3){
                            $html = $html."<td> Tercero </td>";
                          }
                          if($datos["estado"] == 0){
                            $html = $html."<td> Error </td>                           
                          </tr>";
                          }else if($datos["estado"] == 1){
                             $html = $html."<td> OK </td>                           
                          </tr>";
                          }else if($datos["estado"] == 2){
                             $html = $html."<td> NG </td>                           
                          </tr>";
                          }
                    }
            $html = $html."</table>";
            $html = $html.'<br> Piezas Error:
				<table border="1" style="width:100%;" autosize="2">
                <tr>
                   <th> Pieza </th>
                   <th> Num_Parte-(Caja)</th>
                   <th> Num_Parte-(Pieza)</th>                   
                   <th> Num_Lote </th>
                   <th> Fecha </th>
                   <th> Hora </th>
                   <th> Turno </th>
                   <th> Estado </th>
               </tr>';
               foreach($err as $datos){
                   $html = $html."<tr>
                          <td> ".$datos["num_lista"]."</td>
                          <td> ".$datos["num_caja"]."</td>
                          <td> ".$datos["num_parte"]."</td>                          
                          <td> ".$datos["num_serie"]."</td>
                          <td> ".$datos["fecha"]."</td>
                          <td> ".$datos["hora"]."</td>";
                          if($datos["turno"] == 1){
                            $html = $html."<td> Primero </td>";
                          }else if($datos["turno"] == 3){
                            $html = $html."<td> Tercero </td>";
                          }
                          if($datos["estado"] == 0){
                            $html = $html."<td> Error </td>                           
                          </tr>";
                          }else if($datos["estado"] == 1){
                             $html = $html."<td> OK </td>                           
                          </tr>";
                          }else if($datos["estado"] == 2){
                             $html = $html."<td> NG </td>                           
                          </tr>";
                          }                          
                    }
            $html = $html."</table>";
        $mpdf->WriteHTML($html);
		$mpdf->Output($filename,"D");
	}	

  function crearpdfconsulta($numparte){

    $month = ["1" => "Enero","2" => "Febrero","3" => "Marzo","4" => "Abril","5" => "Mayo","6" => "Junio","7" => "Julio","8" => "Agosto","9" => "Septiembre","10" => "Octubre","11" => "Noviembre","12" => "Diciembre"];
    $dia = date("d");
    $mes = date("m");
    $mont = $mes + 1;
    $anio = date("Y");
    
    $mes = $mont - 1;
    //Obtenemos las piezas
    $infopieza = $this->base_datos->select("parte","*", ["AND"=>["num_parte"=>$numparte]]);

    foreach ($infopieza as $key) {
      if($key["estado"]==2){
        $status="NG";
      }else if($key["estado"]==1){
        $status="OK";
      }else{
        $status="Error";
      }
    }

    //Nombre del archivo
    $filename = "R_".$numparte.".pdf";

    $mpdf = new mPDF();

    $html = '<div style="text-align: left; font-weight: bold;">
                <table border="0" style="width:100%"> 
                  <tr>
                    <td><img src="../images/logo.png" /></td>
                    <td style="text-align: center; font-weight: bold;" width = "500">
                      <p>MEXQ</p>
                      <p>Reporte del dia '.$dia.' de '.$month[$mes].' del '.$anio.' </p>
                      <p> <font color="Blue"> Parte: '.$numparte.' </font></p>
                    </td>
                  </tr>
                </table>
                <br>
                <table border="0">
                <tr><th><font size="2">Estado: </font></th><td><font size="2">'.$status.'</font></td></tr>
                </table>
                <table border="0">
                <tr><td><p><font >Informacion sobre la parte:</p></td></tr>
                </table>
                <br>

                </div>'; 

    $html = $html.'
        <table border="3" style="width:100%;">';
               foreach($infopieza as $datos){
                    $html = $html."
                    <tr><th> Pieza (Numero de Registro): </th><td> ".$datos["num_lista"]."</td></tr>
                    <tr><th> Numero de Parte (Pieza): </th><td> ".$datos["num_parte"]."</td></tr>
                    <tr><th> Numero de Parte (Caja): </th><td> ".$datos["num_caja"]."</td></tr>
                    <tr><th> Numero de Lote (Caja): </th><td> ".$datos["num_serie"]."</td></tr>
                    <tr><th> Fecha de Registro: </th><td> ".$datos["fecha"]."</td></tr>
                    <tr><th> Hora de Registro: </th><td> ".$datos["hora"]."</td></tr>
                    <tr><th> Turno en que se registro: </th><td> ";

                    if($datos["turno"] == 1){
                      $html=$html."Primer Turno</td>";
                    }else if($datos["turno"] == 3){
                      $html=$html."Tercer Turno</td>";
                    }

                    $html = $html."</tr><tr><th> Estado: </th><td>";

                          if($datos["estado"] == 0){
                            $html = $html."Error </td>                           
                          </tr>";
                          }else if($datos["estado"] == 1){
                             $html = $html."OK </td>                           
                          </tr>";
                          }else if($datos["estado"] == 2){
                             $html = $html."NG </td>                           
                          </tr>";
                          }
                    }
            $html = $html."</table>";
        $mpdf->WriteHTML($html);
    $mpdf->Output($filename,"D");
  } 
}

?>