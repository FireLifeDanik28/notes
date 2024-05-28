function deleteNote(noteId) {
    if (confirm("Are you sure you want to delete this note?")) {
        fetch("delete_note.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: "note_id=" + encodeURIComponent(noteId)
        })
        .then(response => {
            if (response.ok) {
                document.getElementById("note_" + noteId).remove();
            } else {
                console.error("Failed to delete note:", response.statusText);
            }
        })
        .catch(error => {
            console.error("Error deleting note:", error);
        });
    }
    location.reload(); // Reload the page after interaction
    }


    function logout() {
        window.location.href = "index.html";
    }

    function editNote(noteId) {
    var newNote = prompt("Enter the new text for this note:");
    if (newNote !== null && newNote.trim() !== "") {
        fetch("edit_note.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: "note_id=" + encodeURIComponent(noteId) + "&note=" + encodeURIComponent(newNote)
        })
        .then(response => {
            if (response.ok) {
                document.querySelector("#note_" + noteId + " span").textContent = newNote;
            } else {
                console.error("Failed to edit note:", response.statusText);
            }
        })
        .catch(error => {
            console.error("Error editing note:", error);
        });
    }
    location.reload(); // Reload the page after interaction
    }

    function addTask() {
        var taskInput = document.getElementById("taskInput");
        if (taskInput.value.trim() !== "") {
            var noteText = taskInput.value;
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "add_note.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    if (xhr.responseText === "success") {
                        var taskList = document.getElementById("taskList");
                        var newTask = document.createElement("li");
                        var noteId = Date.now(); // Use a unique ID for the new note
                        newTask.id = "note_" + noteId;
                        var span = document.createElement("span");
                        span.textContent = noteText;
                        newTask.appendChild(span);
                        var deleteButton = document.createElement("button");
                        deleteButton.textContent = "Delete";
                        deleteButton.onclick = function() { deleteNote(noteId); };
                        newTask.appendChild(deleteButton);
                        var editButton = document.createElement("button");
                        editButton.textContent = "Edit";
                        editButton.onclick = function() { editNote(noteId); };
                        newTask.appendChild(editButton);
                        taskList.appendChild(newTask);
                        taskInput.value = "";
                    } else {
                        console.error("Failed to add note: " + xhr.responseText);
                    }
                }
            };
            xhr.send("note=" + encodeURIComponent(noteText));
        }
        location.reload(); // Reload the page after interaction
    }


    function searchNotes() {
        var search = document.getElementById("search").value;
        window.location.href = "notes.php?search=" + encodeURIComponent(search);
    }