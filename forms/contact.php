<?php
/**
 * Contact Form Handler
 * Sends messages from your portfolio contact form to your email
 */

$receiving_email_address = 'vivekpatel5862@gmail.com';

// Load the PHP Email Form library
if (file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php')) {
    include($php_email_form);
} else {
    die('Unable to load the "PHP Email Form" Library!');
}

// Create email form instance
$contact = new PHP_Email_Form;
$contact->ajax = true;

$contact->to = $receiving_email_address;
$contact->from_name = $_POST['name'];
$contact->from_email = $_POST['email'];
$contact->subject = !empty($_POST['subject']) ? $_POST['subject'] : "New Message from Portfolio Website";

// Add form messages
$contact->add_message($_POST['name'], 'Name');
$contact->add_message($_POST['email'], 'Email');
if (isset($_POST['phone'])) {
    $contact->add_message($_POST['phone'], 'Phone');
}
$contact->add_message($_POST['message'], 'Message', 10);

// Send email
echo $contact->send();
?>

