<div class="modal fade" id="readmeModal" tabindex="-1" role="dialog" aria-labelledby="readmeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="readmeModalLabel">Instruções (README.md)</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <pre><?= htmlspecialchars($readmeContent) ?></pre>
                    </div>
                </div>
            </div>
        </div>
    </div>