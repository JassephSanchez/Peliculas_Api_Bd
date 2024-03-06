<?php
class Detalleproducto {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function obtenerProducto($id_producto) {
        $consulta = "SELECT * FROM productos WHERE id = ?";
        $consulta_preparada = $this->conexion->prepare($consulta);

        if (!$consulta_preparada) {
            die("Error en la preparación de la consulta: " . $this->conexion->error);
        }

        $consulta_preparada->bind_param("i", $id_producto);
        $consulta_preparada->execute();

        $resultado = $consulta_preparada->get_result();
        $detalles = [];

        if ($resultado->num_rows > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                $detalles['title'] = $fila['title'];
                $detalles['price'] = $fila['price'];
                $detalles['thumbnail'] = $fila['thumbnail'];
                $detalles['id'] = $fila['id']; // Agrega la ruta de la imagen
            }
        }

        $consulta_preparada->close();

        return $detalles;
    }
}
?>