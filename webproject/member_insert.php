<?php
    $id   = $_POST["id"];
    $pass = $_POST["pass"];
    $name = $_POST["name"];
    $email1  = $_POST["email1"];
    $email2  = $_POST["email2"];
    $image = $_POST["image"];

    $email = $email1."@".$email2;
    $regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장

    // 프로필 사진
    $profile_img = $_FILES['profile_img']['name'];
    $profile_tmp = $_FILES['profile_img']['tmp_name'];

    // 파일 업로드 경로 설정
    $upload_dir = 'uploads/';
    $upload_file = $upload_dir . basename($profile_img);

    // 파일이 실제로 업로드 되었는지 확인
    if (move_uploaded_file($profile_tmp, $upload_file)) {
        echo "파일이 업로드되었습니다.";
    } else {
        echo "파일 업로드에 실패했습니다.";
        $profile_img = null; // 실패 시, DB에 null 저장
    }


    $con = mysqli_connect("localhost", "user1", "12345", "sample");

	$sql = "insert into members(id, pass, name, email, regist_day, level, point, profile_img) ";
	$sql .= "values('$id', '$pass', '$name', '$email', '$regist_day', 9, 0, '$profile_img')";

	mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행
    mysqli_close($con);     

    echo "
	    <script>
	        location.href = 'index.php';
	    </script>
	  ";
?>

   
