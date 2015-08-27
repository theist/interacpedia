<div class="row">
    <div class="col-md-6">
        <div class="field-type">
            <div class="subtitle row">
                <div class="col-sm-2 text-center"><img src="/images/icons/32x32/type.png"
                                                       alt="@lang('general/labels.type')"/></div>
                <div class="col-sm-10 text-left text">@lang('general/labels.type')</div>
            </div>
            <div class="form-group">
                {!! Form::select('type_id',$types,null,['id' => 'type_id','class' => 'form-control
                select2', 'style'=>'width:100%;']) !!}
            </div>
        </div>
        <div class="field-category">
            <div class="subtitle row">
                <div class="col-sm-2 text-center"><img src="/images/icons/32x32/category.png"
                                                       alt="@lang('general/labels.category')"/></div>
                <div class="col-sm-10 text-left text">@lang('general/labels.category')</div>
            </div>
            <div class="form-group">
                {!! Form::select('category_id',$categories,null,['id' => 'category_id','class' => 'form-control
                select2','style'=>'width:100%;']) !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="field-name">
            <div class="subtitle row">
                <div class="col-sm-2 text-center"><img src="/images/icons/32x32/title.png"
                                                       alt="@lang('challenges/forms.name')"/></div>
                <div class="col-sm-10 text-left text">@lang('challenges/forms.name')</div>
            </div>
            <div class="form-group">
                {!! Form::textarea('name',null,['id' => 'name', 'maxlength' => 100, 'class' => 'form-control
                maxlength','rows'=>'4']) !!}
                <div class="help">Este nombre ayudará a otros a encontrar tu reto. Recuerda usar las pablabras más
                    importantes!
                </div>
            </div>

        </div>
    </div>
</div>
<div class="step_header row">
    <div class="col-md-2">
        <small>@lang('challenges/forms.step',['step'=>2,'total'=>5])</small>
    </div>
    <div class="col-md-8">@lang('challenges/forms.add_creators')</div>
</div>
<div class="step_content">
    <div class="field-creators row">
        @for($index=0;$index==0 || $index<count($ch_creators);$index++)
            <div class="creator col-md-6" id="creator_content_{{ $index }}">
                @include('partials.forms.subtitle',['image'=>'creator','optional'=>false,'title'=>'challenges/forms.creator_name','col'=>1 ])
                @include('partials.forms.select',['name'=>'creator_list['. $index .']','list'=>$creators,'value'=>(isset($ch_creators[$index]))?$ch_creators[$index]:""])
            </div>
        @endfor
        <div class="col-md-6 text-center" style="padding-top: 30px">
            <a class="btn btn-gray" id="addCreator">@lang('challenges/forms.add_creator')</a>
        </div>
    </div>
</div>
<div class="step_header row">
    <div class="col-md-2">
        <small>@lang('challenges/forms.step',['step'=>3,'total'=>5])</small>
    </div>
    <div class="col-md-8">@lang('challenges/forms.select_universities')</div>
</div>
@for($index=0;$index==0 || $index<count($ch_universities);$index++)
    <div class="step_content" id="uni_content_{{ $index }}">
        <div class="field-universities">
            <div class="row">
                <div class="field-university col-md-6">
                    @include('partials.forms.subtitle',['image'=>'university','optional'=>false,'title'=>'general/labels.university' ])
                    @include('partials.forms.select',['name'=>'university_list['. $index .']','list'=>$universities,'value'=>(isset($ch_universities[$index]))?$ch_universities[$index]:""])
                </div>
                <div class="field-career col-md-6">
                    @include('partials.forms.subtitle',['image'=>'career','optional'=>true,'title'=>'general/labels.career' ])
                    @include('partials.forms.select',['name'=>'career_list['.$index.']','list'=>$careers,'value'=>(isset($ch_careers[$index]))?$ch_careers[$index]:""])
                </div>
            </div>
            <div class="row">
                <div class="field-course col-md-6">
                    @include('partials.forms.subtitle',['image'=>'course','optional'=>true,'title'=>'general/labels.course' ])
                    @include('partials.forms.select',['name'=>'course_list[]','list'=>$courses])
                </div>
                <div class="field-professor col-md-6">
                    @include('partials.forms.subtitle',['image'=>'professor','optional'=>true,'title'=>'general/labels.professor' ])
                    @include('partials.forms.select',['name'=>'professor_list[]','list'=>$professors])
                </div>
            </div>
        </div>
    </div>
@endfor
<div class="row text-center">
    <a class="btn btn-gray" id="addUniversity">@lang('challenges/forms.add_university')</a>
</div>
<div class="step_header row">
    <div class="col-md-2">
        <small>@lang('challenges/forms.step',['step'=>4,'total'=>5])</small>
    </div>
    <div class="col-md-8">@lang('challenges/forms.challenge_details')</div>
</div>
<div class="step_content">
    <div class="field-description">
        <div class="subtitle row">
            <div class="col-sm-1 text-center"><img src="/images/icons/32x32/describe.png"
                                                   alt="@lang('challenges/forms.description')"/></div>
            <div class="col-sm-11 text-left text">@lang('challenges/forms.description')</div>
        </div>
        <div class="form-group">
            {!! Form::textarea('description', null, ['maxlength'=>140,'class' => 'form-control maxlength', 'rows'=>7,
            'placeholder'=>Lang::get('challenges/forms.description') . ' '
            .Lang::get('general/forms.in_chars',['chars'=>140])]) !!}
        </div>
    </div>
    <div class="field-solution">
        <div class="subtitle row">
            <div class="col-sm-1 text-center"><img src="/images/icons/32x32/describe.png"
                                                   alt="@lang('challenges/forms.solution')"/></div>
            <div class="col-sm-11 text-left text">@lang('challenges/forms.solution')</div>
        </div>
        <div class="form-group">
            {!! Form::textarea('solution', null, ['maxlength'=>400,'class' => 'form-control maxlength', 'rows'=>7,
            'placeholder'=>Lang::get('challenges/forms.solution') . ' '
            .Lang::get('general/forms.in_chars',['chars'=>400])]) !!}
        </div>
    </div>
    <div class="field-benefits">
        <div class="subtitle row">
            <div class="col-sm-1 text-center"><img src="/images/icons/32x32/describe.png"
                                                   alt="@lang('challenges/forms.benefits')"/></div>
            <div class="col-sm-11 text-left text">@lang('challenges/forms.benefits')</div>
        </div>
        <div class="form-group">
            {!! Form::textarea('benefits',null,['maxlength'=>500,'class' => 'form-control maxlength', 'rows'=>7,
            'placeholder'=>Lang::get('challenges/forms.benefits') . ' '
            .Lang::get('general/forms.in_chars',['chars'=>500])]) !!}
        </div>
    </div>
    <div class="row">
        <div class="field-image col-md-7">
            <input type="hidden" name="image" id="image" value="{{ $challenge->image }}"/>

            <div class="subtitle row">
                <div class="col-sm-2 text-center"><img src="/images/icons/32x32/image.png"
                                                       alt="@lang('challenges/forms.image')"/></div>
                <div class="col-sm-10 text-left text">@lang('challenges/forms.image')</div>
            </div>
            <div class="form-group">
                <div class="zone dropzone-previews">
                    @if($challenge->image != "")
                        <img class="img-responsive" src="{{ imagestyle($challenge->image,'height120') }}"
                             alt="{{ $challenge->name }}"/>
                        <a id="del_image" class="btn btn-danger">@lang('general/labels.remove')</a>
                    @else
                        <div class="choose">@lang('challenges/forms.choose')</div>
                        <div class="help">@lang('challenges/forms.image_help')</div>
                    @endif
                </div>
            </div>
        </div>
        <div class="field-images col-md-5">
            <input type="hidden" name="images" id="images" value="{{ $challenge->images }}"/>

            <div class="subtitle row">
                <div class="col-sm-2 text-center"><img src="/images/icons/32x32/images.png"
                                                       alt="@lang('challenges/forms.more_images')"/></div>
                <div class="col-sm-10 text-left text">@lang('challenges/forms.more_images')
                    <small>@lang('general/labels.optional')</small>
                </div>

            </div>
            <div class="form-group">
                <div class="zone dropzone-previews">
                    @if($challenge->images != "")
                        <?php $images_empty = "false" ?>
                        @foreach(explode(",",$challenge->images ) as $image)
                            <div class="preview">
                                <img class="img-thumbnail" src="{{ imagestyle($image,'height120') }}"
                                     alt="{{ $challenge->name }}"/>
                                <a data-value="{{ $image }}"
                                   class="btn btn-danger del_images">@lang('general/labels.remove')</a>
                            </div>
                        @endforeach
                    @else
                        <?php $images_empty = "true" ?>
                        <div class="choose">@lang('challenges/forms.choose_more')</div>
                        <div class="help">@lang('challenges/forms.images_help')</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="field-actual_stage col-md-7">
            <input type="hidden" name="actual_stage" id="actual_stage" value="{{ $challenge->actual_stage }}"/>

            <div class="subtitle row">
                <div class="col-sm-2 text-center"><img src="/images/icons/32x32/stage.png"
                                                       alt="@lang('challenges/forms.actual_stage')"/></div>
                <div class="col-sm-10 text-left text">@lang('challenges/forms.actual_stage')</div>
            </div>
            <div class="form-group">
                @foreach($actual_stages as $stage)
                    <div class="stage actual" data-value="{{ $stage }}">
                        <img src="{{ ($stage == $challenge->actual_stage)?"/images/buttons/round/75x75/".$stage."-on.png":"/images/buttons/round/75x75/".$stage."-off.png" }}"
                             alt="{{ $stage }}" height="75" width="75"/><br/>
                        <small>{{ $stage }}</small>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="field-desired_stage col-md-5">
            <input type="hidden" name="desired_stage" id="desired_stage" value="{{ $challenge->desired_stage }}"/>

            <div class="subtitle row">
                <div class="col-sm-2 text-center"><img src="/images/icons/32x32/stage.png"
                                                       alt="@lang('challenges/forms.desired_stage')"/></div>
                <div class="col-sm-10 text-left text">@lang('challenges/forms.desired_stage')</div>
            </div>
            <div class="form-group">
                @foreach($desired_stages as $stage)
                    <div class="stage desired" data-value="{{ $stage }}">
                        <img src="{{ ($stage == $challenge->desired_stage)?"/images/buttons/round/75x75/".$stage."-on.png":"/images/buttons/round/75x75/".$stage."-off.png" }}"
                             alt="{{ $stage }}" height="75" width="75"/><br/>
                        <small>{{ $stage }}</small>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <div class="row">
        <div class="field-website col-md-7">
            <div class="subtitle row">
                <div class="col-sm-2 text-center"><img src="/images/icons/32x32/website.png"
                                                       alt="@lang('general/labels.website')"/></div>
                <div class="col-sm-10 text-left text">@lang('general/labels.website')
                    <small>@lang('general/labels.optional')</small>
                </div>
            </div>
            <div class="form-group">
                {!! Form::input('text','website',null,['id' => 'website', 'maxlength' => 255,
                'placeholder'=>'http://','class' => 'form-control
                maxlength']) !!}
                <div class="help">Provee un sitio web que ayude a entender mejor tu idea.
                </div>
            </div>
        </div>
        <div class="field-video col-md-5">
            <div class="subtitle row">
                <div class="col-sm-2 text-center"><img src="/images/icons/32x32/video.png"
                                                       alt="@lang('general/labels.video')"/></div>
                <div class="col-sm-10 text-left text">@lang('general/labels.video')
                    <small>@lang('general/labels.optional')</small>
                </div>
            </div>
            <div class="form-group">
                {!! Form::input('text','video',null,['id' => 'video', 'maxlength' => 255,
                'placeholder'=>'http://','class' => 'form-control
                maxlength']) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="field-tags col-md-7">
            <div class="subtitle row">
                <div class="col-sm-2 text-center"><img src="/images/icons/32x32/tags.png"
                                                       alt="@lang('general/labels.tags')"/></div>
                <div class="col-sm-10 text-left text">@lang('general/labels.tags')
                    <small>@lang('general/labels.optional')</small>
                </div>
            </div>
            <div class="form-group">
                {!! Form::select('tag_list[]',$tags,$challenge->tags->lists('id')->all(),['id' => 'tag_list','class' =>
                'form-control select2','multiple','data-tags'=>'true']) !!}
                <div class="help">Escoja las etiquetas o escriba nuevas y presione "ENTER" para agregar.</div>
            </div>
        </div>
        <div class="field-files col-md-5">
            <?php  $files_empty = "true" ?>
        </div>
    </div>

</div>
<div class="step_header row">
    <div class="col-md-2">
        <small>@lang('challenges/forms.step',['step'=>5,'total'=>5])</small>
    </div>
    <div class="col-md-8">@lang('challenges/forms.looking_for')</div>
</div>
<div class="step_content">
    <div class="field-searchings">
        <div class="subtitle row">
            <div class="col-sm-1 text-center"><img src="/images/icons/40x40/search.png"
                                                   alt="@lang('general/labels.searching_for')"/></div>
            <div class="col-sm-11 text-left text">@lang('general/labels.searching_for')</div>
        </div>
        <div class="step_content row text-center">
            @foreach($searchings as $search)
                <div class="search" data-value="{{ $search->id }}">

                    <img src="{{ in_array($search->id,$challenge->searchings->lists('id')->all())?str_replace('-off.png','-on.png',$search->image):$search->image }}"
                         alt="{{ $search->name }}" height="75" width="75"/><br/>
                    <small>{{ $search->name }}</small>
                </div>
            @endforeach
            {!!
            Form::select('searchings_list[]',$searchings->lists('name','id'),$challenge->searchings->lists('id')->all(),['id'
            => 'searchings_list','multiple'=>'multiple','class' => 'form-control hidden']) !!}
        </div>
    </div>
    <div class="field-rewards">
        <div class="subtitle row">
            <div class="col-sm-1 text-center"><img src="/images/icons/40x40/rewards.png"
                                                   alt="@lang('general/labels.rewards')"/></div>
            <div class="col-sm-11 text-left text">@lang('general/labels.rewards')</div>
        </div>
        <div class="step_content row text-center">
            @foreach($rewards as $reward)
                <div class="reward" data-value="{{ $reward->id }}">
                    <img src="{{ in_array($reward->id,$challenge->rewards->lists('id')->all())?str_replace('-off.png','-on.png',$reward->image):$reward->image }}"
                         alt="{{ $reward->name }}" height="75" width="75"/><br/>
                    <small>{{ $reward->name }}</small>
                </div>
            @endforeach
            {!! Form::select('rewards_list[]',$rewards->lists('name','id'),$challenge->rewards->lists('id')->all(),['id' =>
            'rewards_list','multiple'=>'multiple','class' => 'form-control hidden']) !!}
        </div>
    </div>
</div>
<div class="form-group">
    {!! Form::submit($submitButtonText,['class' => 'btn btn-purple btn-big']) !!}
    <a class="btn btn-gray btn-big cancel">@lang('general/labels.cancel')</a>
</div>
@section('footer')
    <script>
        $(".reward").click(function () {
            var src = $(this).find('img').attr('src');
            if ($('#rewards_list option[value="' + this.getAttribute('data-value') + '"]').is(':selected')) {
                $('#rewards_list option[value="' + this.getAttribute('data-value') + '"]').prop('selected', false);
                $(this).find('img').attr('src', $(this).find('img').attr('src').replace('-on.png', '-off.png'));
            } else {
                $('#rewards_list option[value="' + this.getAttribute('data-value') + '"]').prop('selected', true);
                $(this).find('img').attr('src', $(this).find('img').attr('src').replace('-off.png', '-on.png'));
            }
            $(this).removeClass('inactive');
            $(this).addClass('active');
        });
        $(".search").click(function () {
            var src = $(this).find('img').attr('src');
            if ($('#searchings_list option[value="' + this.getAttribute('data-value') + '"]').is(':selected')) {
                $('#searchings_list option[value="' + this.getAttribute('data-value') + '"]').prop('selected', false);
                $(this).find('img').attr('src', $(this).find('img').attr('src').replace('-on.png', '-off.png'));
            } else {
                $('#searchings_list option[value="' + this.getAttribute('data-value') + '"]').prop('selected', true);
                $(this).find('img').attr('src', $(this).find('img').attr('src').replace('-off.png', '-on.png'));
            }
            $(this).removeClass('inactive');
            $(this).addClass('active');
        });
        $(".stage").click(function () {
            var option = 'actual';
            if ($(this).hasClass('desired'))option = 'desired';
            if ($("#" + option + "_stage").val() != "")
                $(".stage." + option + "[data-value=" + $("#" + option + "_stage").val() + "]").find('img').attr('src', $(".stage[data-value=" + $("#" + option + "_stage").val() + "]").find('img').attr('src').replace('-on.png', '-off.png'));
            $(this).find('img').attr('src', $(this).find('img').attr('src').replace('-off.png', '-on.png'));
            $("#" + option + "_stage").val(this.getAttribute('data-value'));
            $(this).removeClass('inactive');
            $(this).addClass('active');
        });
        $(".reward,.search,.stage").hover(function () {
            $(this).addClass('transition');
        }, function () {
            $(this).removeClass('transition');
        });
        Dropzone.autoDiscover = false;
        $(function () {
            $("a.cancel").click(function () {
                parent.history.back();
                return false;
            });
            var creatorCounter = {{ count($ch_creators)==0?0:count($ch_creators)-1 }};
            $('#addCreator').click(function () {
                creatorCounter++;
                $('#creator_content_' + (creatorCounter - 1)).after(
                        '<div class="creator col-md-6" id="creator_content_' + creatorCounter + '">'
                        + '<div class="subtitle row">'
                        + '<div class="col-sm-1 text-center"><img src="/images/icons/32x32/creator.png" alt="@lang('challenges/forms.creator')"/></div>'
                        + '<div class="col-sm-11 text-left text">@lang('challenges/forms.creator_name')</div>'
                        + '</div>'
                        + '<div class="form-group">'
                        + '<select class="form-control select2" name="creator_list[' + creatorCounter + ']" id="creator_list[' + creatorCounter + ']" style="width:100%;">'
                        + '<option></option>'
                        @foreach($creators as $id=>$item)
                         + '<option value="{{ $id }}">{{ $item }}</option>'
                        @endforeach
                          + '</select>'
                        + '</div></div>'
                );
                $('.select2').select2({
                    placeholder: "Escoja una opción",
                    allowClear: true,
                    language: "es"
                });
            });
            var uniCounter = {{ count($ch_universities)==0?0:count($ch_universities)-1 }};
            $('#addUniversity').click(function () {
                uniCounter++;
                $('#uni_content_' + (uniCounter - 1)).after(
                        '<div class="step_content" id="uni_content_' + uniCounter + '">'
                        + '<div class="field-universities">'
                        + '<div class="row">'
                        + '<div class="field-university col-md-6"><div class="subtitle row">'
                        + '<div class="col-sm-2 text-center"><img src="/images/icons/32x32/university.png" alt="@lang('general/labels.university')"/></div>'
                        + '<div class="col-sm-10 text-left text">@lang('general/labels.university')</div>'
                        + '</div>'
                        + '<div class="form-group">'
                        + '<select class="form-control select2" name="university_list[' + uniCounter + ']" id="university_list[' + uniCounter + ']" style="width:100%;">'
                        + '<option></option>'
                        @foreach($universities as $id=>$item)
                         + '<option value="{{ $id }}">{{ $item }}</option>'
                        @endforeach
                          + '</select>'
                        + '</div></div>'
                        + '<div class="field-career col-md-6"><div class="subtitle row">'
                        + '<div class="col-sm-2 text-center"><img src="/images/icons/32x32/career.png" alt="@lang('general/labels.career')"/></div>'
                        + '<div class="col-sm-10 text-left text">@lang('general/labels.career')</div>'
                        + '</div>'
                        + '<div class="form-group">'
                        + '<select class="form-control select2" name="career_list[' + uniCounter + ']" id="career_list[' + uniCounter + ']" style="width:100%;">'
                        + '<option></option>'
                        @foreach($careers as $id=>$item)
                         + '<option value="{{ $id }}">{{ $item }}</option>'
                        @endforeach
                          + '</select>'
                        + '</div></div>'
                        + '</div>'
                        + '<div class="row">'
                        + '<div class="field-course col-md-6"><div class="subtitle row">'
                        + '<div class="col-sm-2 text-center"><img src="/images/icons/32x32/course.png" alt="@lang('general/labels.course')"/></div>'
                        + '<div class="col-sm-10 text-left text">@lang('general/labels.course')</div>'
                        + '</div>'
                        + '<div class="form-group">'
                        + '<select class="form-control select2" name="course_list[' + uniCounter + ']" id="course_list[' + uniCounter + ']" style="width:100%;">'
                        + '<option></option>'
                        @foreach($courses as $id=>$item)
                         + '<option value="{{ $id }}">{{ $item }}</option>'
                        @endforeach
                          + '</select>'
                        + '</div></div>'
                        + '<div class="field-professor col-md-6"><div class="subtitle row">'
                        + '<div class="col-sm-2 text-center"><img src="/images/icons/32x32/professor.png" alt="@lang('general/labels.professor')"/></div>'
                        + '<div class="col-sm-10 text-left text">@lang('general/labels.professor')</div>'
                        + '</div>'
                        + '<div class="form-group">'
                        + '<select class="form-control select2" name="professor_list[' + uniCounter + ']" id="professor_list[' + uniCounter + ']" style="width:100%;">'
                        + '<option></option>'
                        @foreach($professors as $id=>$item)
                         + '<option value="{{ $id }}">{{ $item }}</option>'
                        @endforeach
                          + '</select>'
                        + '</div></div>'
                        + '</div>'

                        + '</div>'
                        + '</div>'
                );
                $('.select2').select2({
                    placeholder: "Escoja una opción",
                    allowClear: true,
                    language: "es"
                });
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
                    "upload_dir": "challenges"
                },
                maxFilesize: 4,
                clickable: true,
                acceptedFiles: '.png,.jpg,.gif,.xlsx'
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
            var images_empty = {{ $images_empty }};
            var imagesDropzone = new Dropzone(".field-images .zone", {
                method: 'post',
                uploadMultiple: true,
                maxFiles: 3,
                thumbnailHeight: 80,
                thumbnailWidth: 80,
                url: "/upload",
                paramName: "images",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    "upload_dir": "challenges/others"
                },
                maxFilesize: 4,
                clickable: true,
                acceptedFiles: '.png,.jpg,.gif'
            });
            $(".del_images").on("click", function (file) {
                $('#images').val($('#images').val().replace(',' + this.getAttribute('data-value'), ''));
                $('#images').val($('#images').val().replace(this.getAttribute('data-value') + ',', ''));
                $('#images').val($('#images').val().replace(this.getAttribute('data-value'), ''));
                $(this).parent().remove();
            });
            imagesDropzone.on("drop", function (file) {
                if (images_empty)$(".field-images .zone").empty();
                images_empty = false;
            });
            imagesDropzone.on("success", function (file, response) {
                if ($('#images').val() != '')
                    $('#images').val($('#images').val() + ',');
                $('#images').val($('#images').val() + response);
            });
            var files_empty = {{ $files_empty }};
            var filesDropzone = new Dropzone(".field-files .zone", {
                method: 'post',
                uploadMultiple: true,
                maxFiles: 3,
                thumbnailHeight: 80,
                thumbnailWidth: 80,
                url: "/upload",
                paramName: "files",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    "upload_dir": "challenges/files"
                },
                maxFilesize: 2,
                clickable: true,
                acceptedFiles: '.pdf,.xls,.doc,.xlsx,.docx,.txt'
            });
            $(".del_files").on("click", function (file) {
                $('#files').val($('#files').val().replace(',' + this.getAttribute('data-value'), ''));
                $('#files').val($('#files').val().replace(this.getAttribute('data-value') + ',', ''));
                $('#files').val($('#files').val().replace(this.getAttribute('data-value'), ''));
                $(this).parent().remove();
            });
            filesDropzone.on("drop", function (file) {
                if (files_empty)$(".field-files .zone").empty();
                files_empty = false;
            });
            filesDropzone.on("success", function (file, response) {
                if ($('#files').val() != '')
                    $('#files').val($('#files').val() + ',');
                $('#files').val($('#files').val() + response);
            });
        })
    </script>
@stop