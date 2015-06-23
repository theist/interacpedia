    <div class="row user-profile">
        @foreach($companies as $company)
            <div class="area">
                {{ $company->name }}<br/>
                <a class="btn" href="{{ action('CompaniesController@edit',['id'=>$company->id]) }}">@lang('general/labels.edit')</a>
            </div>
        @endforeach
            <a class="btn btn-purple" href="{{ action('CompaniesController@create') }}">@lang('general/labels.create') @lang('general/labels.company')</a>
    </div>

