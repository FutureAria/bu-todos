const API_BASE_URL = "http://localhost:3000/api/todos";

let todoForm;
let todoInput;
let todosContainer;
let emptyState;
let loadingSpinner;
let errorAlert;
let statsCard;
let totalCount;
let completedCount;
let pendingCount;

function showError(message) {
  if (!errorAlert) return;
  errorAlert.textContent = message;
  errorAlert.classList.remove("d-none");
  setTimeout(() => {
    errorAlert.classList.add("d-none");
  }, 5000);
}

function setLoading(loading) {
  if (!loadingSpinner || !todosContainer) return;
  if (loading) {
    loadingSpinner.classList.remove("d-none");
    todosContainer.innerHTML = "";
  } else {
    loadingSpinner.classList.add("d-none");
  }
}

function updateStats(todos) {
  if (!statsCard || !totalCount || !completedCount || !pendingCount) return;

  if (todos.length === 0) {
    statsCard.classList.add("d-none");
    return;
  }

  statsCard.classList.remove("d-none");
  const completed = todos.filter((t) => t.completed).length;
  const pending = todos.length - completed;

  totalCount.textContent = todos.length;
  completedCount.textContent = completed;
  pendingCount.textContent = pending;
}

function renderTodos(todos) {
  if (!todosContainer || !emptyState) return;

  if (todos.length === 0) {
    emptyState.classList.remove("d-none");
    todosContainer.innerHTML = "";
    return;
  }

  emptyState.classList.add("d-none");
  todosContainer.innerHTML = todos
    .map(
      (todo) => `
    <li class="list-group-item todo-item ${todo.completed ? "completed" : ""}">
      <div class="d-flex align-items-center">
        <input
          type="checkbox"
          class="form-check-input todo-checkbox me-3"
          ${todo.completed ? "checked" : ""}
          onchange="toggleTodo(${todo.id}, ${todo.completed})"
        />
        <span class="todo-title">${escapeHtml(todo.title)}</span>
        <button
          class="btn btn-danger btn-sm ms-auto"
          onclick="deleteTodo(${todo.id})"
        >
          <i class="bi bi-trash"></i> 삭제
        </button>
      </div>
    </li>
  `
    )
    .join("");
}

function escapeHtml(text) {
  const div = document.createElement("div");
  div.textContent = text;
  return div.innerHTML;
}

function handleFetchError(error) {
  if (
    error.message.includes("Failed to fetch") ||
    error.message.includes("fetch")
  ) {
    return "서버에 연결할 수 없습니다. 백엔드 서버(http://localhost:3000)가 실행 중인지 확인하세요.";
  }
  return error.message;
}

async function fetchTodos() {
  try {
    setLoading(true);
    const response = await fetch(API_BASE_URL);

    if (!response) {
      throw new Error("서버에 연결할 수 없습니다.");
    }

    const data = await response.json();

    if (!response.ok) {
      throw new Error("Todo 목록을 가져오는데 실패했습니다.");
    }

    renderTodos(data.data);
    updateStats(data.data);
  } catch (error) {
    showError(handleFetchError(error));
    console.error("Error fetching todos:", error);
  } finally {
    setLoading(false);
  }
}

async function addTodo(title) {
  try {
    const response = await fetch(API_BASE_URL, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ title, completed: false }),
    });

    if (!response) {
      throw new Error("서버에 연결할 수 없습니다.");
    }

    const data = await response.json();

    if (!response.ok) {
      throw new Error(data.error || "Todo 추가에 실패했습니다.");
    }

    if (todoInput) {
      todoInput.value = "";
    }
    await fetchTodos();
  } catch (error) {
    showError(handleFetchError(error) || "Todo 추가에 실패했습니다.");
    console.error("Error adding todo:", error);
  }
}

async function toggleTodo(id, currentCompleted) {
  try {
    const response = await fetch(`${API_BASE_URL}/${id}`, {
      method: "PUT",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ completed: !currentCompleted }),
    });

    const data = await response.json();

    if (!response.ok) {
      throw new Error(data.error || "Todo 수정에 실패했습니다.");
    }

    await fetchTodos();
  } catch (error) {
    showError(error.message || "Todo 수정에 실패했습니다.");
    console.error("Error updating todo:", error);
  }
}

async function deleteTodo(id) {
  if (!confirm("정말 삭제하시겠습니까?")) {
    return;
  }

  try {
    const response = await fetch(`${API_BASE_URL}/${id}`, {
      method: "DELETE",
    });

    if (!response.ok) {
      const data = await response.json();
      throw new Error(data.error || "Todo 삭제에 실패했습니다.");
    }

    await fetchTodos();
  } catch (error) {
    showError(error.message || "Todo 삭제에 실패했습니다.");
    console.error("Error deleting todo:", error);
  }
}

document.addEventListener("DOMContentLoaded", () => {
  todoForm = document.getElementById("todoForm");
  todoInput = document.getElementById("todoInput");
  todosContainer = document.getElementById("todosContainer");
  emptyState = document.getElementById("emptyState");
  loadingSpinner = document.getElementById("loadingSpinner");
  errorAlert = document.getElementById("errorAlert");
  statsCard = document.getElementById("statsCard");
  totalCount = document.getElementById("totalCount");
  completedCount = document.getElementById("completedCount");
  pendingCount = document.getElementById("pendingCount");

  if (todoForm) {
    todoForm.addEventListener("submit", async (e) => {
      e.preventDefault();
      const title = todoInput ? todoInput.value.trim() : "";

      if (!title) {
        showError("할 일을 입력해주세요.");
        return;
      }

      await addTodo(title);
    });
  }

  window.toggleTodo = toggleTodo;
  window.deleteTodo = deleteTodo;

  fetchTodos();
});
