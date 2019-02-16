<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';



$name = filter_var($_POST['name'],FILTER_SANITIZE_STRING);
$maili = filter_var($_POST['email'],FILTER_SANITIZE_STRING);
$message = filter_var($_POST['message'],FILTER_SANITIZE_STRING);
$satauri = filter_var($_POST['satauri'],FILTER_SANITIZE_STRING);




// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
 
//if(!isset($_POST['phone2'])){
$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 0;                         // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'potoshopi8@gmail.com';                 // SMTP username
    $mail->Password = 'paroli123';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('potoshopi8@gmail.com','gmail');
    $mail->addAddress('potoshopi8@gmail.com',$name);     // Add a recipient
               // Name is optional
 
    $body=' ' .$name. ' satauri: ' .$satauri. ' meili: ' .$message. ' reply ' .$maili;
 
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Inquiry'.$name;
    $mail->Body    = $body;
    $mail->AltBody = strip_tags($body);

    $mail->send();
    header("location: index2.html?sent");


} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
 