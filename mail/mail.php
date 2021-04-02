<?php

$conn = mysqli_connect("localhost","root","1234","shop");

session_start();//세션 시작
if(! $_SESSION){//로그인 안했을때    
    echo "<script>
            alert('로그인 후 이용해주세요.');
            location.href  ='http://192.168.111.100/second-hands/sign_in.php'
            </script>";
}else{//로그인 했을 때
    //거래 요청했다는 알림창 띄우고 상품 상세페이지로 이동
    echo "<script>
            alert('거래 요청하였습니다.');
            history.back();
            </script>";

    //세션 로그인된 사용자 정보 가져오기
    //로그인된 사용자 이메일 가져와서 유저변수에 담기
    $user = $_SESSION[email];
    //유저변수에 들어있는 이메일과 일치하는 사용자 정보 가져오기
    $sql = "SELECT * FROM user WHERE email = '$user'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    //구매자 닉네임과 전화번호 가져와서 변수에 담기
    $name = $row[nick_name];
    $phone_num =  $row[phone_num];
    
    //상품 정보 가져오기        
    $sql2 = "SELECT * FROM goods WHERE id = $_GET[id]";
    $result2 = mysqli_query($conn,$sql2);
    $row2 = mysqli_fetch_array($result2);
    // 상품 정보에서 판매자 이메일, 상품 정보 (브랜드,상품명,가격) 가져오기
    //상품정보에서 판매자 이메일가져와서 이메일 변수에 담기
    $email = $row2[seller];
    //상품정보에서 브랜드가져와서 브랜드변수에 담기
    $brand = $row2[designer];
    //상품명 변수에 담기
    $item_name = $row2[item_name];
    //메일 보낼 내용 작성
    $message = "구매 요청서 <br>구매자: ".$name. "<br>구매자 연락처: ".$phone_num. "<br>" .$brand."<br>" .$item_name."<br><a href='http://192.168.111.100/second-hands/shop_detail.php?id=$_GET[id]'>상품 링크</a>";


    //상품번호 가져와서 그 상품의 on_sale판매중인지 거래중인지 하는 정보 0으로 변경하는 쿼리문작성
    $sql3 = "UPDATE goods SET on_sale = 0 WHERE id = $_GET[id]";
    mysqli_query($conn,$sql3);
    

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
$mail->Subject = '세컨핸즈 구매요청서';



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