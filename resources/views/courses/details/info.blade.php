<div class="row challenge full">
    <div class="col-md-9 main">
        <div class="content">
            <h3>@lang('general/labels.students')</h3>
            <img class="img-responsive" src="/images/demo/students-list.jpg" alt="Students">
            <h3>@lang('general/labels.challenges')</h3>
            <div class="row challenges">
                @foreach($challenges as $challenge)
                    <div class="challenge summary col-md-3">
                        @include('challenges.summary')
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-md-3 sidebar">
        @if($course->user)
            <div class="content">
                <h4>@lang('general/labels.professor')</h4>
                @include('user.brief',['user'=>$course->user,'links'=>true,'label'=>''])
            </div>
        @endif
        <div class="content">
            <img class="img-responsive" src="/images/demo/facebook-block.jpg" alt="Facebook">
        </div>
        <div class="content">
            <img class="img-responsive" src="/images/demo/twitter-block.jpg " alt="Twitter">
        </div>
    </div>
</div>