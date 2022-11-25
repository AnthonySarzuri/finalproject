<?php 
	
	require_once "clases/Conexion.php";
	$obj= new conectar();
	$conexion=$obj->conexion();

	$sql="SELECT * from usuarios where email='admin'";
	$result=mysqli_query($conexion,$sql);
	$validar=0;
	if(mysqli_num_rows($result) > 0){
		header("location:index.php");
	}
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Registro de usuarios</title>
	<link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
	<script src="librerias/jquery-3.2.1.min.js"></script>
	<script src="js/funciones.js"></script>
	<link rel="stylesheet" href="style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Advent+Pro&display=swap" rel="stylesheet">
<link rel="stylesheet" href="style.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

</head>
<body style="background-color: gray">
	<br><br><br>
	<div class="container">
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<div class="panel panel-primary">
					<div id="logos" class="panel panel-heading">R E G I S T R A R</div>
					<div class="panel panel-body">
						<form id="frmRegistro">
							<label>Nombre</label>
							<input type="text" class="form-control input-sm" name="nombre" id="nombre">
							<label>Apellido</label>
							<input type="text" class="form-control input-sm" name="apellido" id="apellido">
							<label>Usuario</label>
							<input type="text" class="form-control input-sm" name="usuario" id="usuario">
        								<label>Contraseña</label>
      											<input id="password" type="Password" name="password" class="form-control input-sm">
      												<div class="input-group-append">
            											<button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
          											</div>	
							<p></p>
							<span class="btn btn-primary" id="registro">Registrar</span>
							<a href="index.php" id="button"class="btn btn-default">Volver al inicio de sesión</a>
						</form>
					</div>
				</div>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>
</body>
</html>

<script type="text/javascript">
function mostrarPassword(){
		var cambio = document.getElementById("password");
		if(cambio.type == "password"){
			cambio.type = "text";
			$('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
		}else{
			cambio.type = "password";
			$('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
		}
	} 
	
	$(document).ready(function () {
	//CheckBox mostrar contraseña
	$('#ShowPassword').click(function () {
		$('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
	});
});
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#registro').click(function(){

			vacios=validarFormVacio('frmRegistro');

			if(vacios > 0){
				alert("Debes llenar todos los campos!!");
				return false;
			}

			datos=$('#frmRegistro').serialize();
			$.ajax({
				type:"POST",
				data:datos,
				url:"procesos/regLogin/registrarUsuario.php",
				success:function(r){
					alert(r);

					if(r==1){
						alert("Administrador agregado con éxito");
					}else{
						alert("HA ocurrido un error! lo sentimos, vuelva a intentarlo");
					}
				}
			});
		});
	});
</script>

