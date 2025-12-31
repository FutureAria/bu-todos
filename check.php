<?php
// ===== 1. 날짜 제한 =====
date_default_timezone_set('Asia/Seoul');

// 기준 날짜
$open = new DateTime('2026-04-01');

// 오늘 날짜 (시간 제거)
$today = new DateTime(date('Y-m-d'));

if ($today < $open) {
    echo "아직 열 수 없는 추억입니다.<br>
    2026년 04월 01일에 다시 시도해 주세요.";
    exit;
}


// ===== 2. 정답 정보 =====
$correct_name = "진세은";
$correct_nick = "진세";
$correct_pw   = "002486";

// ===== 3. 사용자 입력 =====
$uname    = $_POST['uname'] ?? '';
$nickname = $_POST['nickname'] ?? '';
$password = $_POST['password'] ?? '';

// ===== 4. 인증 =====
if (
    $uname === $correct_name &&
    $nickname === $correct_nick &&
    $password === $correct_pw
) {
    // ===== 5. 로그 기록 =====
    $log_file = "log.txt";

    $time = date("Y-m-d H:i:s");
    $ip   = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
    $ua   = $_SERVER['HTTP_USER_AGENT'] ?? 'unknown';

    $log = "[{$time}] 이름: {$uname}, 별명: {$nickname}, IP: {$ip}, UA: {$ua}\n";

    file_put_contents($log_file, $log, FILE_APPEND);

    // ===== 6. 성공 페이지 이동 =====
    header("Location: se.html");
    exit;

} else {
    echo "입력 정보가 일치하지 않습니다.";
}
?>