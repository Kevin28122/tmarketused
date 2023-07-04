<?php

if (!empty($_GET["id"])) {
    $id=$_GET["id"];
    $sql=$conexion->query("DELETE FROM pedido WHERE ID_PEDIDO=$id ");
    if ($sql==1) {
        echo '<div class="alert alert-success">pedido eliminado correctamente</div>';
    } else {
        echo '<div class="alert alert-dager">Error al eliminar un pedido </div>';
    }
    
}

?>