<?php

if (!empty($_GET["id"])) {
    $id=$_GET["id"];
    $sql=$conexion->query("DELETE FROM subasta WHERE ID_SUBASTA=$id ");
    if ($sql==1) {
        echo '<div class="alert alert-success">subasta eliminada correctamente</div>';
    } else {
        echo '<div class="alert alert-dager">Error al eliminar la subasta </div>';
    }
    
}

?>