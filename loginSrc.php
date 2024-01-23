<?php
session_start();
require_once "conexion.php";

$conexion = conexion();

$usuario = $_POST['usuario'];
$pass = sha1($_POST['password']);

$sql = "SELECT * from usuarios where usuario='$usuario' and password='$pass'";
$result = mysqli_query($conexion, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['user'] = $usuario;
    
    // Devolver el tipo de usuario
    echo $row['tipo_usuario']; // Asegúrate de tener una columna 'tipo_usuario' en tu tabla
} else {
    echo "0"; // Cambié a una cadena para que coincida con la comparación en JavaScript
}
?>
