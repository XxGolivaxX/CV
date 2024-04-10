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
    $nombre_t = $_POST["nombre_t"];
    $tipo_t = $_POST["tipo_t"];
    $piezas_t = $_POST["piezas_t"];
    $precio_t = $_POST["precio_t"];

    // Preparar la consulta SQL para insertar datos en la tabla "tapetes"
    $query = "INSERT INTO tapetes (nombre_t, tipo_t, piezas_t, precio_t) VALUES ('$nombre_t', '$tipo_t', '$piezas_t', '$precio_t')";

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
