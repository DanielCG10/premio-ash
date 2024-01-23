<?php
require_once "conexion.php";
$conexion = conexion();

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$usuario = $_POST['usuario'];
$password = sha1($_POST['password']);
$tipoUsuario = isset($_POST['tipoUsuario']) ? $_POST['tipoUsuario'] : "";

if (buscaRepetido($usuario, $password, $conexion) == 1) {
    echo 2; // Usuario repetido
} else {
    // Inserta el nuevo usuario en la tabla 'usuarios'
    $sqlUsuarios = "INSERT INTO usuarios (nombre, apellido, usuario, password, tipo_usuario) VALUES ('$nombre', '$apellido', '$usuario', '$password', '$tipoUsuario')";
    $resultUsuarios = mysqli_query($conexion, $sqlUsuarios);

    if ($resultUsuarios) {
        // Obtiene el ID del nuevo usuario insertado
        $idUsuario = mysqli_insert_id($conexion);
    
        // Inserta un registro en blanco en la tabla 'datos_trabajador' asociado al nuevo usuario
        $sqlDatos = "INSERT INTO datos_trabajador (id_usuario) VALUES ($idUsuario)";
        $resultDatos = mysqli_query($conexion, $sqlDatos);
    
        if ($resultDatos) {
            echo 1; // Registro exitoso
        } else {
            echo 0; // Error al insertar en la tabla 'datos_trabajador'
            echo "Error en la consulta SQL de datos_trabajador: " . mysqli_error($conexion); // Agregado para depuración
        }
    } else {
        echo 0; // Error al insertar en la tabla 'usuarios'
        echo "Error en la consulta SQL de usuarios: " . mysqli_error($conexion); // Agregado para depuración
    }
}

function buscaRepetido($user, $pass, $conexion)
{
    $sql = "SELECT * FROM usuarios WHERE usuario='$user' AND password='$pass'";
    $result = mysqli_query($conexion, $sql);

    if (mysqli_num_rows($result) > 0) {
        return 1; // Usuario repetido
    } else {
        return 0; // Usuario no repetido
    }
}
?>
