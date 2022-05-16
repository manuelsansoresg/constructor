@foreach ($elements as $element)
<div class="card mt-5">
    <div class="card-header">{{ $element->name}}</div>
    <div class="card-body">
        <div class="form-group">
            <label for="InputWidget"> Nombre  </label>
            <input type="text" name="name[]" class="form-control" value="{{ $element->name}}">
        </div>
        <div class="form-group">
            <label for="InputWidget"> Leyenda </label>
            <input type="text" name="leyenda[]" class="form-control" value="{{ $element->placeholder}}">
        </div>
        
        <div class="form-group">
            <label for="InputWidget"> Requerido </label>
            <input type="checkbox" name="requerido[]" value="1" {{ ($element->required)? 'checked': '' }}>
        </div>
        
    </div>
</div>
@endforeach