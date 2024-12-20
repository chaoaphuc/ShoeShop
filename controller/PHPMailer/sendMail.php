<?php 
	include_once("src/PHPMailer.php");
	include_once("src/Exception.php");
	include_once("src/OAuth.php");
	include_once("src/POP3.php");
	include_once("src/SMTP.php");

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
/**
 * 
 */
class SendMail
{
	function sendGmail($_subject, $_body, $_address){
		$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
		try {
		    //Server settings
		    $mail->SMTPDebug = 0;  
		    // =0 khong hien loi, =2 hien loi hoac ket qua
		    // Enable verbose debug output
		    $mail->isSMTP();                                      // Set mailer to use SMTP
		    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		    //dich vu mail
		    $mail->SMTPAuth = true;                               // Enable SMTP authentication
		    $mail->Username = 'sendmailphp2018@gmail.com';                 // SMTP username
		    $mail->Password = '123456phuc';                           // SMTP password
		    //tai khoan dang nhap va gui mail
		    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		    $mail->Port = 587;                                    // TCP port to connect to
		 	$mail->CharSet = "UTF-8";
		    //Recipients
		    $mail->setFrom('thanhphucktvl@gmail.com', 'Project');
		    // gui tu dau va ten la gi
		    $mail->addAddress($_address, 'User');     // Add a recipient
		    $mail->addAddress($_address);               // Name is optional
		    //email nguoi nhan
		    // $mail->addReplyTo('info@example.com', 'Information');
		    //dia chi nhan mail khi nguoi nhan tra loi
		    // $mail->addCC('cc@example.com');
		    // $mail->addBCC('bcc@example.com');
		 
		    //Attachments
		    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
		 
		    //Content
		    $mail->isHTML(true);
		    // Set email format to HTML
		    $mail->Subject = $_subject;
		    $mail->Body    = $_body;
		    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
		 	$result = $mail->send();
		 	return $result;
		    // if($result){
		    // 	echo 'Message has been sent';
		    // }
		} catch (Exception $e) {
		    // echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
		    return false;
		}
	}
}
?>