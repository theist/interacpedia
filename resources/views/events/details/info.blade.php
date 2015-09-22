<div class="row events full">
    <div class="main">
        <div class="content col-md-12">

            <div class="row">
                <div class="col-md-12 team">
                    <h4>{{ $event->title }}</h4>
                    @if($event->status == "open" )
                        @if($event->users->where('id',Auth::user()->id)->count())
                            {!! Form::open(['method' => 'POST', 'action' => ['EventsController@deluser',$event->id]]) !!}
                            <input class="btn btn-danger" type="submit" value="No voy a asistir a este evento">
                            {!! Form::close() !!}
                        @else
                            {!! Form::open(['method' => 'POST', 'action' => ['EventsController@adduser',$event->id]]) !!}
                            <input class="btn" type="submit" value="Voy a asistir a este evento">
                            {!! Form::close() !!}
                        @endif
                    @endif
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