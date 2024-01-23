<?php
session_start();

if (isset($_SESSION['user'])) {
    ?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8" />
        <title>Control de postulados</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="css/bootstrap.css" />
        <meta name="keywords" content="Noticias" />
        <meta name="author" content="Daniel Cardoza" />
    </head>

    <body style="background-color: #CCCCCC;">
        <div class="container-fluid pt-4 text-center bg-primary">
            <div class="row">
                <div class="col">
                    <h2 class="text-white">
                        Control de postulados
                        <a href="salir.php" class="btn btn-outline-light float-start">
                            <i class="bi bi-box-arrow-right"></i> Cerrar sesión
                        </a>
                    </h2>
                    <br>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <br>
            <div class="row">
                <div class="col-md-5">
                    <div class="card">
                    <div class="card-header bg-success text-white">
                        <h4 class="font-weight-bold text-center">Registrar un usuario</h4>
                    </div>
                        <div class="card-body">

                            <div class="mb-3">
                                <form method="post" enctype="multipart/form-data">
                                <div class="text-center">
                                <button type="button" class="btn btn-primary" onclick="redirigir()">Registrar</button>
                                </div>
                                </form>
                                <br>

                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
    <div class="card">
        <div class="card-header bg-info text-white">
            <h4 class="font-weight-bold text-center">Postulados</h4>
        </div>
        <div class="card-body">
            <table class="table table-blue table-striped">
                <tr>
                    <th>No. de control</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Telefóno </th>
                    <th>Documentación </th>
                    <th>Eliminar </th>
                </tr>
                <?php
                
                require_once "conexion.php";

                $conexion = conexion();

                // Obtener el usuario logueado
                $usuario = $_SESSION['user'];

                // Modificar la consulta para realizar una unión con la tabla que contiene los datos
                $sql = "SELECT dt.num_trabajador, dt.nombre, dt.ap_paterno, dt.ap_materno, dt.telefono
                        FROM datos_trabajador dt
                        INNER JOIN usuarios ot ON dt.id_usuario = ot.id
                        ORDER BY dt.num_trabajador DESC";

                $consulta = mysqli_query($conexion, $sql);

                while ($fila = mysqli_fetch_assoc($consulta)):
                ?>
                    <tr>
                        <td><?= $fila['num_trabajador'] ?></td>
                        <td><?= $fila['nombre'] ?></td>
                        <td><?= $fila['ap_paterno'] ?></td>
                        <td><?= $fila['ap_materno'] ?></td>
                        <td><?= $fila['telefono'] ?></td>
                        <td><a href="admin_docs.php?u=<?php echo $fila['num_trabajador'] ?>" class="btn btn-secondary">Documentación</a> <br></td>
                        <td><a onclick="return confirm('Realmente desea eliminar los datos?')" href="eliminar.php?id=<?php echo $fila['num_trabajador'] ?>" class="btn btn-secondary btn-danger">Eliminar</a></td>
                    </tr>
                <?php endwhile; ?>
            </table>
        </div>
    </div>
</div>
            </div>
        </div>
    </body>

    </html>
    <script>
    function redirigir() {
       
        window.location.href = 'registroUsuario.php';
    }
</script>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
    <?php
} else {
    header("location:login.php");
}
?>