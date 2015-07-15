<div class="row challenge full">
    <div class="main">
        <div class="content col-md-12">
            <h4>@lang('general/labels.posts')</h4>
            <hr/>
            <div class="row">
            @foreach($course->getPosts() as $post)
                <div class="col-md-12">
                    @include('blogs.post',['post'=>$post,'model'=>$course])
                </div>
            @endforeach
            </div>
        </div>
    </div>
</div>

