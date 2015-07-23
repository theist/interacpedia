<body>
<div class="content">
    <img class="responsive" src="<?php echo $message->embed( public_path() . "/images/emails/header.jpg" ); ?>"><br/>
    <br/>
    Hola!, gracias por hacer parte de nuestro piloto en interacpedia. <br />
    <br />
    Se ha hecho una solicitud desde nuestra plataforma, para asignar una nueva clave a la cuenta asociada a este correo electrónico.
    <br />
    Para iniciar el proceso de asignar tu contraseña, haz click aquí: {{ url('password/reset/'.$token) }}<br/>
    <br/>
    <hr/>
    <i>Nota:</i> Este link solo estará disponible por los próximos 60 minutos<br/>
    <br/>
    <img class="responsive" src="<?php echo $message->embed( public_path() . "/images/emails/icono_footer.jpg" ); ?>"><br/>
</div>
</body>
<style>
    body{
        color: #666;
        font-size: 20px;
        background: #e4f6f7;
        font-family: 'Open Sans', 'Helvetica';
    }
    .content{
        text-align: center;
        margin: 0 auto;
        max-width: 640px;
    }
    .responsive{
        width: 100%;
    }
</style>
