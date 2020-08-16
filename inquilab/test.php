<?php  
// INSERT INTO `notes` (`sno`, `title`, `description`, `tstamp`) VALUES (NULL, 'But Books', 'Please buy books from Store', current_timestamp());
$insert = false;
$update = false;

// Connect to the Database 
$servername = "localhost";
$username = "root";
$password = "";
$database = "inquilabdb";


// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Die if connection was not successful
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
 

  
    $studentteachername = $_POST["studentteachername"];
    $TeamAssign = $_POST["TeamAssign"];
    $CurrentProgress = $_POST["CurrentProgress"];
    $ExpectedProgress = $_POST["ExpectedProgress"];
 
  // Sql query to be executed
  $sql = "INSERT INTO aportal (studentteachername, TeamAssign,CurrentProgress,ExpectedProgress) VALUES ('$studentteachername', $TeamAssign,$CurrentProgress,$ExpectedProgress)";
  $result = mysqli_query($conn, $sql);

   
  if($result){ 
      $insert = true;
  }
  else{
      echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
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
        <nav class="navbar navbar-dark navbar-expand-sm fixed-top">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand mr-auto logoimg" href="#"><img src="images/logo.png" height="60" width="81"></a>

                <div class="collapse navbar-collapse" id="Navbar">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">Inqui-Lab Foundation</li>
                    </ul>
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a href="#"style="color:black">Dashboard</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a href="#"style="color:black">Analysis</a>
                        </li>
                    </ul>

                    <span class="navbar-text btn-sm bg-primary">
                        <a href="#" class="btn btn-primary"><span class="fa fa-sign-in"></span>Logout</a>

                    </span>

                </div>
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
    <form action="associate.php" method="POST" >
   

    <div class="form-group">
              <label for="title">STudent teacher</label>
              <input type="text" class="form-control" id="studentteachername" name="studentteachername" aria-describedby="emailHelp">
            </div>

            <div class="form-group">
              <label for="desc">team</label>
              <textarea class="form-control" id="TeamAssign" name="TeamAssign" rows="3"></textarea>
            </div> 
            <div class="form-group">
              <label for="desc">current</label>
              <textarea class="form-control" id="CurrentProgress" name="CurrentProgress" rows="3"></textarea>
            </div> 
            <div class="form-group">
              <label for="desc">expected</label>
              <textarea class="form-control" id="ExpectedProgress" name="ExpectedProgress" rows="3"></textarea>
            </div> 
            
          </div>
          <div class="modal-footer d-block mr-auto">
          Save 
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
          <th scope="col">current</th>
          <th scope="col">expected</th>
          <th scope="col">Status</th>
          <th scope="col">Image</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $sql = "SELECT * FROM `aportal`";
          $result = mysqli_query($conn, $sql);
          
          $sno = 0;
          while($row = mysqli_fetch_assoc($result)){
           print_r($row);
            $sno = $sno + 1;
            $val=$row['CurrentProgress'];
            if($val==5)
            $st= "below average";
            else if($val==0)
            $st= "at par";
            else
            $st= "at apr";
            echo "<tr>
            <th scope='row'>". $sno . "</th>
            <td>". $row['studenteachername'] . "</td>
            <td>". $row['TeamAssign'] . "</td>
            <td>". $row['CurrentProgress'] . "</td>
            <td>". $row['ExpectedProgress'] . "</td>
            <td>". $st . "</td>
            
            <td> <button class='edit btn btn-sm btn-primary' id=".$row['aportalid'].">SUBMIT</button>   </td>
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

function name()
{
  var teacher=  $('#studentteachername').val();
  console.log(teacher);
}


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