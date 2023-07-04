<?php

if (!empty($_GET["id"])) {
    $id=$_GET["id"];
    $sql=$conexion->query("DELETE FROM venta WHERE ID_VENTA=$id ");
    if ($sql==1) {
        echo '<div class="alert alert-success">Venta eliminada correctamente</div>';
    } else {
        echo '<div class="alert alert-dager">Error al eliminar una venta </div>';
    }
    
}

?>