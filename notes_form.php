<?php
include 'connection.php';
if (isset($_POST['send'])) {
    $title = $_POST['title'];
    $des = $_POST['des'];

    $title = str_replace("'", "''", $title);
    $des = str_replace("'", "''", $des);

    $requests  = "INSERT INTO notes (title, des) VALUES ('" . $title . "','" . $des . "')";
    if ($conn->query($requests) === TRUE) {
        header("Location:http://localhost/ToDoList/index.php");
    } else {
        echo "Error: " . $requests . "<br>" . $conn->error;
    }
}
$conn->close();
