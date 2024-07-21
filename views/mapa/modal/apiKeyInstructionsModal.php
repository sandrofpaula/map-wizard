<!-- Modal -->
<div class="modal fade" id="apiKeyInstructionsModal" tabindex="-1" role="dialog" aria-labelledby="apiKeyInstructionsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="apiKeyInstructionsModalLabel">Instruções para criar Google API Key</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h4>Passos para criar uma Google Maps API Key:</h4>
                <ol>
                    <li>
                        Acesse o <a href="https://console.cloud.google.com/" target="_blank">Google Cloud Console</a>.
                    </li>
                    <li>
                        Faça login com sua conta Google.
                    </li>
                    <li>
                        Clique em <strong>"Select a Project"</strong> e depois em <strong>"New Project"</strong>.
                    </li>
                    <li>
                        Dê um nome ao seu projeto e clique em <strong>"Create"</strong>.
                    </li>
                    <li>
                        Após a criação do projeto, selecione-o na lista de projetos.
                    </li>
                    <li>
                        No menu de navegação, vá para <strong>"APIs & Services" &rarr; "Credentials"</strong>.
                    </li>
                    <li>
                        Clique em <strong>"Create Credentials"</strong> e selecione <strong>"API Key"</strong>.
                    </li>
                    <li>
                        Uma nova API Key será criada. Você pode copiar essa chave e usá-la no seu projeto.
                    </li>
                    <li>
                        Para restringir a API Key, clique no ícone de lápis ao lado da chave criada. Vá até a seção <strong>"Application restrictions"</strong> e selecione <strong>"HTTP referrers (web sites)"</strong>. Adicione os URLs do seu site.
                    </li>
                    <li>
                        Na seção <strong>"API restrictions"</strong>, selecione <strong>"Restrict key"</strong> e marque as APIs que você deseja usar, como <strong>"Maps JavaScript API"</strong>, <strong>"Places API"</strong>, etc.
                    </li>
                    <li>
                        Clique em <strong>"Save"</strong> para salvar suas configurações.
                    </li>
                </ol>
                <p>Após seguir esses passos, você terá uma Google Maps API Key que poderá usar no seu projeto.</p>
            </div>
        </div>
    </div>
</div>