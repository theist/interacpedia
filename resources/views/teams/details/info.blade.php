<div class="row teams full">
    <div class="main">
        <div class="content col-md-12">

            <div class="row">
                <div class="col-md-12 team">
                    <h4>
                        @if($team->name != "Equipo" && $team->name != "")
                            {{ $team->name }}
                        @else
                            Equipo # {{ $team->id }}
                        @endif
                        <br>
                        <small>{{ $team->challenge->name }}</small>
                    </h4>
                    <div class="row content users">
                        @foreach($team->users as $st)
                            <div class="user summary col-md-4 {{ $st->agree?'agree':'not-agree' }}">
                                @include('user.summary',['user'=>$st])
                            </div>
                        @endforeach
                    </div>
                    <hr/>
                </div>
            </div>
        </div>
    </div>
</div>