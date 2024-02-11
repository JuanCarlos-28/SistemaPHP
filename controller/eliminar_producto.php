<?php include("../model/db.php") ?>
<?php
    // Verifica si el parámetro 'id' está presente en la URL
    if (isset($_GET['id'])) {
        // Obtén el valor de 'id'
        $id = $_GET['id'];

        // // Obtener el nombre de la imagen del producto que se va a eliminar
        // $querySelectImagen = $con->prepare("SELECT url_libro FROM libros WHERE id_libro = ?");
        // $querySelectImagen->bind_param("i", $id);
        // $querySelectImagen->execute();
        // $querySelectImagen->bind_result($imagenNombre);
        // $querySelectImagen->fetch();
        // $querySelectImagen->close();

        // // Verificar si se encontró una imagen asociada al producto
        // if ($imagenNombre) {
        //     // Ruta completa de la imagen
        //     $rutaImagen = "./img/" . $imagenNombre;

        //     // Eliminar el archivo de la carpeta
        //     if (file_exists($rutaImagen)) {
        //         unlink($rutaImagen);
        //     } else {
        //         echo "Error: La imagen no existe en la carpeta.";
        //     }
        // }


        error_reporting(E_ALL);
        ini_set('display_errors', 1);
            
        // Consulta preparada para DELETE
        $query = $con->prepare("DELETE FROM libros WHERE id_libro=?");

        // Vincular el parámetro
        $query->bind_param("i", $id);

        if ($query->execute()) {
            echo "Producto eliminado correctamente";
            header("refresh:1;url=../index.php");
        } else {
            echo "Error al eliminar producto: " . $con->error;
        }


    }
    

?>