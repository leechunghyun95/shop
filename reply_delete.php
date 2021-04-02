<?php
    $conn = mysqli_connect("localhost","root","1234","shop");
    

    // 글 번호 받아놓기
    $con_num = $_GET[con_num];

    $sql = "DELETE FROM reply WHERE idx=$_GET[idx] AND con_num=$_GET[con_num]";
    
    
    $result = mysqli_query($conn,$sql);

    

    $row = mysqli_fetch_array($result);
    echo $row[content];
?>
<script type="text/javascript">alert('삭제되었습니다.'); location.replace("read_board.php?idx=<?= $con_num ?>");</script>