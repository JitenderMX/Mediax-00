<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Set recipient email address
    $to = "jitender.work.mediax@gmail.com";
    
    // Set email subject
    $subject = "New Career Form Submission";
    
    // Build email message
    $message = "Full Name: " . $_POST['full-name'] . "\n";
    // Add other form fields to the message
    $message .= "Email: " . $_POST['email'] . "\n";
    $message .= "Phone: " . $_POST['number'] . "\n";
    $message .= "Current Company: " . $_POST['company'] . "\n";
    $message .= "Current CTC: " . $_POST['ctc'] . "\n";
    $message .= "Notice Period: " . $_POST['notice-period'] . "\n";
    $message .= "Where did you hear about us?: " . $_POST['where-you-hear'] . "\n";
    
    // File upload handling
    $file = $_FILES['upload-resume'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    
    // Check if file was uploaded without errors
    if ($fileError === 0) {
        // Attach the file to the email
        $boundary = md5(rand());
        $headers = "From: " . $_POST['email'] . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: multipart/mixed; boundary=\"$boundary\"\r\n";
        
        // Add text data to the message
        $body = "--$boundary\r\n";
        $body .= "Content-Type: text/plain; charset=ISO-8859-1\r\n";
        $body .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
        $body .= $message . "\r\n";
        
        // Add attachment
        $body .= "--$boundary\r\n";
        $body .= "Content-Type: application/pdf; name=\"$fileName\"\r\n";
        $body .= "Content-Disposition: attachment; filename=\"$fileName\"\r\n";
        $body .= "Content-Transfer-Encoding: base64\r\n";
        $body .= "X-Attachment-Id: " . rand(1000, 99999) . "\r\n\r\n";
        $body .= chunk_split(base64_encode(file_get_contents($fileTmpName))) . "\r\n";
        $body .= "--$boundary--";

        // Send the email
        if (mail($to, $subject, $body, $headers)) {
            header("Location: thankyou.html");
        } else {
            echo "Failed to send email.";
        }
    } else {
        echo "Error uploading file.";
    }
} else {
    echo "Invalid request.";
}
?>
