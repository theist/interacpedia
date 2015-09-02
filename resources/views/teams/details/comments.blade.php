<div class="row challenge full">
    <div class="main">
        <div class="content col-md-12">
            <h4>@lang('general/labels.comments')</h4>
            <div class="comments">
                @include('comments.index',['comments'=>$team->comments,'model'=>$team])
            </div>
        </div>
    </div>
</div>