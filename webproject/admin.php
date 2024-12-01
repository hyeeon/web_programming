<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>PHP 프로그래밍 입문</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/admin.css">
</head>
<body> 
<header>
    <?php include "header.php";?>
</header>  
<section>
   	<div id="admin_box">
	    <h3 id="member_title">
	    	관리자 모드 > 회원 관리
		</h3>
	    <ul id="member_list">
				<li>
					<span class="col1">선택</span>
					<span class="col2">번호</span>
					<span class="col2">아이디</span>
					<span class="col4">이름</span>
					<span class="col5">레벨</span>
					<span class="col6">포인트</span>
					<span class="col7">가입일</span>
					<span class="col8">수정</span>
					<!--<span class="col9">삭제</span>-->
				</li>
				<form method="post" action="admin_member_delete.php">
<?php
	$con = mysqli_connect("localhost", "user1", "12345", "sample");
	$sql = "select * from members order by num desc";
	$result = mysqli_query($con, $sql);
	$total_record = mysqli_num_rows($result); // 전체 회원 수

	$number = $total_record;

   while ($row = mysqli_fetch_array($result))
   {
      $num         = $row["num"];
	  $id          = $row["id"];
	  $name        = $row["name"];
	  $level       = $row["level"];
      $point       = $row["point"];
      $regist_day  = $row["regist_day"];

	  // 레벨에 따라 등급 및 행 스타일 설정
	  if ($level == 1) {
		$grade = "관리자";
		$rowStyle = "background-color: #FFCCCC; color: white;";
	} elseif ($level == 2 || $level == 3) {
		$grade = "우수 회원";
		$rowStyle = "background-color: #ADD8E6; color: white;";
	} else {
		$grade = "일반 회원";
		$rowStyle = ""; // 기본 스타일
	}
?>
			
		<li style="<?=$rowStyle?>">
		<form method="post" action="admin_member_update.php?num=<?=$num?>">
			<span class="col1"><input type="checkbox" name="item[]" value="<?=$num?>"></span>
			<span class="col2"><?=$number?></span>
			<span class="col3"><?=$id?></a></span>
			<span class="col4"><?=$name?></span>
			<span class="col5"><?=$grade?>(Lv. <?=$level?>)</span>
			<span class="col6"><?=$point?></span>
			<span class="col7"><?=$regist_day?></span>
			<span class="col8"><button type="submit">수정</button></span>
			<!--<span class="col9"><button type="button" onclick="location.href='admin_member_delete.php?num=<//?=$num?>'">삭제</button></span>-->
		</form>
		</li>	
			
<?php
   	   $number--;
   }
   //mysqli_close($con);
?>
				<button type="submit">선택된 회원 삭제</button>
			</form>
	    </ul>
	    <h3 id="member_title">
	    	관리자 모드 > 게시판 관리
		</h3>
	    <ul id="board_list">
		<li class="title">
			<span class="col1">선택</span>
			<span class="col2">번호</span>
			<span class="col3">이름</span>
			<span class="col4">제목</span>
			<span class="col5">첨부파일명</span>
			<span class="col6">작성일</span>
		</li>
		<form method="post" action="admin_board_delete.php">
<?php
	$sql = "select * from board order by num desc";
	$result = mysqli_query($con, $sql);
	$total_record = mysqli_num_rows($result); // 전체 글의 수

	$number = $total_record;

   while ($row = mysqli_fetch_array($result))
   {
      $num         = $row["num"];
	  $name        = $row["name"];
	  $subject     = $row["subject"];
	  $file_name   = $row["file_name"];
      $regist_day  = $row["regist_day"];
      $regist_day  = substr($regist_day, 0, 10)
?>
		<li>
			<span class="col1"><input type="checkbox" name="item[]" value="<?=$num?>"></span>
			<span class="col2"><?=$number?></span>
			<span class="col3"><?=$name?></span>
			<span class="col4"><?=$subject?></span>
			<span class="col5"><?=$file_name?></span>
			<span class="col6"><?=$regist_day?></span>
		</li>	
<?php
   	   $number--;
   }
   //mysqli_close($con);
?>
				<button type="submit">선택된 글 삭제</button>
			</form>
	    </ul>
	</div> <!-- admin_box -->
</section> 
<?php
    mysqli_close($con); 
?>
<footer>
    <?php include "footer.php";?>
</footer>
</body>
</html>
