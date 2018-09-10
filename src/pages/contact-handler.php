<?php

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $body = $_POST['message'];

    $email_from = "info@kivutravel.com";
    $email_subject = "Demande d'information depuis le site web";
    $email_body = "Visiteur : " . $firstname . " " . $lastname . "\n" . 
                    "Email du visiteur : " . $email . "\n" .
                    "Message : " . $body;

    $to = "s.buhl@hotmail.com";
    $headers = "From: ". $email_from;

    mail($to, $email_subject, $email_body, $headers);
    header("Location: contact.html");

?>