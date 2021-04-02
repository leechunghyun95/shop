<?php
	$conn = mysqli_connect("localhost","root","1234","shop");
    
	
	$bno = $_GET['id'];
	$sql = "DELETE FROM goods WHERE id=$bno";
    // echo $sql;
    $result = mysqli_query($conn,$sql);

    
?>
<script type="text/javascript">alert("삭제되었습니다.");</script>
<meta http-equiv="refresh" content="0 url=/second-hands/shop.php" />