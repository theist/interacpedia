<div class="row events full">
    <div class="main">
        <div class="content col-md-12">

            <div class="row">
                <div class="col-md-12 team">
                    <h4>{{ $event->title }}</h4>
                    <div class="row content users">
                        @foreach($event->users as $us)
                            <div class="user summary col-md-4 {{ $us->agree?'agree':'not-agree' }}">
                                @include('user.summary',['user'=>$us])
                            </div>
                        @endforeach
                    </div>
                    <hr/>
                </div>
            </div>
        </div>
    </div>
</div>