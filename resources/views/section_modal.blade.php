<!-- Modal -->
<div class="modal fade" id="sectionModal" tabindex="-1" aria-labelledby="sectionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="sectionModalLabel">Crear página</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="InputWidget">Agregar  una sección </label>
                <select  id="section" class="form-control" wire:ignore>
                    <option value="">Seleccione una opción</option>
                    @foreach ($widgets as $widget)
                        <option value="{{ $widget->id }}">{{ $widget->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-outline-primary" onclick="changeSection()">Agregar</button>
        </div>
      </div>
    </div>
  </div>