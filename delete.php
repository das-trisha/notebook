<?php
    include 'connection.php';
    $stu_id = $_GET['id'];
    $sql = "DELETE FROM notes WHERE id = {$stu_id}";
    if (mysqli_query($conn, $sql)) {
  header("Location:http://localhost/ToDoList/index.php");
  } else {
  echo "Error updating record: " . mysqli_error($conn);
  }
   mysqli_close($conn);
?>