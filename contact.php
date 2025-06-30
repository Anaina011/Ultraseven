<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize inputs
    $name = htmlspecialchars(strip_tags(trim($_POST["name"])));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(strip_tags(trim($_POST["message"])));

    // Set your email
    $to = "Connect@ultraseven.in"; // Replace with your email
    $subject = "New Contact Form Submission";
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    $body = "You received a new message from the contact form:\n\n";
    $body .= "Name: $name\n";
    $body .= "Email: $email\n\n";
    $body .= "Message:\n$message\n";

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        echo "<script type='text/javascript'>alert('Email sent successfully.'); window.location.href = 'contact.html';</script>";
    } else {
        echo "<script type='text/javascript'>alert('Failed to send message.'); window.location.href = 'contact.html';</script>";
    }
} else {
    // Block direct access
    echo "Invalid access.";
}
