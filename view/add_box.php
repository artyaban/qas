<?php
  include("../session.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>


<script language='JavaScript' src='hotkey.js'></script> 

<title>MEXQ</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="../style.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap.min.css" rel="stylesheet">

<script type="text/javascript">

function cambias()
{
  if(document.getElementById("serie").value.length==10)
  {
    validarSerie();
  }

}


function validarSerie()
{

  
str =  document.getElementById("serie").value.substring(2,12);

 if(str.length != 8 )
 {
  document.getElementById("serie").value='';
  alert('Scanea el codigo de 10 digitos');
  return false;
 } 
document.getElementById("serie").value=str;
document.getElementById("serie").disabled = 'true';


}
function agregavalor()
{

 str =  document.getElementById("numcaja").value.substring(1,15);
 if(str.length != 10 )
 {
  document.getElementById("numcaja").value='';
  alert('Scanea el codigo de 10 digitos');
  return false;
 } 
document.getElementById("numcaja").value=str;
document.getElementById("verifica").value = 'NJ'+ document.getElementById("numcaja").value.substring(5,8);
document.getElementById("numcaja1").innerHTML = 'hola';
document.getElementById("numcaja").disabled = 'true';
}

function anular(e) {
          tecla = (document.all) ? e.keyCode : e.which;
          if(tecla==13)
          {
          document.getElementById('numcaja').value=document.getElementById('numcaja').value.toUpperCase();
          document.getElementById('serie').focus();
          document.getElementById('serie').select();
          }
          return (tecla != 13);
     }

function anular1(e) {
          tecla = (document.all) ? e.keyCode : e.which;
          if(tecla==13){document.getElementById('verifica').focus();
          document.getElementById('verifica').select();
         // document.getElementById('verifica').value=document.getElementById('numcaja').value.substring(5,8);
          }
          return (tecla != 13);
     }



      function validavacio(){
        campo=document.getElementById("numcaja").value;
        if(campo.length==0){
            alert(" 1. Numero de caja Es necesario que tenga información");
            return false;
        }
        campo1=document.getElementById("serie").value;
        if(campo1.length==0){
            alert(" 2. Numero de serie, Es necesario que tenga información");
            return false;
        }
        
        if(document.getElementById("verifica").value=='' || strlen(document.getElementById("serie").value)<5)
        {
          alert("3. Numero de caja erroneo");
          return false;
        }
       

       }

       function selecciona()
       {        
                document.getElementById('medio').style.display ='none';
                document.getElementById('numcaja').focus();
                document.getElementById('numcaja').select();
       }
       function cambia()
       {
        document.getElementById('numcaja').disabled= false;
        document.getElementById('serie').disabled= false;
        document.getElementById('verifica').disabled= false;


        document.getElementById('numcaja').value='';
        document.getElementById('serie').value='';
        document.getElementById('verifica').value='';
       }

       function cerrarmensaje()
       {
         
        document.getElementById('mensaje').style.display ='none';        
       document.getElementById('medio').style.display ='';
      

       }
  

</script>


<link href="../css/bootstrap.min.css" rel="stylesheet">



</head>
<body onload="selecciona()">

<div class="main" id='main'>
 



<header>
<div class="col-md-12" style="text-align:center; background-color:#fff;box-shadow: 3px 3px 3px #aaa;">
<p> <br></p>
<img src="../images/logo.png">
<h4 style="color:#052467;"><em><u>"Piensa en calidad , Piensa MEXQ"</u></em></h4>
<p> <br></p>
</div>
</header>



<ul class="list-inline" style=" margin:20px; z-index: 3; right:0; position:absolute;">
          <li><h4><a href="index_home.php" style="color:#052467;" >Inicio |</a></h3></li>
          <li><h4><a href="add_box.php" style="color:#052467;">Registro | </a></h3></li>
          <li><h4><a href="cons_parte.php" style="color:#052467;">Consulta | </a></h3></li>
</ul>


<div id='mensaje'>
<div class="col-md-10" style="margin:40px;border:solid green 4px; box-shadow:10px 10px 10px #aaa;"> 
<hr> 
<h3>"Escanea el codigo de barras de la Caja como se muestra en la imagen"</h3><hr>
<img src="../images/registro.png" style="height:2%; width:100%; ">
<hr>
<button class="btn btn-success" onclick="cerrarmensaje();">CERRAR</button><hr>
</div>
</div>



<div id="medio" >





<div  class="col-md-12">

      <h2  widht="500">Registro de numero de caja</h2>
      
    </div>
    <div class="clr"></div>
  
  <div class="clr"></div>
  <div class="body">
    <div class="body_resize">
      <div class="left">
        
<form action="reg_pieza.php"  method="get"   id="contactform" >
          <ol>
            <li>
              <label for="name">Numero de parte (Caja) <span class="red">*</span></label>
              <label id="numcaja1" ><br>Scanea el codigo</label>
              <input id="numcaja"  class='form-control' onchange="agregavalor();"  onkeypress="return anular(event);" name="numcaja" class="text" maxlength="11" />
            </li>
            <li>
              <label for="name">Numero de serie (Caja) <span class="red">*</span></label>
              <input id="serie" class='form-control' name="serie" onkeyup='cambias();' onchange='validarSerie();' onkeypress="return anular1(event);"  class="text" maxlength="10" />
            </li>
            <li>
              <label for="email">Cadena a verificar <span class="red">*</span></label>
              <input id="verifica" name='verifica' class='form-control'  class="text" maxlength="5" disabled />
            </li>
            <input type="hidden" name="estado" value="1">
            
            <li class="buttons">
           

           <br>
             <button type="submit" onclick="return validavacio();" style="color:#fff;" class="btn btn-success" /> Registrar </button>

             
              <div class="clr"></div>
            </li>
          </ol>
        </form>
       

      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="clr"></div>



<footer>
&nbsp;<br>
<div class="col-md-3"></div>
<div class='col-md-6'  ">
 <img src="../images/footer.png">
</div>
<div class="col-md-3">
</div>
</footer>




</div>



</div>
</html>
