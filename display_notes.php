<?php
session_start();
require_once('db.php');

if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM notes WHERE user_id = $user_id";

// Check if a search query is provided
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search = mysqli_real_escape_string($conn, $_GET['search']);
    $sql .= " AND note LIKE '%$search%'";
}

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<ul id='taskList'>";
        while ($row = mysqli_fetch_assoc($result)) {
            $note_id = $row['ID'];
            $note = $row['note'];
            echo "<li id='note_$note_id'><span>$note</span><button onclick='deleteNote($note_id)'>Delete</button><button onclick='editNote($note_id)'>Edit</button></li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No notes found.</p>";
    }
} else {
    header("Location: index.php");
    exit();
}
?>