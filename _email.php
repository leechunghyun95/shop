<?php
$conn = mysqli_connect("localhost","root","1234","shop");

session_start();//세션 시작
if(! $_SESSION){//로그인 안했을때    
    echo "<script>
            alert('로그인 후 이용해주세요.');
            location.href  ='sign_in.php'
            </script>";
}else{//로그인 했을 때
    //거래 요청했다는 알림창 띄우고 상품 상세페이지로 이동
    // echo "<script>
    //         alert('거래 요청하였습니다.');
    //         history.back();
    //         </script>";

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
    $message = "구매 요청서 \n구매자: ".$name. "\n구매자 연락처: ".$phone_num. "\n" .$brand."\n" .$item_name."\n상품 링크:http://192.168.111.100/shop/shop_detail.php?id=$_GET[id]";

    echo "http://192.168.111.100/shop/shop_detail.php?id=$_GET[id]";
    //판매자한테 메일 보내기
    //$mail_result = mail($email,"Second Hands 구매요청",$message,"choonghyun95@gmail.com");  
    // if($mail_result){
    //     echo "성공";
    // }else{
    //     echo "실패";
    // }
    
         

   $to = "choonghyun95@naver.com";

   $subject = "PHP 메일 발송";

   $contents = "PHP mail()함수를 이용한 메일 발송 테스트";

   $headers = "From: diceworld@naver.com\r\n";



   $mail_result = mail($to, $subject, $contents, $headers);
        if($mail_result){
            echo "성공";
        }else{
            echo "실패";
        }

}

?>