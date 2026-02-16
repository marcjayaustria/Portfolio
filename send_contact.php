<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);

    
    $recipient = "marcjayaustria@gmail.com";
    $subject = "New Portfolio Message from $name";

    
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";

    
    $headers = "From: $name <$email>";

    
    if (mail($recipient, $subject, $email_content, $headers)) {
       
        echo "<script>alert('Message Sent Successfully!'); window.location.href='index.html';</script>";
    } else {
        
        echo "<script>alert('Oops! Something went wrong.'); window.history.back();</script>";
    }
} else {
  
    header("Location: index.html");
}
?>