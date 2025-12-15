const express = require("express");
const router = express.Router();
const { pool } = require("../config/database");

function formatTodo(todo) {
  return {
    ...todo,
    completed: Boolean(todo.completed),
  };
}

router.get("/", async (req, res) => {
  try {
    const [todos] = await pool.query(
      "SELECT id, title, completed, created_at as createdAt, updated_at as updatedAt FROM todos ORDER BY created_at DESC"
    );

    res.json({
      success: true,
      data: todos.map(formatTodo),
      count: todos.length,
    });
  } catch (error) {
    console.error("Error fetching todos:", error);
    res.status(500).json({
      success: false,
      error: "Todo 목록을 가져오는데 실패했습니다.",
    });
  }
});

router.get("/:id", async (req, res) => {
  try {
    const id = parseInt(req.params.id);
    const [todos] = await pool.query(
      "SELECT id, title, completed, created_at as createdAt, updated_at as updatedAt FROM todos WHERE id = ?",
      [id]
    );

    if (todos.length === 0) {
      return res.status(404).json({
        success: false,
        error: "Todo를 찾을 수 없습니다.",
      });
    }

    res.json({
      success: true,
      data: formatTodo(todos[0]),
    });
  } catch (error) {
    console.error("Error fetching todo:", error);
    res.status(500).json({
      success: false,
      error: "Todo를 가져오는데 실패했습니다.",
    });
  }
});

router.post("/", async (req, res) => {
  try {
    const { title, completed = false } = req.body;

    if (!title || title.trim() === "") {
      return res.status(400).json({
        success: false,
        error: "title은 필수입니다.",
      });
    }

    const [result] = await pool.query(
      "INSERT INTO todos (title, completed) VALUES (?, ?)",
      [title.trim(), Boolean(completed)]
    );

    const [newTodo] = await pool.query(
      "SELECT id, title, completed, created_at as createdAt, updated_at as updatedAt FROM todos WHERE id = ?",
      [result.insertId]
    );

    res.status(201).json({
      success: true,
      message: "Todo가 생성되었습니다.",
      data: formatTodo(newTodo[0]),
    });
  } catch (error) {
    console.error("Error creating todo:", error);
    res.status(500).json({
      success: false,
      error: "Todo 생성에 실패했습니다.",
    });
  }
});

router.put("/:id", async (req, res) => {
  try {
    const id = parseInt(req.params.id);
    const { title, completed } = req.body;

    const [existingTodos] = await pool.query(
      "SELECT * FROM todos WHERE id = ?",
      [id]
    );

    if (existingTodos.length === 0) {
      return res.status(404).json({
        success: false,
        error: "Todo를 찾을 수 없습니다.",
      });
    }

    if (title === undefined && completed === undefined) {
      return res.status(400).json({
        success: false,
        error: "수정할 필드(title 또는 completed)를 제공해주세요.",
      });
    }

    const updates = [];
    const values = [];

    if (title !== undefined) {
      if (title.trim() === "") {
        return res.status(400).json({
          success: false,
          error: "title은 비어있을 수 없습니다.",
        });
      }
      updates.push("title = ?");
      values.push(title.trim());
    }

    if (completed !== undefined) {
      updates.push("completed = ?");
      values.push(Boolean(completed));
    }

    values.push(id);

    await pool.query(
      `UPDATE todos SET ${updates.join(", ")} WHERE id = ?`,
      values
    );

    const [updatedTodos] = await pool.query(
      "SELECT id, title, completed, created_at as createdAt, updated_at as updatedAt FROM todos WHERE id = ?",
      [id]
    );

    res.json({
      success: true,
      message: "Todo가 수정되었습니다.",
      data: formatTodo(updatedTodos[0]),
    });
  } catch (error) {
    console.error("Error updating todo:", error);
    res.status(500).json({
      success: false,
      error: "Todo 수정에 실패했습니다.",
    });
  }
});

router.delete("/:id", async (req, res) => {
  try {
    const id = parseInt(req.params.id);
    const [todos] = await pool.query(
      "SELECT id, title, completed, created_at as createdAt, updated_at as updatedAt FROM todos WHERE id = ?",
      [id]
    );

    if (todos.length === 0) {
      return res.status(404).json({
        success: false,
        error: "Todo를 찾을 수 없습니다.",
      });
    }

    await pool.query("DELETE FROM todos WHERE id = ?", [id]);

    res.json({
      success: true,
      message: "Todo가 삭제되었습니다.",
      data: formatTodo(todos[0]),
    });
  } catch (error) {
    console.error("Error deleting todo:", error);
    res.status(500).json({
      success: false,
      error: "Todo 삭제에 실패했습니다.",
    });
  }
});

module.exports = router;
