<div class="content raised">
    <div class="image">
            <img class="img-responsive" src="{{ imagestyle($partner->image,'fit270x214') }}"
                 alt="{{ $partner->name }}"/>
    </div>
    <div class="fields">
        <div class="row">
            <div class="col-md-5"><img class="img-responsive" src="{{ imagestyle($partner->logo,'fit200x100') }}" alt="{{ $partner->name }}"/></div>
            <div class="col-md-7">
                <div id="model-follows_{{ $partner->id }}">
                    @include('follows.show',['model'=>$partner,'counter'=>false,'formid_suffix'=>'_'.$partner->id])
                </div>
            </div>
        </div>
        <div class="title"><h4>{{ $partner->name }}</h4></div>
        <div class="subtitle">{{ $partner->slogan }}</div>
        <div class="body">{{ $partner->description }}</div>
        <div class="location"><strong>@lang('general/labels.location'):</strong> {{ $partner->location }}</div>
        <div class="origin"><strong>@lang('general/labels.type'):</strong> {{ $partner->origin }}</div>
        @if($partner->type=='company')
            <div class="sector"><strong>@lang('general/labels.sector'):</strong> {{ $partner->sector }}</div>
        @elseif($partner->type=='university')
            <div class="sector"><strong>@lang('general/labels.size'):</strong> {{ $partner->size }}</div>
        @endif
        <div class="website"><strong>@lang('general/labels.website'):</strong> {{ $partner->website }}</div>
    </div>
</div>
