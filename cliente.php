<?php
session_start();

header('Content-Type: application/json'); // Asegurarse de que la respuesta siempre sea JSON

try {
    $client = new SoapClient(null, array(
        'location' => 'http://dwes.infinityfreeapp.com/soap-automoviles/service-automoviles-auth.php',
        'uri' => 'http://dwes.infinityfreeapp.com/soap-automoviles/',
        'trace' => 1
    ));

    $client->__setCookie('__test', '860650c18a37404c39013367cd8405ef');

    $header_params = new stdClass();
    $header_params->username = 'ies';
    $header_params->password = 'daw';
    $header = new SoapHeader('http://dwes.infinityfreeapp.com/soap-automoviles/', 'autenticar', $header_params, false);
    $client->__setSoapHeaders($header);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $action = isset($_POST['action']) ? $_POST['action'] : '';
        switch ($action) {
            case 'getBrands':
                $result = $client->ObtenerMarcasUrl();
                echo json_encode($result);
                break;

            case 'getModels':
                if (isset($_POST['brand'])) {
                    $brand = $_POST['brand'];
                    $result = $client->ObtenerModelosPorMarca($brand);
                    echo json_encode($result);
                } else {
                    echo json_encode(['error' => 'Brand not provided']);
                }
                break;

            default:
                echo json_encode(['error' => 'Invalid action']);
                break;
        }
    } else {
        echo json_encode(['error' => 'Invalid request method']);
    }
} catch (SoapFault $e) {
    echo json_encode(['error' => 'SOAP Fault: ' . $e->getMessage()]);
} catch (Exception $e) {
    echo json_encode(['error' => 'Error: ' . $e->getMessage()]);
}
?>
