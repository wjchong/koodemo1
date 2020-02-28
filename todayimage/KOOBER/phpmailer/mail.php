
<?php
 

date_default_timezone_set('Etc/UTC');
 

$to= $_GET['to'];
$subject= $_GET['subject'];

$body=$_GET['body'];

require_once "class.phpmailer.php";
 

$mail = new PHPMailer();

$mail->isSMTP();

$mail->SMTPDebug   = 2;
$mail->DKIM_domain = '34.236.248.133';
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host        = "email-smtp.us-east-1.amazonaws.com";

$mail->Port        = 465;

$mail->SMTPAuth    = true;

$mail->Username    = "AKIAJNYNJPJLRBOJLPMQ";
//Password to use for SMTP authentication
$mail->Password    = "AkOBccoP29WxNaTNYOy1KBJWecF4AEthUrmVpPRmfOva";
$mail->SMTPSecure  = 'ssl';

$mail->setFrom('info@socialryde.cc', 'socialryde.cc');



$mail->addAddress($to);
//Set the subject line
$mail->Subject = $subject;
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';

$mail->Body = $body;
//Attach an image file

 
//send the message, check for errors
if (!$mail->send()) {
    //echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    //echo "Message sent!";
}
?>
