<?php
$archivo = 'datos.json';

// Verificar si se recibe una actualización
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $datos = json_decode(file_get_contents('php://input'), true);
    file_put_contents($archivo, json_encode($datos));
    echo json_encode(["mensaje" => "Marcador actualizado"]);
    exit;
}

// Si es una solicitud GET, devolver los datos guardados
if (file_exists($archivo)) {
    echo file_get_contents($archivo);
} else {
    echo json_encode(["ganados" => 0, "perdidos" => 0]);
}
?>
