<?php
if (isset($_POST['email'])) {

    // birthdate check
    if (!empty($_POST['birthdate'])) {
       
        die();
    }

    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "info@meditech-germany.de";
    $email_subject = "Meditech Germany Kontaktformular";

    function died($error)
    {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error . "<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }

    // validation expected data exists
    if (
        !isset($_POST['name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['subject']) ||
        !isset($_POST['message'])
    ) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');
    }

    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $email_message = "Form details below.\n\n";

    function clean_string($string)
    {
        $bad = array("content-type", "bcc:", "to:", "cc:", "href");
        return str_replace($bad, "", $string);
    }

    $email_message .= "Name: " . clean_string($name) . "\n";
    $email_message .= "Email: " . clean_string($email) . "\n";
    $email_message .= "Subject: " . clean_string($subject) . "\n";
    $email_message .= "Message: " . clean_string($message) . "\n";

    // create email headers
    $headers = 'From: ' . $email . "\r\n" .
        'Reply-To: ' . $email . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    if (empty($_POST['birthdate']) && @mail($email_to, $email_subject, $email_message, $headers)) {

        ?>

        <!-- include your own success html here -->

        Vielen Dank für Ihre Nachricht. Ich werde mich mit Ihnen zeitnah in Verbindung setzen.

        <?php
    } else {

        ?>

        <!-- include your own error html here -->

        Es gab ein Problem beim Versenden Ihrer Nachricht. Bitte versuchen Sie es später erneut.

        <?php
    }
}
?>
