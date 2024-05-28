<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Note 34</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
</head>
<body>
<div id="flatground">
    <h1>Note 34</h1>
    <div class="menu">
        <form>
            <div id="logout">
                <button type="button" onclick="logout()">Logout</button>
            </div>
            <div id="newnote">
                <textarea id="taskInput" placeholder="Add new note" rows="4" cols="100"></textarea>
                <button type="button" onclick="addTask()">Add note</button>
                <label for="search">Search notes:</label>
                <input type="text" id="search" name="search" class="searchbar">
                <button type="button" onclick="searchNotes()">Search</button><br>
                <ul id="taskList">
                    <?php include 'display_notes.php'; ?>
                </ul>
            </div>
        </form>
    </div>
</div>
<div id="background"></div>
<script src="script.js"></script>
</body>
</html>