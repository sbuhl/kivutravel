<?php

if(!empty($_POST)){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $body = $_POST['message'];
    $address = $_POST['address'];
    $valid = true;
    if($address != ""){

    }else{
        if (empty($name)){
            $valid = false;
            $erreurnom = "Vous n'avez pas rempli votre nom.";
        }   
        if(empty($email)){
            $valid = false;
            $erreurmail = "Vous n'avez pas rempli votre email.";
        }
    
        if(empty($body)){
            $valid = false;
            $erreurbody = "Vous n'avez pas rempli votre message.";
        }

        if($valid){    
            $body = stripslashes($body);
            $name = stripslashes($name);
            $email_from = "info@kivutravel.com";
            $email_subject = "Demande d'information depuis le site web";
            $email_body = "Visiteur : " . $name .  "\n" .
                            "Email du visiteur : " . $email . "\n" .
                            "Message : " . $body;

            $to = "info@kivutravel.com";
            $header = "From: $email_from \n";
            $header .= "Reply-To : $email"; 
            if(mail($to, $email_subject, $email_body, $header)){
                $succes = "Votre message nous est bien parvenu.";
                unset($name);
                unset($email);
                unset($body);
                header("Location: contact.html");
            }else{
                $erreur = "Une erreur est survenue.";
            }
            
        }
    }
}
?>