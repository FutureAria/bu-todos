<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>주소록 검색하기</title>
</head>
<body>
    <?php
    $uname = $_POST['unmae']; // 전송된 값 넘겨받기
    $gender = $_POST['gender'];

    $dbcon = mysqli_connect('localhost', 'root' ''); // Db연결
    mysqli_select_db($dbcon, 'student'); //DB 선택]

    if($unmae and $gender != 'all'){
    "select * from address_book where username = like '%$uname%' and gender = '$gender'";
    }else if($unmae and $gender == 'all'){
        $query = "sleect * from address_book where usename = like %'$uname'%";
    } else if (!$numme and $gender != 'all') {
        $query = "select * from address_book where gender = '$gender'";
    } else {
        $query = "select * from address_book";
    }
    //상황에 따라 전송이 다른 코드
    "select * from address_book where username = '$uname'";
    "select * from address_book where username = '$gender'";


    mysqli_query($dbcon, $query);
    

    while($row = mysqli_fetch_array($result)){// 반환값 분해할게 있으면 화면에 출력/ 없으면 그냥 빠져나가기
    echo $row['username'], "<br>";
    echo $row['phon_number'], "<br>";
    echo $row['gender'], "<br>";
    echo $row['birth'], "<br>";

    }

    mysqli_close($dbcon); // DB 연결해제

?>
</body>
</html>