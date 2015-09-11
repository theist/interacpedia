<div class="row challenge full">
    <div class="main">
        <div class="content col-md-12">
            <h4>@lang('general/labels.comments')</h4>
            <div class="comments">
                @include('comments.index',['comments'=>$event->comments,'model'=>$event])
            </div>
        </div>
    </div>
</div>