<div class="container-fluid" id="section-profile-blue">
    <div class="container">
        <div class="row profile challenge">
            <div class="col-md-6">
                <div class="col-md-4">
                    <div class="image">
                        <img class="img-responsive img-thumbnail" src="{{ imagestyle($challenge->image,'scale200x200') }}"
                             alt="{{ $challenge->name }}"/>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="name">
                        {{ $challenge->name }}
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
                    <div class="text-left row" style="margin-top: 5px">
                        <div class="addthis_sharing_toolbox"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="location text-right">
                    {{ ($challenge->user->city)?$challenge->user->city->name:"" }}{{ ($challenge->user->city && $challenge->user->country)?", ":"" }}
                    @if($challenge->user->country)
                        {{ $challenge->user->country->name }}
                        <img src="/images/icons/flags/{{ $challenge->user->country->code2 or "co" }}.png" alt=" {{ $challenge->user->country->name or "-" }}"/>
                    @endif
                    <div class="created">Creado: {{ $challenge->created_at }}</div>
                </div>

            </div>
            <div class="col-md-3 text-right">
                <div class="social">
                    <div id="model-follows">
                        @include('follows.show',['model'=>$challenge])
                    </div>
                    <div id="model-likes">
                        @include('likes.show',['model'=>$challenge])
                    </div>
                    <div class="text-center row">
                        <a class="btn btn-purple">@lang('general/labels.participate')</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
