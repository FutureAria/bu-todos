<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인 페이지</title>
</head>
<body>
    <body style="background-color:#80d0d9;">
    <form action="login_process.php" method="post" enctype="multipart/form-data">
    <fieldset>
        <!-- <ui>
            <li>
                <label for = "name">이름</label>
                <input type = "text" id = "mail">
            </li>
        </ui> -->
        <legend>로그인</legend>
        <table border = '0'>
            <tr>
                <td>ID</td>
                <td><input tpye = 'text' name = 'uid' required></td>
            </tr>
        <tr>
            <td>PW</td>
            <td><input type = 'password' name = 'upw' required></td>
        </tr>
        <tr>
            <td colspan = '2'>
            <input type="submit" value="로그인">   
            </td>
        </tr>
</table>
</body>
</html>