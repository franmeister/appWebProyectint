<!doctype html>
<html>
<head>
        <link rel="stylesheet" type="text/css" href="style.css"/>
        <title> Login-proyectint.org </title>
</head>
<body>
<?php
session_start();
if(!empty($_POST['usuario'])) {
	$con=require('config_bd.php');
	$usu=$_POST["usuario"];
	$pass=$_POST["pass"];
	$res = mysql_query("select count(*) as ok,rol from usuarios where nombre='$usu' and pass=md5('$pass')", $con) or die(mysql_error());
	$row = mysql_fetch_array($res);
	if($row["ok"] == 0) {?>
        <h1> Usuario incorrecto </h1><br>
        <form method="POST" action="index.html" align="center">
        <input type="submit" value="Volver a intentarlo" class="boton"/>
        </form> <?php
	}else{
        $_SESSION["login_proy"]=$row["rol"];
		setcookie("usuario",$usu);
		if($row["rol"] == "admin"){
			header("Location: admin/admin.php");
		}elseif($row["rol"] == "cliente"){
			header("Location: cliente/cliente.php");
		}else{ ?>
			<h1> Error. No tiene definido ning&uacute;n rol. P&oacute;ngase en contacto con el Administrador. <h1>
        		<?php
		}
	}
	mysql_close($con);
}else{?>
        <h1> Usuario incorrecto </h1><br>
        <form method="POST" action="index.html" align="center">
        <input type="submit" value="Volver a intentarlo" class="boton"/>
        </form>
<?php } ?>
<div class="bottom"><p>Aplicación Web de Gestión - Proyectint.org</p></div>
</body>
</html>