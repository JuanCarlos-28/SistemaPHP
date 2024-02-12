<?php

    $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";

    if (!empty($_POST["btnAgregar"])) {
        if (!empty($nombre)) {

            // Utilizar consultas preparadas para mejorar la seguridad
            $query = $con->prepare("INSERT INTO categorias (nombre_categoria) VALUES (?)");

            // Vincular los parámetros
            $query->bind_param("s", $nombre);

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
