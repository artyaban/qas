<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>MEXQ</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/jquery.cycle.all.min.js"></script>

<link href="../css/bootstrap.min.css" rel="stylesheet">

<script type="text/javascript">
$(document).ready(function(){
    $('#slideshow').cycle({
        fx:     'fade',
        speed:  'slow',
        timeout: 5000,
        pager:  '#slider_nav',
        pagerAnchorBuilder: function(idx, slide) {
            // return sel string for existing anchor
            return '#slider_nav li:eq(' + (idx) + ') a';
        }
    });
});
</script>

</head>


<body style="background-color: #fff;">


<header>
<div class="col-md-12" style="text-align:center; background-color:#fff;box-shadow: 3px 3px 3px #aaa;">
<p> <br></p>
<img src="images/logo.png">
<h4 style="color:#052467;"><em><u>"Piensa en calidad , Piensa MEXQ"</u></em></h4>
<p> <br></p>
</div>
</header>



<div class="col-md-3"></div>


<div class="col-md-6" style="align:center;"> 
      <hr><br>
        <form action="controller/IngresoUsuario.php" method='get'><!--controller/IngresoUsuario.php-->
        <label class="col-md-4" style="color:#052467;">Usuario: <input type="text" class="form-control"  name="usrname"display="line" aling="left"> </label>
         <label class="col-md-4" style="color:#052467;">Contraseña:  <br> <input type="password" class="form-control"  name="ctr" display="line" aling="left"> </label>
         <br>
        <button type="submit" class='btn btn-success' > Aceptar</button>
        </form>
      <br>  <br>  
</div>

<div class="col-md-3"></div>


<footer>
<div class="col-md-12">
&nbsp;<br>
<div class="col-md-3"></div>
<div class='col-md-6'  ">
 <img src="../images/footer.png">
</div>
<div class="col-md-3">
</div>


</div>
</footer>


</body>
</html>

