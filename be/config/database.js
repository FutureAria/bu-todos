const mysql = require("mysql2/promise");
require("dotenv").config();

// 데이터베이스 연결 설정
const dbConfig = {
  host: process.env.DB_HOST,
  port: parseInt(process.env.DB_PORT),
  user: process.env.DB_USER,
  password: process.env.DB_PASSWORD,
  database: process.env.DB_NAME,
  waitForConnections: true,
  connectionLimit: 10,
  queueLimit: 0,
};

// Connection pool 생성
const pool = mysql.createPool(dbConfig);

// 연결 테스트
async function testConnection() {
  try {
    const connection = await pool.getConnection();
    console.log("✅ MySQL 데이터베이스 연결 성공");
    connection.release();
    return true;
  } catch (error) {
    console.error("❌ MySQL 데이터베이스 연결 실패:", error.message);
    return false;
  }
}

module.exports = {
  pool,
  testConnection,
};
