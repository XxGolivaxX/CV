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
    $nombre_m = $_POST["nombre_m"];
    $piezas_m = $_POST["piezas_m"];
    $precio_m = $_POST["precio_m"];

    // Preparar la consulta SQL para insertar datos en la tabla "tapetes"
    $query = "INSERT INTO margrey (nombre_m, piezas_m, precio_m) VALUES ('$nombre_m', '$piezas_m', '$precio_m')";

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