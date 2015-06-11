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
                <div class="col-md-5">
                    <img class="img-responsive" src="/images/users/generic.png" alt="{{ $user->name }}"/>
                </div>
                <div class="col-md-7">
                    <div class="form-group">
                        {!! Form::textarea('vision', null, ['maxlength'=>140,'class' => 'form-control maxlength', 'rows'=>7,
                        'placeholder'=>Lang::get('user/forms.personal_vision') . ' '
                        .Lang::get('general/forms.in_chars',['chars'=>140])]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::select('tags_vision_list[]',$tags_vision,$user->tags()->where('type','personal_vision')->lists('id'),['id' => 'tags_vision_list','class' =>
                        'form-control select2','multiple','data-tags'=>'true']) !!}
                    </div>
                </div>
            </div>
            <hr/>
            <div class="subtitle">
                <img src="/images/icons/32x32/dreams.png" alt="@lang('general/labels.my_dreams')"/>
                @lang('general/labels.my_dreams')
            </div>
            <div class="form-group">
                {!! Form::select('tags_dreams_list[]',$tags_dreams,$user->tags()->where('type','dreams')->lists('id'),['id' => 'tags_dreams_list','class' =>
                'form-control select2','multiple','data-tags'=>'true']) !!}
            </div>
            <hr/>
            <div class="subtitle">
                <img src="/images/icons/32x32/love.png" alt="@lang('general/labels.things_i_love')"/>
                @lang('general/labels.things_i_love')
            </div>
            <div class="form-group">
                {!! Form::select('tags_likes_list[]',$tags_likes,$user->tags()->where('type','likes')->lists('id'),['id' => 'tags_likes_list','class' =>
                'form-control select2','multiple','data-tags'=>'true']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::submit($submitButtonText,['class' => 'btn btn-purple btn-big']) !!}
            <a class="btn btn-gray btn-big cancel">@lang('general/labels.cancel')</a>
        </div>
        <div class="subtitle">
            <img src="/images/icons/40x40/academic_information.png" alt="@lang('general/labels.academic_information')"/>
            @lang('general/labels.academic_information')
        </div>
        <div class="area">
            @foreach($user->occupations->where('type','student') as $occ)
                <div class="record">
                    <div class="data"><strong>Institución:</strong> {{ $occ->university->name }}</div>
                    <div class="data"><strong>Carrera:</strong> {{ $occ->career->name }}</div>
                    <div class="data"><strong>Semestre(s):</strong> {{ $occ->experience }}</div>
                </div>
            @endforeach
        </div>
        <div class="subtitle">
            <img src="/images/icons/40x40/goals.png" alt="@lang('general/labels.goals')"/>
            @lang('general/labels.goals')
        </div>
        <div class="area">
            <div class="subtitle">
                @lang('general/labels.would_like_to_work_in')
            </div>
            <ul class="tags">
                <li class="label label-tag">Compañía local</li>
                <li class="label label-tag">Multinacional</li>
            </ul>
            <hr/>
            <div class="subtitle">
                @lang('general/labels.favorite_companies_to_work_in')
            </div>
            <div class="tags">
                <img src="/images/companies/cocacola.png" alt="Coca Cola"/>
                <img src="/images/companies/isa.png" alt="Isa"/>
            </div>
            <hr/>
            <div class="subtitle">
                @lang('general/labels.preferred_areas_to_work_in')
            </div>
            <ul class="tags">
                <li class="label label-tag">Mercadeo</li>
                <li class="label label-tag">Gestión de proyectos</li>
                <li class="label label-tag">Planeación estratégica</li>
            </ul>
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
            <ul class="tags">
                <li class="label label-tag">Ideas</li>
                <li class="label label-tag">Prototipo</li>
                <li class="label label-tag">Trabajo</li>
                <li class="label label-tag">Motivación</li>
                <li class="label label-tag">Contactos</li>
            </ul>
            <hr/>
            <div class="subtitle">
                <img src="/images/icons/32x32/areas.png" alt="@lang('general/labels.in_this_areas')"/>
                @lang('general/labels.in_this_areas')
            </div>
            <ul class="tags">
                <li class="label label-tag">Creatividad</li>
                <li class="label label-tag">Investigación</li>
                <li class="label label-tag">Diseño</li>
            </ul>
            <hr/>
            <div class="subtitle">
                <img src="/images/icons/32x32/achievements.png" alt="@lang('general/labels.my_achievements')"/>
                @lang('general/labels.my_achievements')
            </div>
            <div class="row">
                <div class="col-md-3 text-center"><div class="tags"><div class="label label-tag">Concursos</div></div></div>
                <div class="col-md-9 gray_zone">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="title1">Finalista de Concurso Ventures</div>
                            <div class="title2">Noviembre 2014</div>
                            <div class="text">Finalista en el concurso Ventures - Categoría Internacional, con el
                                proyecto Street Adventure (un pilar de Prevencity).</div>
                        </div>
                        <div class="col-md-4">
                            <img class="img-responsive img-thumbnail" src="/images/upload/street.jpg"
                                 alt="Street Adventure"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="subtitle">
            <img src="/images/icons/40x40/search.png" alt="@lang('general/labels.what_im_looking_for')"/>
            @lang('general/labels.what_im_looking_for')
        </div>
        <div class="area">
            <div class="subtitle">
                <img src="/images/icons/32x32/resources.png" alt="@lang('general/labels.resources')"/>
                @lang('general/labels.resources')
            </div>
            <ul class="tags">
                <li class="label label-tag">Fondos</li>
                <li class="label label-tag">Contactos de negocios</li>
            </ul>
            <hr/>
            <div class="subtitle">
                <img src="/images/icons/32x32/experts.png" alt="@lang('general/labels.experts')"/>
                @lang('general/labels.experts')
            </div>
            <ul class="tags">
                <li class="label label-tag">Asesoría legal</li>
                <li class="label label-tag">Asesoría técnica</li>
            </ul>
            <hr/>
            <div class="subtitle">
                <img src="/images/icons/32x32/personal.png" alt="@lang('general/labels.personal')"/>
                @lang('general/labels.personal')
            </div>
            <ul class="tags">
                <li class="label label-tag">Mentoría</li>
                <li class="label label-tag">Socios de negocios</li>
            </ul>
        </div>
    </div>
</div>


@section('footer')
    <script>
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
        });
    </script>
@stop

