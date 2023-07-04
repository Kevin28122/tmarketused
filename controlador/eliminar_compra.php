<?php

if (!empty($_GET["id"])) {
    $id=$_GET["id"];
    $sql=$conexion->query("DELETE FROM compra WHERE ID_COMPRA=$id ");
    if ($sql==1) {
        echo '<div class="alert alert-success">compra eliminada correctamente</div>';
    } else {
        echo '<div class="alert alert-dager">Error al eliminar una compra </div>';
    }
    
}

?>