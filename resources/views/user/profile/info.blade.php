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
                    <div class="data">{{ $user->vision }}</div>
                    @if(count($tags_vision)>0)
                    <div class="tags">
                        @foreach($tags_vision as $tag)
                            <li class="label label-tag small">{{ $tag }}</li>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
            <hr/>
            <div class="subtitle">
                <img src="/images/icons/32x32/dreams.png" alt="@lang('general/labels.my_dreams')"/>
                @lang('general/labels.my_dreams')
            </div>
            @if(count($tags_dreams)>0)
                <div class="tags">
                    @foreach($tags_dreams as $tag)
                        <li class="label label-tag">{{ $tag }}</li>
                    @endforeach
                </div>
            @endif
            <hr/>
            <div class="subtitle">
                <img src="/images/icons/32x32/love.png" alt="@lang('general/labels.things_i_love')"/>
                @lang('general/labels.things_i_love')
            </div>
            @if(count($tags_likes)>0)
                <div class="tags">
                    @foreach($tags_likes as $tag)
                        <li class="label label-tag">{{ $tag }}</li>
                    @endforeach
                </div>
            @endif
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
            @if(count($tags_work_in)>0)
                <div class="tags">
                    @foreach($tags_work_in as $tag)
                        <li class="label label-tag ">{{ $tag }}</li>
                    @endforeach
                </div>
            @endif
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
            @if(count($tags_work_areas)>0)
                <div class="tags">
                    @foreach($tags_work_areas as $tag)
                        <li class="label label-tag ">{{ $tag }}</li>
                    @endforeach
                </div>
            @endif
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
<div class="col-md-5">
    <div class="content">
        <div class="subtitle row">
            <img src="/images/icons/40x40/competences.png" alt="@lang('general/labels.validated_competences')"/>
            @lang('general/labels.validated_competences')
        </div>
        <div class="area">
            <div class="subtitle">
                <img src="/images/icons/32x32/rewards.png" alt="@lang('general/labels.main_competences')"/>
                @lang('general/labels.main_competences')
            </div>
            <div class="row">
                <div class="col-md-2">
                    <div class="tags"><div class="label label-tag">Generación de ideas</div></div>
                </div>
                <div class="col-md-10"></div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-md-2">
                    <div class="tags"><div class="label label-tag">Análisis Estratégico</div></div>
                </div>
                <div class="col-md-10"></div>
            </div>
        </div>
    </div>
</div>



