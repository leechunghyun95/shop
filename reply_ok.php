<?php
	$conn = mysqli_connect("localhost","root","1234","shop");
    

    $bno = $_GET['idx'];
    $userpw = password_hash($_POST['dat_pw'], PASSWORD_DEFAULT);
    
    if($bno && $_POST['content']){
        $sql = "insert into reply(con_num,content) values('".$_GET['idx']."','".$_POST['content']."')";
        $result = mysqli_query($conn,$sql);
        echo "<script>alert('댓글이 작성되었습니다.'); 
        location.href='read_board.php?idx=$_GET[idx]';</script>";
    }else{
        echo "<script>alert('댓글 작성에 실패했습니다.'); 
        history.back();</script>";
    }
	
?>