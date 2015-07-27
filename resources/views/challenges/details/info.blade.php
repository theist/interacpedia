<div class="row challenge full">
    <div class="col-md-9 main">
        <div class="content">
            <div class="row">
                <div class="col-md-4">
                    @include('user.brief',['user'=>$challenge->user,'links'=>true])
                    <h3>@lang('general/labels.institutions')</h3>
                    @for($i=0;$i<count($universities);$i++)
                        <div class="university">
                            <h5>{{ $universities[$i]["name"] }}</h5>
                            <h4>@lang('general/labels.career')</h4>

                            <div>{{ $careers[$i]["name"] or "-" }}</div>
                            <h4>@lang('general/labels.course')</h4>

                            <div>{{ $courses[$i]["name"] or "-" }}</div>
                            <h4>@lang('general/labels.professor')</h4>

                            <div>{{ $professors[$i]["name"] or "-" }}</div>
                        </div>
                    @endfor
                </div>
                <div class="col-md-8">

                    <div class="data2">
                        <h4>@lang('general/labels.problem') @lang('general/labels.or') @lang('general/labels.need')</h4>

                        <div class="text">{{ $challenge->description }}</div>
                    </div>
                    <div class="data2">
                        <h4>@lang('general/labels.solution') / @lang('general/labels.idea')</h4>
                        @if($challenge->solution)
                            <div class="text">{{ $challenge->solution }}</div>
                        @else
                            <div class="text">@lang('challenges/messages.no_solution')</div>
                        @endif
                    </div>
                    <div class="data2">
                        <h4>@lang('general/labels.benefits')</h4>
                        @if($challenge->benefits)
                            <div class="text">{{ $challenge->benefits }}</div>
                        @else
                            <div class="text">@lang('challenges/messages.no_benefits')</div>
                        @endif
                    </div>
                    <div class="data2 row">
                        <div class="col-md-4"><h4>@lang('general/labels.stage')</h4></div>
                        <div class="col-md-4 text-center">
                            <h6>@lang('general/labels.actual')</h6>
                            <img src="/images/buttons/round/75x75/{{ $challenge->actual_stage }}-on.png"
                                 alt="{{ $challenge->actual_stage }}" height="75" width="75"/><br/>
                            <small>@lang('challenges/forms.'.$challenge->actual_stage)</small>
                        </div>
                        <div class="col-md-4 text-center">
                            <h6>@lang('general/labels.proyection')</h6>
                            <img src="/images/buttons/round/75x75/{{ $challenge->desired_stage }}-on.png"
                                 alt="{{ $challenge->desired_stage }}" height="75" width="75"/><br/>
                            <small>@lang('challenges/forms.'.$challenge->desired_stage)</small>
                        </div>
                    </div>
                    @if(count($challenge->searchings)>0 )
                        <div class="data2">
                            <h4>@lang('general/labels.searching')</h4>
                            <div class="row">
                                @foreach($challenge->searchings as $search)
                                    <div class="col-md-3 text-center">
                                        <img src="{{ str_replace('-off.png','-on.png',$search->image) }}"
                                             alt="{{ $search->name }}" height="75" width="75"/><br/>
                                        <small>{{ $search->name }}</small>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    @if($challenge->images != "")
                        <div class="data2">
                            <h4>@lang('general/labels.more_images')</h4>
                            <div class="row">
                                @foreach(explode(",",$challenge->images ) as $image)
                                    <div class="images">
                                        <a class="images_link" href="{{ $image }}" data-toggle="lightbox" data-gallery="multiimages" data-title="{{ $challenge->name }}">
                                            <img class="img-thumbnail img-responsive" src="{{ imagestyle($image,'height120') }}"
                                                 alt="{{ $challenge->name }}"/></a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    @if($challenge->files != "")
                        <div class="data2">
                            <h4>@lang('general/labels.files')</h4>
                            <div class="row">
                                @foreach(explode(",",$challenge->files ) as $file)
                                    <div class="row">
                                        <div class="file col-md-1 text-right"><img
                                                    src="/images/icons/20x20/document.png" alt="Documento"/></div>
                                        <div class="file col-md-11"><a href="{{ $file }}">{{ substr($file,strrpos($file,"/")+1) }}</a></div>

                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
    <div class="col-md-3 sidebar">
        <div class="content">
            <h4>{{ trans_choice('general/labels.partners', 2 ) }}</h4>
            @if($challenge->partner)
                <div class="row text-center">
                    <div class="col-md-12 ">
                        <img class="img-responsive" src="/{{ imagestyle($challenge->partner->logo,'fit200x100') }}" alt="{{ $challenge->partner->name }}"/><br>
                    </div>
                </div>
            @endif
            @unless($challenge->coordinators->isEmpty())
                    <h4>@lang('general/labels.coordinators')</h4>
                    @foreach($challenge->coordinators as $coordinator)
                        <div class="text-center row">
                            <div class="col-md-5">
                                <img class="img-circle" height="80" src="{{ imagestyle($coordinator->image,'fit100x100') }}" alt="{{ $coordinator->name }}"/><br/>
                            </div>
                            <div class="col-md-7">
                                {{ $coordinator->name }}<br>
                                @include('messages.add',['from'=>Auth::user()->id,'to'=>$coordinator->user->id,'label'=> Lang::get('general/labels.contact')])
                            </div>

                        </div>
                    @endforeach
            @endunless
        </div>
        @unless($challenge->rewards->isEmpty())
            <div class="content">
                <h4>@lang('general/labels.rewards')</h4>
                @foreach($challenge->rewards as $reward)
                    <div class="text-center row">
                        <div class="col-md-3 text-right">
                            <img src="{{ str_replace('buttons/round/75x75','icons/30x30',$reward->image) }}"
                                 alt="{{ $reward->name }}" class="img-responsive" style="vertical-align: middle;"/>
                        </div>
                        <div class="col-md-9 text-left" style="padding-top: 6px">{{ $reward->name }}</div>
                    </div>
                @endforeach
            </div>
        @endunless
    </div>
</div>