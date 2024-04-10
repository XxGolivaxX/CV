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

// Recibir y procesar los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigo_p = $_POST["codigo_p"];
    $nombre_p = $_POST["nombre_p"];
    $descripcion_p = $_POST["descripcion_p"];
    $color = $_POST["color"];
    $cantidad = $_POST["cantidad"];
    $precio = $_POST["precio"];

    // Verificar si el código ya está en uso
    $query_verificar = "SELECT COUNT(*) AS count FROM ventas WHERE codigo_p = '$codigo_p'";
    $resultado_verificar = mysqli_query($conn, $query_verificar);
    $fila_verificar = mysqli_fetch_assoc($resultado_verificar);
    $cantidad_usos = $fila_verificar['count'];
    
    if ($cantidad_usos > 0) {
        // El código ya está en uso
        echo "<script>alert('Error: El código $codigo_p ya está en uso. Por favor, ingrese otro código.'); window.history.back();</script>";
    } else {
        // Preparar la consulta SQL para insertar el nuevo producto en la base de datos
        $query = "INSERT INTO ventas (codigo_p, nombre_p, descripcion_p, color, cantidad, precio) VALUES ('$codigo_p', '$nombre_p', '$descripcion_p', '$color', '$cantidad', '$precio')";

        // Ejecutar la consulta
        if (mysqli_query($conn, $query)) {
            // Producto agregado correctamente
            // Redirigir al usuario a la página de producto guardado
            header("Location: ../PAGINAS/producto_guardado.html?codigo_p=$codigo_p&nombre_p=$nombre_p&descripcion_p=$descripcion_p&color=$color&cantidad=$cantidad&precio=$precio");
            exit();
        } else {
            // Error al agregar producto
            echo "Error al agregar producto: " . mysqli_error($conn);
        }
    }
}

// Cerrar la conexión
mysqli_close($conn);
?>





