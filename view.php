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
    <?php
    include 'connection.php';
    include 'navbar.php';
    ?>
    <div class="mx-auto my-4" style="width:70vw;">
        <?php

        $stu_id = $_GET['id'];
        //echo $stu_id;
        $sql = "SELECT title, des FROM `notes` WHERE id ={$stu_id}";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            $sno = 0;
            while ($row = $result->fetch_assoc()) {
                $sno = $sno + 1;
                echo "<h2>".$row['title']."</h2><br>
                <p>".$row['des']."</p>
                <button class='btn btn-secondary'><a style='color:white;text-decoration:none;' href='edit.php?id=". $stu_id . "'>Edit Note</a></button>";
            }
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>