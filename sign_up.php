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
        <title>회원가입</title>

        <!-- 합쳐지고 최소화된 최신 CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

        <!-- 부가적인 테마 -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">

        <!-- 합쳐지고 최소화된 최신 자바스크립트 --><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

        <!-- 주소 찾기 api -->
        <script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
        <script>
            function sample6_execDaumPostcode() {
                new daum.Postcode({
                    oncomplete: function(data) {
                        // 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.

                        // 각 주소의 노출 규칙에 따라 주소를 조합한다.
                        // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
                        var addr = ''; // 주소 변수
                        var extraAddr = ''; // 참고항목 변수

                        //사용자가 선택한 주소 타입에 따라 해당 주소 값을 가져온다.
                        if (data.userSelectedType === 'R') { // 사용자가 도로명 주소를 선택했을 경우
                            addr = data.roadAddress;
                        } else { // 사용자가 지번 주소를 선택했을 경우(J)
                            addr = data.jibunAddress;
                        }

                        // 사용자가 선택한 주소가 도로명 타입일때 참고항목을 조합한다.
                        if(data.userSelectedType === 'R'){
                            // 법정동명이 있을 경우 추가한다. (법정리는 제외)
                            // 법정동의 경우 마지막 문자가 "동/로/가"로 끝난다.
                            if(data.bname !== '' && /[동|로|가]$/g.test(data.bname)){
                                extraAddr += data.bname;
                            }
                            // 건물명이 있고, 공동주택일 경우 추가한다.
                            if(data.buildingName !== '' && data.apartment === 'Y'){
                                extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
                            }
                            // 표시할 참고항목이 있을 경우, 괄호까지 추가한 최종 문자열을 만든다.
                            if(extraAddr !== ''){
                                extraAddr = ' (' + extraAddr + ')';
                            }
                            // 조합된 참고항목을 해당 필드에 넣는다.
                            document.getElementById("sample6_extraAddress").value = extraAddr;
                        
                        } else {
                            document.getElementById("sample6_extraAddress").value = '';
                        }

                        // 우편번호와 주소 정보를 해당 필드에 넣는다.
                        document.getElementById('sample6_postcode').value = data.zonecode;
                        document.getElementById("sample6_address").value = addr;
                        // 커서를 상세주소 필드로 이동한다.
                        document.getElementById("sample6_detailAddress").focus();
                    }
                }).open();
            }
        </script>

        <!-- 비밀번호 조건 및 비밀번호 확인 체크     -->
        <script>
            function check_pw(){


                var pw = document.getElementById('pw').value;                
                var SC = ["!","@","#","$","%"];
                var check_SC = 0;

                if(pw.length < 6 || pw.length>16){
                    window.alert('비밀번호는 6글자 이상, 16글자 이하만 이용 가능합니다.');
                    document.getElementById('pw').value='';
                }
                for(var i=0;i<SC.length;i++){
                    if(pw.indexOf(SC[i]) != -1){
                        check_SC = 1;
                    }
                }
                if(check_SC == 0){
                    window.alert('!,@,#,$,% 의 특수문자가 들어가 있지 않습니다.')
                    document.getElementById('pw').value='';
                }
                if(document.getElementById('pw').value !='' && document.getElementById('pw2').value!=''){
                    if(document.getElementById('pw').value==document.getElementById('pw2').value){
                        document.getElementById('check').innerHTML='비밀번호가 일치합니다.'
                        document.getElementById('check').style.color='blue';
                    }
                    else{
                        document.getElementById('check').innerHTML='비밀번호가 일치하지 않습니다.';
                        document.getElementById('check').style.color='red';
                    }
                }
                }
        </script>



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

        <form action="sign_up_ok.php" method="post">
            <!-- row -->
            <div class="row mt-5">
                <!-- 왼쪽 파트 -->
                <div class="col-4"></div>
                <!-- 가운데 파트 -->
                <div class="col-4">
                    <input type="email" id="inputEmail" class="form-control mt-5" placeholder="이메일" required="" autofocus="" name="email">
                    <input type="password" id="pw" class="form-control mt-3" placeholder="!,@,#,$,% 의 특수문자를 넣어 6자리 이상 16자리 이하의 비밀번호를 입력하세요." required="" name="pw1"  onchange="check_pw()">
                    <input type="password" id="pw2" class="form-control mt-3" placeholder="비밀번호 확인" required="" name="pw2" onchange="check_pw()">&nbsp;<span id="check"></span>
                    <input type="text" id="inputPassword" class="form-control mt-3 mb-2" placeholder="닉네임" required="" name="nick_name">
                    <!-- <div class="row">
                        <div class="col-10"><input type="text" id="inputPassword" class="form-control" placeholder="닉네임" required="" name="nick_name"></div>
                        <div class="col-1"><input type="button" class="btn btn-outline-dark" value="중복 검사" style="height:35px"></div>
                    </div> -->
                    <!-- 회원가입시 주소입력 -->
                    <h5 class="mt-3">주소</h5>
                    <input type="text" class="form-control" id="sample6_postcode" placeholder="우편번호" name="postal_code">
                    <input type="button" class="btn btn-outline-dark mt-2" onclick="sample6_execDaumPostcode()" value="우편번호 찾기"><br>
                    <input type="text" class="form-control mt-2" id="sample6_address" placeholder="주소" name="address">
                    <input type="text" class="form-control mt-2" id="sample6_detailAddress" placeholder="상세주소" name="address2">
                    <input type="text" class="form-control mt-2" id="sample6_extraAddress" placeholder="참고항목">
                </div>
                <!-- 오른쪽 파트 -->
                <div class="col-4"></div>
            </div>
            <!-- /row -->

            <!-- row -->
            <div class="row">
                <div class="col-4"></div>
                <div class="col-4">
                    <div class="d-grid gap-2 mt-3">
                        <button class="btn btn-outline-dark" type="submit" style="padding:10px">Sign Up</button>
                        </form>
                    </div>
                </div>
                <div class="col-4"></div>
            </div>
            <!-- /row -->

        
        

    </div>


    



<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>

</form>

<!-- <table>
            <tr>
                <td width="5%" align="center">*</td>
                <td width="20%">아이디</td>
                <td><input type="text" name ="userId" id="id"></td>
            </tr>
            <tr >
                <td width="5%" align="center">*</td>
                <td width="20%">비밀번호</td>
                <td><input type="password" name="userPW" id="pw" onchange="check_pw()"></td>
            </tr>
            <tr>
                <td width="5%" align="center">*</td>
                <td width="20%">비밀번호 확인</td>
                <td><input type="password" name="userPW2" id="pw2" onchange="check_pw()">&nbsp;<span id="check"></span></td>
            </tr>
        </table> -->
</body>


</html>
