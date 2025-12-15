# Todo API (Backend)

Express와 MySQL로 만든 Todo API 서비스입니다.

## 📋 사전 요구사항

- Node.js (v14 이상)
- MySQL (v5.7 이상 또는 v8.0 이상)

## 🚀 시작하기

### 1. MySQL 설치 및 실행

MySQL이 설치되어 있고 실행 중이어야 합니다.

### 2. 환경 변수 설정

`.env.example` 파일을 참고하여 `.env` 파일을 생성하세요:

```bash
cp .env.example .env
```

`.env` 파일을 열어서 MySQL 설정을 수정하세요:

```env
DB_HOST=localhost
DB_USER=root
DB_PASSWORD=your_password
DB_NAME=todo_db
PORT=3000
```

### 3. 의존성 설치

```bash
npm install
```

### 4. 데이터베이스 초기화

데이터베이스와 테이블을 자동으로 생성합니다:

```bash
npm run init-db
```

이 명령어는 다음을 수행합니다:
- `todo_db` 데이터베이스 생성
- `todos` 테이블 생성
- 초기 샘플 데이터 삽입

### 5. 서버 실행

```bash
# 일반 실행
npm start

# 개발 모드 (nodemon 사용 - 파일 변경 시 자동 재시작)
npm run dev
```

서버가 `http://localhost:3000`에서 실행됩니다.

## 📊 데이터베이스 구조

### todos 테이블

| 컬럼명      | 타입      | 설명                    |
| ----------- | --------- | ----------------------- |
| id          | INT       | 기본 키 (자동 증가)      |
| title       | VARCHAR   | Todo 제목               |
| completed   | BOOLEAN   | 완료 여부 (기본값: false) |
| created_at  | TIMESTAMP | 생성 시간               |
| updated_at  | TIMESTAMP | 수정 시간 (자동 업데이트) |

## 🔌 API 엔드포인트

- `GET /api/todos` - 모든 Todo 조회
- `GET /api/todos/:id` - 특정 Todo 조회
- `POST /api/todos` - 새 Todo 생성
- `PUT /api/todos/:id` - Todo 수정
- `DELETE /api/todos/:id` - Todo 삭제

## 📝 API 사용 예시

### Todo 생성

```bash
curl -X POST http://localhost:3000/api/todos \
  -H "Content-Type: application/json" \
  -d '{"title": "새로운 할 일", "completed": false}'
```

### Todo 수정

```bash
curl -X PUT http://localhost:3000/api/todos/1 \
  -H "Content-Type: application/json" \
  -d '{"completed": true}'
```

### Todo 삭제

```bash
curl -X DELETE http://localhost:3000/api/todos/1
```

## 🛠️ 문제 해결

### 데이터베이스 연결 실패

1. MySQL이 실행 중인지 확인하세요.
2. `.env` 파일의 데이터베이스 설정이 올바른지 확인하세요.
3. MySQL 사용자에게 데이터베이스 생성 권한이 있는지 확인하세요.

### 테이블이 없는 경우

다시 초기화를 실행하세요:

```bash
npm run init-db
```

## 📖 학습 포인트

이 프로젝트를 통해 다음을 배울 수 있습니다:

- Express와 MySQL 연동
- Connection Pool 사용
- 비동기 데이터베이스 쿼리 (async/await)
- 환경 변수 관리 (dotenv)
- SQL 쿼리 작성
