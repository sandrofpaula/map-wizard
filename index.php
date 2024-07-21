<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<?php

require_once __DIR__ . '/controllers/MapaController.php';

$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

$controller = new MapaController();

if ($action == 'index') {
    $controller->index();
} elseif ($action == 'view' && $id) {
    $controller->view($id);
} elseif ($action == 'create') {
    $controller->create();
} elseif ($action == 'update' && $id) {
    $controller->update($id);
} elseif ($action == 'delete' && $id) {
    $controller->delete($id);
} elseif ($action == 'editApiKey') {
    $controller->editApiKey();
} else {
    echo "Ação inválida!";
}
