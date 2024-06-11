<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

    //sanitize input
    $firstName = htmlspecialchars(trim($_POST["first-name"]));
    $lastName = htmlspecialchars(trim($_POST["last-name"]));
    $gender = htmlspecialchars(trim($_POST["gender"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $country = htmlspecialchars(trim($_POST["country"]));
    $subject = htmlspecialchars(trim($_POST["subject"]));
    $message = htmlspecialchars(trim($_POST["message"]));
    $honeypot = $_POST["honeypot"];

    //validate input
    if(empty($firstName)) {
        $errors["first-name"] = "First name is required";
    }
    if(empty($lastName)) {
        $errors["last-name"] = "Last name is required";
    }
    if(empty($gender)) {
        $errors["gender"] = "Gender is required";
    }
    if(empty($country)) {
        $errors["country"] = "Country is required";
    }
    if(empty($message)) {
        $errors["message"] = "Message is required";
    }

    //Honeypot check
    if (!empty($honeypot)) {
        $errors["honeypot"] = "Spam detected!";
    }

//     //If there are no errors, send email
//     if (empty($errors)) {
//         //smtp parameters setup
//         ini_set('SMTP', 'smtp.gmail.com');
//         ini_set('smtp_port', '587');
//         ini_set('sendmail_from', $email); //set user's email address 

//         //TLS
//         ini_set('smtp_crypto', 'tls');

//         //Attempt to connect to SMTP server
//         $smtpSocket = stream_socket_client('tcp://smtp.gmail.com:587', $errno, $errstr, 30);
//         if (!$smtpSocket) {
//             echo "Failed to connect to SMTP server: $errstr ($errno)";
//         } else {
//             //send STARTTLS command
//             fwrite($smtpSocket, "STARTTLS\r\n");

//             //Enable encrypted TLS connection
//             stream_socket_enable_crypto($smtpSocket, true, STREAM_CRYPTO_METHOD_TLS_CLIENT);
        
//         //send email
//         $to = "shw.tasha@gmail.com";
//         $formSubject = "Contact form subject: $subject";
//         $body = "Name: $firstName $lastName\n";
//         $body .= "Gender: $gender\n";
//         $body .= "Email: $email\n";
//         $body .= "Country: $country\n";
//         $body.= "Message: $message\n";
//         $headers = "From: $email";

//         if (mail($to, $formSubject, $body, $headers)) {
//             echo "Thank you, your message is sent successfully.";
//         } else {
//             echo "Failed to send message.";
//         }
//     }
//     } else {
//         //Display errors 
//         foreach ($errors as $field => $error) {
//             echo "<p>$field: $error</p>";
//         }
//     }

if (empty($errors)) {
    $mail = new PHPMailer(true);

    try {
        //server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'nataliiamelnykova9@gmail.com';
        $mail->Password = 'mtvf esmo xjik jfeg';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        //recipients
        $mail->setFrom($email, "$firstName $lastName");
        $mail->addAddress('nataliiamelnykova9@gmail.com');

        //content
        $mail->isHTML(false);
        $mail->Subject = "Contact form subject: $subject";
        $mail->Body = "Name: $firstName $lastName\nGender: $gender\nEmail: $email\nCountry: $country\nMessage: $message\n";

        $mail->send();
        echo "<p>Thank you, your message is sent successfully.</p>";
        session_start();
        $_SESSION['success message'] = "Thank you, your message is sent successfully.";

        header("Location: index.html");
        exit();
        
    } catch (Exception $e) {
        echo "Failed to send message. Mailer Eror: {$mail->ErrorInfo}";
    }
} else {
    //display errors
    foreach ($errors as $field => $error) {
        echo "<p>$field: $error</p>";
    }
  }
}
