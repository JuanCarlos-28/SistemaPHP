<?php

    $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
    $direccion = isset($_POST["direccion"]) ? $_POST["direccion"] : "";
    $correo = isset($_POST["correo"]) ? $_POST["correo"] : "";

    if (!empty($_POST["btnAgregar"])) {
        if (!empty($nombre) and !empty($direccion) and !empty($correo)) {

            // Utilizar consultas preparadas para mejorar la seguridad
            $query = $con->prepare("INSERT INTO editoriales (nombre_editorial, direccion_editorial, correo_editorial) VALUES (?, ?, ?)");

            // Vincular los parámetros
            $query->bind_param("ssd", $nombre, $direccion, $correo);

            if ($query->execute()) {
                echo "Datos insertados correctamente";
                header("refresh:2;url=./index.php");
            } else {
                echo "Error al insertar datos: " . $con->error;
            }

            // Cerrar la consulta
            $query->close();
        } else {
            echo "Ningun campo debe estar vacio";
        }
    }
?>
