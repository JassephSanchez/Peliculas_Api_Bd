<?php

class CarritoControlador {
    private $modelo;

    public function __construct(CarritoModeloInterface $modelo) {
        $this->modelo = $modelo;
    }
    public function obtenerProductos($cliente_id) {
        return $this->modelo->obtenerCarrito($cliente_id);
    }
    public function eliminarProducto($producto_id, $cliente_id) {
        $this->modelo->eliminarProducto($producto_id, $cliente_id);
    }
}
?>