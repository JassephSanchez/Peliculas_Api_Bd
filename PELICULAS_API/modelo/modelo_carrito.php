<?php

require_once '../modelo/modelo_carrito2.php';

class CarritoModelo implements CarritoModeloInterface{
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function obtenerCarrito($cliente_id) {
        $query_carrito = "SELECT c.id AS car_id, p.* FROM carrito c
                        INNER JOIN productos p ON c.prod_id = p.prod_id
                        WHERE c.cli_id = '$cliente_id'";
        $result_carrito = $this->conexion->query($query_carrito);

        return $result_carrito;
    }

    public function eliminarProducto($producto_id, $cliente_id) {
        $query = "DELETE FROM carrito WHERE prod_id = '$producto_id' AND cli_id = '$cliente_id'";
        mysqli_query($this->conexion, $query);
    }
}
?>