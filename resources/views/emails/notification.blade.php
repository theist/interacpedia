<body>
<div style="color: #666;font-size: 20px;background: #E0F7FA;font-family: 'Open Sans', 'Helvetica';text-align: center;padding: 10px;">
    <div style="text-align: center;margin: 0 auto;max-width: 640px;background: #fff;" class="content">
        <img width="100%;" src="<?php echo $message->embed( public_path() . "/images/emails/header.jpg" ); ?>"><br/>
        <div style="padding:20px;">{!! $text !!}</div>
        <br/>
    </div>
    <br>

    <div style="text-align: center;font-size:10px;">
        <img style="margin:0 auto;" class="responsive"
             src="<?php echo $message->embed( public_path() . "/images/emails/ideaminds.png" ); ?>"><br/>
        Todos los derechos reservados &copy; Idea Minds Group SAS, {{ date("Y") }}<br>
    </div>
</div>
</body>