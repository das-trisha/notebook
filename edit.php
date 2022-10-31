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
    <h2>Edit Note</h2>
    <?php
    include 'connection.php';
    $stu_id = $_GET['id'];
    //echo $stu_id;
    $sql = "SELECT * FROM `notes` WHERE id ={$stu_id}";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
    ?>
        <form action="update.php?id=<?php echo "$stu_id" ?>" method="post" class="notes_form">
          <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="<?php echo $row['title']; ?>" required>
          </div>
          <div class="mb-3">
            <label for="des" class="form-label">Description</label>
            <textarea class="form-control" id="des" name="des" rows="10" required><?php echo $row['des'] ?></textarea>
          </div>
          <button type="submit" class="btn btn-primary" name="send">Update Note</button>
        </form>
    <?php
      }
    }
    ?>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>