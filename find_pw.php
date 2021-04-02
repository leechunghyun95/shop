<?php
$conn = mysqli_connect('localhost','root',"1234","shop");

session_start();

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

        <!-- 합쳐지고 최소화된 최신 자바스크립트 --><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    </head>

    <body>
    
    <div class="container mt-1">
        <div class="row mt-1">
            <div class="col-5"></div>
            <div class="col-4">
            <h1><a href="index.php" style="text-decoration: none; color : black">SECOND HANDS</a></h1>
            </div>
            <div class="col-3"></div>
            
        </div>

        <form action="mail/find_pw_mail.php" method="post">
        <div class="row mt-5">
            <div class="col-4"></div>
            <div class="col-4">
                <h5>가입한 이메일을 입력해주세요.</h5>
            <input type="email" id="inputEmail" class="form-control mt-2" placeholder="EMAIL" required="" autofocus="" name="email">
            </div>
            <div class="col-4"></div>
        </div>

        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
            <div class="d-grid gap-2 mt-3">
                <button class="btn btn-outline-dark" type="submit" style="padding:10px">OK</button>
</form>
            </div>
            </div>
            <div class="col-4"></div>
        </div>

        

    </div>


    



<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>

</form>
</body>


</html>
