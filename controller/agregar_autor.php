<?php

    $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
    $nacionalidad = isset($_POST["nacionalidad"]) ? $_POST["nacionalidad"] : "";

    if (!empty($_POST["btnAgregar"])) {
        if (!empty($nombre) and !empty($nacionalidad)) {

            // Utilizar consultas preparadas para mejorar la seguridad
            $query = $con->prepare("INSERT INTO autores (nombre_autor, nacionalidad_autor) VALUES (?, ?)");

            // Vincular los parámetros
            $query->bind_param("ss", $nombre, $nacionalidad);

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
