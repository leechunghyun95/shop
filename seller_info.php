<?php

    session_start();
    
    $conn = mysqli_connect("localhost","root","1234","shop");
    
    $sql = "SELECT * FROM user WHERE nick_name = '$_GET[seller]'";//판매자 닉네임 일치하는 유저정보 가져오는 쿼리문

    $result = mysqli_query($conn,$sql);


    $row = mysqli_fetch_array($result);


?>
<!doctype html>
<head>
<meta charset="UTF-8">
<title>판매자 정보</title>
<link rel="stylesheet" type="text/css" href="/css/style.css" />
<style>
    {
	margin: 0 auto;
	padding: 0;
	font-family: 'Malgun gothic','Sans-Serif','Arial';
}
a {
	text-decoration: none;
	color:#333;
}
ul li {
	list-style:none;
}

/* 공통 */
.fl {
	float:left;
}
.tc {
	text-align:center;
}

/* 게시판 목록 */
#board_area {
	width: 900px;
	position: relative;
}
.list-table {
	margin-top: 40px;
}
.list-table thead th{
	height:40px;
	border-top:2px solid #09C;
	border-bottom:1px solid #CCC;
	font-weight: bold;
	font-size: 17px;
}
.list-table tbody td{
	text-align:center;
	padding:10px 0;
	border-bottom:1px solid #CCC; height:20px;
	font-size: 14px 
}
#write_btn {
	position: absolute;
	margin-top:20px;
	right: 0;
}

#page_num {
	font-size: 14px;
	margin-left: 260px;
	margin-top:30px; 
}
#page_num ul li {
	float: left;
	margin-left: 10px; 
	text-align: center;
}
.fo_re {
	font-weight: bold;
	color:red;
}
</style>
 <!-- Bootstrap core CSS -->
 <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="css/modern-business.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">


</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<!-- Navigation -->
<?php
if($_SESSION[is_login]){//로그인 되어 있을때
//echo "<script>alert('$_SESSION[nickname]님 환영합니다.');</script>";//닉네임과 환영인사를 알림창으로 보여주기

//네비게이션바 로그인 됐을때로 세팅
?>
<!-- Navigation -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">Second Hands</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="shop.php">Shop</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="sell.php">Sell</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.html">내 거래</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.html">찜한 상품</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="sign_in.php">내 정보</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="sign_out.php">Logout</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="board.php">QnA</a>
          </li>

        </ul>
      </div>
    </div>
  </nav>
  <?php

}
else{//로그인 되어 있지 않을 때
  
  ?>
<!-- Navigation -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">Second Hands</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="shop.php">Shop</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="sign_in.php">로그인</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="sign_up.php">회원가입</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <?php
}
?>

<div class="container mt-5">
    <h1><?= $_GET['seller'] ?></h1>
    <h4>판매자 평점: 
      <?php 
        if($row[rating]){//평점 정보 있으면
          echo $row[rating];
        }else{//평점 정보 없으면
          echo "작성된 리뷰가 없습니다.";
        }
      ?>
    </h4>


  <div class="row">  
  <h3 class="mt-5">거래 후기</h3>
    <table class="list-table">
      <thead>
          <tr>
              <th width="70" style="text-align : center">상품명</th>
                <th width="500" style="text-align : center">리뷰</th>
                <th width="120" style="text-align : center">글쓴이</th>
                <th width="100" style="text-align : center">작성일</th>
                <th width="100" style="text-align : center">평점</th>
            </tr>
        </thead>
        <?php
            if(isset($_GET['page'])){ 

              $page = $_GET['page']; 
              
              }else{ 
              
              $page = 1; 
              
              }

              $sql = "select * from board";//게시글 전부 가져오기
              $result = mysqli_query($conn, $sql);
              $row_num = mysqli_num_rows($result);//게시물 갯수 정수로 가져오기
              $list = 5;
              $block_ct = 5;

              $block_num = ceil($page/$block_ct);//현재 페이지 블록 구하기
              $block_start = (($block_num - 1) * $block_ct) + 1; // 블록의 시작번호
              $block_end = $block_start + $block_ct - 1; //블록 마지막 번호

              $total_page = ceil($row_num / $list); // 페이징한 페이지 수 구하기
              if($block_end > $total_page) $block_end = $total_page; //만약 블록의 마지박 번호가 페이지수보다 많다면 마지박번호는 페이지 수
              $total_block = ceil($total_page/$block_ct); //블럭 총 개수
              $start_num = ($page-1) * $list; //시작번호 (page-1)에서 $list를 곱한다.





        // board테이블에서 idx를 기준으로 내림차순해서 5개까지 표시
          $sql2 = "select * from board order by idx desc limit $start_num,3";
          $result = mysqli_query($conn,$sql2); 
          
            while($board = mysqli_fetch_array($result))
            {
              
              //title변수에 DB에서 가져온 title을 선택
              $title=$board["title"]; 
              if(strlen($title)>30)
              { 
                //title이 30을 넘어서면 ...표시
                $title=str_replace($board["title"],mb_substr($board["title"],0,30,"utf-8")."...",$board["title"]);
              }

              $sql2 = "select * from reply where con_num=$board[idx]";
              $result2 =mysqli_query($conn,$sql2);
              $rep_count = mysqli_num_rows($result2); //num_rows로 정수형태로 출력

        ?>
      <tbody>
        <tr>
          <td width="70"><?php echo $board['idx']; ?></td>
          <td width="500"><?php 
        $lockimg = "<img src='http://192.168.111.100/var/www/html/shop/img/lock.png' alt='lock' title='lock' with='20' height='20' />";
        if($board['lock_post']=="1")
          { ?><a href='read_board.php?idx=<?php echo $board["idx"];?> &name=<?= $board[name] ?> &lock_post=<?= $board['lock_post'] ?>'><?php echo $title, $lockimg;
            }else{  ?>
        <a href='read_board.php?idx=<?php echo $board["idx"]; ?>'><?php echo $title; }?><span class="re_ct">[<?php echo $rep_count; ?>]</span></a></td>
          <td width="120"><?php echo $board['name']?></td>
          <td width="100"><?php echo $board['date']?></td>
          <td width="100"><?php echo $board['hit']; ?></td>
        </tr>
      </tbody>
      <?php } ?>
    </table>


    <div class="container mt-3" style="text-align : center">
    <button type="button" class="btn btn-primary btn-lg" onClick="location.href='seller_review.php'">거래후기 더보기</button>
    </div>

            </div>

    <h2 class="mt-5"><?= $_GET[seller] ?></h2>

  
  
    <div class="row">

    <?php
    $sql = "SELECT * FROM goods WHERE seller = '$row[email]' order by id desc limit 4";//판매자 이메일로 등록된 상품 가져오기
    
    $result = mysqli_query($conn,$sql);
    
    while($row = mysqli_fetch_array($result)){
      
    ?>
    <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
      <div class="card h-100">
      <a href="shop_detail.php?id=<?= $row[id] ?>"><img class="card-img-top" src="<?php echo "uploads/".$row['photo']; ?>" alt="" width="218.3" height="261.95"></a>
        <div class="card-body">
          <p class="card-title">
            <?= $row[designer] ?>
          </p>
          <p>
            <?= $row[item_name] ?>
          </P>
          <P>
            <?= $row[price]."원" ?>
          </P>
          <P>
            <?= "관심: ".$row[likes] ?>
          </P>
        </div>
      </div>
    </div>
    <?php } ?>


    <div class="container mt-1" style="text-align : center">
    <button type="button" class="btn btn-primary btn-lg mb-5" onClick="location.href='seller_shop.php?seller=<?=$_GET[seller]?>'">판매중인 상품 더보기</button>
    </div>

  </div>
<!-- /.row -->
</div>
    
</body>
</html>