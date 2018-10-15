<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    function post_captcha($user_response) {
        $fields_string = '';
        $fields = array(
            'secret' => '6Le74HMUAAAAANo9gqJQXb8dTF2E_NB5pUenf1Sk',
            'response' => $user_response
        );
        foreach($fields as $key=>$value)
        $fields_string .= $key . '=' . $value . '&';
        $fields_string = rtrim($fields_string, '&');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);

        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode($result, true);
    }

    // Call the function post_captcha
    $res = post_captcha($_POST['g-recaptcha-response']);

    if (!$res['success']) {
        // What happens when the reCAPTCHA is not properly set up
        echo 'reCAPTCHA error: Check to make sure your keys match the registered domain and are in the correct locations. You may also want to doublecheck your code for typos or syntax errors.';
    } else {
        // If CAPTCHA is successful...
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
        // Paste mail function or whatever else you want to happen here!
        echo '<br><p>CAPTCHA was completed successfully!</p><br>';
    }
} else {}

?>