<!doctype html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../style.css"/>
	<title> Admin - proyectint.org </title>
</head>
<body>
<?php
session_start();
if ((isset($_SESSION["login_proy"])) && ($_SESSION["login_proy"]=="admin")) {
        echo '<h1> Bienvenido a proyectint.org Administrador</h1>';
        ?>
	<div id="botones">
       <table align="center">
		<tr>
        	<td><form method="POST" action="add_cliente.php">
        		<input type="submit" value="Añadir Cliente en Base de Datos" class="boton"/>
        	</form></td>
       		<td><form method="POST" action="add_maquina.php">
        		<input type="submit" value="Añadir Máquina en Base de Datos" class="boton"/>
        	</form></td>
			<td><form method="POST" action="add_usuario.php">
        		<input type="submit" value="Añadir Usuario para Aplicación" class="boton"/>
        	</form></td>
			<td><form method="POST" action="cp_seg.php">
        		<input type="submit" value="Hacer Copia de Seguridad Manual" class="boton"/>
        	</form></td>
		</tr>
		<tr></tr>
		<tr>
			<td><form method="POST" action="con_cliente.php">
        		<input type="submit" value="Consultar Clientes en Base de Datos" class="boton"/>
        	</form></td>
       		<td><form method="POST" action="con_maquina.php">
        		<input type="submit" value="Consultar Máquinas en Base de Datos" class="boton"/>
        	</form></td>
			<td><form method="POST" action="con_usuario.php">
        		<input type="submit" value="Consultar Usuarios Existentes para Aplicación" class="boton"/>
        	</form></td>
			<td><form method="POST" action="con_copias.php">
        		<input type="submit" value="Consultar Copias de Seguridad" class="boton"/>
        	</form></td>
        	<td><form method="POST" action="admin.php">
        		<input type="submit" value="Cerrar Sesión" name="exit" class="boton"/>
        	</form></td>
		</tr>
       </table>
	</div>
        <?php
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
<br>
<div class="bottom">Aplicación Web de Gestión - Proyectint.org</div>
</body>
</html>
