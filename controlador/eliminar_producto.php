<?php

if (!empty($_GET["id"])) {
    $id=$_GET["id"];
    $sql=$conexion->query("DELETE FROM producto WHERE ID_PRODUCTO=$id ");
    if ($sql==1) {
        echo '<div class="alert alert-success">producto eliminado correctamente</div>';
    } else {
        echo '<div class="alert alert-dager">Error al eliminar un producto </div>';
    }
    
}

?>