<?php

$conn = mysqli_connect("localhost","root","1234","shop");

$message = "임시비밀번호는 [0000]입니다.";

// echo $message;

// db의 유저데이터에서 입력한 이메일과 일치하는 이메일있는지 확인 없으면 없다는 알림 있으면 다음 단계로
$sql = "SELECT * FROM user WHERE email = '$_POST[email]'";
// echo $sql;
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
// echo $row[email];

if($row){//일치하는 이메일이 있다면
    $email = $_POST[email];
    $message = "임시비밀번호는 [0000]입니다.";

    echo "<script>
            alert('메일로 임시비밀번호를 발송했습니다.');
            location.href='../sign_in.php';
            </script>";

            //실제로 유저데이터에서 비밀번호 0000으로 업데이트
            $sql2 = "UPDATE user SET pw = '0000' WHERE email = '$_POST[email]'";
            // echo $sql2;
            mysqli_query($conn,$sql2);

}else{//일치하는 이메일이 없다면
    echo "<script>
            alert('일치하는 회원 메일이 없습니다.');
            history.back();
            </script>";

}


/**
 * This example shows settings to use when sending via Google's Gmail servers.
 * This uses traditional id & password authentication - look at the gmail_xoauth.phps
 * example to see how to use XOAUTH2.
 * The IMAP section shows how to save this message to the 'Sent Mail' folder using IMAP commands.
 */

//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;



include "PHPMailer.php";
include "SMTP.php";



//Create a new PHPMailer instance
$mail = new PHPMailer();



//Tell PHPMailer to use SMTP
$mail->isSMTP();



//Enable SMTP debugging
//SMTP::DEBUG_OFF = off (for production use)
//SMTP::DEBUG_CLIENT = client messages
//SMTP::DEBUG_SERVER = client and server messages
$mail->SMTPDebug = SMTP::DEBUG_OFF;


//Set the hostname of the mail server
$mail->Host = 'smtp.naver.com';
//Use `$mail->Host = gethostbyname('smtp.gmail.com');`
//if your network does not support SMTP over IPv6,
//though this may cause issues with TLS


//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 465;


//Set the encryption mechanism to use - STARTTLS or SMTPS
$mail->SMTPSecure = "ssl";



//Whether to use SMTP authentication
$mail->SMTPAuth = true;



//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = 'choonghyun95';




//Password to use for SMTP authentication
$mail->Password = 'asd123';




$mail->CharSet = 'UTF-8';



//Set who the message is to be sent from
$mail->setFrom('choonghyun95@naver.com', '세컨핸즈');


//Set an alternative reply-to address
$mail->addReplyTo('choonghyun95@naver.com', 'First Last');


// echo $email;
//Set who the message is to be sent to
$mail->addAddress($email, '충현');



//Set the subject line
$mail->Subject = '세컨핸즈 임시비밀번호';



//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML($message);



//Replace the plain text body with one created manually
$mail->AltBody = '테스트좀 하자';

//$mail->addAttachment='20210226182014ROIMGRA7ZK6SPBJ4IADQXLEKCE.jpg';





//send the message, check for errors
if (!$mail->send()) {

    // echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {

    // echo 'Message sent!';
    //Section 2: IMAP
    //Uncomment these to save your message in the 'Sent Mail' folder.
    #if (save_mail($mail)) {
    #    echo "Message saved!";
    #}
}


echo "7";

//Section 2: IMAP
//IMAP commands requires the PHP IMAP Extension, found at: https://php.net/manual/en/imap.setup.php
//Function to call which uses the PHP imap_*() functions to save messages: https://php.net/manual/en/book.imap.php
//You can use imap_getmailboxes($imapStream, '/imap/ssl', '*' ) to get a list of available folders or labels, this can
//be useful if you are trying to get this working on a non-Gmail IMAP server.
function save_mail($mail)
{
    //You can change 'Sent Mail' to any other folder or tag
    $path = '{imap.gmail.com:993/imap/ssl}[Gmail]/Sent Mail';

    //Tell your server to open an IMAP connection using the same username and password as you used for SMTP
    $imapStream = imap_open($path, $mail->Username, $mail->Password);

    $result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
    imap_close($imapStream);

    return $result;
}