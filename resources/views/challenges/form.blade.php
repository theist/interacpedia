<div class="row">
    <div class="col-md-6">
        <div class="field-type">
            <div class="label">
                <img src="/images/icons/forms/type.png"
                     alt="@lang('challenges/forms.type')"/>@lang('challenges/forms.type')
            </div>
            <div class="form-group">
                {!! Form::select('type_id',$types,null,['id' => 'type_id','class' => 'form-control
                select2', 'style'=>'width:100%;']) !!}
            </div>
        </div>
        <div class="field-category">
            <div class="label">
                <img src="/images/icons/forms/category.png"
                     alt="@lang('challenges/forms.category')"/>@lang('challenges/forms.category')
            </div>
            <div class="form-group">
                {!! Form::select('category_id',$categories,null,['id' => 'category_id','class' => 'form-control
                select2','style'=>'width:100%;']) !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="field-name">
            <div class="label">
                <img src="/images/icons/forms/name.png"
                     alt="@lang('challenges/forms.name')"/>@lang('challenges/forms.name')
            </div>
            <div class="form-group">
                {!! Form::textarea('name',null,['id' => 'name', 'maxlength' => 50, 'class' => 'form-control maxlength','rows'=>'4']) !!}
            </div>
            <div class="help">Este nombre ayudará a otros a encontrar tu reto. Recuerda usar las pablabras más importantes!</div>
        </div>
    </div>
</div>
<div class="step_header row">
    <div class="col-md-2"><small>@lang('challenges/forms.step',['step'=>2,'total'=>5])</small></div>
    <div class="col-md-8">@lang('challenges/forms.add_creators')</div>
</div>
<div class="step_header row">
    <div class="col-md-2"><small>@lang('challenges/forms.step',['step'=>3,'total'=>5])</small></div>
    <div class="col-md-8">@lang('challenges/forms.select_universities')</div>
</div>
<div class="step_header row">
    <div class="col-md-2"><small>@lang('challenges/forms.step',['step'=>4,'total'=>5])</small></div>
    <div class="col-md-8">@lang('challenges/forms.challenge_details')</div>
</div>
<div class="step_content">
    <div class="field-description">
        <div class="label">
            <img src="/images/icons/forms/describe.png"
                 alt="@lang('challenges/forms.description')"/>@lang('challenges/forms.description')
        </div>
        <div class="form-group">
            {!! Form::textarea('description',null,['maxlength'=>140,'class' => 'form-control maxlength','placeholder'=>Lang::get('challenges/forms.description') . ' ' .Lang::get('challenges/forms.in_140_chars')]) !!}
        </div>
    </div>
    <div class="row">
        <div class="field-image col-md-6">
            <input type="hidden" name="image" id="image" value="{{ $challenge->image }}" />
            <div class="label">
                <img src="/images/icons/forms/image.png"
                     alt="@lang('challenges/forms.image')"/>@lang('challenges/forms.image')
            </div>
            <div class="form-group">
                <div class="zone dropzone-previews">
                    @if($challenge->image != "")
                        <img class="img-responsive" src="{{ imagestyle($challenge->image,'fit100x100') }}" alt="{{ $challenge->name }}"/>
                    @else
                        <div class="choose">@lang('challenges/forms.choose')</div>
                        <div class="help">@lang('challenges/forms.image_help')</div>
                        @endif
                </div>
            </div>
        </div>
        <div class="field-images col-md-6">
            <div class="label">
                <img src="/images/icons/forms/images.png"
                     alt="@lang('challenges/forms.more_images')"/>@lang('challenges/forms.more_images')
                <small>(@lang('challenges/forms.optional'))</small>
            </div>
        </div>
    </div>
</div>
<div class="step_header row">
    <div class="col-md-2"><small>@lang('challenges/forms.step',['step'=>5,'total'=>5])</small></div>
    <div class="col-md-8">@lang('challenges/forms.looking_for')</div>
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText,['class' => 'btn btn-purple form-control']) !!}
</div>


@section('footer')
    <script>
        Dropzone.autoDiscover = false;
        $(function() {
            $('.select2').select2();
            var imageDropzone = new Dropzone(".field-image .zone",{
                method: 'post',
                url: "/upload",
                paramName: "image",
                headers: { "X-CSRF-TOKEN": "{{ csrf_token() }}" },
                maxFilesize: 4,
                clickable: true,
                acceptedFiles: '.png,.jpg,.gif'
            });
            imageDropzone.on("drop", function(file) {
                $(".field-image .zone").empty();
            });
            imageDropzone.on("success", function(file,response) {
                $('#image').val(response);
            });
        })
        $('.maxlength').maxlength({
            alwaysShow: true,
            warningClass: "label label-success",
            limitReachedClass: "label label-danger",
            appendToParent: true,
            placement: "bottom-right"
        });

    </script>
@stop