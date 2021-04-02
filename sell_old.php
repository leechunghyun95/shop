<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Second hands</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/shop-homepage.css" rel="stylesheet">

  

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

<!-- 이미지 업로드 하면 미리보기 -->
<script> 
 $(".imgAdd").click(function(){
  $(this).closest(".row").find('.imgAdd').before('<div class="col-sm-2 imgUp"><div class="imagePreview"></div><label class="btn btn-primary">Upload<input type="file" class="uploadFile img" value="Upload Photo" style="width:0px;height:0px;overflow:hidden;"></label><i class="fa fa-times del"></i></div>');
});
$(document).on("click", "i.del" , function() {
	$(this).parent().remove();
});
$(function() {
    $(document).on("change",".uploadFile", function()
    {
    		var uploadFile = $(this);
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
 
        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
 
            reader.onloadend = function(){ // set image data as background of div
                //alert(uploadFile.closest(".upimage").find('.imagePreview').length);
uploadFile.closest(".imgUp").find('.imagePreview').css("background-image", "url("+this.result+")");
            }
        }
      
    });
});
</script> 

<style>
  body
{
  background-color:#f5f5f5;
}
.imagePreview {
    width: 100%;
    height: 180px;
    background-position: center center;
  background:url(http://cliquecities.com/assets/no-image-e3699ae23f866f6cbdf8ba2443ee5c4e.jpg);
  background-color:#fff;
    background-size: cover;
  background-repeat:no-repeat;
    display: inline-block;
  box-shadow:0px -3px 6px 2px rgba(0,0,0,0.2);
}
.btn-primary
{
  display:block;
  border-radius:0px;
  box-shadow:0px 4px 6px 2px rgba(0,0,0,0.2);
  margin-top:-5px;
}
.imgUp
{
  margin-bottom:15px;
}
.del
{
  position:absolute;
  top:0px;
  right:15px;
  width:30px;
  height:30px;
  text-align:center;
  line-height:30px;
  background-color:rgba(255,255,255,0.6);
  cursor:pointer;
}
.imgAdd
{
  width:30px;
  height:30px;
  border-radius:50%;
  background-color:#4bd7ef;
  color:#fff;
  box-shadow:0px 0px 2px 1px rgba(0,0,0,0.2);
  text-align:center;
  line-height:30px;
  margin-top:0px;
  cursor:pointer;
  font-size:15px;
}
</style>

</head>

<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>


  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">SECOND HANDS</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- 검색 창 -->

<form class="d-flex">
        <input class="form-control me-2 ml-3" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success ml-2" type="submit">Search</button>
      </form>




      

      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">SHOP
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">SELL</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
              </svg>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
              </svg>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- 메인 -->
  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">

        <h1 class="my-4">SECOND HANDS</h1>
        <div class="list-group">
          <a href="#" class="list-group-item">디자이너</a>
          <a href="#" class="list-group-item">카테고리</a>
        </div>

      </div>
      <!-- /.col-lg-3 -->

      <!-- 가운데 화면 -->
      <div class="col-lg-9">

      <h1 class="mt-5">상품 등록</h1>

      

      <div class="card mt-5">
  <div class="card-body">
    <h3>상품 기본 정보</h3>


<form action="upload_goods.php" method="post" enctype="multipart/form-data">

    <h5 class="mt-5">디자이너<h5>
      <select class="form-select" aria-label="Default select example" name="designer" required>
        <option selected>디자이너</option>
        <option value="디자이너1">One</option>
        <option value="디자이너2">Two</option>
        <option value="디자이너3">Three</option>
      </select>


  <h5 class="mt-3">카테고리<h5>
      <select class="form-select" aria-label="Default select example" name="category" required>
        <option selected>카테고리</option>
        <option value="상의">상의</option>
        <option value="하의">하의</option>
        <option value="아우터">아우터</option>
        <option value="신발">신발</option>
        <option value="신발">etc</option>
      </select>


<h5 class="mt-3">상품명<h5>
<div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="상품명" aria-label="Recipient's username" aria-describedby="basic-addon2" name="item_name" required>
</div>


<h5 class="mt-3">사이즈<h5>
<div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="사이즈" aria-label="Recipient's username" aria-describedby="basic-addon2" name="size">
</div>


<h5 class="mt-3">상태<h5>
      <select class="form-select" aria-label="Default select example" name="con" required>
        <option selected>상태</option>
        <option value="새상품">새상품</option>
        <option value="극미중고">극미중고</option>
        <option value="사용감 있음">사용감 있음</option>        
        <option value="사용감 많음">사용감 많음</option>
      </select>


<h5 class="mt-3">가격<h5>
<div class="input-group mb-3">
  <input type="number" class="form-control" placeholder="가격 단위를 빼고 숫자만 입력해주세요. ( 단위:원 )" aria-label="Recipient's username" aria-describedby="basic-addon2" name="price" required>
  <span class="input-group-text" id="basic-addon2">원</span>
</div>


  </div>
</div>

<div class="card mt-5 mb-5">
  <div class="card-body">
    <h3>상품 추가 정보</h3>


<h5 class="mt-5">색상<h5>
<div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="색상" aria-label="Recipient's username" aria-describedby="basic-addon2" name="color">
</div>


<h5 class="mt-3">상세 설명<h5>
<textarea id="story" name="description"
          rows="10" cols="75">
</textarea>
  </div>
</div>


<!-- 사진 추가 카드 -->
<div class="card">
  <div class="card-body">
    <h3>사진 추가</h3>


        
    
      <div class="input-group mb-3 mt-5">
        <input type="file" class="form-control" id="inputGroupFile02" name="photo" multiple required>
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
    <button type="submit" class="btn btn-primary btn-lg">등록</button>
  </div>
</form>


   
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

 

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
