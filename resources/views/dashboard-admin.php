<?php include '../../app/Http/Controllers/header.php';
	  require('../../app/Http/Controllers/conexion.php');
 ?>
	<h1>Bienvenido <?php echo $_SESSION['admin_user']; ?></h1>
	<a href="agencias.php" id="ir_a_agencias">Administrar Agencias</a>
	<a href="influenciadores.php" id="ir_a_influenciadores">Administrar Influenciadores</a>
	<a href="admin.php" id="ir_a_admin">Crear Nuevo Admin</a>

	<h2>Usuarios Pendientes de Activación</h2>

	<table style="width:100%">
	  <tr>
	    <td>id</td>
	    <td>Nombre</td> 
	    <td>Tipo de Usuario</td>
	    <td>Correo</td>
	    <td>Fecha de ingreso</td>
	    <td>Descripción</td>
	  </tr>
	<?php 
		
	$result_inactivos = $mysqli->query("SELECT DISTINCT * FROM persona WHERE  id_estado='0'");
	$row_inactivos= mysqli_fetch_array($result_inactivos, MYSQLI_BOTH);
	
	do{
		echo"<tr>
	    <td><input value='".$row_inactivos[0]."' disabled/></td>
	    <td><input value='".$row_inactivos[5]."' disabled/></td>
	    <td><input value='".$row_inactivos[2]."' disabled/></td> 
	    <td><input value='".$row_inactivos[6]."' disabled/></td>
	    <td><input value='".$row_inactivos[9]."' disabled/></td>
	    <td><button class='activar_cuenta' id='".$row_inactivos[0]."'>Activar</button></td>
	  </tr>";
	}while($row_inactivos = $result_inactivos->fetch_array());
	 ?>
	</table>
	
	<?php
		$result_mensajes_agencias = $mysqli->query("SELECT DISTINCT * FROM mensajes WHERE descripcion_tipo='agencias' ORDER BY id DESC");
	$row_mensajes_agencias= mysqli_fetch_array($result_mensajes_agencias, MYSQLI_BOTH);

	$result_mensajes_influenciadores = $mysqli->query("SELECT DISTINCT * FROM mensajes WHERE descripcion_tipo='influenciadores' ORDER BY id DESC");
	$row_mensajes_influenciadores= mysqli_fetch_array($result_mensajes_influenciadores, MYSQLI_BOTH);
	?>
	
	<div id="nuevo_mensaje_agencias" style="border:1px solid black;">
	<h2>Enviar Mensaje a Agencias</h2>
		<input id="mensaje_agencias" class="mensaje"/>
		<p>Mensaje Actual : <?php echo $row_mensajes_agencias['mensaje'];?> </p>
		<button  id="btn_mensaje_agencias" class="agencias">Subir Mensaje</button>
	</div>
	

	
	<div id="nuevo_mensaje_influenciadores" style="border:1px solid black;">
	<h2>Enviar Mensaje a Influenciadores</h2>
		<input id="mensaje_influenciadores" class="mensaje"/>
		<p>Mensaje Actual : <?php echo $row_mensajes_influenciadores['mensaje'];?> </p>
		<button  id="btn_mensaje_influenciadores" class="influenciadores">Subir Mensaje</button>
	</div>
	


</body>
</html>