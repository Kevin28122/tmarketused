<?php

if (!empty($_GET["id"])) {
    $id=$_GET["id"];
    $sql=$conexion->query("DELETE FROM cliente WHERE ID_CLIENTE=$id ");
    if ($sql==1) {
        echo '<div class="alert alert-success">cliente eliminado correctamente</div>';
    } else {
        echo '<div class="alert alert-dager">Error al eliminar un cliente </div>';
    }
    
}

?>