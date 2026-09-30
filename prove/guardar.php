<?php
// Recibe los datos enviados por JavaScript
$contenidoJSON = file_get_contents('php://input');
$nuevoRegistro = json_decode($contenidoJSON, true);

if ($nuevoRegistro) {
    $archivo = 'registros.json';
    
    // Si el archivo ya existe, lee su contenido actual
    $registros = [];
    if (file_exists($archivo)) {
        $actual = file_get_contents($archivo);
        $registros = json_decode($actual, true) ?: [];
    }
    
    // Agrega el nuevo registro al arreglo
    $registros[] = $nuevoRegistro;
    
    // Guarda el arreglo actualizado en el archivo JSON
    file_put_contents($archivo, json_encode($registros, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    
    http_response_code(200);
    echo json_encode(["mensaje" => "Guardado con éxito"]);
} else {
    http_response_code(400);
    echo json_encode(["error" => "Datos inválidos"]);
}
?>
