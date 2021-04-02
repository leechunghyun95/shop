<?php
$conn = mysqli_connect("localhost","root","1234","shop");
session_start();
?>
<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Male-Fashion | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
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
            <a class="nav-link" href="shopping-cart.html">내 거래</a>
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

    <!-- Breadcrumb Section Begin -->
    <section class=" mt-5">
        <div class="container">
        <h1>내 정보</h1>
            <div class="row">
                    <div class="breadcrumb__text mt-5">
                        <h1>내 정보</h1>
                    </div>
                </div>
                <!-- <div class="col-lg-1">
                    <div class="breadcrumb__text mt-5">
                        <div class="row ">0</div>
                        <div class="row text-center">리뷰</div>
                    </div>
                </div>
                <div class="col-lg-1">
                    <div class="breadcrumb__text mt-5">
                    <div class="row text-center">0</div>
                        <div class="row text-center">판매 상품</div>
                    </div> -->
                <!-- </div> -->

                <?php
                // 상품중에 세션값에서 가져온 이메일이 판매자로 등록된 상품 가져오는 쿼리문
                $sql = "SELECT * FROM goods WHERE seller = '$_SESSION[email]'";
                $result = mysqli_query($conn,$sql);
                // 내가 판매자로 등록된 상품 갯수 가져오기
                $trade_num = mysqli_num_rows($result);
                ?>
                <div class="col-lg-1">
                    <div class="breadcrumb__text mt-5">
                    <div class="row text-center ml-1"><?= $trade_num ?></div>
                        <div class="row text-center"><a href="my_trade.php">내 거래</a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    <?php
    // 사용자데이터에서 세션에서 받아온 이메일값과 일치하는 사용자 데이터 가져오는 쿼리문
    $sql2 = "SELECT * FROM user WHERE email = '$_SESSION[email]'";
    $result2 = mysqli_query($conn,$sql2);
    $row2 = mysqli_fetch_array($result2);
    ?>

<form action="mod_account.php" method="post">
    <div class="container mt-5" style="width:30%">
      <div class="row mt-3 ml-1">이메일  <br> <?=$_SESSION[email] ?></div>

      <div class="row mt-3 ml-1">
        닉네임
      </div>
      <input class="underline" style="border-left-width:0; border-right-width:0; border-top-width:0; border-bottom-width:1;" value="<?= $_SESSION[nickname]?>" required>
        
      <div class="row mt-3 ml-1">
        전화번호
      </div>
      <input class="underline" style="border-left-width:0; border-right-width:0; border-top-width:0; border-bottom-width:1;" value="<?= $row2[phone_num]?>" required>
        
      <div class="row mt-3 ml-1">
        비밀번호
      </div>
      <input class="underline" type="password" style="border-left-width:0; border-right-width:0; border-top-width:0; border-bottom-width:1;" value="<?= $row2[pw]?>" required>
        
      <button type="button" class="btn btn-light">비밀번호 변경</button>
    </div>
    
    <div class="container mt-3" style="width: 20%">
      <button type="button" class="btn btn-warning">정보 수정</button>
      <button type="button" class="btn btn-danger">회원 탈퇴</button>
    </div>
  </form>
    

    

    

    

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>