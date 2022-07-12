<!-- Modal -->
<div class="modal fade" id="templateModal" tabindex="-1" aria-labelledby="templateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="post" id="form-template">
                <div class="modal-header">
                    <h5 class="modal-title" id="templateModalLabel">Crear template</h5>
                    <button type="button" class="close" onclick="closeModalSection('templateModal')" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
    
    
                    <div id="content-section">
                        
                        <div class="form-group">
                            <label for="InputWidget">Título</label>
                            <input type="text" class="form-control" name="data[title]">
                            <small>El título servira para identificar al template creado</small>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="data[widget_id]" id="template_widget_id">
                <input type="hidden" name="data[type]" id="template_type">
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary"
                        onclick="closeModalSection('templateModal')">Cerrar</button>
                    <button type="submit" class="btn btn-outline-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
