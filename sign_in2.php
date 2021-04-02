<?php
$conn = mysqli_connect('localhost','root',"1234","shop");

?>

<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- 위 3개의 메타 태그는 *반드시* head 태그의 처음에 와야합니다; 어떤 다른 콘텐츠들은 반드시 이 태그들 *다음에* 와야 합니다 -->
        <title>로그인</title>

        <!-- 합쳐지고 최소화된 최신 CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

        <!-- 부가적인 테마 -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">

        <!-- 합쳐지고 최소화된 최신 자바스크립트 -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    </head>

    <body>
<form method="POST" action="sign_in_ok.php">
<div class="container" style="width:50%">

  <form class="form-signin">
    <h2 class="form-signin-heading">로그인</h2>
    <input class="underline mb-5" name = "phone_num" style="border-left-width:0; border-right-width:0; border-top-width:0; border-bottom-width:1;" placeholder="이메일" required>

    <label for="inputEmail" class="sr-only" >이메일</label>
    <input type="email" id="inputEmail" class="form-control mt-5" placeholder="이메일" required="" autofocus="" name="email">
    <label for="inputPassword" class="sr-only" >비밀번호</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="비밀번호" required="" name="pw">
    <div class="checkbox">
      <label>
        <input type="checkbox" value="remember-me"> 로그인 유지하기
      </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">로그인</button>
  </form>
  <button class="btn btn-lg btn-primary btn-block" type="submit" onClick="location.href='sign_up.php'">회원가입</button>

</div> <!-- /container -->


<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>

</form>
</body>


</html>
