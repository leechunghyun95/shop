<?php
    error_reporting(1);
    int_set("display_errors",1);

    $conn = mysqli_connect("localhost","root","1234","shop");

    if(mysqli_connect_error()){
        echo "mysql 접속중 오류가 발생했습니다.";
        echo mysqli_connect_error();
    }
?>