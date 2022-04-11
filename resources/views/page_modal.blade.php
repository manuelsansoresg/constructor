<!-- Modal -->
<div class="modal fade" id="pageModal" tabindex="-1" aria-labelledby="pageModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="pageModalLabel">Crear página</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="InputWidget">Nombre página</label>
                <input type="text" class="form-control" id="titlePage">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" id="close-page-modal" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-outline-primary" onclick="addTitle()">Guardar</button>
        </div>
      </div>
    </div>
  </div>