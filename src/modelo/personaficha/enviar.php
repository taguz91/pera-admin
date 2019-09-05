<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
require_once "src/modelo/clases/personamd.php";

class EnviarCorreo
{

    static function enviar($persona, $pass)
    {
        $num = 0;

            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->SMTPDebug = 0;                                       // Enable verbose debug output
                $mail->isSMTP();                                            // Set mailer to use SMTP
                $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = '15andresc@gmail.com';                     // SMTP username
                $mail->Password   = 'Pai@123*';                               // SMTP password
                $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
                $mail->Port       = 587;                                    // TCP port to connect to

                //Recipients
                $mail->setFrom('15andresc@gmail.com', 'ISTA - Desarrollo de Software');
                $mail->addAddress($persona->correo);     // Add a recipient

                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Ficha Socioecon&oacute;mica';
                $mail->Body    = "<h1> Ficha Socioecon&oacute;mica </h1>  \n
            El motivo de este mensaje es comunicarle sobre el llenado de la Ficha Socioecon&oacute;mica<br> \n
            El cual lo deber&aacute; hacer con su Usuario y Contrase&ntilde;a, los cuales se le presentará a continuación<br><br> \n
            <strong>Usuario: </strong>Su c&eacute;dula correspondiente <br> \n
            <strong>Contrase&ntilde;a:</strong> ".$pass;

                $mail->send();

                echo 'El mensaje ha sido enviado';
                $num++;

            } catch (Exception $e) {
                echo "El mensaje no pudo ser enviado: {$mail->ErrorInfo}";
            }
        
        if($num == 1){
            return true;
        } else{
            return false;
        }

    }

    static function enviarEditar($correo, $pass){

        $num = 0;
        $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->SMTPDebug = 0;                                       // Enable verbose debug output
                $mail->isSMTP();                                            // Set mailer to use SMTP
                $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = '15andresc@gmail.com';                     // SMTP username
                $mail->Password   = 'Pai@123*';                               // SMTP password
                $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
                $mail->Port       = 587;                                    // TCP port to connect to

                //Recipients
                $mail->setFrom('15andresc@gmail.com', 'ISTA - Desarrollo de Software');
                $mail->addAddress($correo);     // Add a recipient

                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Ficha Socioecon&oacute;mica';
                $mail->Body    = "<h1> Ficha Socioecon&oacute;mica </h1> \n
                El motivo de este mensaje es comunicarle sobre el llenado de la Ficha Socioecon&oacute;mica<br> \n
                El cual lo deber&aacute; hacer con su Usuario y Contrase&ntilde;a, los cuales serán su Cédula de Ciudadanía<br> \n
                Adem&aacute;s de esto necesita una Contraseña para el llenado de la Ficha antes mencionada, la cual es la siguiente: <br> <br>
                <strong>Contrase&ntilde;a:</strong> pass<br>
                A continuación se presenta un enlace el cual le redirecciona a la página de ingreso de las Fichas Socioecon&oacute;micas<br>
                <a href=\"htttp://ubi.tecazuay.edu.ec\" target=\"_blank\">Click para Ir al Ingreso de Fichas Socioecon&oacute;micas</a>"; 

                $mail->send();

                echo "El correo ha sido enviado";
                $num++;

            } catch (Exception $e) {
                echo "El mensaje no pudo ser enviado: {$mail->ErrorInfo}";

            }
            if($num == 1){
                return true;
            } else{
                return false;
            }
    }
}
