# Sistema de Mapas (Map Wizard)

Este é um sistema de gerenciamento de locais utilizando o Google Maps API.
O sistema permite criar, editar, visualizar e excluir locais, além de fornecer direções para os locais usando o Google Maps.

## Funcionalidades

- **CRUD de Locais**: Adicionar, editar, visualizar e excluir locais.
- **Integração com Google Maps**: Exibir localização no mapa e fornecer direções.
- **Filtragem de Locais**: Filtrar locais por ID, nome, endereço ou localização.
- **Gerenciamento da Google API Key**: Adicionar e editar a chave da API do Google.

## Requisitos

- Servidor web (Apache, Nginx, etc.)
- PHP 7.4 ou superior

## Instalação

1. **Clone o repositório:**
    ```sh
    git clone https://github.com/sandrofpaula/map-wizard.git
    ```

2. **Navegue até o diretório do projeto:**
    ```sh
    cd map-wizard
    ```

3. **Configure o servidor web:**
    - Certifique-se de que o servidor web está apontando para o diretório do projeto.

4. **Permissões de Arquivo:**
    - Certifique-se de que o servidor web tenha permissões de leitura e escrita no diretório `data` 
   onde o arquivo `db-mapa.json` está localizado.

## Uso

### Adicionar um Novo Local

1. Clique no botão "Criar mapa" na página inicial.
2. Preencha o formulário com o nome, endereço e localização do local.
3. Clique em "Salvar".

### Editar um Local

1. Na página inicial, clique no botão "Editar" ao lado do local que deseja editar.
2. Atualize as informações do local no formulário.
3. Clique em "Salvar".

### Excluir um Local

1. Na página inicial, clique no botão "Excluir" ao lado do local que deseja excluir.
2. Confirme a exclusão.

### Visualizar um Local

1. Na página inicial, clique no botão "Ver" ao lado do local que deseja visualizar.
2. A localização será exibida em um mapa.

### Editar a Google API Key

1. Na página inicial, clique no botão "Editar Google API Key".
2. Insira a nova chave da API no campo fornecido.
3. Clique em "Salvar".

### Instruções para Obter uma Google API Key

1. Acesse o <a href="https://console.cloud.google.com/" target="_blank">Google Cloud Console</a>.
2. Crie um novo projeto ou selecione um projeto existente.
3. Vá para a seção "APIs & Services" e clique em "Enable APIs and Services".
4. Habilite a "Maps JavaScript API".
5. Navegue até "APIs & Services" > "Credentials".
6. Clique em "Create Credentials" e selecione "API Key".
7. Copie a chave gerada e insira-a no sistema utilizando o botão "Editar Google API Key".

## Estrutura do Projeto

- `controllers/MapaController.php`: Controlador principal do sistema.
- `models/Mapa.php`: Modelo responsável pelo gerenciamento dos dados dos locais.
- `views/mapa/`: Diretório contendo as views do sistema.
- `data/db-mapa.json`: Arquivo JSON onde os dados dos locais são armazenados.
- `public/js/`: Diretório contendo os arquivos JavaScript.

## Contato

Para mais informações, entre em contato pelo <a href="https://www.linkedin.com/in/sandro-paula-379091108/" target="_blank">LinkedIn</a>.


