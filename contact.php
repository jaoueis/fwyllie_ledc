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
        $msg     = " Hello " . $name . "! Your message has been received! We will contact you very soon. ";
        $subject = "From" . $name;
        $content = $name . " has left you a message, saying " . $message . ". Please get back to " . $name . " by email on " . $email . ".";
        mail($to, $name, $content);
    } else {
        echo "Sorry! Something went wrong";
    }
}
include("sections/header.html");
include("sections/contact-banner.html");
?>
    <div class="container contact-wrap">
        <?php echo "<p class='p-grey-dark'>" . $msg . "</p>" ?>
        <section class="row">
            <div class="col-12 col-lg-6 form-wrap">
                <form method="post" action="contact.php">
                    <div class="form_element">
                        <label for="name" class="h2-blue">Name</label><br>
                        <input type="text" name="user_name" id="name" class="form_input" required>
                    </div>
                    <div class="form_element">
                        <label for="email" class="h2-blue">Email</label><br>
                        <input type="email" name="user_email" id="email" class="form_input" required>
                    </div>
                    <div class="form_element">
                        <label for="comment" class="h2-blue">Comment</label><br>
                        <textarea type="text" name="user_message" id="comment" class="form_input" required>
                    </textarea>
                    </div>
                    <input id="submit" name="submit" type="submit" value="Submit">
                </form>
            </div>
            <div class="col-12 col-lg-6 map-wrap">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2918.7196265698944!2d-81.2444195!3d42.9841794!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x882ef21b3a13191b%3A0xe4745187983b1df5!2s380+Wellington+St%2C+London%2C+ON+N6A+5B5!5e0!3m2!1sen!2sca!4v1523856309525" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </section>
    </div>
<?php include("sections/footer.html"); ?>