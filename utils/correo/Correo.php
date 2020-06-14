<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Correo {

        function cargaCorreo($correos, $asunto, $cuerpo, $cant){

            require 'PHPMailer/Exception.php';
            require 'PHPMailer/PHPMailer.php';
            require 'PHPMailer/SMTP.php';

            

            // Instantiation and passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->SMTPDebug = 0;                      // Enable verbose debug output
                $mail->isSMTP();                                            // Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = 'apiegresados2@gmail.com';                     // SMTP username
                $mail->Password   = 'rasengan2000';                               // SMTP password
                $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $mail->Port       = '587';                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                //Recipients
               
                
                if($cant==0){
                    $mail->setFrom('apiegresados@gmail.com', 'Notificacion Ing. Agroindustrial');
                    foreach($correos as $cor){
                        $mail->addAddress($cor['correoInstitucional'], '');     // Add a recipient
                    }
                }else if($cant==1){
                    $mail->setFrom('apiegresados@gmail.com', 'Recuperacion de Cuenta');
                    $mail->addAddress($correos['correoInstitucional'], ''); 
                }

               
              
            
                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = utf8_decode($asunto); //asunto
                $mail->Body    = utf8_decode($cuerpo); //cuerposs
               // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
                        
        }


        function correoEventos($correos, $titulo, $descripcion){
            require 'PHPMailer/Exception.php';
            require 'PHPMailer/PHPMailer.php';
            require 'PHPMailer/SMTP.php';

            

            // Instantiation and passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->SMTPDebug = 0;                      // Enable verbose debug output
                $mail->isSMTP();                                            // Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = 'apiegresados@gmail.com';                     // SMTP username
                $mail->Password   = 'rasengan2000';                               // SMTP password
                $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $mail->Port       = '587';                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                //Recipients
                $mail->setFrom('apiegresados@gmail.com', 'Invitacion de Evento Ing.Agroindustrial');
    
                foreach($correos as $cor){
                    $mail->addAddress($cor['correoInstitucional'], '');     // Add a recipient
                }

                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = utf8_decode($titulo); //asunto
                $mail->Body    = utf8_decode($descripcion); //cuerposs
               // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }



}

