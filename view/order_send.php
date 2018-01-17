<?php
/*
 Read forms data
 Check it
 * Send to owner mail
 * Return to form page
 * Here is new function:
 * 1. mail(email, subject, msg
 * 2. header(location, path)
 */

if ( isset($_POST['send']) ) {
    $your_name = filter_input(INPUT_POST, 'name');
    $your_mail = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    //$your_mobile = filter_input($type, $variable_name);
    
    if (!$your_mail) {
        $myError = 'Wrong email adress!';
    }
    
    $your_msg = $_POST['message'];
    $my_mail = "info@site.com";
    $subject = 'message from company site';
    $message = 'Message was sended by contact form'
            . "Name: $your_name"
            . "Mail: $your_mail"
            . "Comment: $your_msg";
    
    //message sending
    
    if (!isset($myError))
    {
        mail($my_mail, $subject, $message);
        header('Location: contact?message=send');
    } else {
        header('Location: contact?message=' . $myError);
    }
} else {
    //Button wasn't pressed
    
    header('Location: contact?message=error');
}