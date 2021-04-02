<?php
    $conn = mysqli_connect("localhost","root","1234","shop");
    

    $date = date("Y-m-d");


    $sql = "UPDATE goods 
            SET designer = '$_POST[designer]',
                category = '$_POST[category]',
                item_name = '$_POST[item_name]',
                size = '$_POST[size]',
                color = '$_POST[color]',
                con = '$_POST[con]',
                description = '$_POST[description]',
                price = '$_POST[price]',
                created = '$date'
            WHERE id = $_GET[id]";

    $result = mysqli_query($conn,$sql);
    

    echo "<script>
    alert('수정이 완료되었습니다.');
    location.href='/shop/shop.php';</script>";
    
?>