<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>DB</title>
</head>
<body>
<?php
// 1. POST 데이터 받기
$uid    = $_POST['UID'];
$upw    = $_POST['upw'];
$name   = $_POST['name'];
$uphone = $_POST['uphone'];

// 2. 이미지 업로드 처리
$dir = "./image/";
$file_name = basename($_FILES['photo']['name']);
$imagepath = $dir . $file_name;

if (!move_uploaded_file($_FILES['photo']['tmp_name'], $imagepath)) {
    echo "이미지 업로드 실패";
    exit;
}

// 3. DB 연결
$dbcon = mysqli_connect("localhost", "root", "", "kt");
if (!$dbcon) {
    die("DB 연결 실패");
}

// 4. SQL 실행
$query = "
    INSERT INTO member
    VALUES (NULL, '$uid', '$upw', '$name', '$uphone', '$imagepath')
";

$result = mysqli_query($dbcon, $query);

// 5. 결과 출력
if ($result) {
    echo "{$name} 님, 가입이 완료되었습니다.<br>";
    echo "<img src='$imagepath' width='200'>";
} else {
    echo "DB 오류 발생";
}

// 6. 연결 종료
mysqli_close($dbcon);
?>
<mtea http-equiv="refresh" content = "3; URL = './login.php"></mtea>
</body>
</html>
