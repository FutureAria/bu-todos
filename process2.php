<?php
$uname  = $_POST['uname'] ?? '';
$uphone = $_POST['uphone'] ?? '';
$gender = $_POST['gender'] ?? '';
$birth  = $_POST['birth'] ?? '';

// DB 연결
$dbcon = mysqli_connect('localhost', 'root', '', 'student');
if (!$dbcon) {
    die("DB 연결 실패");
}

// SQL 인젝션 최소 방어
$uname  = mysqli_real_escape_string($dbcon, $uname);
$uphone = mysqli_real_escape_string($dbcon, $uphone);
$gender = mysqli_real_escape_string($dbcon, $gender);
$birth  = mysqli_real_escape_string($dbcon, $birth);

// INSERT
$query = "
INSERT INTO address_book (username, phone_number, gender, birth)
VALUES ('$uname', '$uphone', '$gender', '$birth')
";

$result = mysqli_query($dbcon, $query);

if ($result) {
    echo "{$uname} 님, 가입 신청이 완료되었습니다.";
} else {
    echo "DB 오류 발생: " . mysqli_error($dbcon);
}

mysqli_close($dbcon);
?>
