<!DOCTYPE html>
<html>
<head>
    <title>Editar Google API Key</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">
</head>
<body>
    <!-- Modal -->
    <div class="modal fade" id="editApiKeyModal" tabindex="-1" role="dialog" aria-labelledby="editApiKeyModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editApiKeyModalLabel">Editar Google API Key</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editApiKeyForm" method="post" action="index.php?action=editApiKey">
                        <div class="form-group">
                            <label for="googleApiKey">Google API Key</label>
                            <input type="text" class="form-control" id="googleApiKey" name="google_api_key" value="<?= htmlspecialchars($googleApiKey) ?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#editApiKeyModal').modal('show');

            $('#editApiKeyModal').on('hidden.bs.modal', function () {
                window.location.href = 'index.php';
            });
        });
    </script>
</body>
</html>
