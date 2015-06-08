@extends('app')

@section('title')
    @lang('general/menu.howitworks')
    @parent
@stop

@section('section-banner')
    <div class="container">
        <div id="carousel-howitworks" class="carousel slide" data-ride="carousel" data-interval="false" data-wrap="false">
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
    <script>//Stop intro slider on last item
        var cnt = $('#carousel_howitworks .item').length;
        $('#carousel_howitworks').on('slid', '', function() {
            cnt--;
            if (cnt == 1) {
                $('#carousel_howitworks').carousel('pause');
            }
        });
    </script>
@stop