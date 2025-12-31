<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>DB 테스트 서버</title>
</head>
<body>

<a href="./input.php">[회원가입]</a>
<a href="./search.php">[회원검색]</a>
<br><br>

<form action="process2.php" method="post">
    이름: <input type="text" name="uname" required><br><br>

    전화: <input type="tel" name="uphone" required><br><br>

    성별:<br>
    <input type="radio" name="gender" value="female" checked> 여자
    <input type="radio" name="gender" value="male"> 남자<br><br>

    생년월일:
    <input type="date" name="birth" required><br><br>

    <input type="submit" value="입력완료">
</form>

</body>
</html>
