<?php
$conn = mysqli_connect("localhost","root","1234","shop");

session_start();

$buyer_name = $_POST['buyer_name'];
$buyer_tel = $_POST['buyer_tel'];
$postal_code = $_POST['postal_cod'];
$address = $_POST['address'];
$address2 = $_POST['address2'];
$item_no = $_GET['item_no'];

// 구매자 정보에 주소 입력
$sql_user = "UPDATE user SET postal_code = $postal_code, address = $address, address2 = $address2 WHERE email = $_SESSION[email]";
$result_uesr = mysqli_query($conn,$sql_user);

// 상품정보가져오기
$sql_goods = "SELECT * FROM goods WHERE id = $item_no";
$result_goods = mysqli_query($conn,$sql_goods);
$row_goods = mysqli_fetch_array($result_goods);
?>
<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js" ></script>
    <script type="text/javascript" src="https://cdn.iamport.kr/js/iamport.payment-1.1.5.js"></script>

</head>
<body>
<!--// mode : development or production-->
<script>
    IMP.init('imp14628726');

    IMP.request_pay({
    pg : 'inicis', // version 1.1.0부터 지원.
    pay_method : 'card',
    merchant_uid : 'merchant_' + new Date().getTime(),
    name : '<?= $row_goods['item_name'] ?>', //상품명
    amount : <?= $row_goods['price'] ?>, // 상품 가격
    buyer_email : 'iamport@siot.do', //구매자 이메일
    buyer_name : '<?= $buyer_name ?>',
    buyer_tel : '<?= $buyer_tel ?>',
    buyer_addr : '<?= $address + " " + $address2 ?>',
    buyer_postcode : '<?php $postal_code ?>',
    m_redirect_url : 'https://www.yourdomain.com/payments/complete'
}, function(rsp) {
    if ( rsp.success ) {
        var msg = '결제가 완료되었습니다.';
        msg += '고유ID : ' + rsp.imp_uid;
        msg += '상점 거래ID : ' + rsp.merchant_uid;
        msg += '결제 금액 : ' + rsp.paid_amount;
        msg += '카드 승인번호 : ' + rsp.apply_num;
        location.href = "payment_ok.php?item_no=<?= $item_no ?>"

        <?php
        // 결제 성공하면 상품 정보에 구매자이메일 등록 상품 판매상태 1로 변경(0은 판매중/ 1은 결제완료/ 2는 배송완료및 거래완료)
        $sql_pay = "UPDATE goods SET buyer='$_SESSION[email]', state=1 WHERE id = $item_no";
        $result_pay = mysqli_query($conn,$sql_pay);
        ?>

    } else {
        var msg = '결제에 실패하였습니다.';
        msg += '에러내용 : ' + rsp.error_msg;
        
        location.href="index.php"
        
    }
    alert(msg);
});
</script>

</body>
</html>