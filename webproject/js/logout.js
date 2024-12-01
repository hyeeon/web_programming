function logoutConfirm() {
    var result = confirm("로그아웃 하시겠습니까?");
    if (result) {
        location.href = 'logout.php';  // 확인 시 logout.php로 이동
    } else {
        location.href = 'index.php';   // 취소 시 index.php로 이동
    }
}
