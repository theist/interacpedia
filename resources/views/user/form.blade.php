<div class="col-md-7">
    <div class="content">
        <div class="subtitle">
            <img src="/images/icons/40x40/general.png" alt="@lang('general/labels.general')"/>
            @lang('general/labels.general')
        </div>
        <div class="area">
            <div class="subtitle">
                <img src="/images/icons/32x32/vision.png" alt="@lang('general/labels.personal_vision')"/>
                @lang('general/labels.personal_vision')
            </div>
            <div class="row">
                <div class="field-avatar col-md-5">
                    <input type="hidden" name="avatar" id="avatar" value="{{ $user->avatar }}"/>
                    <div class="form-group">
                        <div class="choose">@lang('user/forms.choose')</div>
                        <div class="zone dropzone-previews text-center">
                            @if($user->avatar != "")

                                <img class="img-responsive" src="{{ imagestyle($user->avatar,'height120') }}"
                                     alt="{{ $user->name }}"/>
                                <a id="del_avatar" class="btn btn-danger">@lang('general/labels.remove')</a>
                            @endif
                        </div>
                        <div class="help">@lang('user/forms.image_help')</div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="form-group">
                        <input type="text" name="name" id="name" class="maxlength form-control" maxlength="150" value="{{ $user->name }}">
                    </div>
                    <div class="form-group">
                        {!! Form::textarea('vision', null, ['maxlength'=>140,'class' => 'form-control maxlength', 'rows'=>7,
                        'placeholder'=>Lang::get('user/forms.personal_vision') . ' '
                        .Lang::get('general/forms.in_chars',['chars'=>140])]) !!}
                    </div>
                    <div class="form-group">
                        <div class="help">Agregue varias opciones separadas por comas o use la tecla "ENTER"</div>
                        {!! Form::select('tags_vision_list[]',$tags_vision,$user->tags()->where('type','personal_vision')->lists('id')->all(),['id' => 'tags_vision_list','class' =>
                        'selectize','multiple']) !!}
                    </div>
                </div>
            </div>
            <hr/>
            <div class="subtitle">
                <img src="/images/icons/32x32/dreams.png" alt="@lang('general/labels.my_dreams')"/>
                @lang('general/labels.my_dreams')
            </div>
            <div class="form-group">
                <div class="help">Agregue varias opciones separadas por comas o use la tecla "ENTER"</div>
                {!! Form::select('tags_dreams_list[]',$tags_dreams,$user->tags()->where('type','dreams')->lists('id')->all(),['id' => 'tags_dreams_list','class' =>
                'selectize','multiple']) !!}
            </div>
            <hr/>
            <div class="subtitle">
                <img src="/images/icons/32x32/love.png" alt="@lang('general/labels.things_i_love')"/>
                @lang('general/labels.things_i_love')
            </div>
            <div class="form-group">
                <div class="help">Agregue varias opciones separadas por comas o use la tecla "ENTER"</div>
                {!! Form::select('tags_likes_list[]',$tags_likes,$user->tags()->where('type','likes')->lists('id')->all(),['id' => 'tags_likes_list','class' =>
                'selectize','multiple']) !!}

            </div>
        </div>
        <div class="subtitle">
            <img src="/images/icons/40x40/goals.png" alt="@lang('general/labels.goals')"/>
            @lang('general/labels.goals')
        </div>
        <div class="area">
            <div class="subtitle">
                @lang('general/labels.would_like_to_work_in')
            </div>
            <div class="form-group">
                <div class="help">Agregue varias opciones separadas por comas o use la tecla "ENTER"</div>
                {!! Form::select('tags_work_in_list[]',$tags_work_in,$user->tags()->where('type','work_in')->lists('id')->all(),['id' => 'tags_work_in_list','class' =>
                'selectize','multiple']) !!}

            </div>
            <hr/>
            <div class="subtitle">
                @lang('general/labels.favorite_companies_to_work_in')
            </div>
            <div class="form-group">
                <div class="help">Agregue varias opciones separadas por comas o use la tecla "ENTER"</div>
                {!! Form::select('tags_work_companies_list[]',$tags_work_companies,$user->tags()->where('type','work_companies')->lists('id')->all(),['id' => 'tags_work_companies_list','class' =>
                'selectize','multiple']) !!}

            </div>
            <hr/>
            <div class="subtitle">
                @lang('general/labels.preferred_areas_to_work_in')
            </div>
            <div class="form-group">
                <div class="help">Agregue varias opciones separadas por comas o use la tecla "ENTER"</div>
                {!! Form::select('tags_work_areas_list[]',$tags_work_areas,$user->tags()->where('type','work_areas')->lists('id')->all(),['id' => 'tags_work_areas_list','class' =>
                'selectize','multiple']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::submit($submitButtonText,['class' => 'btn btn-purple btn-big']) !!}
            <a class="btn btn-gray btn-big cancel">@lang('general/labels.cancel')</a>
        </div>
    </div>
</div>
<div class="col-md-5">
    <div class="content">
        <div class="subtitle">
            <img src="/images/icons/40x40/search.png" alt="@lang('general/labels.what_im_looking_for')"/>
            @lang('general/labels.what_im_looking_for')
        </div>
        <div class="area">
            <div class="subtitle">
                <img src="/images/icons/32x32/resources.png" alt="@lang('general/labels.resources')"/>
                @lang('general/labels.resources')
            </div>
            <div class="form-group">
                <div class="help">Agregue varias opciones separadas por comas o use la tecla "ENTER"</div>
                {!! Form::select('tags_searching_resources_list[]',$tags_searching_resources,$user->tags()->where('type','searching_resources')->lists('id')->all(),['id' => 'tags_searching_resources_list','class' =>
                'selectize','multiple']) !!}
            </div>
            <hr/>
            <div class="subtitle">
                <img src="/images/icons/32x32/experts.png" alt="@lang('general/labels.experts')"/>
                @lang('general/labels.experts')
            </div>
            <div class="form-group">
                <div class="help">Agregue varias opciones separadas por comas o use la tecla "ENTER"</div>
                {!! Form::select('tags_searching_experts_list[]',$tags_searching_experts,$user->tags()->where('type','searching_experts')->lists('id')->all(),['id' => 'tags_searching_experts_list','class' =>
                'selectize','multiple']) !!}
            </div>
            <hr/>
            <div class="subtitle">
                <img src="/images/icons/32x32/personal.png" alt="@lang('general/labels.personal')"/>
                @lang('general/labels.personal')
            </div>
            <div class="form-group">
                <div class="help">Agregue varias opciones separadas por comas o use la tecla "ENTER"</div>
                {!! Form::select('tags_searching_personal_list[]',$tags_searching_personal,$user->tags()->where('type','searching_personal')->lists('id')->all(),['id' => 'tags_searching_personal_list','class' =>
                'selectize','multiple']) !!}
            </div>
        </div>
        <div class="subtitle">
            <img src="/images/icons/40x40/offer.png" alt="@lang('general/labels.what_can_i_offer')"/>
            @lang('general/labels.what_can_i_offer')
        </div>
        <div class="area">
            <div class="subtitle">
                <img src="/images/icons/32x32/contribution.png" alt="@lang('general/labels.my_contribution')"/>
                @lang('general/labels.my_contribution')
            </div>
            <div class="form-group">
                <div class="help">Agregue varias opciones separadas por comas o use la tecla "ENTER"</div>
                {!! Form::select('tags_contribution_list[]',$tags_contribution,$user->tags()->where('type','contribution')->lists('id')->all(),['id' => 'tags_contribution_list','class' =>
                'selectize','multiple']) !!}
            </div>
            <hr/>
            <div class="subtitle">
                <img src="/images/icons/32x32/areas.png" alt="@lang('general/labels.in_this_areas')"/>
                @lang('general/labels.in_this_areas')
            </div>
            <div class="form-group">
                <div class="help">Agregue varias opciones separadas por comas o use la tecla "ENTER"</div>
                {!! Form::select('tags_in_areas_list[]',$tags_in_areas,$user->tags()->where('type','in_areas')->lists('id')->all(),['id' => 'tags_in_areas_list','class' =>
                'selectize','multiple',]) !!}
            </div>
            <hr/>
        </div>
    </div>
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
            var avatarDropzone = new Dropzone(".field-avatar .zone", {
                method: 'post',
                url: "/upload",
                paramName: "avatar",
                thumbnailHeight: 120,
                thumbnailWidth: null,
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    "upload_dir": "users"
                },
                maxFilesize: 4,
                clickable: true,
                acceptedFiles: '.png,.jpg,.gif'
            });
            $("#del_avatar").on("click", function (file) {
                $(".field-avatar .zone").empty();
                $('#avatar').val('/images/users/generic.png');
            });
            avatarDropzone.on("drop", function (file) {
                $(".field-avatar.zone").empty();
            });
            avatarDropzone.on("success", function (file, response) {
                $('#avatar').val(response);
            });
        });
    </script>
@stop

