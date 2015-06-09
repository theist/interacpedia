@extends('app')

@section('title')
    @lang('challenges/title.show')
    @parent
@stop

@section('content')
    <div class="row challenge full">
        <div class="col-md-9 main">
            <div class="content">
                <div class="row">
                    <div class="col-md-4">
                        <div class="gray_zone left">
                            <div class="image">
                                <img class="img-responsive" src="{{ imagestyle($challenge->image,'scale200x200') }}"
                                     alt="{{ $challenge->name }}"/>
                            </div>
                        </div>
                        <div class="user">
                            <img class="img-circle" height="80" src="{{ imagestyle($user->avatar,'fit100x100') }}"
                                 alt="{{ $user->name }}"/><br/>

                            <div class="contact">@lang('general/labels.contact')</div>
                            <div class="username">{{ $user->name }}</div>
                            <div class="career">{{ $user->occupation()->career->name or "-" }}</div>
                            <div class="website">http://</div>
                            <div class="row links">
                                <div class="col-md-6"><a href="">@lang('challenges/forms.full_bio')</a></div>
                                <div class="col-md-6"><a href="">@lang('general/labels.contact')</a></div>
                            </div>
                        </div>
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
                        <div class="gray_zone right">
                            <div class="name"><h1>{{ $challenge->name }}</h1></div>
                        </div>
                        @if($challenge->type)
                            <div class="data1"><h6 class="">@lang('general/labels.type')
                                    :</h6>{{ $challenge->type->name }}</div>
                        @endif
                        @if($challenge->category)
                            <div class="data1"><h6 class="">@lang('general/labels.category')
                                    :</h6>{{ $challenge->category->name }}</div>
                        @endif
                        @if($challenge->user)
                            <div class="data1"><h6 class="">@lang('general/labels.creator')
                                    :</h6>{{ $challenge->user->name }}</div>
                        @endif
                        @if($challenge->website)
                            <div class="data1"><h6 class="">@lang('general/labels.website')
                                    :</h6>{{ $challenge->website }}</div>
                        @endif
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
                        <h4>@lang('general/labels.searching')</h4>

                        <div class="data2 row">
                            @foreach($challenge->searchings as $search)
                                <div class="col-md-3 text-center">
                                    <img src="{{ str_replace('-off.png','-on.png',$search->image) }}"
                                         alt="{{ $search->name }}" height="75" width="75"/><br/>
                                    <small>{{ $search->name }}</small>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-3 sidebar">
            <div class="content">
                <div class="text-center row">
                    <div class="col-md-5 text-right">
                        <div class="count">0</div>
                        <small>Followers</small>
                    </div>
                    <div class="col-md-7 text-left">
                        <a class="btn btn-fixed-purple" href=""><i class="fa fa-share"></i> Follow</a>
                    </div>
                    <div class="col-md-5 text-right">
                        <div class="count">0</div>
                        <small>Likes</small>
                    </div>
                    <div class="col-md-7 text-left">
                        <a class="btn btn-fixed-blue" href=""><i class="fa fa-thumbs-o-up"></i> Like</a>
                    </div>
                    <div class="col-md-5 text-right">
                        <div class="count">0</div>
                        <small>Shares</small>
                    </div>
                    <div class="col-md-7 text-left">
                        <a class="btn btn-fixed-green" href=""><i class="fa fa-share-alt"></i> Share</a>
                    </div>
                    <a class="btn btn-purple">@lang('general/labels.participate')</a>
                </div>
            </div>
            <div class="content">
                <h4>@lang('general/labels.options')</h4>

                <div class="text-center">
                    {!! Form::open(array('route' => array('challenges.destroy', $challenge->id), 'method' => 'delete'))
                    !!}
                    <a class="btn"
                       href="{{ action('ChallengesController@edit',[$challenge->id]) }}">@lang('challenges/forms.edit')</a>
                    <input type="submit" class="btn btn-purple" value="@lang('challenges/forms.delete')">
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="content">
                <h4>@lang('general/labels.sponsors')</h4>
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

@stop