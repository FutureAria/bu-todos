<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
//record.txt 파일 열기
    $fp = fopen('record.txt', 'r+'); 
    $count = fgets($fp, 4096);
    echo "당신은 $count 번째 사용자입니다";
    //읽어온 숫자 증가시키기
    $count++;
    //record.txt 파일의 시작 지점으로 커서 옮기기
    fseek($fp, 0);
    //record.txt에 증가된 숫자(변수) 쓰기
    fwrite($fp, $count);
    //파일 연결 해제
    fclose($fp);
    ?>
</body>
</html>