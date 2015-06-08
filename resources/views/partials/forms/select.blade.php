<div class="form-group">
    <select class="form-control select2" name="{{ $name }}" id="{{ $id or $name }}" style="width:100%;">
        @foreach($list as $id=>$item)
            <option {{ (isset($value) && $value==$id)?"selected":"" }} value="{{ $id }}">{{ $item }}</option>
        @endforeach
    </select>
</div>