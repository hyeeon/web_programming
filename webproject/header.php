<?php
    session_start();
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";
    if (isset($_SESSION["username"])) $username = $_SESSION["username"];
    else $username = "";
    if (isset($_SESSION["userlevel"])) $userlevel = $_SESSION["userlevel"];
    else $userlevel = "";
    if (isset($_SESSION["userpoint"])) $userpoint = $_SESSION["userpoint"];
    else $userpoint = "";
?>		
        <div id="top">
            <h3>
                <a href="index.php">웹프로그래밍</a>
            </h3>
            <ul id="top_menu">  
<?php
    if(!$userid) {
?>                
                <li><a href="member_form.php">회원 가입</a> </li>
                <li> | </li>
                <li><a href="login_form.php">로그인</a></li>
<?php
    } else {
                $logged = $username."(".$userid.")님[Level:".$userlevel.", Point:".$userpoint."]";
?>
                <li><?=$logged?> </li>
                <li> | </li>
                <li><a href="#" onclick="logoutConfirm()">로그아웃</a> </li>
                <li> | </li>
                <li><a href="member_modify_form.php">정보 수정</a></li>
<?php
    }
?>
<?php
    if($userlevel==1) {
?>
                <li> | </li>
                <li><a href="admin.php">관리자 모드</a></li>
<?php
    }
?>
            </ul>
        </div>
        <div id="menu_bar">
            <ul>  
                <li class="menu_bar_home"><a href="index.php">HOME</a></li>
                <li class="menu_bar_message"><a href="message_form.php">쪽지</a></li>                                
                <li class="menu_bar_board"><a href="board_form.php">게시판</a></li>
                <li class="menu_bar_complete"><a href="index.php">사이트 완성하기</a></li>
            </ul>
        </div>

        <!--로그아웃 js-->

        <script>
        function logoutConfirm() {
            var result = confirm("로그아웃 하시겠습니까?");
            if (result) {
                location.href = 'logout.php'; // 확인 시 logout.php로 이동
            }
        }
        </script>