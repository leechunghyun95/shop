<?php
session_start();
$conn = mysqli_connect("localhost","root","1234","shop");

// 사용자 정보 포스트로 가져온 값으로 업데이트 하는 쿼리문
$sql = "UPDATE user SET nick_name = '$_POST[nick_name]', pw = '$_POST[pw]' WHERE email = '$_SESSION[email]'";
 //echo $sql;
mysqli_query($conn,$sql);

echo "<script>
            alert('회원 정보가 수정되었습니다.');
            history.back();
            </script>";

?>