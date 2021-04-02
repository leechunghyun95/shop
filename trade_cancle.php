<?php
$conn = mysqli_connect("localhost","root","1234","shop");

//거래 완료 버튼 누른 아이템 번호 가져오기
// echo $_GET[id];
// 가져온 아이템 번호에 맞는 상품의 on_sale =  1로 업데이트 하여 거래중 취소
$sql = "UPDATE goods SET on_sale = 1 WHERE id = '$_GET[id]'";
//echo $sql;
mysqli_query($conn,$sql);
echo "<script>
            alert('거래가 취소되었습니다.');
            history.back();
            </script>";

?>