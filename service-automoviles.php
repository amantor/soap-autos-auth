<?php
require_once('GestionAutomoviles.php');

$options = array(
    'uri' => 'http://dwes.infinityfreeapp.com/soap-automoviles/'
);

$server = new SoapServer(null, $options);
$server->setClass('GestionAutomovilesAuth');
$server->handle();
?>
