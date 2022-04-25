<!-- Modal -->
<div class="modal fade" id="modalImage" tabindex="-1" aria-labelledby="modalImageLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" wire:ignore>
            <form action="" method="post" id="form-image" enctype="multipart/form">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalImageLabel">Subir Imagen</h5>
                    <button type="button" class="close" onclick="closeModalImage()" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="InputWidget">Imagen</label>
                        <input type="file" class="form-control" name='image'>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="type" id="type" value="">
                    <input type="hidden" name="widget_id" id="widget_id" value="">
                    <input type="hidden" name="name_image" id="name_image" value="">
                    <button type="button" class="btn btn-outline-secondary" onclick="closeModalImage()">Cerrar</button>
                    <button type="submit" class="btn btn-outline-primary">Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>
