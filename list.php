<?php
    $conn = mysqli_connect("localhost","root","1234","shop");
    if($conn){
        echo "성공";
    } else{
        echo "x";
    }

    $sql = "select * from goods order by id desc";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    echo $row[item_name];
?>

<table width = 800 border = "1">
    <tr>
        <th>No</th>
        <th>제목</th>
        <th>작성일자</th>
    </tr>
    <?php
     while($data = mysqli_fetch_array($result)){
     ?>
     <tr>
         <td><?=$data[id]?></td>
         <td><?=$data[item_name]?></td>
         <td><?=$data[created]?></td>

     <?php } ?>
</table>