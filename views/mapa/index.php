<!DOCTYPE html>
<html>
<head>
    <title>Mapas</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Google Maps API -->
    <?php if (!$apiKeyMissing): ?>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=<?= $googleApiKey ?>&libraries=places&callback=initMap"></script>
    <?php endif; ?>
    <script src="public/js/initMap.js"></script>
</head>
<body>
    
    <div class="container mt-5">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Mapas</li>
            </ol>
        </nav>
        <h1 class="mt-5">Mapas</h1>

        <?php if ($apiKeyMissing): ?>
            <div class="alert alert-warning" role="alert">
                Por favor, insira a Google API Key para usar os recursos do mapa.
            </div>
        <?php endif; ?>

        <p>
            <a href="index.php?action=create" class="btn btn-success">Criar mapa</a>
            <a href="index.php?action=editApiKey" class="btn <?= $apiKeyMissing ? 'btn-secondary' : 'btn-primary' ?>">Editar Google API Key</a>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#apiKeyInstructionsModal">
                Instruções para criar Google API Key
            </button>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#readmeModal">
                Instruções (README.md)
            </button>
        </p>
        <div class="mb-3">
            <input type="text" id="searchInput" class="form-control" placeholder="Digite para filtrar ...">
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Endereço</th>
                    <th>Localização</th>
                    <th style="width: 220px;">Ações</th>
                </tr>
                <tr>
                    <th><input type="text" id="searchID" class="form-control form-control-sm" placeholder="Filtrar ID"></th>
                    <th><input type="text" id="searchNome" class="form-control form-control-sm" placeholder="Filtrar Nome"></th>
                    <th><input type="text" id="searchEndereco" class="form-control form-control-sm" placeholder="Filtrar Endereço"></th>
                    <th><input type="text" id="searchLocalizacao" class="form-control form-control-sm" placeholder="Filtrar Localização"></th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="mapaTable">
                <?php foreach ($mapas as $mapa): ?>
                <tr>
                    <td><?= $mapa->id ?></td>
                    <td><?= $mapa->nome ?></td>
                    <td><?= $mapa->endereco ?></td>
                    <td><?= $mapa->localizacao ?></td>
                    <td>
                        <button class="btn btn-primary btn-sm" onclick="showInfo(<?= $mapa->localizacao ?>, '<?= $mapa->nome ?><br><?= $mapa->endereco ?>')" data-toggle="modal" data-target="#mapModal" data-toggle="tooltip" title="Direções"><i class='bi bi-geo-alt'></i></button>
                        <a href="https://www.google.com/maps/dir/Current+Location/<?= $mapa->localizacao ?>" target="_blank" class="btn btn-secondary btn-sm" data-toggle="tooltip" title="Google Map"><i class='bi bi-google'></i><i class='bi bi-map'></i></a>
                        <a href="index.php?action=view&id=<?= $mapa->id ?>" class="btn btn-info btn-sm" data-toggle="tooltip" title="Ver"><i class='bi bi-eye'></i></a>
                        <a href="index.php?action=update&id=<?= $mapa->id ?>" class="btn btn-warning btn-sm" data-toggle="tooltip" title="Editar"><i class='bi bi-pencil'></i></a>
                        <a href="index.php?action=delete&id=<?= $mapa->id ?>" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Excluir" onclick="return confirm('Tem certeza de que deseja excluir este item?');"><i class='bi bi-trash'></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Modal mapModalLabel-->
    <?php include 'modal/mapModalLabel.php'; ?>
    <!-- Modal apiKeyInstructionsModal -->
    <?php include 'modal/apiKeyInstructionsModal.php'; ?>
    <?php include 'modal/readmeModal.php'; ?>
    <!-- fim-- Modal -->
    

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();

            function filterTable() {
                var searchInput = document.getElementById('searchInput').value.toLowerCase();
                var searchID = document.getElementById('searchID').value.toLowerCase();
                var searchNome = document.getElementById('searchNome').value.toLowerCase();
                var searchEndereco = document.getElementById('searchEndereco').value.toLowerCase();
                var searchLocalizacao = document.getElementById('searchLocalizacao').value.toLowerCase();
                var rows = document.getElementById('mapaTable').getElementsByTagName('tr');

                Array.from(rows).forEach(function(row) {
                    var idCell = row.getElementsByTagName('td')[0].textContent.toLowerCase();
                    var nomeCell = row.getElementsByTagName('td')[1].textContent.toLowerCase();
                    var enderecoCell = row.getElementsByTagName('td')[2].textContent.toLowerCase();
                    var localizacaoCell = row.getElementsByTagName('td')[3].textContent.toLowerCase();

                    var idMatch = idCell.indexOf(searchID) > -1;
                    var nomeMatch = nomeCell.indexOf(searchNome) > -1;
                    var enderecoMatch = enderecoCell.indexOf(searchEndereco) > -1;
                    var localizacaoMatch = localizacaoCell.indexOf(searchLocalizacao) > -1;
                    var generalMatch = idCell.indexOf(searchInput) > -1 || nomeCell.indexOf(searchInput) > -1 || enderecoCell.indexOf(searchInput) > -1 || localizacaoCell.indexOf(searchInput) > -1;

                    row.style.display = idMatch && nomeMatch && enderecoMatch && localizacaoMatch && generalMatch ? '' : 'none';
                });
            }

            document.getElementById('searchInput').addEventListener('keyup', filterTable);
            document.getElementById('searchID').addEventListener('keyup', filterTable);
            document.getElementById('searchNome').addEventListener('keyup', filterTable);
            document.getElementById('searchEndereco').addEventListener('keyup', filterTable);
            document.getElementById('searchLocalizacao').addEventListener('keyup', filterTable);
        });
    </script>
</body>
</html>
