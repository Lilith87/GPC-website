<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Form mail</title>
</head>
<body>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize and validate form inputs
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die('Invalid email.');
    }

    // Componi l'email
    $to = 'gpc.afg@gmail.com '; // Sostituisci con la tua email
    $subject = 'Messagge from contact form';
    
    // Crea il corpo dell'email
    $body = "You received a new message from the website:\n\n";
    $body .= "Name: " . $name . "\n";
    $body .= "Email: " . $email . "\n";
    $body .= "Messagge:\n" . $message . "\n";
    
    // Intestazioni email
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Invia l'email
    if (mail($to, $subject, $body, $headers)) {
        echo 'Message sent successfully!';
    } else {
        echo 'An error occurred while sending the message';
    }
} else {
    echo 'Invalid access to the form.';
}
?>


</body>
</html>