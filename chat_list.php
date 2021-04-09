<?php
 $conn = mysqli_connect("localhost","root","1234","shop");

 session_start();//세션 시작

 

 
?>
<!DOCTYPE html>
<html>
  <head>
    <title>채팅 목록</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
            <?php 
                $sql = "SELECT * FROM chat_room WHERE sender='$_SESSION[email]' OR receiver='$_SESSION[email]' ORDER BY idx DESC";
                $result = mysqli_query($conn,$sql);
    
                            

                if(mysqli_num_rows($result) == 0){
                    ?>
                <div class="mt-3" style="text-align:center; font-weight:bold">채팅 목록이 없습니다.</div>
                <?php }
                
                while($chat_room = mysqli_fetch_array($result)){
                    
                    // 채팅목록에서 채팅방이름 가져오기
                    $roomName = $chat_room['roomName'];
                    $sql_msg = "SELECT * FROM chat WHERE room = '$roomName' ORDER BY idx DESC LIMIT 1";
                    


                    // echo $sql_msg;
                    $result_msg = mysqli_query($conn,$sql_msg);

                    $row_msg = mysqli_fetch_array($result_msg);

                    // echo $row_msg['message'];

                    $date = explode( ' ', $row_msg[time]);
                    $time = $date[0];
                    
                    
            ?>    
        <div class="chat_room">
                
            <div class="row">
                
                <div class="col-2 mt-2">
                    
                    <a href="http://192.168.111.100:8080?item_no=<?=$chat_room[goods]?>&sender=<?=$chat_room[sender]?>&receiver=<?=$chat_room[receiver]?>&nickname=<?= $_SESSION[nickname] ?>">
                    <img src="
                    <?php
                        // 아이템 넘버 가져오기
                        $item_no =  $chat_room[goods];
                        // 아이템 넘버랑 일치하는 상품 사진 가져오기
                        $sql4 = "SELECT * FROM goods WHERE id = '$item_no'";
                        $result4 = mysqli_query($conn,$sql4);
                        $row4 = mysqli_fetch_array($result4);
                        echo "uploads/".$row4[photo];
                    ?>" width="50px" height="50px">
                    </a>
                </div>
                
                <div class="col-8 mt-2">
                    <div class="row">
                        <h6 style="font-weight:bold">
                            <?php
                                if($_SESSION['email'] == $chat_room['sender']){//내가 수신자면
                                    // 유저데이터에서 발신자이메일에 해당하는 닉네임 가져오기
                                    $sql2 = "SELECT * FROM user WHERE email = '$chat_room[receiver]'";
                                    $result2 = mysqli_query($conn,$sql2);
                                    $row2 = mysqli_fetch_array($result2);
                                    echo $row2[nick_name];
                                }else{//내가 발신자면
                                    // 유저데이터에서 수신자이메일에 해당하는 닉네임 가져오기
                                    $sql3 = "SELECT * FROM user WHERE email = '$chat_room[sender]'";
                                    $result3 = mysqli_query($conn,$sql3);
                                    $row3 = mysqli_fetch_array($result3);
                                    echo $row3[nick_name];
                                }
                            ?>
                        </h6>
                    </div>
                    <div class="row"><p><?= $row_msg['message'] ?></P></div>
                </div>
                <div class="col-2 mt-2"><?= $time ?></div>
                            
                   <?php } ?>
            </div>
        </div>
    </div>
  </body>
</html>