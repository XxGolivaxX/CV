<?php
// Establecer conexión a la base de datos
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "proyecto.ING1.";
$dbname = "gyc";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (!$conn) {
    die("No hay conexión: " . mysqli_connect_error());
}

// Verificar si se recibe el ID_T del cliente a eliminar
if (isset($_GET['id_t'])) {
    $id_t = $_GET['id_t'];

    // Preparar la consulta SQL para eliminar el cliente
    $query = "DELETE FROM tapetes WHERE id_t = $id_t";

    // Ejecutar la consulta
    if (mysqli_query($conn, $query)) {
        echo "Cliente eliminado correctamente";
    } else {
        echo "Error al eliminar cliente: " . mysqli_error($conn);
    }
} else {
    echo "ID_T del cliente no proporcionado";
}

// Cerrar la conexión
mysqli_close($conn);
?>