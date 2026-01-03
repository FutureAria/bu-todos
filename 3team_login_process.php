<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>회원가입 페이지</title>

    <style>
        body {
            background-color: #f5f7fb;
            font-family: "Apple SD Gothic Neo", "Noto Sans KR", sans-serif;
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
            padding: 10px 40px;
            margin: 0 4px;
            background: #4f63ff;
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            font-size: 15px;
            cursor: pointer;
        }

        .btn-primary:hover {
            background: #3b4ed1;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="password"] {
            width: 100%;
            box-sizing: border-box;
            padding: 6px 8px;
            margin-top: 4px;
        }

        .submit-area {
            text-align: center;
            margin-top: 20px;
        }

        p.info {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
<form action="join_3team_process.php" method="post" enctype="multipart/form-data">
    <fieldset>
        <legend>회원가입</legend>

        <div class="top-buttons">
            <a href="3team_login.php" class="btn-primary">로그인</a>
            <a href="3team_login_process.php" class="btn-primary">회원가입</a>
        </div>

        <br><br>

        이름 : <br>
        <input type="text" name="UNAME"
            placeholder="이름을 입력해 주세요"
            required><br><br>

        아이디 (학번 또는 사번) : <br>
        <input type="text" name="UID"
            placeholder="아이디를 입력해 주세요"
            required><br><br>

        이메일 : <br>
        <input type="email" name="EMAIL"
            placeholder="이메일을 입력해 주세요"
            required><br><br>

        전화번호 : <br>
        <input type="tel" name="CALL"
            placeholder="전화번호를 입력해 주세요"
            required><br><br>

        비밀번호 : <br>
        <input type="password" name="UPW"
            placeholder="비밀번호를 입력해 주세요"
            required><br><br>

        비밀번호 확인 : <br>
        <input type="password" name="UPW2"
        placeholder="비밀번호를 다시 입력해 주세요"
        required><br><br>

        <input type="checkbox" name="c1"
        value="AGREEMENT"
        required>

        이용약관 및 개인정보처리방침에 동의합니다<br><br>

        <div class="submit-area">
            <button type="submit" class="btn-primary">회원가입</button>
        </div>

        <p class="info">
            학생, 교직원 로그인 할 수 있습니다. <br>
            로그인 문의는 행정지원팀으로 문의 바랍니다.
        </p>
    </fieldset>
</form>
</body>
</html>
