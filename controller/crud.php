<?php 

    // Verificar qué botón se ha presionado
    if (isset($_POST['btnConsultar'])) {
        include("./controller/consultar_producto.php");
    }

?>