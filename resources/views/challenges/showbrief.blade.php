@extends('app')

@section('title')
    @lang('challenges/title.show')
    @parent
@stop

@section('content')
    <div class="row challenge full">
        <div class="col-md-6 main">
            <div class="content">
                <div class="row">
                    <div class="col-md-4">
                        <div class="gray_zone left">
                            <div class="image">
                                <img class="img-responsive" src="{{ imagestyle($challenge->image,'scale200x200') }}"
                                     alt="{{ $challenge->name }}"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="gray_zone right">
                            <div class="name"><h1>{{ $challenge->name }}</h1></div>
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
                        <div class="row">
                            <div class="col-md-6">
                                <small>
                                    @if($user->country)
                                        <img src="/images/icons/flags/{{ $user->country->code2 or "co" }}.png" alt=" {{ $user->country->name or "-" }}"/>
                                    @endif
                                    {{ ($user->city)?$user->city->name:"" }}{{ ($user->city && $user->country)?", ":"" }}
                                        @if($user->country)
                                            {{ $user->country->name }}
                                        @endif
                                </small>
                            </div>
                            <div class="col-md-6 text-right">
                                <div class="created"><small>Creado: {{ $challenge->created_at }}</small></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 20px">
                    <div class="col-md-6">
                        @include('user.brief',['user'=>$user,'links'=>false])
                    </div>
                    <div class="col-md-6">
                        <h3>@lang('general/labels.institutions')</h3>
                        @for($i=0;$i<count($universities);$i++)
                            <div class="university">
                                <h5>{{ $universities[$i]["name"] }}</h5>
                            </div>
                        @endfor
                    </div>
                    <div class="col-md-12">
                        <div class="data2">
                            <h4>@lang('general/labels.problem') @lang('general/labels.or') @lang('general/labels.need')</h4>
                            <div class="text">{{ $challenge->description }}</div>
                        </div>
                        <div class="data2" style="position: relative">
                            <h4>@lang('general/labels.solution') / @lang('general/labels.idea')</h4>
                            @if($challenge->solution)
                                <div class="text">{{ $challenge->solution }}</div>
                            @else
                                <div class="text">@lang('challenges/messages.no_solution')</div>
                            @endif
                            <div class="col-md-12 legend">
                                Ingresa o Regístrate para conocer más
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-6 main">
            <div class="content">
                <div class="row">
                    <div class="col-md-12"><h3>@lang('auth/title.signup')</h3></div>
                    <div class="col-md-12">
                        <p class="lead">@lang('auth/messages.using_social')</p>
                        <div class="form-group">
                            <a href="/auth/facebook" type="submit" class="btn btn-primary btn-block facebook">
                                <i class="fa fa-facebook"></i>  @lang('auth/forms.login') @lang('auth/forms.with_facebook')
                            </a>
                        </div>
                        <div class="form-group">
                            <a href="/auth/linkedin" type="submit" class="btn btn-primary btn-block linkedin">
                                <i class="fa fa-linkedin-square"></i>  @lang('auth/forms.login') @lang('auth/forms.with_linkedin')
                            </a>
                        </div>
                        <div class="form-group">
                            <a href="/auth/twitter" type="submit" class="btn btn-primary btn-block twitter">
                                <i class="fa fa-twitter"></i>  @lang('auth/forms.login') @lang('auth/forms.with_twitter')
                            </a>
                        </div>
                        <div class="form-group">
                            <a href="/auth/google" type="submit" class="btn btn-primary btn-block google">
                                <i class="fa fa-google"></i>  @lang('auth/forms.login') @lang('auth/forms.with_google')
                            </a>
                        </div>

                        <p class="lead">
                            @lang('auth/messages.prefer_credentials')
                        </p>
                        <form action="{{ url('/auth/register') }}" method="post" role="form">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group @if ($errors->has('name')) has-error @endif">
                                <label class="sr-only" for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}"
                                       placeholder="Name">
                                @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
                            </div>
                            <div class="form-group @if ($errors->has('email')) has-error @endif">
                                <label class="sr-only">E-Mail Address</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}"
                                       placeholder="Email">
                                @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
                            </div>
                            <div class="form-group @if ($errors->has('email_confirmation')) has-error @endif">
                                <label class="sr-only">Confirm E-Mail Address</label>
                                <input type="email" class="form-control" id="email_confirmation" name="email_confirmation"
                                       placeholder="Re-enter email">
                                @if ($errors->has('email_confirmation')) <p class="help-block">{{ $errors->first('email_confirmation') }}</p> @endif
                            </div>
                            <div class="form-group @if ($errors->has('password')) has-error @endif">
                                <label class="sr-only">Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                       placeholder="Password">
                                @if ($errors->has('password')) <p class="help-block">{{ $errors->first('password') }}</p> @endif
                            </div>
                            <div class="form-group @if ($errors->has('password_confirmation')) has-error @endif">
                                <label class="sr-only">Confirm Password</label>
                                <input type="password" class="form-control" id="password_confirmation"
                                       name="password_confirmation"
                                       placeholder="Confirm Password">
                                @if ($errors->has('password_confirmation')) <p class="help-block">{{ $errors->first('password_confirmation') }}</p> @endif
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" id="newsletter" name="newsletter" checked value="1"> Sign me up for weekly newsletter
                                </label>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Create an Account
                                </button>
                            </div>
                            <hr/>
                            <div class="center-block text-center">
                                <small>By signing up you agree to our <a href="{{ action('PagesController@terms',[]) }}">Terms
                                        of Use</a> and <a href="{{ action('PagesController@privacy',[]) }}">Privacy Policy</a>.
                                </small>
                                <hr/>
                                <small>Already have an account? <a href="{{ url('/auth/login') }}">Log in</a></small>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop