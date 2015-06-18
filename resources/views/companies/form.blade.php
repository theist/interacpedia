<div class="row">
    <div class="col-md-6">
        <div class="area">
            <div class="field-name">
                <div class="subtitle">
                    <img src="/images/icons/32x32/title.png" alt="@lang('general/labels.name')"/>
                    @lang('general/labels.name')
                </div>
                {!! Form::input('text','name',null,['id' => 'name', 'maxlength' => 100, 'placeholder'=>'','class' => 'form-control maxlength']) !!}
            </div>
            <div class="field-description">
                <div class="subtitle">
                    <img src="/images/icons/32x32/describe.png" alt="@lang('general/labels.description')"/>
                    @lang('general/labels.description')
                </div>
                {!! Form::textarea('description', null, ['maxlength'=>400,'class' => 'form-control maxlength', 'rows'=>7,
                'placeholder'=>Lang::get('general/labels.description') . ' '
                .Lang::get('general/forms.in_chars',['chars'=>400])]) !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="area">
            <div class="field-image">
                <input type="hidden" name="image" id="image" value="{{ $company->image }}"/>
                <div class="subtitle">
                    <img src="/images/icons/32x32/image.png" alt="@lang('general/labels.image')"/>
                    @lang('general/labels.image')
                </div>
                <div class="zone dropzone-previews">
                    @if($company->image != "")
                        <img class="img-responsive" src="{{ imagestyle($company->image,'height120') }}"
                             alt="{{ $company->name }}"/>
                        <a id="del_image" class="btn btn-danger">@lang('general/labels.remove')</a>
                    @else
                        <div class="choose">@lang('challenges/forms.choose')</div>
                        <div class="help">@lang('challenges/forms.image_help')</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<div class="form-group">
    {!! Form::submit($submitButtonText,['class' => 'btn btn-purple btn-big']) !!}
    <a class="btn btn-gray btn-big cancel">@lang('general/labels.cancel')</a>
</div>
@section('footer')
    <script>
        Dropzone.autoDiscover = false;
        $(function () {
            $("a.cancel").click( function(){
                parent.history.back();
                return false;
            });
            $('.select2').select2({
                placeholder: "Escoja una opción",
                allowClear: true,
                language: "es"
            });
            $('.maxlength').maxlength({
                alwaysShow: true,
                warningClass: "label label-success",
                limitReachedClass: "label label-danger",
                appendToParent: true,
                placement: "bottom-right"
            });
            var imageDropzone = new Dropzone(".field-image .zone", {
                method: 'post',
                url: "/upload",
                paramName: "image",
                thumbnailHeight: 120,
                thumbnailWidth: null,
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    "upload_dir": "companies"
                },
                maxFilesize: 4,
                clickable: true,
                acceptedFiles: '.png,.jpg,.gif'
            });
            $("#del_image").on("click", function (file) {
                $(".field-image .zone").empty();
            });
            imageDropzone.on("drop", function (file) {
                $(".field-image .zone").empty();
            });
            imageDropzone.on("success", function (file, response) {
                $('#image').val(response);
            });
        });
    </script>
@stop