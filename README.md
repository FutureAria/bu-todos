# Todo 앱 프로젝트

Express 백엔드와 Bootstrap 프론트엔드로 구성된 간단한 Todo 서비스입니다.

## 📁 프로젝트 구조

```
base-be/
├── be/          # Express 백엔드 (API 서버)
│   ├── app.js
│   ├── routes/
│   │   └── todos.js
│   └── package.json
├── fe/          # Bootstrap 프론트엔드
│   ├── index.html
│   ├── app.js
│   ├── styles.css
│   └── package.json
└── README.md
```

## 🚀 시작하기

### 1. 백엔드 실행

```bash
cd be
npm install
npm start
```

백엔드 서버가 `http://localhost:3000`에서 실행됩니다.

### 2. 프론트엔드 실행

새 터미널에서:

```bash
cd fe
npm install
npm start
```

프론트엔드가 `http://localhost:3001`에서 실행되고 브라우저가 자동으로 열립니다.

## 📚 기술 스택

### 백엔드 (be/)
- **Express.js** - Node.js 웹 프레임워크
- RESTful API 설계
- CORS 설정 (프론트엔드와 통신)

### 프론트엔드 (fe/)
- **Bootstrap 5** - CSS 프레임워크
- **순수 JavaScript** - 프레임워크 없이 구현
- Fetch API를 사용한 HTTP 요청

## 🔌 API 엔드포인트

### Todo API

- `GET /api/todos` - 모든 Todo 조회
- `GET /api/todos/:id` - 특정 Todo 조회
- `POST /api/todos` - 새 Todo 생성
- `PUT /api/todos/:id` - Todo 수정
- `DELETE /api/todos/:id` - Todo 삭제

## ✨ 기능

- ✅ Todo 목록 조회
- ✅ 새 Todo 추가
- ✅ Todo 완료 상태 토글
- ✅ Todo 삭제
- ✅ 통계 표시 (전체/완료/미완료)
- ✅ 반응형 디자인 (Bootstrap)

## 📖 배울 수 있는 개념

### 백엔드
- Express 기본 사용법
- RESTful API 설계
- CRUD 작업 구현
- 에러 처리 및 입력 검증
- CORS 설정

### 프론트엔드
- Bootstrap 컴포넌트 사용
- Fetch API를 사용한 비동기 요청
- DOM 조작
- 이벤트 처리

## 🔧 개발 팁

### 백엔드 개발 모드
```bash
cd be
npm run dev  # nodemon 사용 (파일 변경 시 자동 재시작)
```

### 프론트엔드 개발
- 브라우저 개발자 도구의 Network 탭에서 API 요청 확인 가능
- Console 탭에서 에러 메시지 확인 가능

## 📝 참고사항

- 현재는 인메모리 저장소를 사용하므로 서버를 재시작하면 데이터가 초기화됩니다.
- 실제 프로덕션 환경에서는 데이터베이스를 사용해야 합니다.
- CORS 설정이 되어 있어 백엔드와 프론트엔드가 다른 포트에서 실행됩니다.
