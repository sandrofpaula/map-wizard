<?php
$id = $_GET['id'];
$mapa = Mapa::findOne($id);
require __DIR__ . '/_form.php';
?>
