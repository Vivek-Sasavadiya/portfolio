<?php
/**
 * Newsletter / Subscription Form Handler
 * Sends new subscription emails to your inbox
 */

$receiving_email_address = 'vivekpatel5862@gmail.com';

// Load the PHP Email Form library
if (file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php')) {
    include($php_email_form);
} else {
    die('Unable to load the "PHP Email Form" Library!');
}

// Create email form instance
$newsletter = new PHP_Email_Form;
$newsletter->ajax = true;

$newsletter->to = $receiving_email_address;
$newsletter->from_name = $_POST['email'];
$newsletter->from_email = $_POST['email'];
$newsletter->subject = "New Subscription: " . $_POST['email'];

// Add subscription email
$newsletter->add_message($_POST['email'], 'Email');

// Send email
echo $newsletter->send();
?>
