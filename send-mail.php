<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name    = htmlspecialchars(trim($_POST["name"]));
    $email   = htmlspecialchars(trim($_POST["email"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    if ($name && $email && $message) {
        $to      = "your-email@example.com"; // <-- replace with your email
        $subject = "New message from $name via Website Contact Form";
        $body    = "Name: $name\nEmail: $email\n\nMessage:\n$message";
        $headers = "From: $email";

        if (mail($to, $subject, $body, $headers)) {
            echo "<h2>Thank you, $name! Your message has been sent.</h2>";
        } else {
            echo "<h2>Oops! Something went wrong, please try again later.</h2>";
        }
    } else {
        echo "<h2>Please fill in all fields.</h2>";
    }
} else {
    header("Location: index.html");
    exit;
}
?>
