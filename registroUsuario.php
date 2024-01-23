<!DOCTYPE html>
<html>

<head>
	<title>Registro</title>
	<?php require_once "scripts.php"; ?>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body style="background-color: #f8f9fa;">
	<br><br><br>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-sm-4">
				<div class="card">
					<div class="card-header bg-danger text-white">Registro de usuario</div>
					<div class="card-body">
						<form id="frmRegistro">
							<div class="mb-3">
								<label for="nombre" class="form-label">Nombre</label>
								<input type="text" class="form-control" id="nombre" name="nombre">
							</div>
							<div class="mb-3">
								<label for="apellido" class="form-label">Apellido</label>
								<input type="text" class="form-control" id="apellido" name="apellido">
							</div>
							<div class="mb-3">
								<label for="usuario" class="form-label">Usuario</label>
								<input type="text" class="form-control" id="usuario" name="usuario">
							</div>
							<div class="mb-3">
								<label for="tipoUsuario" class="form-label">Tipo de usuario</label>
								<select class="form-select" id="tipoUsuario" name="tipoUsuario">
									<option value="administrador">Administrador</option>
									<option value="postulante">Postulante</option>
								</select>
							</div>
							
							<div class="mb-3">
								<label for="password" class="form-label">Password</label>
								<input type="password" class="form-control" id="password" name="password">
								<br>
							</div>
							<div class="mb-3 d-flex justify-content-between">
								<button class="btn btn-primary" id="registrarNuevo">Registrar usuario</button>
								<a href="index.php" class="btn btn-outline-success">Regresar</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function () {
    $('#registrarNuevo').click(function () {
        if ($('#nombre').val() == "") {
            alertify.alert("Debes agregar el nombre");
            return false;
        } else if ($('#apellido').val() == "") {
            alertify.alert("Debes agregar el apellido");
            return false;
        } else if ($('#usuario').val() == "") {
            alertify.alert("Debes agregar el usuario");
            return false;
        } else if ($('#tipoUsuario').val() === "") { // Modificado aquí
            alertify.alert("Debes seleccionar el tipo de usuario");
            return false;
        } else if ($('#password').val() == "") {
            alertify.alert("Debes agregar el password");
            return false;
        }

        // Obtener el valor del select
        var tipoUsuario = $('#tipoUsuario').val();

        cadena = "nombre=" + $('#nombre').val() +
            "&apellido=" + $('#apellido').val() +
            "&usuario=" + $('#usuario').val() +
            "&tipoUsuario=" + tipoUsuario +
            "&password=" + $('#password').val();

        $.ajax({
            type: "POST",
            url: "registroUsuarioSrc.php",
            data: cadena,
            success: function (r) {
                if (r == 2) {
                    alertify.alert("Este usuario ya existe, prueba con otro :)");
                } else if (r == 1) {
                    $('#frmRegistro')[0].reset();
                    alertify.success("Agregado con éxito");
                } else {
                    alertify.error("Fallo al agregar");
                }
            }
        });
    });
});
	</script>
</body>

</html>
