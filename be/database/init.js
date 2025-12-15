const mysql = require("mysql2/promise");
const fs = require("fs");
const path = require("path");
require("dotenv").config();

const dbConfigWithoutDatabase = {
  host: process.env.DB_HOST,
  port: parseInt(process.env.DB_PORT),
  user: process.env.DB_USER,
  password: process.env.DB_PASSWORD,
};

async function databaseExists(connection) {
  try {
    const [rows] = await connection.query(
      `SELECT SCHEMA_NAME FROM information_schema.SCHEMATA WHERE SCHEMA_NAME = ?`,
      [process.env.DB_NAME]
    );
    return rows.length > 0;
  } catch (error) {
    console.error("데이터베이스 존재 여부 확인 실패:", error.message);
    return false;
  }
}

async function createDatabase(connection) {
  try {
    await connection.query(
      `CREATE DATABASE IF NOT EXISTS ${process.env.DB_NAME} CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci`
    );
    console.log(`✅ 데이터베이스 '${process.env.DB_NAME}'가 생성되었습니다.`);
    return true;
  } catch (error) {
    console.error("❌ 데이터베이스 생성 실패:", error.message);
    return false;
  }
}

async function tableExists(connection, tableName) {
  try {
    await connection.query(`USE ${process.env.DB_NAME}`);
    const [rows] = await connection.query(
      `SELECT COUNT(*) as count FROM information_schema.tables 
       WHERE table_schema = ? AND table_name = ?`,
      [process.env.DB_NAME, tableName]
    );
    return rows[0].count > 0;
  } catch (error) {
    console.error("테이블 존재 여부 확인 실패:", error.message);
    return false;
  }
}

async function createTables(connection) {
  try {
    await connection.query(`USE ${process.env.DB_NAME}`);

    if (await tableExists(connection, "todos")) {
      console.log("✅ todos 테이블이 이미 존재합니다.");
      return true;
    }

    console.log("📦 todos 테이블이 없습니다. 자동 생성 중...");

    const createTableSQL = `
      CREATE TABLE IF NOT EXISTS todos (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        completed BOOLEAN DEFAULT FALSE,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        INDEX idx_completed (completed),
        INDEX idx_created_at (created_at)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
    `;

    await connection.query(createTableSQL);
    console.log("✅ todos 테이블이 성공적으로 생성되었습니다.");

    return true;
  } catch (error) {
    console.error("❌ 테이블 생성 실패:", error.message);
    return false;
  }
}

async function initializeDatabase() {
  let connection;

  try {
    connection = await mysql.createConnection(dbConfigWithoutDatabase);
    console.log("📦 데이터베이스 초기화 시작...");

    const dbExists = await databaseExists(connection);

    if (!dbExists) {
      console.log(
        `📦 데이터베이스 '${process.env.DB_NAME}'가 없습니다. 자동 생성 중...`
      );
      const created = await createDatabase(connection);
      if (!created) {
        throw new Error("데이터베이스 생성 실패");
      }
    } else {
      console.log(
        `✅ 데이터베이스 '${process.env.DB_NAME}'가 이미 존재합니다.`
      );
    }

    await createTables(connection);

    const sqlFile = path.join(__dirname, "init.sql");
    if (fs.existsSync(sqlFile)) {
      const sql = fs.readFileSync(sqlFile, "utf8");
      const statements = sql
        .split(";")
        .map((stmt) => stmt.trim())
        .filter((stmt) => stmt.length > 0 && !stmt.startsWith("--"));

      for (const statement of statements) {
        if (
          statement &&
          !statement.includes("CREATE DATABASE") &&
          !statement.includes("USE ")
        ) {
          await connection.query(`USE ${process.env.DB_NAME}`);
          await connection.query(statement);
        }
      }
    }

    console.log("✅ 데이터베이스 초기화 완료!");
    console.log(`   - 데이터베이스: ${process.env.DB_NAME}`);
    console.log("   - 테이블: todos");
  } catch (error) {
    console.error("❌ 데이터베이스 초기화 실패:", error.message);
    throw error;
  } finally {
    if (connection) {
      await connection.end();
    }
  }
}

if (require.main === module) {
  initializeDatabase()
    .then(() => {
      process.exit(0);
    })
    .catch((error) => {
      console.error(error);
      process.exit(1);
    });
}

module.exports = initializeDatabase;
