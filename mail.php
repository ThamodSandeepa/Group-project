<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

// Check if the form has been submitted
if (isset($_POST["name"]) && isset($_POST["phone"]) && isset($_POST["email"]) && isset($_POST["message"])) {
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'gswmohotti@gmail.com'; // Replace with your Gmail address
        $mail->Password = 'ggdz auue syrc uonw'; // Replace with your Gmail app password
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('gswmohotti@gmail.com'); // Replace with your Gmail address
        $mail->addAddress('gswmohotti@gmail.com'); // Replace with the recipient's email address

        $mail->isHTML(true);

        $mail->Subject = 'Contact Form Submission';

        // Create the email body with the submitted data
        $emailBody = "Name: $name<br>Phone: $phone<br>Email: $email<br>Message: $message";

        $mail->Body = $emailBody;

        $mail->send();

        // Display a success message
        $successMessage = '<h1>Sent Successfully <a href="home.php">Home</a></h1>';
    } catch (Exception $e) {
        // Display an error message if sending fails
        $errorMessage = 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
    }
}

// Display the contact form or success/error message based on the above checks
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Your head content here -->
</head>
<body class="sub_page">
    <!-- Your header content here -->
    <!-- Your contact section here -->
    <?php if (isset($successMessage)) : ?>
        <div class="success-message">
            <?php echo $successMessage; ?>
        </div>
    <?php elseif (isset($errorMessage)) : ?>
        <div class="error-message">
            <?php echo $errorMessage; ?>
        </div>
    <?php else : ?>
        <section class="contact_section layout_padding ">
            <!-- Your contact form here -->
        </section>
    <?php endif; ?>
    <!-- Your footer content here -->
</body>
</html>

