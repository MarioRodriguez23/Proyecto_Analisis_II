<?php

if(isset($_POST['enviar'])){
    if(!empty($_POST['nombre']) && !empty($_POST['telefono']) && !empty($_POST['correo']) && !
        empty($_POST['mensaje']))
    {
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        $mensaje = $_POST['mensaje'];
        $correo = $_POST['correo'];
        $header = "From: lrodriguezr11@gmail.com" . "\r\n";
        $header.= "Reply-To: lrodriguezr11@gmail.com" . "\r\n";
        $header.= "X-Mailer: PHP/". phpversion();
        $mail = @mail($correo,$mensaje,$header);
        if($mail){
            echo "<h4>¡Mal enviado!</h4>";
                }else{
                    echo "error al imsertar";
                }
    }
    
}

?>