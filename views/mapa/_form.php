<?php
$update='Atualizar';
$create='Criar';
?>
<!DOCTYPE html>
<html>
<head>
    <title><?= isset($mapa->id) ? $update : $create ?> Mapa</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Maps API -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-4bmvcyJRirX5Z63iwSMm-4BxNQQlIoU&libraries=places&callback=initMap"></script>
    <!-- Custom JS -->
    <script src="public/js/map-init.js"></script>
</head>
<body>
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= isset($mapa->id) ? $update : $create ?> Mapa</li>
            </ol>
        </nav>
        <h1 class="mt-5"><?= isset($mapa->id) ? $update : $create ?> Mapa</h1>
        <form method="post" class="mt-3">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" class="form-control" value="<?= isset($mapa->nome) ? $mapa->nome : '' ?>" required>
            </div>
            <div class="form-group">
                <label for="endereco">Endereço:</label>
                <input type="text" name="endereco" id="endereco" class="form-control" value="<?= isset($mapa->endereco) ? $mapa->endereco : '' ?>" required>
            </div>
            <div class="form-group">
                <label for="localizacao">Localização:</label>
                <input type="text" name="localizacao" id="localizacao" class="form-control" value="<?= isset($mapa->localizacao) ? $mapa->localizacao : '' ?>" required>
            </div>
            <div id="map" style="height: 400px; width: 100%;" class="mb-3"></div>
            <button type="submit" class="btn btn-primary"><?= isset($mapa->id) ? $update : $create ?></button>
        </form>
        <p class="mt-3"><a href="index.php" class="btn btn-secondary">Volta</a></p>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
