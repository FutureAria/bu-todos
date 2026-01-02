<?php
session_start();
if (isset($_SESSION['userid'])) {
    echo '
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>테스트 쿠키</title>
</head>
<body>
    <h1>회원 전용 페이지</h1>
    <img src="./call.png" width="200">
</body>
</html>
';
} else {
    echo "Access Denied";
}
?>
