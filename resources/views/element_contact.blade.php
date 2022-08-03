@php
    $type_element = config('enums.element_fields');
@endphp
@foreach ($elements as $element)
<div class="card mt-5">
    <div class="card-header">{{ $element->name}}</div>
    <div class="card-body">
        <div class="form-group">
            <label for="InputWidget"> Nombre  </label>
            <input type="text" name="name[]" class="form-control" value="{{ $element->name}}">
        </div>
        <div class="form-group">
            <label for="InputWidget"> Tipo campo  </label>
            {{-- <input type="text" name="type_field[]" class="form-control" value="{{ $element->name}}"> --}}
            <select name="type_field[]" id="" class="form-control">
                @foreach ($type_element as $key => $contact)
                    <option value="{{ $key }}" {{ ($element->type_field == $key)? 'selected' : '' }}>{{ $contact }}</option>
                @endforeach
            </select>
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