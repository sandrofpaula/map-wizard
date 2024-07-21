<?php

class Mapa
{
    private static $filePath = __DIR__ . '/../data/db-mapa.json';

    public $id;
    public $nome;
    public $endereco;
    public $localizacao;

    public function __construct($data = [])
    {
        $this->id = $data['id'] ?? null;
        $this->nome = $data['nome'] ?? '';
        $this->endereco = $data['endereco'] ?? '';
        $this->localizacao = $data['localizacao'] ?? '';
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'endereco' => $this->endereco,
            'localizacao' => $this->localizacao,
        ];
    }

    public static function findAll()
    {
        $data = json_decode(file_get_contents(self::$filePath), true);
        return array_map(function ($item) {
            return new self($item);
        }, $data['mapas']);
    }

    public static function findOne($id)
    {
        $data = json_decode(file_get_contents(self::$filePath), true);
        $mapaArray = array_filter($data['mapas'], function ($item) use ($id) {
            return $item['id'] == $id;
        });
        return new self(array_shift($mapaArray));
    }

    public static function getApiKey()
    {
        $data = json_decode(file_get_contents(self::$filePath), true);
        return $data['google_api_key'];
    }

    public static function saveAll($mapas)
    {
        $data = [
            'google_api_key' => self::getApiKey(),
            'mapas' => array_map(function ($mapa) {
                return $mapa->toArray();
            }, $mapas)
        ];
        file_put_contents(self::$filePath, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }
}
