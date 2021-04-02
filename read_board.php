<?php
    $conn = mysqli_connect("localhost","root","1234","shop");
	if($_GET[lock_post] == 1){//비밀글 이라면 
		echo "<script>
		alert('비밀글 입니다.');
		location.href='/shop/board.php';</script>";
		
	}
?>
<!doctype html>
<head>
<meta charset="UTF-8">
<title>문의사항</title>
<link rel="stylesheet" type="text/css" href="/css/style.css" />
<style>
    {
	margin: 0 auto;
	padding: 0;
	font-family: 'Malgun gothic','Sans-Serif','Arial';
}
a {
	text-decoration: none;
	color:#333;
}
ul li {
	list-style:none;
}

/* 공통 */
.fl {
	float:left;
}
.tc {
	text-align:center;
}

/* 게시판 목록 */
#board_area {
	width: 900px;
	position: relative;
}
.list-table {
	margin-top: 40px;
}
.list-table thead th{
	height:40px;
	border-top:2px solid #09C;
	border-bottom:1px solid #CCC;
	font-weight: bold;
	font-size: 17px;
}
.list-table tbody td{
	text-align:center;
	padding:10px 0;
	border-bottom:1px solid #CCC; height:20px;
	font-size: 14px 
}
#write_btn {
	position: absolute;
	margin-top:20px;
	right: 0;
}
</style>
 <!-- Bootstrap core CSS -->
 <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="css/modern-business.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<style>
    /* 게시판 read */
#board_read {
	width:900px;
	position: relative;
	word-break:break-all;
}
#user_info {
	font-size:14px;
}
#user_info ul li {
	float:left;
	margin-left:10px;
}
#bo_line {
	width:880px;
	height:2px;
	background: gray;
	margin-top:20px;
}
#bo_content {
	margin-top:20px;
}
#bo_ser {
	font-size:14px;
	color:#333;
	position: absolute;
	right: 0;
}
#bo_ser > ul > li {
	float:left;
	margin-left:10px;
}

</style>

<style>
	/* 댓글 */
.reply_view {
	width:900px;
	margin-top:100px; 
	word-break:break-all;
}
.dap_lo {
	font-size: 14px;
	padding:10px 0 15px 0;
	border-bottom: solid 1px gray;
}
.dap_to {
	margin-top:5px;
}
.rep_me {
	font-size:12px;
}
.rep_me ul li {
	float:left;
	width: 30px;
}
.dat_delete {
	display: none;
}	
.dat_edit {
	display:none;
}
.dap_sm {
	position: absolute;
	top: 10px;
}
.dap_edit_t{
	width:520px;
	height:70px;
	position: absolute;
	top: 40px;
}
.re_mo_bt {
	position: absolute;
	top:40px;
	right: 5px;
	width: 90px;
	height: 72px;
}
#re_content {
	width:700px;
	height: 56px; 
}
.dap_ins {
	margin-top:50px;
}
.re_bt {
	position: absolute;
	width:100px;
	height:56px;
	font-size:16px;
	margin-left: 10px; 
}
#foot_box {
	height: 50px; 
}
</style>

<script>
function removeCheck() {

if (confirm("정말 삭제하시겠습니까?") == true){    //확인

	//document.removefrm.submit();
	location.href="reply_delete.php";

}
}else{   //취소

	return;

	//location.href='/shop/board.php';
}

}
</script>

<script>
// $(document).ready(function(){
// 	$(".dat_edit_bt").click(function(){
// 		/* dat_edit_bt클래스 클릭시 동작(댓글 수정) */
// 			var obj = $(this).closest(".dap_lo").find(".dat_edit");
// 			obj.dialog({
// 				modal:true,
// 				width:650,
// 				height:200,
// 				title:"댓글 수정"});
// 		});

	$(".dat_delete_bt").click(function(){
		/* dat_delete_bt클래스 클릭시 동작(댓글 삭제) */
		var obj = $(this).closest(".dap_lo").find(".dat_delete");
		obj.dialog({
			modal:true,
			width:400,
			title:"댓글 삭제확인"});
		});

	});
</script>

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

    <div class="container mt-5">
    <?php
        $sql = "select * from board where idx= $_GET[idx]";
        $result = mysqli_query($conn,$sql);
        $board = mysqli_fetch_array($result);

        $hit = $board[hit];//기존 조회수 가져오기
        echo "조회수: ".$hit;
        $hit = $hit+1;//기존 조회수 +1하기
        echo "조회수 업뎃: ".$hit;

        $sql = "UPDATE board SET hit = $hit WHERE idx = $_GET[idx]";//조회수 증가 sql문
        mysqli_query($conn,$sql);//조회수 증가



		// $bno = $_GET['idx']; /* bno함수에 idx값을 받아와 넣음*/
		// $hit = mysqli_fetch_array(mysqli_query("select * from board where idx ='".$bno."'"));
		// $hit = $hit['hit'] + 1;
		// $fet = mysqli_query("update board set hit = '".$hit."' where idx = '".$bno."'");
		// $sql = mysqli_query("select * from board where idx='".$bno."'"); /* 받아온 idx값을 선택 */
		// $board = $sql->fetch_array();
	?>
    
<!-- 글 불러오기 -->
<div id="board_read">
	<h2><?php echo $board['title']; ?></h2>
		<div id="user_info">
			<?php echo $board['name']; ?> <?php echo $board['date']; ?> 조회:<?php echo $board['hit']; ?>
				<div id="bo_line"></div>
			</div>
			<div id="bo_content">
				<?php echo nl2br("$board[content]"); ?>
			</div>
	<!-- 목록, 수정, 삭제 -->
	<div id="bo_ser">
		<ul>
			<li><a href="/shop/board.php">[목록으로]</a></li>
			<li><a href="modify_board.php?idx=<?php echo $board['idx']; ?>">[수정]</a></li>
			<li><a href="delete_board.php?idx=<?php echo $board['idx']; ?>" onclick="removeCheck()">[삭제]</a></li>
		</ul>
	</div>
</div>

<!--- 댓글 불러오기 -->
<div class="reply_view mt-5">
	<h3>댓글목록</h3>
		<?php
			$sql = "select * from reply where con_num= $board[idx] order by idx desc";
			$result = mysqli_query($conn,$sql);
			
			//$sql3 = mq("select * from reply where con_num='".$bno."' order by idx desc");
			while($reply = mysqli_fetch_array($result)){ 
		?>
		<div class="dap_lo">
			<div><b><?php echo $reply['name'];?></b></div>
			<div class="dap_to comt_edit"><?php echo nl2br("$reply[content]"); ?></div>
			<div class="rep_me dap_to"><?php echo $reply['date']; ?></div>
			<div class="rep_me rep_menu">
				<!-- <a class="dat_edit_bt" href="#">수정</a> -->

				<!-- 댓글 삭제 -->
				<a class="dat_delete_bt" href="reply_delete.php?idx=<?=$reply[idx]?> & con_num= <?=$reply[con_num]?>" onclick="removeCheck()">삭제</a>
			</div>
			<!-- 댓글 수정 폼 dialog -->
			<!-- <div class="dat_edit_bt">
				<form method="post" action="reply_modify_ok.php">
					<input type="hidden" name="rno" value="<?php echo $reply['idx']; ?>" /><input type="hidden" name="b_no" value="<?php echo $bno; ?>">
					<input type="password" name="pw" class="dap_sm" placeholder="비밀번호" />
					<textarea name="content" class="dap_edit_t"><?php echo $reply['content']; ?></textarea>
					<input type="submit" value="수정하기" class="re_mo_bt">
				</form>
			</div> -->
			<!-- 댓글 삭제 비밀번호 확인 -->
			<div class='dat_delete'>
				<form action="reply_delete.php" method="post">
					<input type="hidden" name="rno" value="<?php echo $reply['idx']; ?>" /><input type="hidden" name="b_no" value="<?php echo $bno; ?>">
			 		<p>비밀번호<input type="password" name="pw" /> <input type="submit" value="확인"></p>
				 </form>
			</div>
		</div>
	<?php } ?>

	<!--- 댓글 입력 폼 -->
	<div class="dap_ins">
		<form action="reply_ok.php?idx=<?php echo $_GET[idx]; ?>" method="post">
			
			<div style="margin-top:10px; ">
				<textarea name="content" class="reply_content" id="re_content" ></textarea>
				<button id="rep_bt" class="re_bt">댓글</button>
			</div>
		</form>
	</div>
</div><!--- 댓글 불러오기 끝 -->

    </div>

	
</body>
</html>