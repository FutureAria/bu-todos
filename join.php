<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입 페이지</title>
</head>
<body>

<form action="join_process.php" method="post" enctype="multipart/form-data">
    <fieldset>
        <legend>회원가입</legend>

        ID :
        <input type="text" name="UID"><br><br>

        PW :
        <input type="password" name="upw"><br><br>

        Name :
        <input type="text" name="name"><br><br>

        Phone :
        <input type="tel" name="uphone"><br><br>

        Profile Image :
        <input type="file" name="photo" accept="image/*"><br><br>

        <input type="submit" value="회원가입">

    </fieldset>
</form>

</body>
</html>
