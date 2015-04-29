<body>
<img src="<?php echo $message->embed( public_path() . "/images/logo-interacpedia.png" ); ?>">
<hr/>
<br>
<br/>
A password reset has been requested on <a href="http://www.interacpedia.com">http://www.interacpedia.com</a><br/>
<br/>
Click here to reset your password: {{ url('password/reset/'.$token) }}<br/>
<br/>
<i>Note:</i> This link will only work for the next 60 minutes. <br/>
<br/>
Thanks
</body>
<style>
    body{
        color: #666;
        font-size: 20px;
    }
</style>
