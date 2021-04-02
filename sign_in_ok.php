<?php
session_start();//세션 시작

$conn = mysqli_connect("localhost","root","1234","shop");

$id = $_POST[email];//입력한 이메일값 id변수에 저장

$sql = "select * from user WHERE email='$id'";//입력한 이메일에 맞는 값 불러오는 쿼리문

$result = mysqli_query($conn,$sql);//쿼리문 실행


$row = mysqli_fetch_array($result);//row변수에 쿼리문 실행 결과 담기

if($row[pw] == $_POST[pw]){//쿼리문 실행해서 가져온 row변수의 pw값과 사용자가 입력한 pw값 비교
    //비밀번호 맞을때
    $_SESSION['is_login'] = true;//세션의 is_login변수에 참값 저장
    $_SESSION['nickname'] = $row[nick_name];//세션의 닉네임 변수에 쿼리문 실행해서 가져온 값 안에 있는 닉네임 저장함
    $_SESSION['email'] = $row[email];//중복되지 않는 값인 이메일 값도 같이 저장해서 나중에 데이터 빼올일 있을때 참조
    
    echo "<script>alert('$_SESSION[nickname]님 환영합니다.'); 
    location.href='index.php';</script>";

    // 아이디 기억하기 스위치 켜져있으면 쿠키에 아이디 저장하고 꺼져있으면 그냥 진행
    if($_POST['remember']){//리멤버 켜져있으면
        setcookie('remember_email',true);//리멤버 이메일 값 트루로 쿠키 저장
        setcookie('email',$_POST['email']);//입력한 이메일값 이메일키에 쿠키로 저장
    }else{//리멤버 꺼져있으면
        setcookie("remember_email"); 
    }
}else{
    //비밀번호 틀릴때
    echo"<script>alert('로그인에 실패하였습니다.')
    history.back();</script>";
    
}

?>
