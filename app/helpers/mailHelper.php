<?php

        // Import PHPMailer classes into the global namespace
        // These must be at the top of your script, not inside a function
            use PHPMailer\PHPMailer\PHPMailer;
            use PHPMailer\PHPMailer\SMTP;
            use PHPMailer\PHPMailer\Exception;
            
 function sendmail($email, $subject, $msg){
    
$mail = new PHPMailer(true);
date_default_timezone_set('Africa/Lagos');
//$mail->isSMTP();                                   // Set mailer to use SMTP
//$mail->Host = 'cushyrealty.com';  // Specify main and backup SMTP          servers
$mail->Host = 'localhost'; 
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'info@cushyrealty.com';                 // SMTP username
$mail->Password = 'Ft(bBar0sCld';                           // SMTP password
//$mail->SMTPSecure = 'ssl';
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to
$mail->setFrom('info@cushyrealty.com', 'Cushy');
//$mail->addAddress('info@cushyrealty.com', '');     // Add a recipient
$mail->addAddress($email);               // Name is optional
$mail->addReplyTo('info@cushyrealty.com', 'Information');
//$mail->addCC('chigirlofj@yahoo.com');
//$mail->addBCC('echioma@stemteers.org');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addEmbeddedImage($imgPath, 'logo.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $subject;
$mail->Body    = $msg;
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo '<script type="text/javascript">window.location = "https://cushyrealty.com/Users/activate"</script>';
       // exit();
      // echo 'Message has been sent to your email. Please check your Spam folder if not seen in your primary inbox';
      }
    //}
 }

            
 function sendResetPassMail($email, $subject, $msg, $officialEmail){
    
    $mail = new PHPMailer(true);
    date_default_timezone_set('Africa/Lagos');
    //$mail->isSMTP();                                   // Set mailer to use SMTP
    //$mail->Host = 'cushyrealty.com';  // Specify main and backup SMTP          servers
    $mail->Host = 'localhost'; 
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'info@cushyrealty.com';                 // SMTP username
    $mail->Password = 'Ft(bBar0sCld';                           // SMTP password
    //$mail->SMTPSecure = 'ssl';
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to
    $mail->setFrom('info@cushyrealty.com', 'Cushy');
    //$mail->addAddress('info@cushyrealty.com', '');     // Add a recipient
    $mail->addAddress($email);               // Name is optional
    $mail->addReplyTo('info@cushyrealty.com', 'Information');
    //$mail->addCC('chigirlofj@yahoo.com');
    //$mail->addBCC('echioma@stemteers.org');
    
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addEmbeddedImage($imgPath, 'logo.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML
    
    $mail->Subject = $subject;
    $mail->Body    = $msg;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        /* echo '<script type="text/javascript">window.location = "https://cushyrealty.com/Users/activate"</script>'; */
            exit();
          // echo 'Message has been sent to your email. Please check your Spam folder if not seen in your primary inbox';
          }
        //}
     }
    ?>

