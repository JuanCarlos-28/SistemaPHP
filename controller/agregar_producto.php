<?php

    $titulo = isset($_POST["titulo"]) ? $_POST["titulo"] : "";
    $autor = isset($_POST["autor"]) ? $_POST["autor"] : "";
    $editorial = isset($_POST["editorial"]) ? $_POST["editorial"] : "";
    $categoria = isset($_POST["categoria"]) ? $_POST["categoria"] : "";
    $fechaPublicacion = isset($_POST["fechaPublicacion"]) ? $_POST["fechaPublicacion"] : "";
    $isbn = isset($_POST["isbn"]) ? $_POST["isbn"] : "";

    if (!empty($_POST["btnAgregar"])) {
        if (!empty($titulo) and !empty($autor) and !empty($editorial) and !empty($categoria) and !empty($fechaPublicacion) and !empty($isbn)) {

            // Utilizar consultas preparadas para mejorar la seguridad
            $query = $con->prepare("INSERT INTO libros (titulo_libro, id_autor, id_editorial, id_categoria, fecha_publicacion, isbn) VALUES (?, ?, ?, ?, ?, ?)");

            // Vincular los parámetros
            $query->bind_param("ssdissi", $titulo, $autor, $editorial, $categoria, $fechaPublicacion, $isbn);

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
