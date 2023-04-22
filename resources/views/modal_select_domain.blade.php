@inject('m_domains', 'App\Models\Domain')
<div id="modal-select-domain" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document" style="overflow-y: auto; display: block;">
        <form action="" id="frm-select-domain" enctype="multipart/form-data" wire:ignore>
            <div class="modal-content">
                <div class="modal-body"  >
                    {{-- contenido --}}
                    <h5>Selecciona un dominio</h5>
                    <div class="form-group">
                        <label for="InputWidget"> Dominio  </label>
                        @php
                            $domains = $m_domains::all();
                        @endphp
                        <select name="data[name]" class="form-control" required>
                            <option value="">Seleccione una opción</option>
                            @foreach ($domains as $domain)
                                <option value="{{ $domain->id }}">{{ $domain->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row" style="display: none" id="loading-element_contact">
                        <div class="col-12 text-center">
                            <div>
                                <div class="fa-3x">
                                    <i class="fas fa-circle-notch fa-spin"></i>
                                </div>
                            </div>

                        </div>
                    </div>
                    {{-- contenido --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" onclick="closeModalSection('modal-select-domain')">Cerrar</button>
                    <button type="submit" class="btn btn-outline-primary">Seleccionar</button>
                </div>
        </form>
    </div>
</div>
</div>