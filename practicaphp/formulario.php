<?php
if ($_POST) {
    $nombre = $_POST["NOMBRE"];
    $apellido = $_POST["APELLIDO"];
    $email = $_POST["EMAIL"];

    // Validacion de los datos ingresados
    if (empty($nombre) || empty($apellido) || empty($email)) {
        echo "Se han detectado campos vacíos. Por favor, completa todos los campos.";
        exit;
    }

    // Conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = ""; // No tengo contraseña, pero, si la tienes, ponla aqui
    $dbname = "usuario";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Consulta preparada para la inserción de datos
    $sql = "INSERT INTO usuario(NOMBRE, APELLIDO, EMAIL) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nombre, $apellido, $email);

    if ($stmt->execute()) {
        echo "Registro creado exitosamente";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
