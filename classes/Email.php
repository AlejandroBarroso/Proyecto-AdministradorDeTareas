<?php
 
namespace Classes;
 
use PHPMailer\PHPMailer\PHPMailer;
 
class Email {
    public $email;
    public $nombre;
    public $token;
  
 
    public function __construct($email, $nombre, $token)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }
 
    public function enviarConfirmacion() {

        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '4f198e82a04e50';
        $mail->Password = '9de4b5970ebdb5';
 
     
        // según curso
        //$mail->setFrom('cuentas@uptask.com');
        //$mail->addAddress('cuentas@uptask.com', 'uptask.com');

        // segun respuesta clase 585
        $mail->setFrom('cuentas@uptask.com', 'uptask.com'); // mail de origen
        $mail->addAddress($this->email); // mail de destino ( el colocado por el usuario)

        $mail->Subject = 'Confirma tu cuenta';
 
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';
 
        $contenido = "<html>";
        $contenido .= "<p>Hola <strong>" . $this->nombre . "</strong> Haz creado tu cuenta en UpTask, solo debes confirmarla presionando el siguiente enlace </p>";
        $contenido .= "<p>Presiona aquí: <a href='http://localhost:3000/confirmar?token=" . $this->token . "'>Confirmar Cuenta</a></p>";
        $contenido .= "<p>Si tu no solicitaste esta cuenta, puedes ignorar el mensaje </p>";
        $contenido .= "</html>";
 
        $mail->Body = $contenido;
 
        // Enviar el email
        $mail->send();
 
    }

    public function enviarInstrucciones() {

        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '4f198e82a04e50';
        $mail->Password = '9de4b5970ebdb5';
 
     
        // según curso
        //$mail->setFrom('cuentas@uptask.com');
        //$mail->addAddress('cuentas@uptask.com', 'uptask.com');

        // segun respuesta clase 585
        $mail->setFrom('cuentas@uptask.com', 'uptask.com'); // mail de origen
        $mail->addAddress($this->email); // mail de destino ( el colocado por el usuario)

        $mail->Subject = 'Reestablece tu Password';
 
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';
 
        $contenido = "<html>";
        $contenido .= "<p>Hola <strong>" . $this->nombre . "</strong> Parece que has olvidado tu password, sigue el siguiente enlace para recuperarlo</p>";
        $contenido .= "<p>Presiona aquí: <a href='http://localhost:3000/reestablecer?token=" . $this->token . "'>Reestablecer Password</a></p>";
        $contenido .= "<p>Si tu no solicitaste esta cuenta, puedes ignorar el mensaje </p>";
        $contenido .= "</html>";
 
        $mail->Body = $contenido;
 
        // Enviar el email
        $mail->send();
   
    }
}