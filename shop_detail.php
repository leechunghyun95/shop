<?php
  $conn = mysqli_connect("localhost","root","1234","shop");

  session_start();
 

  $sql = "select * from goods where id=$_GET[id]";
  
  $result = mysqli_query($conn,$sql);

  $row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="ko">

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

<style>
  nav{
    border-bottom:1px solid black;
  }

  .menu{
  width:23px;
  height:26px;
}

  a{
    color:black;
  }

  a:hover{
    color:black;
  }
</style>

</head>

<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>


  <!-- Navigation -->
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
<nav class="navbar fixed-top navbar-expand-lg  fixed-top" style="background-color:white; padding-top:30px;">
    <div class="container">
      <a class="navbar-brand" href="index.php" style="font-size:30px; color:black">SECOND HANDS</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">

      <!-- <div style="border:1px solid black;">
      
        <input style="border:none" width="150px">
        <a>
        <img src="https://process.fs.grailed.com/rdmZ5l2mQBGvdtVr2xCG" width="16" height="20">
        </a>
      </div> -->

      <div class="input-group" style="width:430px">
  <input type="text" class="form-control" placeholder="원하는 상품을 검색하세요." aria-label="Recipient's username" aria-describedby="button-addon2">
  <button class="btn btn-outline-secondary" type="button" id="button-addon2">검색</button>
</div>

      



        <ul class="navbar-nav ml-auto">
        <!-- <li class="nav-item">
            <a class="nav-link" href="my_account.php"><?= $user_row[nick_name] ?> 님</a>
          </li> -->
          <!-- <li class="nav-item">
            <a class="nav-link" href="shop.php">Shop</a>
          </li> -->
          <li class="nav-item">

          <div class="container">
            <a class="nav-link" href="sell.php"><img class="menu" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAC4AAAA0CAYAAAD19ArKAAAAAXNSR0IArs4c6QAABsBJREFUaAXVWTtz20YQPkCKpdgp6EYaSYWRLp3pV5HKcJdOVJfOoKt0kctUsn9BpCpVQqpKafoXGO6c0QvqkspII7kzM5NxZMci8n3gHbQ4AiIgyRzlZsB93N7e3t53d+DBUZe03L1710doy0mSkKqdnZ1bpKY4hrlM9Pbt24HjOB0Z0/Hx8ZdRFMVG5xrmMtHBYBDa8biu60vdpQxcZzaWgWIGlqU8LYWz8s1m02NG4Pw+fHh4fDxlJURFDOzuI7M9Of2yAXz1YLMqdC3BqzNjHME2ECyx+BAOm9JpTZ6D2MAguhhE37S9c+cOA31mZE1XsEh75GtDhdmF087U1NRbBP0jfJwnaMbg0Q/90S/9U4nFGJLKAjvOaFpqBY4t6gk6eI2WwbD5hf8G9M9+dPYj2QNmhrOQlkpQuXfvXhNT2UGL07LbR32IrOyT4lHb29spJa/3ZbI+ArhJiqeBp6xEqIjxtKQB4Hlra2srGhu43lMJibJOQtRtGOzJTsbxGsdcI7ngTmuHQT/e3d1dPzXwooNAOA2Bw3bZriDsxrLENSDC5FQZQIgkPSgNHEGv6sVnd9yHon2WDNuObJlwQkYJSc+ukzISdn1KKgyvM/2TkQVllr/e29uLhO7C2IODg3h+fn4TOP4KTvkUFiT0j5GM64W4V9Ciiyy3C/SfRMWtEY6DEufdXMZ5qGA0L2DcsBpMNGj2fXh4+HxxcdED26RsFS+3j09PT6/BwLOMepPMtOxb99uTOs1HWeCECBbGqmUUc+ewdBMVdf+x7pSvB9wYHmRQWVhY+BWVnjZICWCzgj3zd6mbNP/mzZujpaWlfcTyJweBjeEVY3D4o/fR1+RFGYvrd7/MJMYejh983j4KjUz67ueZVfTA/VklTtK91v6Qm723HdWYSWbesp4FNiuwKYLG0ED8plABtr8XupTF6J7autqyox6aNk7ieIY39Iq64hsetF81aLZJAwduAgqi8BUzFnIZW2rzT2fWQ6OiHUH6WjYCsl0p08be1S8/DaPQ9Lkll4mxqRioQc5HMjh5k9M2I4PALLRMe9CqfaZNmHE/5U5++li1vROxIjdw84E5yoZfQ3r6u/MZ7Y2uFkzoxwVM7kuH4ENLLhcT1S+q1EF5dh0Xo9G5ys3wXxcm9MGMe2RMwe7A9+lKJVHFtjIoOIqNs1k1yywPS5Kb6VowoYORwKELWXGukmSvp/0kcTZtX9bCrQ0T+qv8L5/TnMsYGmNB3sDmO4zLHdxAQD6UXqISb6hUkaYpgX4ZNopU6KO0nVDY54GoylgHb2FJJoHhQSL/cpk6Osd6eGHkT0mvPnqvs1HeC6HyvyyVoYLR4QXHeZobJeCBvTjQuhgYiHDEt1I5UT2zeB0nWctshovV13IIny81X4tUDhy4i+H5ifQO+BDPgdbFiZv0MZBUdFzn8dVhG4V3Gu7p3ApjbH2xsQG/ce3R+55uX4sQKrHVwrfkUlEPxtQ3xEkYWnVmkTaFjfqgPoSmcV06EjgW4M26TrR9E5RZVQhuU+tswvrUBrDqXW8XH2B2oyLZxS5iY8wvMqyjO3KPetK+CMeOcmofOtInMx5KBfiGvqix1KViKGuA226VTNqDkz6q8K7es/uWsTwgrKqx4mgm3UGUa3VOmNAXM86Sm1rIgbk1TWur/8RFfwbw7pJLzHlhwnDSwHEBs2HHhisxs/faVXnZEce6M5IAYxsbhvS8MKGP4aYLBrjmce7jyUrZ8Z8ZgOFeDsJHHamjqAzf5n3kWB33v2j/m4cOG9csWeD63o7By8LriVvyS4GsnATPSyr2Y8dgMG7usrtWMOYW1VJPTuQtLi/77Z0uu1dhKLhwfAm8fwd2VoTW5FUYr8SEbiIsgu2gowAP4/kW9yuNubm533jXkmUcFel0ANcr5K0SaCeW+tOJIuisE5zqq8i+T0Uu41Twqhe3Wn9hAN9QFiXNPGeFIxb6C2WJaWSWV9yB7RiB82tEl/qRwKkELF6V3JQ2ASVO2T4HSNuLLLy/RMKewaedNHbTRdA/mP6yXcUoJC2aLlHf5W1XxYsj0WyU1VeAPDeC0dpUM3IdeGrgbDLmOxBNusjSZtHfPVaeVvRHBL6rB2V2Gh7rdv3YwNmg4rcZHuv8jL0POEUfP37EZJx8KSZ2cUfJz478IHsftj4eD09ZiWHXLktIpcDpWXe8hsBWy3q6KD0CXsfACUMmo7BUDty0roBHY3oWWnnd1A7cRMMB8HoaM9CCzjP6M1BCoocMb9RZ6GcOXAaoP8O0MAj+7Wvi8WS9xceQIwTLrww9ft626iuJ/wHuL5qh8rb07wAAAABJRU5ErkJggg==" width="16" height="20"> 판매하기</a>
          </div>
          </li>
          <li class="nav-item">
          <div class="container">
            <a class="nav-link" href="my_trade.php"><img class="menu" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAC4AAAAwCAYAAABuZUjcAAAAAXNSR0IArs4c6QAABCNJREFUaAXtWUtS20AQtWxXJSEbZ8XWuYH4rcEnwNzALg6Q5AQJy6yAE1icIOYEmDWf6AbRispSqwSqAOU91QwetUbWSAFjqpgq10z39OdNT89P9hqPVNbW1vowtY2fr36m5RAEf8cXFxdjs6Nu26urqPVWV1cHnud9Bd3VvJI6SpJk7/LyMiiRm9ldG/jGxoZ/f38/gnVGuE4Jm83m8OzsjDNRudQCrkCfwFunssesQgzwvTrgKwMvAR0jbQKkwinqmBjR7qC9iXoA0jbQWuArAfd9v9NqtX5ZAMQAxrw9QF9hwXr4jEFwPcgBxHd3dx/DMEwHW2jA6Gga7dImQO9DSDplrvbKQNM4ZSiLZkjaKAwIbTsX54gj2l0VbdN45UhRuWjmVNQj00FR2zniAM0pzhRM+06V6dXK1KGupnVt86H7ZO0MHIp9oRycn59PBM+ZVLqBUJA+RPeUdAK+vr6+BRWZ28dTM7Vb0kZH+So16AQcB40vLT3G0W2zYfMlfZN2Ao6dQEZ7YjNWk5exZfFlNdu2cisw/4ze7DeSise+1wiXhjdfKrjJif43cAV6K2d5FiOZ1enW55QqyLtYmJvmfNKQC0yIWsisztQWRC2+LAbcczwU2h3eWcjzmt4YVSz6Z5Gx0mkoGx1TGDkemnRR2ynitv0akflEo++G1xHSZa/IQY4P2VQHHdqGKWPzZfbrthNwJRxoJVUPdNSXdm8OksQrBU8ZylJf6Q6ULV0FulFWOwPHEX0kjSFiI947yH+/e/0NMj1EfyzlyGMfZdhHHepKOZsPKaNp50sWFfCu/IGqr5VVHeJy1JN3lr+jt93rxnX8YZjNf3XBOoGuL+yMcSDtCF4hWQk4nPKG+BPW0igbVmO0h7aT0JDhwDloRjqnj8GvYPCRKT+rXQk4DfEugUcDI2YrfAgfcme4vb2NKNBut7tICx9pwMXcJU8WppHrotS6lYFTUb3sczmqjVapMdBhnRd/LeAExl0BkWTOd0nXKBFmZqfOQ5m+WjUcpipXV1e/l5eXj5DzN2D4+L11tMVHxHfkNCMdOerkxGpH3LTEnQLR44ehTfC38MstPvAmSItTzFIgdyD0LU7hInZ9FCwO6lckxRGYmePMXezDXHhzLzgHsBSKPxBZgat9mgfGs4A2ohTyQLPt8xngam/mwfLcgA3saZNfyzJfdh+AK9A8yuVWJo08Fx0D/MOX3RR4CegYSMM5o+WM2wL4AD59LKu7sRTkhYlfYIM5g07dFfzToe/xK17Bhcl6x573AIru7ryYNXFMbwtA/AKbexgImbmQ3A6JBc5i0yEx8+nWF8zDWfunKTuPNrEA6KHw1be9OSdCaBHIHCYb8EUAmsGgX1Mm80UAR7pEJmi2XwRwCfoVuC0iT817TZWnjrC0/2Ij/g8RGqgJ9UrG3gAAAABJRU5ErkJggg==" width="16" height="20"> 내 상점</a>
          </div>
          </li>
          <li class="nav-item">
          <div class="container">
            <a class="nav-link" href="chat_list.php" onclick="window.open(this.href, '_blank', 'width=400,height=650,toolbars=no,scrollbars=no'); return false;"><img class="menu" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAC4AAAAwCAYAAABuZUjcAAAAAXNSR0IArs4c6QAAA59JREFUaAXtmU1S2zAUxyWnDaawSJfAJj1BzddMl2TXpblBQg9QOAFwAth2QZ0bQJddkWVn+GiOQDfADnemfIROrP6fx8o4Tkw86AnSTjWTSHqSpZ/+fnpyHCmS5HletVQqbaLq41PR9jHKm91ud7vdbp8Rk6SvhYWFupRyB8VxBCZEnUKl1Mbp6WlTJkp/R8u4Q/fgofx8aW5ujpR+p61/Qe46jlORi4uLKgNLvrQBXwoz9meppvZePQ0wAA7o1+MCrUEBX0HguNJ1yp10hcrjBp3HNACeXci41v+DF7kzt4FbpU+RvqP6PJniv4KXHg6P/cnG3dkoqCLtL4p0Mu1zu+fWAR3gdK6ZjqWvt6749Z67paQKMGELarf0xKa5NcWvAlEpi/KOVKpOkFC7YQqbvt4KOEFPqIlDTOTFk0mxy+XbGp4dnDahoxyC1g9tYUd0tvWEXDkr+HVQ9qWS5M8aWgglWq50vVuyJqkruuF043db1x+Ts4Hf7E2sA5KeNPuTFD4iip8ynuFXwGqq/qgiCziUDgBdL0DQ6sjO6uuGCAv0fbCLMThOwpUoEj+UELEfS6HeQtG0wjEAQmJzqnHPFlmMwZPY3NLy3HyOo4muxjn8vvFqrdPsMxpWjMHT89PmhMuspGxhJKPa9JrZRkyN1yuynZwUu6FsenO24c9vTKNHjzRTYAMvR+46xq7S+OTPgK5xbEIab1hicRV6VEXI+xhPoMTG1Nr97rDJOG0s4JGINiVCCZReBfQBJ2DeWMbgFA6hthdvQsPTMA9ymN0YXESi2nHs+rMV8MkPd81hA9u2sUUV26DZ8f8dcHprlF3dc9eHMQ0ojlddO8M6Phd88votfSLHKPTucB8lnwGseXJyMvLpb2lpicIn/UIySQd4Y+vEj6MmoyTX1kmEp7hbxOwcHR21ocBIpQouzIerHdqEJ1Zijn2c/prAKuYBx3Fce5bgyT3miZVElPRlkpaXl70oishns9EoxEQ1Usdk/LxrB6JKXsc8e3zbAIj2LGCFFkQLy7vWxG6suJ48CVukfBa090+Z7suRs4ETzAPwgjaV9k8O8BLHIHqMy8vLu4uLi0+zs7NV2PqUx7tDf2Zm5ifav+n+JjkruAYB3Jcc+Pf4e7Jyfn7+Vfd9bG68OfMmplMUKm9n2+EyfXci2160bg2cAI6Pj7cYD7e+NVkFp5loQ9qAtw6u4eE2FOtDqnOkJwEnULhNi05SFFng/wBaR0Y/O/3CZQAAAABJRU5ErkJggg==" width="16" height="20"> 채팅</a>
          </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="sign_out.php">로그아웃</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="board.php">QnA</a>
          </li> -->

        </ul>
      </div>
    </div>




    
  </nav>
  <?php

}
else{//로그인 되어 있지 않을 때
  
  ?>

<!-- Navigation -->
<nav class="navbar fixed-top navbar-expand-lg  fixed-top" style="background-color:white; padding-top:30px">
    <div class="container">
      <a class="navbar-brand" href="index.php" style="font-size:30px; color:black">SECOND HANDS</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">

      <!-- <div style="border:1px solid black;">
      
        <input style="border:none" width="150px">
        <a>
        <img src="https://process.fs.grailed.com/rdmZ5l2mQBGvdtVr2xCG" width="16" height="20">
        </a>
      </div> -->

      <div class="input-group" style="width:700px">
        <input type="text" class="form-control" placeholder="원하는 상품을 검색하세요." aria-label="Recipient's username" aria-describedby="button-addon2">
        <button class="btn btn-outline-secondary" type="button" id="button-addon2">검색</button>
      </div>


        <ul class="navbar-nav ml-auto">
        
          <li class="nav-item">
            <a class="nav-link" href="sign_in.php">로그인</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="sign_up.php">회원가입</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="board.php">QnA</a>
          </li> -->

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
<!-- <h1 class="mt-4 mb-3">
  <small></small>
</h1> -->

<!-- <ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="index.php">Home</a>
  </li>
  <li class="breadcrumb-item active"><a href="shop.php">Shop</a></li>
</ol> -->

<!-- 콘텐츠 들어갈 곳 -->
<div class="row mt-5">


    <!-- 사진 들어갈 칼럼 -->
    <div class="col mb-5">
        <!-- 사진 컨텐츠 -->
              <div class="container">
                <img src="<?php echo "uploads/".$row['photo']; ?>" height="500px" width="500px">
                </img>
              </div>

              <?php
                for($i = 2; $i <= 9; $i++){
                  if($row['photo'.$i] == null){
                    // echo "photo.$i.: ".$row['photo'.$i]."<br>";
                  }else{ ?>
                  <?php
                    // echo "photo.$i.: ".$row['photo'.$i]."<br>";
                    ?>
                    <div class="container mt-1">
                      <img src="<?php echo "uploads/".$row['photo'.$i]; ?>" height="500px" width="500px">
                      </img>
                    </div>
                    <?php
                  }
               }
              ?>

               
                
                
                

              <!-- <div class="container">
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
              </div> -->
    </div>
    <!-- 사진 칼럼 끝 div -->


    <!-- 설명 들어갈 칼럼 -->
    <div class="col">
        <!-- 설명 컨텐츠 -->
        <div class="container" style="position:fixed">
                  <h6 style="font-weight:bold;"><?php echo $row[designer] ?></h6>
                  <p><?php echo $row[item_name] ?></p>
                  <p>사이즈: <?php echo $row[size] ?></p>
                  <p>색상: <?php echo $row[color] ?></p>
                  <p>상태: <?php echo $row[con] ?></p>
                  <p>가격: <?= number_format($row[price]) ?>원</p>
                  
                  <p>
                      <?php echo $row[description] ?>
                  </p>
                  <p>
                    <?php
                    $seller_id = $row[seller];//상품정보에 등록된 판매자 이메일을 가져와서 셀러아이디 변수에 담기
                    $sql = "SELECT * FROM user WHERE email = '$seller_id'";//판매자 이메일과 일치하는 정보 꺼내오는 쿼리문
                    $result = mysqli_query($conn,$sql);//쿼리문 실행
                    $seller = mysqli_fetch_array($result);//결과 로우변수에 담기
                    echo "판매자: "
                    ?>
                    <!-- <a href="seller_info.php?seller=<?=$seller[nick_name]?>"> -->
                    <a href="seller_shop.php?seller=<?=$seller[nick_name]?>" style="text-decoration: none; color : black">
                    
                          <?php
                            echo $seller[nick_name];
                          ?>
                    </a>
                  </p>

                  <!-- <p>판매자 평점: <?php 
                            $seller_id = $row[seller];//상품정보에 등록된 판매자 이메일을 가져와서 셀러아이디 변수에 담기
                            $sql = "SELECT * FROM user WHERE email = '$seller_id'";//판매자 이메일과 일치하는 정보 꺼내오는 쿼리문
                            $result = mysqli_query($conn,$sql);//쿼리문 실행
                            $seller = mysqli_fetch_array($result);//결과 로우변수에 담기
                            if($seller[rating]){
                              echo $seller[rating];
                            }else{
                              echo "거래 내역이 없습니다.";
                            }
                            
                          ?>
                  </p> -->


                  <!-- 판매자랑 사용자 같을 때 다를때 다른 버튼 같으 면 수정삭제/ 다르면 구매 -->
                  <?php
                    if($_SESSION[email] == $seller[email]){//사용자와 판매자가 같을경우
                      ?>
                      <button type="button" class="btn btn-warning" onClick="location.href='modify_sell.php'">수정</button>
                      <button type="button" class="btn btn-danger" onClick="location.href='delete_sell.php?id=<?=$_GET[id]?>'">삭제</button>
                      <?php
                    }else{//사용자와 판매자가 다를 경우
            
                      // 판매중일때 , 판매완료일 때 다름
                      if($row[state] == 2){//판매 완료일때 거래 완료버튼
                        ?><button type="button" class="btn btn-outline-dark" disabled>거래 완료</button><?php
                      }else if($row[state]  == 1){
                        ?><button type="button" class="btn btn-outline-dark" disabled>거래중</button><?php
                      }else{//판매중일때 , for_sale=1일때
                        if($row[on_sale] == 1){//거래중 아니고 평시상황
                          ?>
                          
                          <!-- 연락하기 버튼 -->
                          <button class="btn btn-outline-dark" onclick="window.open('http://192.168.111.100:8080?item_no=<?=$row[id]?>&sender=<?=$_SESSION[email]?>&receiver=<?=$seller_id?>&nickname=<?= $_SESSION[nickname] ?>','window_name','width=400,height=650,location=center,status=no,scrollbars=yes');">연락하기</button>
                  
                          <!-- 바로구매 버튼 -->
                          <input class="btn btn-outline-dark" type="button" value="바로구매" onclick="func_confirm()" />
                          <script type="text/javascript">
                            function func_confirm () {
                              if(confirm('개인 거래 특성상 구매전 판매자와 연락후 거래하시길 바랍니다.')){
                                location.href="order.php?item_no=<?= $_GET[id] ?>"
                              } else {
                                 
                               }
                            }
                          </script>

                        <?php
                        }else{//거래중일때
                          ?>
                          <button type="button" class="btn btn-dark" disabled>거래중</button>
                        <?php
                        }
                      }
                    }
                  ?>



                
    
    </div>
    <!-- 설명 칼럼 끝 div -->                   

</div>
<!-- 콘텐츠 들어가는곳 끝 div -->

</div>
                              
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
