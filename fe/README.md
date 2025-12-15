# Todo Frontend (Bootstrap)

Bootstrap과 순수 JavaScript로 만든 Todo 프론트엔드입니다.

## 시작하기

### 방법 1: http-server 사용 (권장)

```bash
# 의존성 설치
npm install

# 서버 실행
npm start
```

브라우저가 자동으로 열리고 `http://localhost:3001`에서 접근할 수 있습니다.

### 방법 2: Python 간단 서버

```bash
# Python 3
python3 -m http.server 3001

# Python 2
python -m SimpleHTTPServer 3001
```

### 방법 3: VS Code Live Server

VS Code의 Live Server 확장 프로그램을 사용할 수도 있습니다.

## 주의사항

- 백엔드 서버(`be`)가 `http://localhost:3000`에서 실행 중이어야 합니다.
- CORS 설정이 되어 있어야 합니다 (백엔드에 이미 설정되어 있습니다).

## 기능

- ✅ Todo 목록 조회
- ✅ 새 Todo 추가
- ✅ Todo 완료 상태 토글
- ✅ Todo 삭제
- ✅ 통계 표시 (전체/완료/미완료)

