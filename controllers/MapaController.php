<?php

require_once __DIR__ . '/../models/Mapa.php';

class MapaController
{
    public function index()
    {
        $mapas = Mapa::findAll();
        $googleApiKey = Mapa::getApiKey();
        $apiKeyMissing = empty($googleApiKey) || $googleApiKey == 'YOUR_GOOGLE_API_KEY';
        $readmeContent = $this->readReadme(); // Carregar conteúdo do README
        require __DIR__ . '/../views/mapa/index.php';
    }

    public function view($id)
    {
        $mapa = Mapa::findOne($id);
        require __DIR__ . '/../views/mapa/view.php';
    }

    public function create()
    {
        $mapa = new Mapa();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $mapas = Mapa::findAll();
            $maxId = 0;

            // Encontrar o maior ID existente
            foreach ($mapas as $item) {
                if ($item->id > $maxId) {
                    $maxId = $item->id;
                }
            }

            // Incrementar o maior ID para obter o próximo ID
            $mapa->id = $maxId + 1;
            $mapa->nome = $_POST['nome'];
            $mapa->endereco = $_POST['endereco'];
            $mapa->localizacao = $_POST['localizacao'];

            $mapas[] = $mapa;
            Mapa::saveAll($mapas);

            header('Location: index.php');
            exit;
        }

        require __DIR__ . '/../views/mapa/create.php';
    }

    public function update($id)
    {
        $mapa = Mapa::findOne($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $mapa->nome = $_POST['nome'];
            $mapa->endereco = $_POST['endereco'];
            $mapa->localizacao = $_POST['localizacao'];
            $mapas = Mapa::findAll();
            foreach ($mapas as &$item) {
                if ($item->id == $mapa->id) {
                    $item = $mapa;
                    break;
                }
            }
            Mapa::saveAll($mapas);
            header('Location: index.php?action=view&id=' . $mapa->id);
            exit;
        }

        require __DIR__ . '/../views/mapa/update.php';
    }

    public function delete($id)
    {
        $mapas = Mapa::findAll();
        $mapas = array_filter($mapas, function ($item) use ($id) {
            return $item->id != $id;
        });
        Mapa::saveAll($mapas);
        header('Location: index.php');
        exit;
    }

    public function getApiKey()
    {
        return Mapa::getApiKey();
    }

    public function editApiKey()
    {
        $googleApiKey = Mapa::getApiKey();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $googleApiKey = $_POST['google_api_key'];
            $mapas = Mapa::findAll();
            $data = [
                'google_api_key' => $googleApiKey,
                'mapas' => array_map(function ($mapa) {
                    return $mapa->toArray();
                }, $mapas)
            ];
            file_put_contents(__DIR__ . '/../data/db-mapa.json', json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            header('Location: index.php');
            exit;
        }

        require __DIR__ . '/../views/mapa/editApiKey.php';
    }

    private function readReadme()
    {
        $filePath = __DIR__ . '/../README.md'; // Ajuste o caminho conforme necessário
        if (file_exists($filePath)) {
            return file_get_contents($filePath);
        } else {
            return "O arquivo README.md não foi encontrado.";
        }
    }
}
