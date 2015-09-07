@extends('app')

@section('title')
    @lang('user/title.profile')
    @parent
@stop
@section('section-profile')
    @include('partials.profile')
@stop
@section('section-submenu')
    @if(Auth::user()->id==$user->id)
        @include('user.profile.menu',['items'=>[
                                                'info'=>['label'=>'Info','link'=>'/user/'. $user->id .'/info'],
                                                'challenges'=>['label'=>'Retos','link'=>'/user/'. $user->id .'/challenges'],
                                                'projects'=>['label'=>'Proyectos','link'=>'/user/'.$user->id.'/projects'],
                                                'messages'=>['label'=>'Mensajes','link'=>'/user/'.$user->id.'/messages'],
                                                'notifications'=>['label'=>'Notificaciones','link'=>'/user/'.$user->id.'/notifications']
                                                ],
                                        'active'=>"messages"
                                    ])
    @else
        @include('user.profile.menu',['items'=>[
                                                'info'=>['label'=>'Info','link'=>'/user/'. $user->id .'/info'],
                                                'challenges'=>['label'=>'Retos','link'=>'/user/'. $user->id .'/challenges'],
                                                'projects'=>['label'=>'Proyectos','link'=>'/user/'.$user->id.'/projects']
                                                ],
                                        'active'=>"messages"
                                    ])
    @endif
@stop
@section('content')
    <div class="user-profile">
        <div class="row area message">
            <div class="col-md-2">
                <a href="/user/{{ $message->from->id }}/info"><img class="img-circle"
                                                                   src="{{ imagestyle($message->from->avatar,'fit100x100') }}"
                                                                   alt="{{ $message->from->name }}"/></a>
            </div>
            <div class="col-md-4">
                <div><strong>De:</strong> <a href="/user/{{ $message->from->id }}/info">{{ $message->from->name }}</a></div>
                <div><strong>Para:</strong> <a href="/user/{{ $message->to->id }}/info">{{ $message->to->name }}</a></div>
                <div class="created">{{ $message->created_at }}</div>
            </div>
            <div class="col-md-6">
                <div class="title">
                    @if($message->read == 0 && Auth::user()->id==$message->to->id)
                        <span class="label label-success">Nuevo!!</span>
                        <?php $message->read = 1;$message->save();?>
                    @endif
                    <strong>Asunto:</strong> {{ $message->title!=""?$message->title:"Sin Asunto" }}</div>
                <div class="content">{!! nl2br(e($message->content)) !!}</div>
            </div>
        </div>
        @foreach($message->messages as $msg)
            <div class="row area message">
                <div class="col-md-2">&nbsp;</div>
                <div class="col-md-4">
                    <div><strong>De:</strong> <a href="/user/{{ $msg->from->id }}/info">{{ $msg->from->name }}</a></div>
                    <div class="created">{{ $msg->created_at }}</div>
                </div>
                <div class="col-md-6">
                    <div class="title">
                        @if($msg->read == 0 && Auth::user()->id==$msg->to->id)
                            <?php $msg->read = 1;$msg->save();?>
                            <span class="label label-success">Nuevo!!</span>
                        @endif
                        <strong>Asunto:</strong> {{ $msg->title!=""?$msg->title:"Sin Asunto" }}</div>
                    <div class="content">{!! nl2br(e($msg->content)) !!}</div>
                </div>
            </div>
            @foreach($msg->messages as $msg2)
                <?php $msg2->message_id = $message->id;$msg2->save();?>
                <div class="row area message">
                    <div class="col-md-2">&nbsp;</div>
                    <div class="col-md-4">
                        <div><strong>De:</strong> <a href="/user/{{ $msg2->from->id }}/info">{{ $msg2->from->name }}</a></div>
                        <div class="created">{{ $msg2->created_at }}</div>
                    </div>
                    <div class="col-md-6">
                        <div class="title">
                            @if($msg2->read == 0 && Auth::user()->id==$msg2->to->id)
                                <?php $msg2->read = 1;$msg2->save();?>
                                <span class="label label-success">Nuevo!!</span>
                            @endif
                            <strong>Asunto:</strong> {{ $msg2->title!=""?$msg2->title:"Sin Asunto" }}</div>
                        <div class="content">{!! nl2br(e($msg2->content)) !!}</div>
                    </div>
                </div>
            @endforeach
        @endforeach
        <div class="row area">
            <div class="col-md-2">&nbsp;</div>
            <div class="col-md-10">
                @include('messages.add',['from'=>Auth::user()->id,'to'=>(Auth::user()->id==$message->to->id?$message->from->id:$message->to->id),'label'=> Lang::get('general/labels.answer'),'parent'=>$message->id,'suffix'=>'_resp_'.$message->id])
            </div>
        </div>
        <hr/>
    </div>
@stop
