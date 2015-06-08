@extends('app')

@section('title')
    @lang('general/menu.howitworks')
    @parent
@stop

@section('section-banner')
    <div class="container">
        <div id="carousel-howitworks" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                @for($i=0;$i<7;$i++)
                    <li data-target="#carousel-howitworks" data-slide-to="{{ $i }}" class="{{ ($i==0)?"active":"" }}"></li>
                @endfor
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                @for($i=0;$i<7;$i++)
                <div class="item {{ ($i==0)?"active":"" }}">
                    <img src="/images/how-it-works/como-funciona-v4-{{ $i+1 }}.jpg" alt="Interacpedia">
                    <div class="carousel-caption">
                        Paso {{ $i+1 }}
                    </div>
                </div>
                @endfor
            </div>
            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-howitworks" role="button" data-slide="prev">
                <i class="fa fa-chevron-left glyphicon-chevron-left"></i>
                <span class="sr-only">@lang('general/labels.previous')</span>
            </a>
            <a class="right carousel-control" href="#carousel-howitworks" role="button" data-slide="next">
                <i class="fa fa-chevron-right glyphicon-chevron-right"></i>
                <span class="sr-only">@lang('general/labels.next')</span>
            </a>
        </div>
    </div>
@stop