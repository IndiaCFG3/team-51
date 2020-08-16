<?php
if(isset($_POST['addteams'])){
  $title = $_POST["title"];
  $strength = $_POST["strength"];
  $progress = $_POST["progress"];
  $analytics = $_POST["analytics"];

// Sql query to be executed
$sql = "INSERT INTO portal (title, strength,progress,analytics) VALUES ('$title', $strength,$progress,'$analytics')";
$result = mysqli_query($conn, $sql);

 
if($result){ 
    $insert = true;
}
else{
    echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
} 
}

?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">


  <title>iNotes - Notes taking made easy</title>

</head>

<body>
 
<div class="container my-4">
    <h2>Add a Note to iNotes</h2>
    <form action="/inquilab/studentportal.php" method="POST">
    <div class="form-group">
              <label for="title">Team Modules</label>
              <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
            </div>

            <div class="form-group">
              <label for="desc">Class Strength</label>
              <textarea class="form-control" id="strength" name="strength" rows="3"></textarea>
            </div> 
            <div class="form-group">
              <label for="desc">Progress</label>
              <textarea class="form-control" id="progress" name="progress" rows="3"></textarea>
            </div> 
            <div class="form-group">
              <label for="desc">Analytics</label>
              <textarea class="form-control" id="analytics" name="analytics" rows="3"></textarea>
            </div> 
            
          </div>
          <div class="modal-footer d-block mr-auto">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button name="addteams" type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
</body>
</html>
<!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script>