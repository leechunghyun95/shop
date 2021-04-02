<?php
    $conn = mysqli_connect("localhost","root","1234","shop");

    $date = date("Y-m-d");

    $sql = "UPDATE board SET title = '$_POST[title]', content = '$_POST[content]',date = '$date' WHERE idx=$_GET[idx]";
    $result = mysqli_query($conn,$sql);

    

    echo "<script>
    alert('수정이 완료되었습니다.');
    location.href='/shop/board.php';</script>";
?>