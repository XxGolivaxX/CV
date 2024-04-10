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
    $nombre_im = $_POST["nombre_im"];
    $tipo_im = $_POST["tipo_im"];
    $piezas_im = $_POST["piezas_im"];
    $precio_im = $_POST["precio_im"];

    // Preparar la consulta SQL para insertar datos en la tabla "tapetes"
    $query = "INSERT INTO imaloya (nombre_im, tipo_im, piezas_im, precio_im) VALUES ('$nombre_im', '$tipo_im', '$piezas_im', '$precio_im')";

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
