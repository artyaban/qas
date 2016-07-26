<?php     
  include('../model/Partes.php'); 
  $mode_usr = new  ModeloPartes();

  $caja = $_GET["numcaja"];
  $estado = $_GET["status"];
  $parte = $_GET["numparte"];
  $verify = $_GET["verifica"];
  $serie = $_GET["numserie"];
 
  //Ponemos la hora de mexico
  date_default_timezone_set("America/Mexico_City");
  /*Turnos:
  8 am - 8 pm -> 1ero
  8pm - 8 am -> 3ero
  */
  //obtenemos la fecha:
  $dia = date("d");
  $mes = date("m");
  $anio = date("Y");
  $hora = date("H");
  $minuto = date("i");
  $segundo = date("s");

  $fecha = $anio."/".$mes."/".$dia;
  $tiempo = $hora.":".$minuto.":".$segundo;

  //Checamos el turno
  $turno = 0;
  if($hora > 8 && $hora < 20){
    $turno = 1; //Es el primer turno
  }else{
    $turno = 3; //Es el tercer turno
  }


if(strlen($parte)<1){
  echo "<script>
        window.location.href = '../view/reg_pieza.php?verifica=".$verify."&numcaja=".$caja."&estado=".$estado."&serie=".$serie."';
        </script>";
}else{
 $existe=$mode_usr->verificaExistencia($parte,$caja,$serie);

if(empty($existe)){


  $variableMaxima=$mode_usr->buscarMax($caja,$serie);

  ++$variableMaxima;

  if(strpos($parte,$verify) == true){
        $mode_usr->agregar_parte($caja,$estado,$parte,$fecha,$tiempo,$variableMaxima,$serie,$turno);
        echo "<script>
        window.location.href = '../view/reg_pieza.php?verifica=".$verify."&numcaja=".$caja."&estado=".$estado."&serie=".$serie."';
        </script>";
        //alert('Agregada la parte ".$parte."');
  }else{
        $mode_usr->agregar_parte($caja,0,$parte,$fecha,$tiempo,$variableMaxima,$serie,$turno);
        echo "<html>
                <head>
                  <script type='text/javascript' src='../js/howler.js'></script>
                  <script type='text/javascript' src='../js/howler.min.js'></script>
                </head>
                <body onload='playsound();'>
                  <script>
                    function playsound(){
                      var sound = new Howl({
                        urls: ['../sounds/warning.wav'],
                        autoplay: true,
                        volume: 1,
                        onplay: function ok(){ 
                                  var cadena = 'ok';
                                  var pass = prompt('LA PIEZA ".$parte." NO PERTENECE A ESTA CAJA, ESCRIBE \"ok\" CUANDO LA HAYAS RETIRADO:');

                                  if(pass == cadena){
                                    window.location.href = '../view/reg_pieza.php?verifica=".$verify."&numcaja=".$caja."&estado=".$estado."&serie=".$serie."';       
                                  }else{
                                    ok();
                                  }
                                }
                        });
                    }
                </script>
                </body>
              </html>";
  }
        
}else{
   echo "<script>
   alert('LA PIEZA ".$parte." YA FUE REGISTRADA EN ESTA CAJA :(');
        window.location.href = '../view/reg_pieza.php?verifica=".$verify."&numcaja=".$caja."&estado=".$estado."&serie=".$serie."';
        </script>";
}


}
?>