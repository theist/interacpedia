<body>
<div style="color: #666;font-size: 20px;background: #E0F7FA;font-family: 'Open Sans', 'Helvetica';text-align: center;padding: 10px;">
    <div style="text-align: center;margin: 0 auto;max-width: 640px;background: #fff;" class="content">
        <img width="100%;" src="<?php echo $message->embed( public_path() . "/images/emails/header.jpg" ); ?>"><br/>

        <h3>Hola, {{ $user['name'] }}</h3>
        <h4>{{ $notification['message']  }}</h4>

        <div style="color:#999;font-size:14px;">
            <h5>{{ $model['title'] }}</h5>
            <p>{{ $model['content'] }}</p>
            @if($model['message_id'] && $model['message_id']>0)
                <a style="padding: 10px 20px;background-color: #5C478E;border-radius: 5px;color: white;text-decoration: none;" href="{{ url("messages/".$model['message_id']) }}">Responder</a>.
            @else
                <a style="padding: 10px 20px;background-color: #5C478E;border-radius: 5px;color: white;text-decoration: none;" href="{{ url("messages/".$model['id']) }}">Responder</a>.
            @endif
        </div>
        <br/>
        <hr/>
        <div style="text-align: center;font-size:14px;">
            @if($model['message_id'] && $model['message_id']>0)
                Para ver o responder este mensaje, haz click <a href="{{ url("messages/".$model['message_id']) }}">aquí</a>.
            @else
                Para ver o responder este mensaje, haz click <a href="{{ url("messages/".$model['id']) }}">aquí</a>.
            @endif

        </div>
    </div>
    <br>

    <div style="text-align: center;font-size:10px;">
        <img style="margin:0 auto;" class="responsive"
             src="<?php echo $message->embed( public_path() . "/images/emails/ideaminds.png" ); ?>"><br/>
        Todos los derechos reservados &copy; Idea Minds Group SAS, {{ date("Y") }}<br>
    </div>
</div>
</body>