
const API_URL = "api/tasks.php";

// Obtener los elementos HTML que necesitamos
const form = document.getElementById("task-form");
const titleInput = document.getElementById("title");
const descriptionInput = document.getElementById("description");
const priorityInput = document.getElementById("priority");
const taskList = document.getElementById("task-list");
const message = document.getElementById("message");

// Mostrar un mensaje al usuario
function showMessage(text) {
    message.textContent = text;
}

// Consultar todas las tareas al cargar la página
async function loadTasks() {
    try {
        const response = await fetch(API_URL);

        // fetch no falla automáticamente con un HTTP 500 o 404
        if (!response.ok) {
            throw new Error("No se pudieron cargar las tareas");
        }

        const tasks = await response.json();

        renderTasks(tasks);
    } catch (error) {
        showMessage(error.message);
    }
}

// Dibujar la lista de tareas en el HTML
function renderTasks(tasks) {
    taskList.replaceChildren();

    if (tasks.length === 0) {
        const emptyItem = document.createElement("li");
        emptyItem.textContent = "No hay tareas todavía.";
        taskList.appendChild(emptyItem);
        return;
    }

    tasks.forEach(task => {
        const li = document.createElement("li");
        li.classList.add("task-item");

        // Añadir una clase según el estado
        if (task.status === "completada") {
            li.classList.add("completed");
        }

        const title = document.createElement("p");
        title.classList.add("task-title");

        // textContent evita interpretar el título como HTML
        title.textContent = task.title;

        const details = document.createElement("p");
        details.classList.add("task-meta");
        details.textContent =
            `Prioridad: ${task.priority} | Estado: ${task.status}`;

        const actions = document.createElement("div");
        actions.classList.add("task-actions");

        // Botón para cambiar el estado
        const completeButton = document.createElement("button");
        completeButton.textContent =
            task.status === "completada"
                ? "Marcar pendiente"
                : "Completar";

        completeButton.addEventListener("click", () => {
            toggleTask(task);
        });

        // Botón para eliminar
        const deleteButton = document.createElement("button");
        deleteButton.textContent = "Eliminar";

        deleteButton.addEventListener("click", () => {
            deleteTask(task.id);
        });

        actions.append(completeButton, deleteButton);
        li.append(title, details, actions);
        taskList.appendChild(li);
    });
}

// Crear una tarea cuando se envía el formulario
form.addEventListener("submit", async event => {
    event.preventDefault();

    const title = titleInput.value.trim();
    const description = descriptionInput.value.trim();
    const priority = priorityInput.value;

    // Validación básica en el navegador
    if (!title) {
        showMessage("El título es obligatorio.");
        return;
    }

    try {
        const response = await fetch(API_URL, {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({
                title,
                description,
                priority
            })
        });

        const data = await response.json();

        if (!response.ok) {
            throw new Error(data.error || "Error al crear la tarea");
        }

        form.reset();
        showMessage("Tarea creada correctamente.");

        // Volver a consultar los datos guardados
        await loadTasks();
    } catch (error) {
        showMessage(error.message);
    }
});

// Cambiar una tarea de pendiente a completada, o viceversa
async function toggleTask(task) {
    const newStatus =
        task.status === "completada" ? "pendiente" : "completada";

    try {
        const response = await fetch(`${API_URL}?id=${task.id}`, {
            method: "PATCH",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({ status: newStatus })
        });

        const data = await response.json();

        if (!response.ok) {
            throw new Error(data.error || "Error al actualizar");
        }

        await loadTasks();
    } catch (error) {
        showMessage(error.message);
    }
}

// Eliminar una tarea
async function deleteTask(id) {
    // Pedir confirmación antes de eliminar
    if (!confirm("¿Quieres eliminar esta tarea?")) {
        return;
    }

    try {
        const response = await fetch(`${API_URL}?id=${id}`, {
            method: "DELETE"
        });

        const data = await response.json();

        if (!response.ok) {
            throw new Error(data.error || "Error al eliminar");
        }

        showMessage("Tarea eliminada.");
        await loadTasks();
    } catch (error) {
        showMessage(error.message);
    }
}

// Cargar los datos al iniciar la aplicación
loadTasks();
