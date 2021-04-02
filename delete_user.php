<?php
session_start();
$conn = mysqli_connect("localhost","root","1234","shop");

// 사용자 정보 데이터 삭제하는 쿼리문
$sql = "DELETE FROM user WHERE email = '$_SESSION[email]'";
// echo $sql;
mysqli_query($conn,$sql);

session_destroy ( );

echo "<script>
            alert('회원 탈퇴 되었습니다.');
            location.href = 'sign_in.php';
             </script>";

?>