<?php
    include 'connection.php';
    $stu_id = $_GET['id'];
    $title = $_POST['title'];
    $des = $_POST['des'];
    $sql = "UPDATE notes SET title ='{$title}', des ='{$des}'WHERE id = {$stu_id}";

if (mysqli_query($conn, $sql)) {
  header ("Location:http://localhost/ToDoList/index.php");
} else {
  echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>