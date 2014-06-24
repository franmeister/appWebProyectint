<!doctype html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../style.css"/>
	<title> Copia Manual - proyectint.org </title>
</head>
<?php
session_start();
if ((isset($_SESSION["login_proy"])) && ($_SESSION["login_proy"]=="admin")) {
	if (isset($_POST['ip'])){
		$host="127.0.0.1";
		$socket=socket_create(AF_INET,SOCK_STREAM,SOL_TCP);
		$puerto=6666;
		$conexion=socket_connect($socket,$host,$puerto);

		if($conexion){
			echo "<h1>Empezando la copia...</h1>";
			$buffer=$_POST['ip'].' '.$_POST['cliente'].' '.$_POST['maquina'].' manual '.$_POST['usu_ftp'].' '.$_POST['pass_ftp'];
			$salida='';
			$tam=strlen($buffer)+1024;
			socket_write($socket,$buffer);
		}else{
			echo "\n la conexion TCP no se a podido realizar, puerto: ".$puerto;
			}
		 
		socket_close($socket);
	}else{
		echo "<h2> Error. No hay datos <h2>";
	}
	echo "<h2>Consulta Copias Realizadas para comprobar resultado<h2>";
	?>
		<form method="POST" action="admin.php" align="right">
		<input type="submit" value="Volver a Panel de Control de Administrador" class="boton"/>
		</form> </p><br/><?php
}else{?>
    <h1> No estás identificado </h1>
    <form method="POST" action="../index.html" align="center">
    <input type="submit" value="Volver a intentarlo" class="boton"/>
    </form><?php 
}?>
<br/><div class="bottom">Aplicación Web de Gestión - Proyectint.org</div>
</body>
</html>