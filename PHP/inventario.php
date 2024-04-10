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

// Verificar si se recibió una solicitud de eliminación
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    // Obtener el ID del producto a eliminar
    $id = $_POST["id"];

    // Preparar la consulta para eliminar el producto
    $query = "DELETE FROM ventas WHERE id = $id";

    // Ejecutar la consulta
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Error al eliminar el producto: " . mysqli_error($conn));
    }

    // Devolver una respuesta exitosa
    echo "Producto eliminado exitosamente";
} else {
    // Realizar la consulta para obtener los datos de ventas
    $query = "SELECT * FROM ventas";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Error en la consulta: " . mysqli_error($conn));
    }

    // Preparar los datos de ventas como un array asociativo
    $ventas = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $ventas[] = $row;
    }

    // Realizar la consulta para obtener los datos de tapetes
    $query = "SELECT * FROM tapetes";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Error en la consulta de tapetes: " . mysqli_error($conn));
    }

    // Agregar los datos de tapetes al array de ventas
    while ($row = mysqli_fetch_assoc($result)) {
        $ventas[] = $row;
    }

    // Realizar la consulta para obtener los datos de margrey
    $query = "SELECT * FROM margrey";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Error en la consulta de margrey: " . mysqli_error($conn));
    }

    // Agregar los datos de margrey al array de ventas
    while ($row = mysqli_fetch_assoc($result)) {
        $ventas[] = $row;
    }

    // Realizar la consulta para obtener los datos de imaloya
    $query = "SELECT * FROM imaloya";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Error en la consulta de imaloya: " . mysqli_error($conn));
    }

    // Agregar los datos de imaloya al array de ventas
    while ($row = mysqli_fetch_assoc($result)) {
        $ventas[] = $row;
    }

    // Realizar la consulta para obtener los datos de autoplus
    $query = "SELECT * FROM autoplus";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Error en la consulta de autoplus: " . mysqli_error($conn));
    }

    // Agregar los datos de autoplus al array de ventas
    while ($row = mysqli_fetch_assoc($result)) {
        $ventas[] = $row;
    }

    // Realizar la consulta para obtener los datos de hella
    $query = "SELECT * FROM hella";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Error en la consulta de hella: " . mysqli_error($conn));
    }

    // Agregar los datos de hella al array de ventas
    while ($row = mysqli_fetch_assoc($result)) {
        $ventas[] = $row;
    }

    // Realizar la consulta para obtener los datos de evolum
    $query = "SELECT * FROM evolum";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Error en la consulta de evolum: " . mysqli_error($conn));
    }

    // Agregar los datos de evolum al array de ventas
    while ($row = mysqli_fetch_assoc($result)) {
        $ventas[] = $row;
    }

    // Devolver los datos de ventas en formato JSON
    echo json_encode($ventas);
}

// Cerrar la conexión
mysqli_close($conn);
?>






