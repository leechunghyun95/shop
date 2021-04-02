<?php
	$conn = mysqli_connect("localhost","root","1234","shop");

    if(! $_POST[pw1] == $_POST[pw2]){//비밀번호와 비밀번호 확인이 일치하나 여부 검사
        echo "<script>alert('비밀번호가 일치하지 않습니다.'); 
        history.back();</script>";
    }

    $sql = "select * from user";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($result)){
        if($_POST[email] == $row[email]){
            
            echo "<script>alert('이미 가입한 이메일입니다.'); 
        history.back();</script>";
        }
    }

    $postal_code = $_POST[postal_code];//우편번호 변수 포스트로 받아온 값으로 초기화

    if($postal_code == ''){//주소 입력 안해서 우편번호 값이 없을때
        $postal_code = 'NULL';//기본값으로 널값으로 초기화
    }


    $sql = "INSERT INTO user(email,pw,nick_name,postal_code,address,address2) 
            VALUES
            ('$_POST[email]',
            '$_POST[pw1]',
            '$_POST[nick_name]',
            $postal_code,
            '$_POST[address]',
            '$_POST[address2]'
            )";



    $result = mysqli_query($conn,$sql);
    if($result){
        echo "<script>alert('회원가입이 완료되었습니다.'); 
        location.href='sign_in.php';</script>";
    }else{
        echo "<script>alert('회원가입에 실패했습니다.'); 
        history.back();</script>";
    }
	
?>