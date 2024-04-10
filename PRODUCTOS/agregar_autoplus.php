<?php
// Establecer conexión a la base de datos
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "proyecto.ING1.";
$dbname = "gyc";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (!$conn) {
    die("No se pudo conectar a la base de datos: " . mysqli_connect_error());
}

// Verificar si se recibió una solicitud POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir datos del formulario
    $nombre_ap = $_POST["nombre_ap"];
    $piezas_ap = $_POST["piezas_ap"];
    $medida_ap = $_POST["medida_ap"];
    $precio_ap = $_POST["precio_ap"];

    // Preparar la consulta SQL para insertar datos en la tabla "tapetes"
    $query = "INSERT INTO autoplus (nombre_ap, piezas_ap, medida_ap, precio_ap) VALUES ('$nombre_ap','$piezas_ap', '$medida_ap',  '$precio_ap')";

    // Ejecutar la consulta
    if (mysqli_query($conn, $query)) {
        echo "Datos insertados correctamente.";
    } else {
        echo "Error al insertar datos: " . mysqli_error($conn);
    }
}

// Cerrar la conexión
mysqli_close($conn);
?>
