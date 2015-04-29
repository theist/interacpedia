@if (count($errors) > 0)
    @foreach ($errors->all() as $error)
        {{ Toastr::error( $error, $title = 'Error:', $options = [ ] ) }}
    @endforeach
@endif
