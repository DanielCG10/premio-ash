<?php
session_start();

if (isset($_SESSION['user'])) {
    ?>
    <!DOCTYPE html>
    <html lang="es">

    <?php
if (isset($_POST['guardarDatos'])) {
    $_SESSION['mostrarTabla'] = true;
} else {
    $_SESSION['mostrarTabla'] = false;
}
?>


    <head>
        <meta charset="UTF-8" />
        <title>Registro de trabajadores</title>
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
                        Registro de postulado
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
            <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "documentacion";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_SESSION['user'])) {
    $usuario = $_SESSION['user'];

    $sql = "SELECT dt.num_trabajador, dt.nombre, dt.ap_paterno, dt.ap_materno, dt.edad, dt.telefono
            FROM datos_trabajador dt
            INNER JOIN usuarios ot ON dt.id_usuario = ot.id
            WHERE ot.usuario = '$usuario'";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0) {
        $trabajador = mysqli_fetch_assoc($result);
    }
}
?>
                <div class="col-md-5">
                    <div class="card">
                    <div class="card-header bg-success text-white">
                        <h4 class="font-weight-bold text-center">Información del postulado</h4>
                    </div>
                        <div class="card-body">

                            <div class="mb-3">
                                <form method="post" enctype="multipart/form-data">
                                <div class="row mb-3">
                                <div class="col">
                            <label for="numeroTrabajador" class="form-label">Número de control</label>
                            <input type="text" class="form-control" id="numeroTrabajador" name="numeroTrabajador"
                                placeholder="Ingrese el número de trabajador" value="<?php echo isset($trabajador['num_trabajador']) ? $trabajador['num_trabajador'] : ''; ?>" readonly>
                        </div>
                                      
                                        <div class="col">
                                            <label for="nombre" class="form-label">Nombre</label>
                                            <input type="text" class="form-control" id="nombre" name="nombre"
                                                placeholder="Ingrese el nombre" value="<?php echo isset($trabajador['nombre']) ? $trabajador['nombre'] : ''; ?>">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col">
                                            <label for="apellidoPaterno" class="form-label">Apellido Paterno</label>
                                            <input type="text" class="form-control" id="apellidoPaterno" name="apellidoPaterno"
                                                placeholder="Ingrese el apellido paterno" value="<?php echo isset($trabajador['ap_paterno']) ? $trabajador['ap_paterno'] : ''; ?>">
                                        </div>
                                        <div class="col">
                                            <label for="apellidoMaterno" class="form-label">Apellido Materno</label>
                                            <input type="text" class="form-control" id="apellidoMaterno" name="apellidoMaterno"
                                                placeholder="Ingrese el apellido materno" value="<?php echo isset($trabajador['ap_materno']) ? $trabajador['ap_materno'] : ''; ?>">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col">
                                            <label for="edad" class="form-label">Edad</label>
                                            <input type="number" class="form-control" id="edad" name="edad"
                                                placeholder="Ingrese la edad" value="<?php echo isset($trabajador['edad']) ? $trabajador['edad'] : ''; ?>">
                                        </div>
                                        <div class="col">
                                            <label for="telefono" class="form-label">Número de Teléfono</label>
                                            <input type="tel" class="form-control" id="telefono" name="telefono"
                                                placeholder="Ingrese el número de teléfono" value="<?php echo isset($trabajador['telefono']) ? $trabajador['telefono'] : ''; ?>">
                                        </div>

                                    </div>

                                    <button type="submit" class="btn btn-primary">Guardar datos</button> 
                                </form>
                                <br>

                                <?php
                                //include 'connect.php';
                                include 'registrar.php';

                                ?>


                            </div>
                            </form>
                            <script>
       
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelector('form').addEventListener('submit', function () {
                setTimeout(function () {
                    location.reload();
                }, 1000); 
            });
        });
    </script>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                <?php if (!empty($trabajador['nombre']) && !empty($trabajador['ap_paterno']) && !empty($trabajador['ap_materno'])) : ?>
    <div class="card">
        <div class="card-header bg-info text-white">
            <h4 class="font-weight-bold text-center">Persona postulada</h4>
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
                        WHERE ot.usuario = '$usuario'
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
                        
                    </tr>
                <?php endwhile; ?>
            </table>
        </div>
    </div>
    <?php endif; ?>
</div>
            </div>
        </div>
    </body>

    </html>
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