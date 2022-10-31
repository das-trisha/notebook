<?php
include 'connection.php';
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="shortcut icon" href="./images/logo.png" type="image/x-png">
  <title>Notebook - Organizing notes made easy</title>
</head>

<body>
  <?php include 'navbar.php' ?>
  <div class="container my-3">
    <form action="notes_form.php" method="post">
      <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title" aria-describedby="notetitle" required>
      </div>
      <div class="mb-3">
        <label for="des" class="form-label">Description</label>
        <textarea class="form-control" id="des" name="des" rows="3" required></textarea>
      </div>
      <button type="submit" class="btn btn-primary" name="send">Add Note</button>
    </form>
  </div>
  <div class="container">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">S.No.</th>
          <th scope="col">Title</th>
          <th scope="col">Description</th>
          <th scope="col">Date</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM `notes`";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          // output data of each row
          $sno = 0;
          while ($row = $result->fetch_assoc()) {
            $sno = $sno + 1;
            echo "<tr><td>" . $sno . "</td>
        <td>" . $row['title'] . "</td>
        <td class='d-inline-block text-truncate' style='max-width:40vw;'>" . $row['des'] . "</td>
        <td>" . $row['tstamp'] . "</td>
        <td>
        <button class='btn btn-secondary'><a style='color:white;text-decoration:none;' href='view.php?id=" . $row['id'] . "'>View</a></button>
        <button class='btn btn-primary'><a style='color:white;text-decoration:none;' href='edit.php?id=" . $row['id'] . "'>Edit</a></button>
        <button class='btn btn-danger'><a style='color:white;text-decoration:none;' href='delete.php?id=" . $row['id'] . "'>Delete</a></button></td>
        </tr>";
          }
        }

        ?>
      </tbody>
    </table>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>