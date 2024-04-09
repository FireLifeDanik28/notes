<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Notes</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='styles.css'>
    <script defer src="scripts.js"></script>
</head>
<body>
    <h1>Notes</h1>
    <input type="text" id="taskInput" placeholder="Add new note">
    <button onclick="addTask()">Add note</button>
    <ul id="taskList"></ul>
    <button onclick="clearTasks()">Clear all notes</button>
</body>
</html>