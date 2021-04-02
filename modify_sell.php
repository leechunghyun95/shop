<?php
  $conn = mysqli_connect("localhost","root","1234","shop");
  $sql = "select * from goods WHERE id = $_GET[id]";
  
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

  <title>상품</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/modern-business.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">


</head>

<body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>


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
            <a class="nav-link" href="shop.php">SHOP</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="sell.php">SELL</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.html">LIKES</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.html">PROFILE</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Page Content -->
  <div class="container" style="width:50%">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">상품 수정
      <small></small>
    </h1>

    


    <div class="container">

      <div class="card mt-5">
  <div class="card-body">
    <h3>상품 기본 정보</h3>


<form action="modify_sell_ok.php?id=<?= $row[id] ?>" method="post" enctype="multipart/form-data">

    <h5 class="mt-5">디자이너<h5>
      <select class="form-select" aria-label="Default select example" name="designer" required>
        <!-- 원래 선택돼있던 디자이너 가져오기 -->
        <option value= <?= $row[designer] ?> selected> <?= $row[designer] ?> </option> 

        <option value="디자이너1">디자이너1</option>
        <option value="디자이너2">디자이너2</option>
        <option value="디자이너3">디자이너3</option>
      </select>


  <h5 class="mt-3">카테고리<h5>
      <select class="form-select" aria-label="Default select example" name="category" required>
        <!-- 원래 선택했던 카테고리 가져오기 -->
        <option value= <?= $row[category] ?> selected><?= $row[category] ?></option>

        <option value="상의">상의</option>
        <option value="하의">하의</option>
        <option value="아우터">아우터</option>
        <option value="신발">신발</option>
        <option value="신발">etc</option>
      </select>


<h5 class="mt-3">상품명<h5>
<div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="상품명" aria-label="Recipient's username" aria-describedby="basic-addon2" name="item_name" required value=<?= $row[item_name] ?>>
</div>


<h5 class="mt-3">사이즈<h5>
<div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="사이즈" aria-label="Recipient's username" aria-describedby="basic-addon2" name="size" value=<?= $row[size] ?>>
</div>


<h5 class="mt-3">상태<h5>
      <select class="form-select" aria-label="Default select example" name="con" required>
        <option value= <?= $row[con] ?> selected><?= $row[con] ?></option>
        <option value="새상품">새상품</option>
        <option value="극미중고">극미중고</option>
        <option value="사용감 있음">사용감 있음</option>        
        <option value="사용감 많음">사용감 많음</option>
      </select>


<h5 class="mt-3">가격<h5>
<div class="input-group mb-3">
  <input type="number" class="form-control" placeholder="가격 단위를 빼고 숫자만 입력해주세요. ( 단위:원 )" aria-label="Recipient's username" aria-describedby="basic-addon2" name="price" required value=<?= $row[price] ?> >
  <span class="input-group-text" id="basic-addon2">원</span>
</div>


  </div>
</div>

<div class="card mt-5 mb-5">
  <div class="card-body">
    <h3>상품 추가 정보</h3>


<h5 class="mt-5">색상<h5>
<div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="색상" aria-label="Recipient's username" aria-describedby="basic-addon2" name="color" value=<?= $row[color] ?>>
</div>


<h5 class="mt-3">상세 설명<h5>
<textarea id="story" name="description"
          rows="10" cols="67">
          <?= $row[description] ?>
</textarea>
  </div>
</div>


<!-- 사진 추가 카드 -->
<div class="card">
  <div class="card-body">
    <h3>사진 추가</h3>


        
    
      <div class="input-group mb-3 mt-5">
        <input type="file" class="form-control" id="inputGroupFile02" name="photo" multiple >
        <label class="input-group-text" for="inputGroupFile02">업로드</label>
      </div>
      <div class="input-group mb-3">
        <input type="file" class="form-control" id="inputGroupFile02" name="photo2">
        <label class="input-group-text" for="inputGroupFile02">Upload</label>
      </div>
      <div class="input-group mb-3">
        <input type="file" class="form-control" id="inputGroupFile02" name="photo3">
        <label class="input-group-text" for="inputGroupFile02">Upload</label>
      </div>
      <div class="input-group mb-3">
        <input type="file" class="form-control" id="inputGroupFile02" name="photo4">
        <label class="input-group-text" for="inputGroupFile02">Upload</label>
      </div>
      <div class="input-group mb-3">
        <input type="file" class="form-control" id="inputGroupFile02" name="photo5">
        <label class="input-group-text" for="inputGroupFile02">Upload</label>
      </div>
      <div class="input-group mb-3">
        <input type="file" class="form-control" id="inputGroupFile02" name="photo6">
        <label class="input-group-text" for="inputGroupFile02">Upload</label>
      </div>
      <div class="input-group mb-3">
        <input type="file" class="form-control" id="inputGroupFile02" name="photo7">
        <label class="input-group-text" for="inputGroupFile02">Upload</label>
      </div>
      <div class="input-group mb-3">
        <input type="file" class="form-control" id="inputGroupFile02" name="photo8">
        <label class="input-group-text" for="inputGroupFile02">Upload</label>
      </div>


      <div class="input-group mb-3">
        <input type="file" class="form-control" id="inputGroupFile02" name="photo9">
        <label class="input-group-text" for="inputGroupFile02">Upload</label>
      </div>
                
  </div>
</div>
  <div class="d-grid gap-2 col-6 mx-auto mt-5 mb-5">
    <button type="submit" class="btn btn-primary btn-lg">수정</button>
  </div>
</form>

    </div>
      

    <!-- Pagination -->

    

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
