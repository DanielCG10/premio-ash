<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "documentacion";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$id = $_GET['id'];
$carpetaTrabajador = "empleados/$id"; 
eliminarCarpeta($carpetaTrabajador);


function eliminarCarpeta($ruta)
{
  if (is_dir($ruta)) {
    $archivos = array_diff(scandir($ruta), array('.', '..'));
    foreach ($archivos as $archivo) {
      eliminarCarpeta("$ruta/$archivo");
    }
    rmdir($ruta);
  } else {
    unlink($ruta);
  }
}

$sql2 = "DELETE FROM cv WHERE num_trabajador = $id";

$sql = "DELETE FROM datos_trabajador WHERE num_trabajador=$id";

if (mysqli_query($conn, $sql2)) {
  echo "<script>location.href='index.php'</script>";
} else {
  echo "Error al eliminar registro: " . mysqli_error($conn);
}

if (mysqli_query($conn, $sql)) {  
  echo "<script>location.href='index.php'</script>";
} else {
  echo "Error al eliminar registro: " . mysqli_error($conn);
}

mysqli_close($conn);
?>