<?php

class Clientes {
    public static function obtenerNombreCliente($cliente_id) {
        $conexion = Conexion::obtenerConexion();
        $query_info_cliente = "SELECT cli_nombre  AS cli_nombre, cli_id FROM clientes WHERE cli_id= ?";

        $stmt = $conexion->prepare($query_info_cliente);
        $stmt->bind_param("i", $cliente_id);
        $stmt->execute();
        $result_info_cliente = $stmt->get_result();

        if ($result_info_cliente->num_rows > 0) {
            $fila_info_cliente = $result_info_cliente->fetch_assoc();
            return $fila_info_cliente['cli_nombre'];
        }

        $stmt->close();
        return '';
    }
}

?>