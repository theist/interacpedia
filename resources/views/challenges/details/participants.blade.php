<div class="row challenge full">
    <div class="main">
        <div class="content col-md-12">
                <h4>{{ trans_choice('general/labels.participants', 2 ) }}</h4>
                @include('groups.index',['groups'=>$challenge->groups,'model'=>$challenge,'users'=>$users])
        </div>
    </div>
</div>