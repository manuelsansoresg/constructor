@foreach ($images as $image)
    @php
        $url_image = asset($image);
    @endphp
    {{-- <a onclick="window.opener.CKEDITOR.tools.callFunction('selectImage', '{{ $url_image}}'); window.close(); return false;" style="cursor: pointer"> --}}
    <a onclick="setUrl('{{ $url_image}}')" style="cursor: pointer">
        <img src="{{ $url_image }}" style="width: 200px"> 
    </a>
@endforeach
<script>
    function setUrl(filename) {
        // Get CKEditorFuncNum from query string
        var funcNum = getUrlParam('CKEditorFuncNum');
        // Set URL in CKEditor dialog
        window.opener.CKEDITOR.tools.callFunction(funcNum, filename);
        // Close window
        window.close();
    }

    function getUrlParam(paramName) {
        var reParam = new RegExp('(?:[\?&]|&)' + paramName + '=([^&]+)', 'i');
        var match = window.location.search.match(reParam);
        return (match && match.length > 1) ? match[1] : '';
    }
</script>