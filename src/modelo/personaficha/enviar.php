<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

class EnviarCorreo
{

    static function enviar($persona, $pass)
    {
        $num = 0;
        for ($i = 0; $i < count($pass); $i++) {

            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->SMTPDebug = 1;                                       // Enable verbose debug output
                $mail->isSMTP();                                            // Set mailer to use SMTP
                $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = '15andresc@gmail.com';                     // SMTP username
                $mail->Password   = 'Pai@123*';                               // SMTP password
                $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
                $mail->Port       = 587;                                    // TCP port to connect to

                //Recipients
                $mail->setFrom('15andresc@gmail.com', 'Administración ISTA');
                $mail->addAddress($persona[$i]->personaCorreo);     // Add a recipient

                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Ficha Socioeconómica';
                $mail->Body    = "<h1> Ficha Socioeconímica </h1> \n
            El motivo de este mensaje es comunicarle sobre el llenado de la Ficha Socioeconómica \n
            El cual lo deberá hacer con su <strong>Usuario</strong> y <strong>Contraseña</strong> \n
            Usuario: Su cédula correspondiente \n
            Contraseña: $pass[$i]";

                $mail->send();

                //echo 'El mensaje ha sido enviado';
                $num++;

            } catch (Exception $e) {
                echo "El mensaje no pudo ser enviado: {$mail->ErrorInfo}";
            }
        }
        if($num == $persona.length){
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
                $mail->SMTPDebug = 1;                                       // Enable verbose debug output
                $mail->isSMTP();                                            // Set mailer to use SMTP
                $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = '15andresc@gmail.com';                     // SMTP username
                $mail->Password   = 'Pai@123*';                               // SMTP password
                $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
                $mail->Port       = 587;                                    // TCP port to connect to

                //Recipients
                $mail->setFrom('15andresc@gmail.com', 'Administración ISTA');
                $mail->addAddress($correo);     // Add a recipient

                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Ficha Socioeconómica';
                $mail->Body    = "<h1> Ficha Socioeconímica </h1> \n
            El motivo de este mensaje es comunicarle sobre el llenado de la Ficha Socioeconómica \n
            El cual lo deberá hacer con su <strong>Usuario</strong> y <strong>Contraseña</strong> \n
            Usuario: Su cédula correspondiente \n
            Contraseña: $pass";

                $mail->send();

                //echo 'El mensaje ha sido enviado';
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
