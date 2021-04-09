<?php
    $conn = mysqli_connect('localhost','root','1234','shop');
    $sql = "UPDATE goods SET state = 2, invoice = $_POST[invoice] WHERE id = $_GET[item_no]";
    mysqli_query($conn,$sql);
?>