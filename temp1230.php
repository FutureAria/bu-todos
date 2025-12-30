<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>카운터</title>
</head>
<body>
    <?php
    $user_ip = $_SERVER['REMOTE_ADDR'];
    date_default_timezone_set('Asia/Seoul');
    $today = date("Y/m/d/H/i/s");
    $fp = fopen('log.txt', 'a+');
    fwrite($fp, "$today : $user_ip \n"); //반드시 겹따옴표로 묶을 것
    fseek($fp, 0);
    while(!feof($fp)){
    $log = fgets($fp, 2048); // 크기 크게 지정해도 개행 단위로 읽음
    echo "$log <br>";
}
    fclose($fp);
?>
    
</body>
</html>