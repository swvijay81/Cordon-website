<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['button1'])) {
    // Retrieve form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Company email address
    $to = 'kiranshreyas.cordon@gmail.com';  // Replace with your actual email address
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Email subject and body
    $email_subject = "Contact Form Submission: $subject";
    $email_body = "You have received a new message from your website contact form.\n\n" .
                  "Here are the details:\n" .
                  "Name: $name\n" .
                  "Email: $email\n" .
                  "Subject: $subject\n" .
                  "Message:\n$message";

    // Send the email
    if (mail($to, $email_subject, $email_body, $headers)) {
        // Handle error
        echo "There was an error sending your message. Please try again later.";
    }
} else {
    // Redirect to the contact form if accessed directly
    header("Location: index.html");
    exit();
}
?>
