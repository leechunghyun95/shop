<?php 
    $conn = mysqli_connect('localhost','root','1234','shop');
    $list[] = $_POST['item'];
    $a = $_POST['invoice'];
    echo $a[0];
    echo $a[1];
    foreach($list as $value){
        // $sql = "UPDATE goods SET state = 2 WHERE id = $value";
        // mysqli_query($conn,$sql);
    }

    for($i = 0; $i < $a; $i++){
        
        echo $a[i];
    }
    // echo "<script>
    //     alert('발송 완료 처리되었습니다.');
    //     history.back();
    // </script>"
?>