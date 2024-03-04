<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Créer une instance PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Paramètres du serveur SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.example.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'user@example.com';
        $mail->Password = 'secret';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        // Destinataire
        $mail->setFrom($email, $name);
        $mail->addAddress('adamridwane02@gmail.com', 'ADAM'); // Remplacez par votre adresse e-mail

        // Contenu de l'e-mail
        $mail->isHTML(true);
        $mail->Subject = 'Nouveau message de ' . $name;
        $mail->Body = 'Nom : ' . $name . '<br>E-mail : ' . $email . '<br>Message : ' . $message;

        // Envoyer l'e-mail
        $mail->send();
        echo 'Le message a été envoyé avec succès';
    } catch (Exception $e) {
        echo "Le message n'a pas pu être envoyé. Erreur du Mailer : {$mail->ErrorInfo}";
    }
}
