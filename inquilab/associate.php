<?php  
// INSERT INTO `notes` (`sno`, `title`, `description`, `tstamp`) VALUES (NULL, 'But Books', 'Please buy books from Store', current_timestamp());
$insert = false;
$update = false;

// Connect to the Database 
$servername = "localhost";
$username = "root";
$password = "";
$database = "inquilabdb";

$title='';
$strength='';
$progress='';
$analytics='';
// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Die if connection was not successful
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
if (isset( $_POST['edit'])){
  // Update the record
    $sno = $_POST["portalEdit"];
   
    $progress = $_POST["progressEdit"];
    if($progress==5)
    $st= "Completed";
    else if($progress==0)
    $st= "Yet to start";
    else
    $st= "In progress";

  // Sql query to be executed
  $sql = "UPDATE portal SET progress=$progress, status='$st' WHERE portal.portalid = $sno";
  $result = mysqli_query($conn, $sql);
  if($result){
    $update = true;
}
else{
    echo "We could not update the record successfully";
}
}
else{
  $target='images/';
  $file='';
  $file_tmp='';
  $data='';
    foreach($_FILES['profileImage']['name'] as $key=>$val)
    {
      $file=$_FILES['profileImage']['name'][$key];
      $file_tmp=$_FILES['profileImage']['tmp_name'][$key];
      move_uploaded_file($file_tmp,$target.$file);
      $data .=$file." ";

    }
    $title = $_POST["title"];
    $strength = $_POST["strength"];
    $progress = $_POST["progress"];
    $analytics = $_POST["analytics"];
 
  // Sql query to be executed
  $sql = "INSERT INTO portal (title, strength,progress,analytics,images) VALUES ('$title', $strength,$progress,'$analytics','$data')";
  $result = mysqli_query($conn, $sql);

   
  if($result){ 
      $insert = true;
  }
  else{
      echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
  } 
}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <!-- build:css css/main.css -->
    <link rel="stylesheet" href="css/studentdashboard.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap-grid.css">
    <link rel="stylesheet" href="css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="css/bootstrap-reboot.css">
    <link rel="stylesheet" href="css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="css/style.css" type="text/css">
    <!-- endbuild -->

    <title>Home page</title>
</head>
  

<body>

    <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">INQUILABS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">DASHBOARD <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">ANALYSIS</a>
      </li>
     
      <li class="nav-item">
        <a class="nav-link disabled" href="#" style="margin-left: 400px;">LOGOUT</a>
      </li>
    </ul>
  </div>
</nav>
        </header>
        <br/>
        <br/>
        <div class="container">
            <span>&nbsp;</span>
            <div class="row">
                  <div class="card  justify-align-center">
                        <div class="row">
                            <div class="col-sm-3">
                                    <img class="card-img-left" src="https://via.placeholder.com/150" alt="Card image cap" style="margin:20px">
                            </div>


                            <div class="col-sm-5">
                                <div class="card" style="margin:20px;">
                                <div class="card-body">
                                    <h5 class="card-title">Name of the Student</h5>
                                    <p class="card-text"></p>
                                    <h3></h3>
                                </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card" style="margin:20px;">
                                <div class="card-body">
                                    <h5 class="card-title">Ranking given to Student Teacher</h5>
                                    <p class="card-text"><i class="fas fa-star"></i><i class="fas fa-star"></i></p>
                                    <h3></h3>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>

        </div>
       

  <!-- Edit Modal -->
  <div class="container">
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit this Note</h5>
        
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="/inquilab/studentportal.php" method="POST">
          <div class="modal-body">
            <input type="hidden" name="portalEdit" id="portalEdit">
           

           
            <div class="form-group">
              <label for="desc">Progress(1-5)</label>
              <input  class="form-control" id="progressEdit" value="<?php echo $progress;?>" name="progressEdit" rows="3">
            </div> 
           
            
          </div>
          <div class="modal-footer d-block mr-auto">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="edit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


  <?php
  if($insert){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your note has been inserted successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>
  
  <?php
  if($update){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your note has been updated successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>
  <div class="container my-4">
    <h2>Add a Note to iNotes</h2>
    <form action="/inquilab/studentportal.php" method="POST"  enctype="multipart/form-data">
    <div class="form-group">
                      <img src="images/profile.png" onclick="triggerClick()" id="profileDisplay">   
                    <label for="profileImage">Product image</label>
                         <input type="file" name="profileImage[]"  onchange="displayImage(this)" id="profileImage" style="display:none;" class="form-control" multiple>
                      </div>

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
          
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
</div>
  <div class="container my-4">


    <table class="table" id="myTable">
      <thead>
        <tr>
          <th scope="col">S.No</th>
          <th scope="col">teacher</th>
          <th scope="col">team</th>
          <th scope="col">current progress</th>
          <th scope="col">expected progress</th>
          <th scope="col">Status</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $sql = "SELECT * FROM `portal`";
          $result = mysqli_query($conn, $sql);
          $sno = 0;
          while($row = mysqli_fetch_assoc($result)){
            $sno = $sno + 1;
            $val=$row['progress'];
            if($val==5)
            $st= "Completed";
            else if($val==0)
            $st= "Yet to start";
            else
            $st= "In progress";
            echo "<tr>
            <th scope='row'>". $sno . "</th>
            <td>". $row['title'] . "</td>
            <td>". $row['strength'] . "</td>
            <td>". $row['progress'] . "</td>
            <td>". $row['analytics'] . "</td>
            <td>". $st . "</td>
            <td> <button class='edit btn btn-sm btn-primary' id=".$row['portalid'].">Edit</button>   </td>
            <td> <button class='edit btn btn-sm btn-primary' ><a href= 'https://forms.gle/JAPVzYmwf1wZJJPx9'>Feedback</a></button>  </td>
          </tr>";
        } 
          ?>


      </tbody>
    </table>
  </div>
  <hr>
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
    $(document).ready(function () {
      $('#myTable').DataTable();

    });
  </script>
  <script>
    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ");
        tr = e.target.parentNode.parentNode;
        title = tr.getElementsByTagName("td")[0].innerText;
        description = tr.getElementsByTagName("td")[1].innerText;
        console.log(title, description);
       
        progressEdit.value = progress;
       
        portalEdit.value = e.target.id;
        console.log(e.target.id)
        $('#editModal').modal('toggle');
      })
    })

   
  </script>

<script>

function triggerClick() {
    document.querySelector('#profileImage').click();

}

function displayImage(e){
    if(e.files[0]){
        var reader =new FileReader();


        reader.onload=function(e){
            document.querySelector('#profileDisplay').setAttribute('src',e.target.result);

        }
        reader.readAsDataURL(e.files[0]);
    }
}
</script>