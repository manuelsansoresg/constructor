<!-- Modal -->
<div class="modal fade" id="sectionModal" tabindex="-1" aria-labelledby="sectionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="sectionModalLabel">Agregar sección o template</h5>
                <button type="button" class="close" onclick="closeModalSection('sectionModal')" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" onclick="changeModalAddSection(1)" name="inlineRadioOptions" id="seccion"
                        value="option1" checked>
                    <label class="form-check-label" for="seccion">Sección</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" onclick="changeModalAddSection(2)" name="inlineRadioOptions" id="template"
                        value="option2">
                    <label class="form-check-label" for="template">Template</label>
                </div>

                <div id="content-section">
                    <div class="form-group">
                        <label for="InputWidget">Agregar una sección </label>
                        <select id="section" class="form-control" wire:ignore>
                            <option value="">Seleccione una opción</option>
                            @foreach ($widgets as $widget)
                                <option value="{{ $widget->id }}">{{ $widget->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div id="content-template" style="display: none">
                  <div class="form-group">
                    <label for="InputWidget">Agregar un template </label>
                    <select id="section-template" class="form-control" wire:ignore>
                        <option value="">Seleccione una opción</option>
                        @foreach ($templates as $template)
                            <option value="{{ $template->id }}">{{ $template->title }}</option>
                        @endforeach
                    </select>
                </div>
                </div>

            </div>
            <input type="hidden" id="section-modal-section" value="1">
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary"
                    onclick="closeModalSection('sectionModal')">Cerrar</button>
                <button type="button" class="btn btn-outline-primary"
                    onclick="changeSection({{ $page_actual->id }})">Agregar</button>
            </div>
        </div>
    </div>
</div>
