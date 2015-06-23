@extends('app')

@section('title')
    {{ $challenge->name }}
    @parent
@stop

@section('meta')
    <meta property="og:title" content="{{ $challenge->name }}" />
    <meta property="og:url" content="http://www.interacpedia.com/challenges/{{ $challenge->id }}" />
    <meta property="og:description" content="{{ $challenge->description }}" />
    <meta property="fb:app_id" content="1579172622347450" />
    <meta property="og:image" content="http://www.interacpedia.com{{ imagestyle($challenge->image,'scale200x200') }}" />
    <meta property="og:image:width" content="200" />
    <meta property="og:image:height" content="200" />
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
                        @include('user.brief',['user'=>$user,'links'=>true])
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
                        <div class="location text-right">
                            {{ ($user->city)?$user->city->name:"" }}{{ ($user->city && $user->country)?", ":"" }}
                            @if($user->country)
                                {{ $user->country->name }}
                                <img src="/images/icons/flags/{{ $user->country->code2 or "co" }}.png" alt=" {{ $user->country->name or "-" }}"/>
                            @endif
                            <div class="created">Creado: {{ $challenge->created_at }}</div>

                        </div>
                        @if($challenge->type)
                            <div class="data1"><h6>@lang('general/labels.type')
                                    :</h6>{{ $challenge->type->name }}</div>
                        @endif
                        @if($challenge->category)
                            <div class="data1"><h6>@lang('general/labels.category')
                                    :</h6>{{ $challenge->category->name }}</div>
                        @endif
                        @if($creators = $challenge->creators)
                            @for($i=0;$i<count($creators);$i++)
                                <div class="data1">
                                    <h6>
                                        @if($i==0)
                                            @lang('general/labels.creators'):
                                        @endif
                                    </h6>
                                    <a href="{{ action("UserController@show",["id"=>$creators[$i]->id]) }}">{{ $creators[$i]->name }}</a>
                                </div>
                            @endfor
                        @elseif($challenge->user)
                            <div class="data1"><h6>@lang('general/labels.creator'):</h6>
                                {{ $challenge->user->name }}
                            </div>
                        @endif
                        @if($challenge->website)
                            <div class="data1"><h6>@lang('general/labels.website'):</h6>
                                {{ $challenge->website }}
                            </div>
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
                    <div class="data2 col-md-12">
                        <h4>@lang('general/labels.comments')</h4>
                        <div class="comments">
                            @include('comments.index',['comments'=>$challenge->comments,'model'=>$challenge])
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-3 sidebar">
            <div class="content">
                <div id="model-follows">
                    @include('follows.show',['model'=>$challenge])
                </div>
                <div id="model-likes">
                    @include('likes.show',['model'=>$challenge])
                </div>
                <div class="text-center row" style="margin: 10px;">
                    <!-- Go to www.addthis.com/dashboard to customize your tools -->
                    <div class="addthis_sharing_toolbox"></div>
                </div>
                <div class="text-center row">
                    <a class="btn btn-purple">@lang('general/labels.participate')</a>
                </div>
            </div>
            <div class="content part1">
                <h4>{{ trans_choice('general/labels.participants', 2 ) }}</h4>
            </div>
            <div class="content part2 groups">
                @include('groups.index',['groups'=>$challenge->groups,'model'=>$challenge,'users'=>$users])
            </div>

            <div class="content">
                <h4>@lang('general/labels.options')</h4>
                <div class="text-center">
                    {!! Form::open(array('route' => array('challenges.destroy', $challenge->id), 'method' => 'delete'))
                    !!}
                    <a class="btn"
                       href="{{ action('ChallengesController@edit',[$challenge->id]) }}">@lang('challenges/forms.edit')</a>
                    <input  id="deleteChallenge" type="submit" class="btn btn-purple" value="@lang('challenges/forms.delete')">
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
@section('footer')
    <script>
        $('#deleteChallenge').on('click',function(){
            return confirm('¿Estás seguro que quieres eliminar este reto del sistema?');
        });
        $(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox({
                always_show_close: true,
                left_arrow_class: 'fa fa-chevron-left glyphicon-chevron-left',
                right_arrow_class: 'fa fa-chevron-right glyphicon-chevron-right'
            });
        });
    </script>
@stop