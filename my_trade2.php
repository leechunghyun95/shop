<?php
 $conn = mysqli_connect("localhost","root","1234","shop");

 session_start();//세션 시작
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
    <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/modern-business.css" rel="stylesheet">

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>


</head>

<body>
    <?php
if($_SESSION[is_login]){//로그인 되어 있을때
//echo "<script>alert('$_SESSION[nickname]님 환영합니다.');</script>";//닉네임과 환영인사를 알림창으로 보여주기

// 세션에서 받아온 이메일값과 일치하는 사용자 정보 가져오는 쿼리문
$user_sql = "SELECT * FROM user WHERE email ='$_SESSION[email]'";
// echo $user_sql;
$user_result = mysqli_query($conn,$user_sql);
$user_row = mysqli_fetch_array($user_result);

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
            <a class="nav-link" href="my_account.php"><?= $user_row[nick_name] ?> 님</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="shop.php">Shop</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="sell.php">Sell</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="my_trade.php">내 거래</a>
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
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>내 거래</h4>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    
    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
    
        <div class="container">
        <h4 class = "mb-3" style="font-weight:bold">판매 내역</h4>
            <div class="row">
                <div class="col-lg-10">
                    <div class="shopping__cart__table">
                        <table>
                            <!-- 판매 내역 표 윗단 -->
                            <thead>
                                <tr>
                                    <th>상품</th>
                                    <th>상태</th>
                                    <th>금액</th>
                                    <th>거래완료시 버튼 클릭</th>
                                </tr>
                            </thead>
                            <!-- 판매 내역 표 윗단 -->
                            
                            <!-- 판매내역 표 내용 -->
                            <tbody>
                                
                                <?php
                                    // 세션값으로 사용자 메일 가져와서 상품테이블에서 판매자 일치하는 값 id desc로 정렬 
                                    // 세션이메일로 가져온 값을 이메일 변수에 담기 
                                    $email = $_SESSION[email];
                                    //가져온 이메일값과 판매자가 일치하는 상품 가져오는 쿼리문
                                    $sql = "SELECT * FROM goods WHERE seller = '$email' ORDER BY id desc";
                                    
                                    //쿼리문 실행
                                    $result = mysqli_query($conn,$sql);
                                    //상품정보 row변수에 담고 while문 안에 넣어서 다 빼오기
                                    while($row = mysqli_fetch_array($result)){
                                        
                                ?>
                                <tr>
                                    <!-- 상품정보 -->
                                    <td class="product__cart__item"><a href="shop_detail.php?id=<?= $row[id] ?>">
                                        <div class="product__cart__item__pic">
                                            <img src="uploads/<?= $row[photo] ?>" alt="" style="width:70px; height:70px">
                                        </div>
                                        <div class="product__cart__item__text">
                                            <h5><?= $row[designer] ?></h5>    
                                            <h6><?= $row[item_name] ?></h6>

                                        </div>
                                    </a>
                                    </td>
                                    <!-- 상품정보 -->

                                    <!-- 상품 거래 상황 -->
                                    <td class="quantity__item">
                                        <h6>
                                        
                                            <?php
                                            // for_sale 0이면 거래완료 / 1이면 on_sale 값에 따라 나뉜다
                                            if($row[for_sale] == 0){//for_sale값 0일때, 판매 완료일때
                                                echo "거래완료";
                                            }else{//for_sale값 1일때, 판매완료 아닐때
                                                if($row[on_sale] == 0){//on_sale=0일때, 거래중일때
                                                    echo "거래중";
                                                }else{//on_sale=1일때,거래중 아닐때
                                                    
                                                }
                                            }
                                            ?>
                                        </h6>
                                    </td>
                                    <!-- 상품 거래 상황 -->

                                    <!-- 상품 가격 -->
                                    <td class="cart__price"><?= number_format($row[price]) ?>원</td>
                                    <!-- 상품 가격 -->
                                    

                                    <!-- 거래 완료 버튼 -->
                                    <td class="cart__close">
                                        <?php
                                        if($row[for_sale] == 1 && $row[on_sale] == 0){//for_sale =1 이고(판매중이며) on_sale=0(거래진행중)일 때만 거래완료하기 버튼 보이기
                                            ?>
                                            <form action="trade_ok.php?id=<?= $row[id] ?>" method="post">
                                            <button type="submit" class="btn btn-light">거래완료</button>
                                            </form>
                                            <form action="trade_cancle.php?id=<?= $row[id] ?>" method="post">
                                            <button type="submit" class="btn btn-light mt-1">거래취소</button>
                                            </form>
                                       <?php }else{

                                       }
                                        ?>
                                    </td>
                                    <!-- 거래 완료 버튼 -->
                                   
                                    <?php } ?>
                                    <!-- while($row = mysqli_fetch_array($result)) 와일문 닫는 괄호 -->
                                </tr>
                                
                            </tbody>
                            <!-- 판매내역 표 내용 -->
                        </table>
                    </div>
                    <!-- <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="#">Continue Shopping</a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn update__btn">
                                <a href="#"><i class="fa fa-spinner"></i> Update cart</a>
                            </div>
                        </div>
                    </div> -->
                </div>
                <!-- <div class="col-lg-2">
                    <div class="cart__discount">
                        <h6>Discount codes</h6>
                        <ul class="list-group">
  <li class="list-group-item">A simple default list group item</li>

  <li class="list-group-item list-group-item-primary">A simple primary list group item</li>
  <li class="list-group-item list-group-item-secondary">A simple secondary list group item</li>
  <li class="list-group-item list-group-item-success">A simple success list group item</li>
  <li class="list-group-item list-group-item-danger">A simple danger list group item</li>
  <li class="list-group-item list-group-item-warning">A simple warning list group item</li>
  <li class="list-group-item list-group-item-info">A simple info list group item</li>
  <li class="list-group-item list-group-item-light">A simple light list group item</li>
  <li class="list-group-item list-group-item-dark">A simple dark list group item</li>
</ul>
                    </div>
                   
                </div> -->
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__logo">
                            <a href="#"><img src="img/footer-logo.png" alt=""></a>
                        </div>
                        <p>The customer is at the heart of our unique business model, which includes design.</p>
                        <a href="#"><img src="img/payment.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Shopping</h6>
                        <ul>
                            <li><a href="#">Clothing Store</a></li>
                            <li><a href="#">Trending Shoes</a></li>
                            <li><a href="#">Accessories</a></li>
                            <li><a href="#">Sale</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Shopping</h6>
                        <ul>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Payment Methods</a></li>
                            <li><a href="#">Delivary</a></li>
                            <li><a href="#">Return & Exchanges</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1 col-md-6 col-sm-6">
                    <div class="footer__widget">
                        <h6>NewLetter</h6>
                        <div class="footer__newslatter">
                            <p>Be the first to know about new arrivals, look books, sales & promos!</p>
                            <form action="#">
                                <input type="text" placeholder="Your email">
                                <button type="submit"><span class="icon_mail_alt"></span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="footer__copyright__text">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <p>Copyright ©
                            <script>
                                document.write(new Date().getFullYear());
                            </script>2020
                            All rights reserved | This template is made with <i class="fa fa-heart-o"
                            aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        </p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

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