<?php
 $conn = mysqli_connect("localhost","root","1234","shop");

 session_start();//μΈμ μμ
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
if($_SESSION[is_login]){//λ‘κ·ΈμΈ λμ΄ μμλ
//echo "<script>alert('$_SESSION[nickname]λ νμν©λλ€.');</script>";//λλ€μκ³Ό νμμΈμ¬λ₯Ό μλ¦Όμ°½μΌλ‘ λ³΄μ¬μ£ΌκΈ°

// μΈμμμ λ°μμ¨ μ΄λ©μΌκ°κ³Ό μΌμΉνλ μ¬μ©μ μ λ³΄ κ°μ Έμ€λ μΏΌλ¦¬λ¬Έ
$user_sql = "SELECT * FROM user WHERE email ='$_SESSION[email]'";
// echo $user_sql;
$user_result = mysqli_query($conn,$user_sql);
$user_row = mysqli_fetch_array($user_result);

//λ€λΉκ²μ΄μλ° λ‘κ·ΈμΈ λμλλ‘ μΈν
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
            <a class="nav-link" href="my_account.php"><?= $user_row[nick_name] ?> λ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="shop.php">Shop</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="sell.php">Sell</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="my_trade.php">λ΄ κ±°λ</a>
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
else{//λ‘κ·ΈμΈ λμ΄ μμ§ μμ λ
  
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
            <a class="nav-link" href="sign_in.php">λ‘κ·ΈμΈ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="sign_up.php">νμκ°μ</a>
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
                        <h4>λ΄ κ±°λ</h4>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    
    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
    
        <div class="container">
        <h4 class = "mb-3" style="font-weight:bold">νλ§€ λ΄μ­</h4>
            <div class="row">
                <div class="col-lg-10">
                    <div class="shopping__cart__table">
                        <table>
                            <!-- νλ§€ λ΄μ­ ν μλ¨ -->
                            <thead>
                                <tr>
                                    <th>μν</th>
                                    <th>μν</th>
                                    <th>κΈμ‘</th>
                                    <th>κ±°λμλ£μ λ²νΌ ν΄λ¦­</th>
                                </tr>
                            </thead>
                            <!-- νλ§€ λ΄μ­ ν μλ¨ -->
                            
                            <!-- νλ§€λ΄μ­ ν λ΄μ© -->
                            <tbody>
                                
                                <?php
                                    // μΈμκ°μΌλ‘ μ¬μ©μ λ©μΌ κ°μ Έμμ μννμ΄λΈμμ νλ§€μ μΌμΉνλ κ° id descλ‘ μ λ ¬ 
                                    // μΈμμ΄λ©μΌλ‘ κ°μ Έμ¨ κ°μ μ΄λ©μΌ λ³μμ λ΄κΈ° 
                                    $email = $_SESSION[email];
                                    //κ°μ Έμ¨ μ΄λ©μΌκ°κ³Ό νλ§€μκ° μΌμΉνλ μν κ°μ Έμ€λ μΏΌλ¦¬λ¬Έ
                                    $sql = "SELECT * FROM goods WHERE seller = '$email' ORDER BY id desc";
                                    
                                    //μΏΌλ¦¬λ¬Έ μ€ν
                                    $result = mysqli_query($conn,$sql);
                                    //μνμ λ³΄ rowλ³μμ λ΄κ³  whileλ¬Έ μμ λ£μ΄μ λ€ λΉΌμ€κΈ°
                                    while($row = mysqli_fetch_array($result)){
                                        
                                ?>
                                <tr>
                                    <!-- μνμ λ³΄ -->
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
                                    <!-- μνμ λ³΄ -->

                                    <!-- μν κ±°λ μν© -->
                                    <td class="quantity__item">
                                        <h6>
                                        
                                            <?php
                                            // for_sale 0μ΄λ©΄ κ±°λμλ£ / 1μ΄λ©΄ on_sale κ°μ λ°λΌ λλλ€
                                            if($row[for_sale] == 0){//for_saleκ° 0μΌλ, νλ§€ μλ£μΌλ
                                                echo "κ±°λμλ£";
                                            }else{//for_saleκ° 1μΌλ, νλ§€μλ£ μλλ
                                                if($row[on_sale] == 0){//on_sale=0μΌλ, κ±°λμ€μΌλ
                                                    echo "κ±°λμ€";
                                                }else{//on_sale=1μΌλ,κ±°λμ€ μλλ
                                                    
                                                }
                                            }
                                            ?>
                                        </h6>
                                    </td>
                                    <!-- μν κ±°λ μν© -->

                                    <!-- μν κ°κ²© -->
                                    <td class="cart__price"><?= number_format($row[price]) ?>μ</td>
                                    <!-- μν κ°κ²© -->
                                    

                                    <!-- κ±°λ μλ£ λ²νΌ -->
                                    <td class="cart__close">
                                        <?php
                                        if($row[for_sale] == 1 && $row[on_sale] == 0){//for_sale =1 μ΄κ³ (νλ§€μ€μ΄λ©°) on_sale=0(κ±°λμ§νμ€)μΌ λλ§ κ±°λμλ£νκΈ° λ²νΌ λ³΄μ΄κΈ°
                                            ?>
                                            <form action="trade_ok.php?id=<?= $row[id] ?>" method="post">
                                            <button type="submit" class="btn btn-light">κ±°λμλ£</button>
                                            </form>
                                            <form action="trade_cancle.php?id=<?= $row[id] ?>" method="post">
                                            <button type="submit" class="btn btn-light mt-1">κ±°λμ·¨μ</button>
                                            </form>
                                       <?php }else{

                                       }
                                        ?>
                                    </td>
                                    <!-- κ±°λ μλ£ λ²νΌ -->
                                   
                                    <?php } ?>
                                    <!-- while($row = mysqli_fetch_array($result)) μμΌλ¬Έ λ«λ κ΄νΈ -->
                                </tr>
                                
                            </tbody>
                            <!-- νλ§€λ΄μ­ ν λ΄μ© -->
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
                        <p>Copyright Β©
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