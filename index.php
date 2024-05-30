<?php
// Impote de clases para poder usar las librerías de PHP mailer.
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

// Load Composer's autoloader
require 'vendor/autoload.php'; // Carga el autoloader de Composer para incluir las dependencias necesarias

$mail = new PHPMailer(true); // Crea una instancia de PHPMailer con excepciones habilitadas

try {
    // Configuración del servidor
    $mail->isSMTP(); // Establece el uso de SMTP
    $mail->Host       = 'smtp.gmail.com'; // Especifica el servidor SMTP de Gmail
    $mail->SMTPAuth   = true; // Habilita la autenticación SMTP
    $mail->Username   = 'dragonalado6@gmail.com'; // Tu correo de Gmail
    $mail->Password   = 'ddyt hzwn zbmc omyz'; // Tu contraseña de Gmail o contraseña de aplicación
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Habilita encriptación TLS
    $mail->Port       = 587; // Puerto SMTP para TLS

    // Destinatarios
    $mail->setFrom('dragonalado6@gmail.com', 'Mailer'); // Dirección del remitente y nombre
    $mail->addAddress('dragonalado6@gmail.com'); // Añade un destinatario

    // Contenido del correo
    $mail->isHTML(true); // Establece el formato del correo en HTML
    $mail->Subject = 'Asunto del correo'; // Asunto del correo
    $mail->Body    = 'Este es el cuerpo del mensaje en HTML <b>en negritas</b>'; // Cuerpo del mensaje en HTML
    $mail->AltBody = 'Este es el cuerpo del mensaje en texto plano para clientes que no admiten HTML'; // Cuerpo alternativo en texto plano

    // Habilitar registro de depuración
    $mail->SMTPDebug = SMTP::DEBUG_SERVER; // Habilita la depuración SMTP, muestra información detallada del proceso de envío

    $mail->send(); // Envía el correo electrónico
    echo 'El mensaje ha sido enviado'; // Mensaje de éxito
} catch (Exception $e) {
    echo "No se pudo enviar el mensaje. Error de Mailer: {$mail->ErrorInfo}"; // Mensaje de error si el envío falla
}
?>