<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST["full-name"];
    $email = $_POST["email"];
    $company = $_POST["company"];
    $number = $_POST["number"];
    $service = $_POST["service"];
    $budget = $_POST["budget"];
    $message = $_POST["message"];

    $to = "jitender.work.mediax@gmail.com"; // Replace with your email address
    $subject = "Contact Form Submission";
    $body = "Client Name: $full_name\nEmail: $email\nName Comapny: $company\nPhone: $number\nService They Want:\n";

    foreach ($service as $serv) {
        $body .= "- $serv\n";
    }
    $body .= "Budget They Have: $budget\nMessage:\n$message";

    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        // echo "Success! Your message has been sent.";
        header("Location: thankyou.html");

    } else {
        // echo "Error! Unable to send message.";
        header("Location: error.html");

    }
}
?>