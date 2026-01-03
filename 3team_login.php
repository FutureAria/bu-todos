<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인 페이지</title>
    <style>
        body {
            max-width: 800px;
            margin: 40px auto;
            padding: 0 20px;
            font-family: "Apple SD Gothic Neo", "Noto Sans KR", sans-serif;
            line-height: 1.8;
            color: #222;
            background-color: #f5f7fb;
        }

        fieldset {
            width: 420px;
            margin: 50px auto;
            padding: 10px 50px;
            background: #fff;
            border: 4px solid #000;
            border-radius: 12px;
            box-shadow: 0 30px 40px rgba(0,0,0,0.05);
        }

        legend {
            font-size: 22px;
            font-weight: bold;
            padding: 0 10px;
            text-align: center;
        }

        .top-buttons {
            text-align: center;
            margin-top: 40px;
        }

        .btn-primary {
            display: inline-block;
            padding: 10px 44px;
            margin: 0 4px;
            background:#4f63ff;
            color:white;
            text-decoration:none;
            border-radius:5px;
            border:none;
            cursor:pointer;
        }

        input[type="text"],
        input[type="password"] {
            width: 200px;
            height: 25px;
            box-sizing: border-box;
        }

        .login-submit {
            text-align:center;
            margin-top:20px;
        }

        ul {
            background-color: #7d83a9ff;
            width: 150px;
            list-style-type: none;
            padding: 0;
            text-align: center;
            display: table;
            margin-left: auto;
            margin-right: auto;
        }
        li a {
            display: block;
            color: #fbfbfbff;
            padding: 8px;
            text-decoration: none;
            font-weight: bold;
        }
        li a:hover {
            background-color: #5769bfff;
            color: white;
        }
    </style>
</head>

<body>
<form action="3team_login_save.php" method="post">
    <fieldset>
        <legend>회원가입</legend>

        <!-- 위쪽 로그인 / 회원가입 버튼 -->
        <div class="top-buttons">
            <a href="3team_login.php" class="btn-primary">로그인</a>
            <a href="3team_login_process.php" class="btn-primary">회원가입</a>
        </div>

        <div style="text-align:left; margin-top:40px;">
            아이디 (학번 또는 사번) : <br>
            <input type="text"
                name="UID"
                placeholder="아이디를 입력해 주세요"
                required><br><br>

            비밀번호 : <br>
            <input type="password"
                name="UPW"
                placeholder="비밀번호를 입력해 주세요"
                equired><br><br>

            <input type="checkbox" name="ID_SAVE" value="ID_SAVE">
            아이디 저장<br>
        </div>

        <div class="login-submit">
            <button type="submit" class="btn-primary" style="padding:10px 180px;">
                로그인하기
            </button>
        </div>
        <br><hr>

        <p style="text-align:left;">아이디를 잊으셨나요?</p>

        <ul>
            <li>
                <a href="./3team_login_search.php">아이디 찾기</a>
            </li>
        </ul>
        <ul>
            <li>
                <a href="./3team_password_search.php">비밀번호 찾기</a>
            </li>
        </ul>

        <p style="text-align:center;">
            학생, 교직원 로그인 할 수 있습니다. <br>
            로그인 문의는 행정지원팀으로 문의 바랍니다.
        </p>

    </fieldset>
</form>
</body>
</html>
