<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "jiang_shan@live.com";

    $name    = trim($_POST['user_name']);
    $email   = trim($_POST['user_email']);
    $message = trim($_POST['user_message']);

    if (empty($name)) {
        die("Please enter your name");
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Please enter valid email address");
    }
    if (empty($message)) {
        die("Please enter text");
    }

    if (!empty($name) && !empty($email) && !empty($message)) {
        print " Hello " . $name . "! Your message has been received! We will contact you very soon. " . "<a href='index.php'><button>Back to home page</button></a>";
        $subject = "From" . $name;
        $content = $name . " has left you a message, saying " . $message . ". Please get back to " . $name . " by email on " . $email . ".";
        mail($to, $name, $content);
    } else {
        echo "Sorry! Something went wrong";
    }
}