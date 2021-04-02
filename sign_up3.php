<!doctype html>
<html lang="ko">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">



  <title>회원가입</title>
</head>

<body>
<form action="sign_up_ok.php" method="post" name = 'sign_up'>
  <div class="container boler=1">
    <div class="text-center">
      <h1 class="display-3 mt-5 mb-5">Second Hands</h1>

      <h2 class="mb-5">회원가입</h2>

      <!-- 회원가입 양식 -->
      <div class="card">
        <div class="card-body">
          이메일
          <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="이메일" aria-label="email"
              aria-describedby="basic-addon1" name="email" required>
          </div>

          비밀번호
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="비밀번호" aria-label="password"
              aria-describedby="basic-addon1" name="pw1" id="password1" required>
          </div>

          비밀번호 확인
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="비밀번호 확인" aria-label="password_confirm"
              aria-describedby="basic-addon1" name="pw2" id="password2">
          </div>

         
          휴대전화번호
          <div class="input-group mb-3">
            <input type="number" class="form-control" placeholder="연락처 -를 빼고 입력해주세요. (예시 01012341234)" aria-label="email"
              aria-describedby="basic-addon1" name="phone_num" required>
          </div>

          별명
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="별명" aria-label="nick_name"
              aria-describedby="basic-addon1" name="nick_name" required>
          </div>

          
          

          <button type="submit" class="btn btn-lg btn-primary" name = "submit">가입하기</button>
    </form>

    


        </div>
      </div>



    </div>
  </div>
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
    crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
</body>

</html>