<html>
<head>
<script>
function showUser(str) {
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","getuser.php?q="+str,true);
    xmlhttp.send();
  }
}
</script>
</head>
<body>
<table>
                            <!-- 판매 내역 표 윗단 -->
                            <thead>
                                <tr>
                                    <th>  </th>                                
                                    <th>상품</th>
                                    <th>결제 금액</th>
                                    <th>주문자</th>
                                    <th>우편번호</th>
                                    <th>주소</th>
                                    <th>연락처</th>
                                    <th>상태</th>
                                    <th>송장번호</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>2</td>
                                    <td>3</td>
                                    <td>4</td>
                                    <td>5</td>
                                    <td>6</td>
                                    <td>7</td>
                                    <td>6</td>
                                    <td>7</td>
                                </tr>
                            </tbody>
</table>
</body>
</html>