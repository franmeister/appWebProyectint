<!doctype html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../style.css"/>
	<title> Cliente - proyectint.org </title>
</head>
<body>
<?php
session_start();
if ((isset($_SESSION["login_proy"])) && ($_SESSION["login_proy"]=="cliente")) {
        echo '<h1> Bienvenido a proyectint.org Cliente</h1>';
        ?>
        <br><form method="POST" action="cliente.php">
        	<input type="submit" value="Cerrar Sesi&oacute;n" name="exit" class="boton"/>
        </form>
        <?php
			$usu=$_COOKIE["usuario"];
			$con=require('../config_bd.php');
			$res = mysql_query("select c.cod_cliente, cod_maquina, fecha_ini, fecha_fin, tipo_copia, correcta, nombre_fichero from copias c,usuarios u where c.cod_cliente =u.cod_cliente and nombre='$usu'", $con) or die(mysql_error());?>
			<body>
			<h2>Copias de Seguridad Realizadas</h2>
			<div id="cuerpo">
			<table border="2" bordercolor="black" align="center">
				<tr bgcolor="#FA5050" align="center">
					<td>Código del Cliente</td>
					<td>Código de la Máquina</td>
					<td>Fecha de inicio</td>
					<td>Fecha de Finalización</td>
					<td>Tipo de Copia</td>
					<td>Correcta</td>
					<td>Nombre del Fichero</td>
				</tr><?php
				while($row = mysql_fetch_array($res)){?>
				<tr bgcolor="#A0F894">
					<td><?php echo $row['cod_cliente']?></td>
					<td><?php echo $row['cod_maquina']?></td>
					<td><?php echo $row['fecha_ini']?></td>
					<td><?php echo $row['fecha_fin']?></td>
					<td><?php echo $row['tipo_copia']?></td>
					<td><?php echo $row['correcta']?></td>
					<td><?php echo $row['nombre_fichero']?></td>
				</tr><?php
				} ?>
			</table>
			</div><?php
}else{?>
        <h1> No estás identificado </h1>
        <form method="POST" action="../index.html" align="center">
        <input type="submit" value="Volver a intentarlo" class="boton"/>
        </form>
<?php }
if(isset($_POST["exit"])) {
        unset($_SESSION["login_proy"]);
        header("Location: ../index.html");
}
?>
<br/>
<div class="bottom">Aplicación Web de Gestión - Proyectint.org</div>	
</body>
</html>
