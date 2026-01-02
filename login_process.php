<?php
session_start();

// POST 값
$uid = $_POST['uid'];
$upw = $_POST['upw'];

// DB 연결
$dbcon = mysqli_connect("localhost", "root", "", "kt");
if (!$dbcon) {
    die("DB 연결 실패");
}

// 아이디 확인
$query = "SELECT * FROM member WHERE uid = '$uid'";
$result = mysqli_query($dbcon, $query);
$row = mysqli_fetch_assoc($result);

if (!$row) {
    echo "<script>
        alert('존재하지 않는 아이디입니다.');
        location.href='join.php';
    </script>";
    exit;
}

if ($row['upw'] !== $upw) {
    echo "<script>
        alert('비밀번호가 일치하지 않습니다.');
        location.href='login.php';
    </script>";
    exit;
}

// 로그인 성공
$_SESSION['userid'] = $row['uid'];
$_SESSION['time']   = time();

// 페이지 이동
echo "<script>
    location.replace('./content.php');
</script>";
exit;
?>
