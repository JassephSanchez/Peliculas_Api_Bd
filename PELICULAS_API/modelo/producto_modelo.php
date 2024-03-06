<?php
class detalle_producto {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function obtenerProducto($id_reloj) {
        $consulta = "SELECT * FROM productos WHERE prod_id = ?";
        $consulta_preparada = $this->conexion->prepare($consulta);

        if (!$consulta_preparada) {
            die("Error en la preparación de la consulta: " . $this->conexion->error);
        }

        $consulta_preparada->bind_param("i", $id_reloj);
        $consulta_preparada->execute();

        $resultado = $consulta_preparada->get_result();
        $detalles = [];

        if ($resultado->num_rows > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                $detalles['prod_nombre'] = $fila['prod_nombre'];
                $detalles['prod_precio'] = $fila['prod_precio'];
                $detalles['imagen'] = $fila['imagen'];
                $detalles['prod_id'] = $fila['prod_id']; // Agrega la ruta de la imagen
            }
        }

        $consulta_preparada->close();

        return $detalles;
}
}
?>