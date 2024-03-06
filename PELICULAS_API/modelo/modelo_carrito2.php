<?php

interface CarritoModeloInterface {
    public function obtenerCarrito($cliente_id);
    public function eliminarProducto($producto_id, $cliente_id);
}
?>