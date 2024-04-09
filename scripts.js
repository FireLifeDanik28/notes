function addTask() {
    var taskInput = document.getElementById("taskInput");
    var taskList = document.getElementById("taskList");
    if (taskInput.value.trim() !== "") {
        var newTask = document.createElement("li");
        newTask.textContent = taskInput.value;
        taskList.appendChild(newTask);
        taskInput.value = "";
    }
}

function clearTasks() {
    var taskList = document.getElementById("taskList");
    taskList.innerHTML = "";
}