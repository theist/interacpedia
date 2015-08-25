<div class="row challenge full">
    <div class="main">
        <div class="content col-md-12">
            <h4>{{ trans_choice('general/labels.participants', 2 ) }}</h4>

            <div class="row users">
                @foreach($teams as $team)
                    @foreach($team->users as $st)
                        <div class="user summary col-md-4 {{ $st->agree?'agree':'not-agree' }}">
                            @include('user.summary',['user'=>$st])
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>
</div>