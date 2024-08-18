<?php

class Executor
{
    public static function doit(string $sql, array $params = []): array
    {
        $con = Database::getCon();
        $stmt = $con->prepare($sql);

        if ($stmt === false) {
            throw new Exception("Error preparando la consulta: " . $con->error);
        }

        // Si hay parámetros, los vinculamos a la consulta
        if (!empty($params)) {
            // Asumimos que todos los parámetros son strings. Ajusta el tipo si es necesario.
            $types = str_repeat('s', count($params)); 
            $stmt->bind_param($types, ...array_values($params));
        }

        $stmt->execute();

        if ($stmt->errno) {
            throw new Exception("Error ejecutando la consulta: " . $stmt->error);
        }

        // Devolver los resultados y el último ID insertado
        $result = $stmt->get_result();
        return [$result, $con->insert_id];
    }
}
