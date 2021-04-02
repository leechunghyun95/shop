<?php
  $conn = mysqli_connect("localhost","root","1234","shop");

  session_start();
 

  $sql = "select * from goods where id=$_GET[id]";
  
  $result = mysqli_query($conn,$sql);

  $row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Modern Business - Start Bootstrap Template</title>

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

  <!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">SHOP
      <small></small>
    </h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php">Home</a>
      </li>
      <li class="breadcrumb-item active">SHOP</li>
    </ol>

    <!-- Content Row -->
    <div class="row">
      <!-- Sidebar Column -->
      
      <!-- Content Column -->
      <!-- <div class="col-lg-9 mb-4"> -->
          <div class="row mb-5">
              <div class="col">
                  <div class="container">
                    
                    <div class="container">
                  <img src="<?php echo "uploads/".$row['photo']; ?>" height="500px" width="500px">
                    </img>
                  </div>
                  <div class="container">
                  <img src="<?php echo "uploads/".$row['photo2']; ?>" height="500px" width="500px">
                    </img>
                  </div>
                  <div class="container">
                  <img src="<?php echo "uploads/".$row['photo3']; ?>" height="500px" width="500px">
                    </img>
                  </div>
                  <div class="container">
                  <img src="<?php echo "uploads/".$row['photo4']; ?>" height="500px" width="500px">
                    </img>
                  </div>
                  <div class="container">
                  <img src="<?php echo "uploads/".$row['photo5']; ?>" height="500px" width="500px">
                    </img>
                  </div>
                  <div class="container">
                  <img src="<?php echo "uploads/".$row['photo6']; ?>" height="500px" width="500px">
                    </img>
                  </div>
                  <div class="container">
                  <img src="<?php echo "uploads/".$row['photo7']; ?>" height="500px" width="500px">
                    </img>
                  </div>
                  <div class="container">
                  <img src="<?php echo "uploads/".$row['photo8']; ?>" height="500px" width="500px">
                    </img>
                  </div>
                  <div class="container">
                  <img src="<?php echo "uploads/".$row['photo9']; ?>" height="500px" width="500px">
                    </img>
                  </div>
                  </div>
              </div>
              <!-- col -->
              <div class="col mb-5">

                <!-- container -->
                <div class="container" style="position:fixed">
                      <p><?php echo $row[designer] ?></p>
                      <p><?php echo $row[item_name] ?></p>
                      <p>사이즈: <?php echo $row[size] ?></p>
                      <p>색상: <?php echo $row[color] ?></p>
                      <p>상태: <?php echo $row[con] ?></p>
                      <p>가격: <?php echo $row[price] ?>원</p>
                      <p>찜한수: <?php echo $row[likes] ?></p>
                      <p>
                          <h5>상세 설명</h5>
                          <?php echo $row[description] ?>
                      </p>
                      

                    
                    <!-- 판매자 정보 카드 -->
                    <div class="card" style="width: 18rem;">
                        <img src="" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title">
                              <!-- 판매자명 -->
                              <?php 
                                $seller_id = $row[seller];//상품정보에 등록된 판매자 이메일을 가져와서 셀러아이디 변수에 담기
                                $sql = "SELECT * FROM user WHERE email = '$seller_id'";//판매자 이메일과 일치하는 정보 꺼내오는 쿼리문
                                $result = mysqli_query($conn,$sql);//쿼리문 실행
                                $seller = mysqli_fetch_array($result);//결과 로우변수에 담기
                                
                                echo $seller[nick_name];
                              ?>
                             </h5>
                            <p class="card-text">100개의 상품을 판매중입니다.</p>
                            <a href="seller_info.php" class="btn btn-primary">판매자 정보 더보기</a>
                        </div>
                    </div>

                      <div class="row mt-3">
                          <div class="col">
                              <div class="container">
                                  <!-- 구매요청 버튼 -->
                                  <button type="button" class="btn btn-primary btn-lg">구매요청</button>

                              </div>
                          </div>

                          <!-- 좋아요 버튼 -->
                          <div class="col">
                              <div class="container mt-2">

                              <!-- 빈하트 -->
                              <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                              <path d="M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                              </svg>
                              </div>
                          </div>
                      </div>

                      <div class="row mt-3">
                          <div class="col">
                              <div class="container">
                                  <!-- 수정 버튼 -->
                                  <button type="button" class="btn btn-primary btn-lg" onClick="location.href='modify_sell.php?id=<?= $_GET[id] ?>'">수정</button>

                              </div>
                          </div>

                          <div class="col">
                              <div class="container">
                              <!-- 삭제버튼 -->
                              <button type="button" class="btn btn-primary btn-lg" onClick="location.href='delete_sell.php?id=<?= $_GET[id] ?>'">삭제</button>
                              </div>
                          </div>
                      </div>
                </div>

              <!-- container -->
              </div>
              <!-- /col -->
          </div>

         

      </div>
    <!-- </div> -->
    <!-- /.row -->

    <div class="container">
        
    
   
    </div>
  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
