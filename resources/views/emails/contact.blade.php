<body>
<img src="<?php echo $message->embed( public_path() . "/images/logos/logo-interacpedia.png" ); ?>">
<hr/>
<a href="http://www.interacpedia.com">http://www.interacpedia.com</a><br/>
<br>
<br/>
<h1>Formulario de contacto enviado</h1>
<br/>
<p>
    Name: {{ $name }}
</p>

<p>
    {{ $email }}
</p>

<p>
    {{ $user_message }}
</p>
</body>
<style>
    body{
        color: #666;
        font-size: 20px;
    }
</style>
