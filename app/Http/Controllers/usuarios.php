<?php
require('conexion.php');

if($_POST['tipo']=='activar'){
	$id=$_POST['id'];

	$result_activa_usuario = $mysqli->query("UPDATE persona SET id_estado='1' WHERE id='".$id."'");
	$num_row_activa_usuario= mysqli_num_rows($result_activa_usuario);
	$row_activa_usuario= mysqli_fetch_array($result_activa_usuario, MYSQLI_BOTH);
	$id=$row_activa_usuario[0];
	

	function unsetVariables(){
		unset($id);
		unset($result_activa_usuario);
		unset($num_row_activa_usuario);
		unset($row_activa_usuario);
	}
	unsetVariables();
}

if($_POST['tipo']=='editar'){
	if($_POST['id']){
		$id=$_POST['id'];
	}else{
		$id='';

	}

	if($_POST['descripcion']){
		$descripcion=$_POST['descripcion'];
	}else{
		$descripcion='';

	}
	if($_POST['region']){
		$region=$_POST['region'];
	}else{
		$region='';

	}
	if($_POST['comuna']){
		$comuna=$_POST['comuna'];
	}else{
		$comuna='';

	}
	if($_POST['estado']){
		$estado=$_POST['estado'];
	}else{
		$estado='';

	}


	if($_POST['telefono1']){
		$telefono1=$_POST['telefono1'];
	}else{
		$telefono1='';

	}
	if($_POST['telefono2']){
		$telefono2=$_POST['telefono2'];
	}else{
		$telefono2='';

	}
	if($_POST['url']){
		$url=$_POST['url'];
	}else{
		$url='';

	}
	if($_POST['fecha_ingreso']){
		$fecha_ingreso=$_POST['fecha_ingreso'];
	}else{
		$fecha_ingreso='';

	}

	if($_POST['nombre']){
		$nombre=$_POST['nombre'];
	}else{
		$nombre='';

	}


	$result_actualiza_usuario = $mysqli->query("UPDATE persona SET id_estado='".$estado."', nombre='".$nombre."',correo='".$correo."',descripcion='".$descripcion."', telefono1='".$telefono1."',telefono2='".$telefono2."', picture_url='".$url."', fecha_ingreso='".$fecha_ingreso."',region='".$region."', comuna='".$comuna."'WHERE id='".$id."'");
	

	function unsetVariables(){
		unset($id);
		unset($result_activa_usuario);
		unset($num_row_activa_usuario);
		unset($row_activa_usuario);
	}
	unsetVariables();
}


if($_POST['tipo']=='habilitar'){
	$id=$_POST['id'];
	$result_habilita_red_social = $mysqli->query("UPDATE rrss SET cuenta='1' WHERE id='".$id."'");
	echo "UPDATE rrss SET cuenta='1' WHERE id='".$id."'";
	function unsetVariables(){
		unset($id);
		unset($result_habilita_red_social);
	}
	unsetVariables();
}

if($_POST['tipo']=='deshabilitar'){
	$id=$_POST['id'];
	$result_deshabilita_red_social = $mysqli->query("UPDATE rrss SET cuenta='0' WHERE id='".$id."'");	
	function unsetVariables(){
		unset($id);
		unset($result_deshabilita_red_social);
	}
	unsetVariables();
}

if($_POST['tipo']=='mensaje'){
 	$descripcion_tipo=$_POST['descripcion_tipo'];
 	$mensaje = $_POST['mensaje'];
 	$result_mensaje=$mysqli->query('INSERT INTO mensajes SET descripcion_tipo="'.$descripcion_tipo.'", mensaje="'.$mensaje.'"');
}




	

?>