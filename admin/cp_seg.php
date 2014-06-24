<!doctype html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../style.css"/>
	<title> Copia Manual - proyectint.org </title>
</head>
<?php
session_start();
if ((isset($_SESSION["login_proy"])) && ($_SESSION["login_proy"]=="admin")) {
	$con=require('../config_bd.php');
	$res = mysql_query("select cod_cliente from clientes", $con) or die(mysql_error());
	$res2 = mysql_query("select cod_maquina from maquinas", $con) or die(mysql_error());
	mysql_close($con);?>
	<body>
	<h1>Copia de Seguridad Manual</h1>
	<p id="introd">Introduce los datos de la nueva copia de seguridad a realizar. La ip del cliente debe de ser la perteneciente a la red de OpenVPN.
	<form method="POST" action="admin.php" align="right">
    <input type="submit" value="Volver a Panel de Control de Administrador" class="boton"/>
    </form> </p><br/>
	<div id="cuerpo">
		<form id="form-login" method="post" action="socket.php">
			<p><label>IP Máquina de Cliente</label></p>
			<p><input class="mb10" name="ip" type="text"></p>
			<p><label>Código de Cliente</label></p>
			<p><select class="mb10" name="cliente"><?php
				while($row = mysql_fetch_array($res)){?>
				<option><?php echo $row['cod_cliente']?></option>;<?php
				}?>
			</select></p>
			<p><label>Código de la Máquina</label></p>
			<p><select class="mb10" name="maquina"><?php
				while($row = mysql_fetch_array($res2)){?>
				<option><?php echo $row['cod_maquina']?></option>;<?php
				}?>
			</select></p>
			<p><label>Usuario FTP</label></p>
			<p><input class="mb10" name="usu_ftp" type="text"></p>
			<p><label>Contraseña FTP</label></p>
			<p><input class="mb10" name="pass_ftp" type="password"></p>
			<p><input name="submit" type="submit" id="submit" value="Confirmar" class="boton"></p>
		</form>
	</div><?php
}else{?>
        <h1> No estás identificado </h1>
        <form method="POST" action="../index.html" align="center">
        <input type="submit" value="Volver a intentarlo" class="boton"/>
        </form><?php 
}?>
<br/><div class="bottom">Aplicación Web de Gestión - Proyectint.org</div>
</body>
</html>