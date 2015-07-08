<div class="row challenge full">
    <div class="main">
        <div class="content col-md-12">
            <h4>@lang('general/labels.posts')</h4>
            <hr/>
            @foreach($challenge->getPosts() as $post)
                @include('blogs.post',['post'=>$post,'model'=>$challenge])
            @endforeach
        </div>
    </div>
</div>

