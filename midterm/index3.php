<?php 
require_once('variables.php');
$name = $_POST[name];
$area = $_POST[area];
$phone = $_POST[phone];
$email = $_POST[email];
$comment = $_POST[comment];
$photo = $_POST[photo];
//BUILD THE DATABASE CONNECTION WITH host, user, pass, database
$conn = new mysqli(HOST,USER,PASSWORD,DB_NAME) or die('Connection Failed');
// BUILD THE QUERY
$sql = "SELECT * FROM employee_directory";
//NOW TRY AND TALK TO THE DATABASE
$result = mysqli_query($conn, $sql) or die ('Query Failed');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="main.css" rel="stylesheet">
    <title>Jared Reed | Portfolio
    </title>
  </head>
  <body>
    <div class="jumbotron jumbotron-fluid" id="header">
      <div class="container">
        <h1 class="display-4">Employee Directory
        </h1>
        <p class="lead">Find all the needed information here about our 20 new employees.
        </p>
          </div>
        </div>
        <!-- MODAL EDIT EMPLOYEE -->
          <div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="ModalEdit" role="dialog" tabindex="-1">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                  <span aria-hidden="true">&times;
                  </span>
                </button>
              </div>  
              <div id="form" class="body_padding">
                <h2>Edit Employee
                </h2>
                <br>
                <form action="editEmployee.php" enctype="multipart/form-data" id="" method="post" name="">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Name:
                    </label> 
                    <input class="form-control" id="exampleFormControlInput1" placeholder="John Doe" type="text">
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Area of Expertise:
                    </label> 
                    <input class="form-control" id="exampleFormControlInput1" placeholder="Web Development" type="text">
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Phone:
                    </label> 
                    <input class="form-control" id="exampleFormControlInput1" placeholder="(555) 555 5555" type="tel">
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Email:
                    </label> 
                    <input class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" type="email">
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">Comment Area:
                    </label> 
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3">
                    </textarea>
                  </div>
                  <button class="btn btn-primary mb-2" type="submit" value="submit">Save
                  </button>
                  <button class="btn btn-primary mb-2" data-dismiss="modal" type="button" style="background-color:#3a3a3a;">Close
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
    <div id="wrap">
      <!-- EMPLOYEE TITLE -->
      <div class="row" id="employees">
        <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#">
              <img alt="employee_17" class="card-img-top" src="images/employee17.jpeg">
            </a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Katrina Kat
                </a>
              </h4>
              <br>
              <p class="card-text">App Developer
              </p>
              <p class="card-text">(555) 555-5555
              </p>
              <p class="card-text">email@email.com
              </p>
              <br>
              <button class="btn btn-primary" data-target="#Modal17" data-toggle="modal" type="button">View More
              </button>
              <br>
              <br>
              <button class="btn btn-success" data-target="#ModalEdit" data-toggle="modal" type="button">
                <a>Edit Employee
                </a>
              </button>
                <br><br><button onclick="return confirm('Are you sure you want to delete selected employee?')" class="btn btn-danger" type="button">Delete Employee
                </button>
            </div>
          </div>
        </div>
        <!-- MODAL -->
        <div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="Modal17" role="dialog" tabindex="-1">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Katrina Kat
                </h5>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                  <span aria-hidden="true">&times;
                  </span>
                </button>
              </div>
              <div class="modal-body">
                <img alt="employee_17" class="card-img-top" src="images/employee17.jpeg">
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#">Katrina Kat
                    </a>
                  </h4>
                  <br>
                  <p class="card-text">App Developer
                  </p>
                  <p class="card-text">(555) 555-5555
                  </p>
                  <p class="card-text">email@email.com
                  </p>
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                  </p>
                </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal" type="button">Close
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- EMPLOYEE TITLE -->
        <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#">
              <img alt="employee_18" class="card-img-top" src="images/employee18.jpg">
            </a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Recesa Tate
                </a>
              </h4>
              <br>
              <p class="card-text">Photography
              </p>
              <p class="card-text">(555) 555-5555
              </p>
              <p class="card-text">email@email.com
              </p>
              <br>
              <button class="btn btn-primary" data-target="#Modal18" data-toggle="modal" type="button">View More
              </button>
              <br>
              <br>
              <button class="btn btn-success" data-target="#ModalEdit" data-toggle="modal" type="button">
                <a>Edit Employee
                </a>
              </button>
                <br><br><button onclick="return confirm('Are you sure you want to delete selected employee?')" class="btn btn-danger" type="button">Delete Employee
                </button>
            </div>
          </div>
        </div>
        <!-- MODAL -->
        <div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="Modal18" role="dialog" tabindex="-1">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Recesa Tate
                </h5>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                  <span aria-hidden="true">&times;
                  </span>
                </button>
              </div>
              <div class="modal-body">
                <img alt="employee_18" class="card-img-top" src="images/employee18.jpg">
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#">Recesa Tate
                    </a>
                  </h4>
                  <br>
                  <p class="card-text">Photography
                  </p>
                  <p class="card-text">(555) 555-5555
                  </p>
                  <p class="card-text">email@email.com
                  </p>
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                  </p>
                </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal" type="button">Close
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- EMPLOYEE TITLE -->
        <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#">
              <img alt="employee_19" class="card-img-top" src="images/employee19.jpg">
            </a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Kiesha Kiesh
                </a>
              </h4>
              <br>
              <p class="card-text">Interior Design
              </p>
              <p class="card-text">(555) 555-5555
              </p>
              <p class="card-text">email@email.com
              </p>
              <br>
              <button class="btn btn-primary" data-target="#Modal19" data-toggle="modal" type="button">View More
              </button>
              <br>
              <br>
              <button class="btn btn-success" data-target="#ModalEdit" data-toggle="modal" type="button">
                <a>Edit Employee
                </a>
              </button>
                <br><br><button onclick="return confirm('Are you sure you want to delete selected employee?')" class="btn btn-danger" type="button">Delete Employee
                </button>
            </div>
          </div>
        </div>
        <!-- MODAL -->
        <div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="Modal19" role="dialog" tabindex="-1">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Kiesha Kiesh
                </h5>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                  <span aria-hidden="true">&times;
                  </span>
                </button>
              </div>
              <div class="modal-body">
                <img alt="employee_19" class="card-img-top" src="images/employee19.jpg">
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#">Kiesha Kiesh
                    </a>
                  </h4>
                  <br>
                  <p class="card-text">Interior Design
                  </p>
                  <p class="card-text">(555) 555-5555
                  </p>
                  <p class="card-text">email@email.com
                  </p>
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                  </p>
                </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal" type="button">Close
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- EMPLOYEE TITLE -->
        <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#">
              <img alt="employee_20" class="card-img-top" src="images/employee20.jpg">
            </a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Sharon Sully
                </a>
              </h4>
              <br>
              <p class="card-text">Desk Assistant
              </p>
              <p class="card-text">(555) 555-5555
              </p>
              <p class="card-text">email@email.com
              </p>
              <br>
              <button class="btn btn-primary" data-target="#Modal20" data-toggle="modal" type="button">View More
              </button>
              <br>
              <br>
              <button class="btn btn-success" data-target="#ModalEdit" data-toggle="modal" type="button">
                <a>Edit Employee
                </a>
              </button>
                <br><br><button onclick="return confirm('Are you sure you want to delete selected employee?')" class="btn btn-danger" type="button">Delete Employee
                </button>
            </div>
          </div>
        </div>
        <!-- MODAL -->
        <div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="Modal20" role="dialog" tabindex="-1">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sharon Sully
                </h5>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                  <span aria-hidden="true">&times;
                  </span>
                </button>
              </div>
              <div class="modal-body">
                <img alt="employee_20" class="card-img-top" src="images/employee20.jpg">
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#">Sharon Sully
                    </a>
                  </h4>
                  <br>
                  <p class="card-text">Desk Assistant
                  </p>
                  <p class="card-text">(555) 555-5555
                  </p>
                  <p class="card-text">email@email.com
                  </p>
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                  </p>
                </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal" type="button">Close
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <ul class="pagination justify-content-center" id="footer">
        <li class="page-item">
          <a aria-label="Previous" class="page-link" href="index.php">
            <span aria-hidden="true">&laquo;
            </span> 
            <span class="sr-only">Previous
            </span>
          </a>
        </li>
        <li class="page-item">
          <a class="page-link" href="index.php">1
          </a>
        </li>
        <li class="page-item">
          <a class="page-link" href="index2.php">2
          </a>
        </li>
        <li class="page-item">
          <a class="page-link" href="index3.php">3
          </a>
        </li>
        <li class="page-item">
          <a aria-label="Next" class="page-link" href="#">
            <span aria-hidden="true">&raquo;
            </span> 
            <span class="sr-only">Next
            </span>
          </a>
        </li>
      </ul>
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js">
      </script> 
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
      </script> 
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js">
      </script> 
      <script src="js/script.js">
      </script>
    </div>
  </body>
</html>
