<?php
// Datos
$token = 'apis-token-1.aTSI1U7KEuT-6bbbCguH-4Y8TI6KS73N';
$fecha = date('Y-m-d');

// Iniciar llamada a API
$curl = curl_init();

curl_setopt_array($curl, array(
  // para usar la api versión 2
  // CURLOPT_URL => 'https://api.apis.net.pe/v2/sunat/tipo-cambio?date=' . $fecha,
  // para usar la api versión 1
  CURLOPT_URL => 'https://api.apis.net.pe/v1/tipo-cambio-sunat?fecha=' . $fecha,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 2,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Referer: https://apis.net.pe/tipo-de-cambio-sunat-api',
    'Authorization: Bearer ' . $token
  ),
));

$response = curl_exec($curl);

curl_close($curl);


// Decodificar la respuesta JSON
$tipoCambioSunat = json_decode($response);

// Verificar si la decodificación fue exitosa y la estructura esperada
//if (isset($tipoCambioSunat->compra) && isset($tipoCambioSunat->venta)) {
    // Imprimir el tipo de cambio en la consola
    //echo "Tipo de cambio de compra: " . $tipoCambioSunat->compra . PHP_EOL;
    //echo "Tipo de cambio de venta: " . $tipoCambioSunat->venta . PHP_EOL;
//} else {
    // Imprimir un mensaje de error si la estructura no es la esperada
    //echo "La estructura de la respuesta JSON no es la esperada" . PHP_EOL;
//}

?>