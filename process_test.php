<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입</title>
</head>
<body>
    <?php

    // $uid = $_POST['uid'];
    // $upw = $_POST['upw'];
    // echo "$uid 님 어서오세요, 당신의 패스워드는 $upw 이군요!"

$uname  = $_POST['uname'];
$height = (float)$_POST['height'];
$weight = (float)$_POST['weight'];

$standard = ($height - 100) * 0.9;

if ($weight >= $standard) {
    echo "$uname 님 다이어트 필요";
} else {
    echo "$uname 님 다이어트 불필요";
}
?>
    
</body>
</html>