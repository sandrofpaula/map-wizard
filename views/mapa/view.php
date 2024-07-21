<!DOCTYPE html>
<html>
<head>
    <title>Ver mapa</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Início</a></li>
                <li class="breadcrumb-item"><a href="index.php">Mapas</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ver mapa</li>
            </ol>
        </nav>
        <h1 class="mt-5">Ver mapa</h1>
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <td><?= $mapa->id ?></td>
            </tr>
            <tr>
                <th>Nome</th>
                <td><?= $mapa->nome ?></td>
            </tr>
            <tr>
                <th>Endereço</th>
                <td><?= $mapa->endereco ?></td>
            </tr>
            <tr>
                <th>Localização</th>
                <td>
                    <?= $mapa->localizacao ?>   
                    <a href="https://www.google.com/maps/dir/Current+Location/<?= $mapa->localizacao ?>" target="_blank" class="btn btn-secondary btn-sm" data-toggle="tooltip" title="Direções"><i class='bi bi-google'></i><i class='bi bi-map'></i></a>
                </td>
            </tr>
        </table>
        
        <p><a href="index.php" class="btn btn-secondary">Volta</a></p>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
