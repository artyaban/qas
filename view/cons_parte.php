
<?php
  include("../session.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>MEXQ</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="../style.css" rel="stylesheet" type="text/css" />


<script type="text/javascript">
      function validavacio(){
        campo_parte=document.getElementById("numparte").value;
        if(campo_parte.length==0){
            alert(" Es necesario ingresar la clave de la parte a consultar");
            return false;
        }
        return true;
       }

       function validavacio2(){
        campo_parte_caja=document.getElementById("numcaja").value;
        campo_parte_serie=document.getElementById("numserie").value;
        if(campo_parte_caja.length==0){
            alert(" Es necesario ingresar la clave de la parte (caja) a consultar");
            return false;
        }else if(campo_parte_serie.length==0){
          alert(" Es necesario ingresar el num de serie a consultar");
            return false;
        }
        return true;
       }
</script>

<link href="../css/bootstrap.min.css" rel="stylesheet">


</head>
<body>



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



<div class="col-md-6">

   <h3> Consulta de parte especifica:</h3>
        
<form action="../controller/consultar_pieza.php" method="get"   id="contactform">
          <ol>
            <li>
            
              <br>
              <label for="name">Numero de parte (pieza) <span class="red">*</span></label>
              <input  class='form-control' id="numparte" name="numparte" class="text" maxlength="14"/>
            </li>            
            <li class="buttons">
            <br>
            <hr>
             <button onclick="return validavacio();" style='color:#fff;' class="btn btn-success" />Consultar </button> 
              <div class="clr"></div>
            </li>
          </ol>
</form>


</div>



<div class="col-md-6">

<h2> Consulta de caja especifica:</h2>
<form action="resul_caja.php" method="get"   id="contactform">
          <ol>
            <li>
       
              <label for="name">Numero de parte (caja) <span class="red">*</span></label>
              <input id="numcaja" class='form-control' name="numcaja" class="text" maxlength="10"/>
            </li> 
            <li>
              <label for="name">Numero de serie (caja) <span class="red">*</span></label>
              <input id="numserie" class='form-control' name="numserie" class="text" maxlength="10"/>
            </li>       
            <li class="buttons">
             <hr>
             <button  onclick="return validavacio2();" class="btn btn-success"  style='color:#fff;' /> Consultar </button>
              <div class="clr"></div>
            </li>
          </ol>
</form>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="clr"></div>
 


</div>



<footer>
&nbsp;<br>
<div class="col-md-3"></div>
<div class='col-md-6'  ">
 <img src="../images/footer.png">
</div>
<div class="col-md-3">
</div>
</footer>


</html>
