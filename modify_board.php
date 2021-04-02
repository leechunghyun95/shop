<?php
  $conn = mysqli_connect("localhost","root","1234","shop");
  
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
    <h1 class="mt-4 mb-3">문의사항
      <small></small>
    </h1>

    


    <div class="container">

      <div class="card mt-5">
  <div class="card-body">
    <h3>수정하기</h3>


<form action="modify_board_ok.php?idx=<?= $_GET[idx] ?>" method="post" enctype="multipart/form-data">

<h5 class="mt-3">제목<h5>
<div class="input-group mb-3">
    <?php 
        $sql = "select * from board WHERE idx=$_GET[idx]";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);//문의사항 게시물 번호에 맞게 가져옴
    ?>
  <input type="text" class="form-control" placeholder="" aria-label="Recipient's username" aria-describedby="basic-addon2" name="title" required value="<?= $row[title] ?>">
</div>

<h5 class="mt-3">내용<h5>
<textarea id="story" name="content"
          rows="10" cols="67" required>
<?= $row[content] ?>
</textarea>

  
  <div id="in_lock" class="mt-1">
    <input type="checkbox" value="1" name="lockpost" /> 해당글을 잠급니다.
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
