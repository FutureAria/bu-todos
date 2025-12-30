<?php
$correct_name = "진세은";
$correct_nick = "진세";
$correct_pw   = "002486";

$uname     = $_POST['uname'] ?? '';
$nickname  = $_POST['nickname'] ?? '';
$password  = $_POST['password'] ?? '';

if (
    $uname === $correct_name &&
    $nickname === $correct_nick &&
    $password === $correct_pw
) {
    header("Location: se.html");
    exit;
} else {
    echo "입력 정보가 일치하지 않습니다.";
    
}
