<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>주소록 검색하기aa</title>
</head>
<body>

<a href="./input.php">[주소록 입력하기]</a>
<a href="./search.php">[주소록 검색하기]</a>
<br><br>

<form action="result.php" method="post">
    이름 <input type="text" name="uname"><br><br>

    성별<br>
    <select name="gender">
        <option value="all">모두 다</option>
        <option value="female">여성</option>
        <option value="male">남성</option>
    </select>
    <br><br>

    <input type="submit" value="검색">
</form>

</body>
</html>
