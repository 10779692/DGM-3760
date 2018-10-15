<?php
//Load the post data into PHP variables
if (isset($_POST['submit'])) {
$fullname = $_POST[fullname];
$birthday = $_POST[birthday];
$hobbies = $_POST[hobbies];
$day = $_POST[day];
$month = $_POST[month];
$year = $_POST[year];

$birthday = $day.'_'.$month.'_'.$year;    
    
require_once('variables.php');
//BUILD THE DATABASE CONNECTION WITH host, user, pass, database
$conn = new mysqli(HOST,USER,PASSWORD,DB_NAME) or die('Connection Failed');
//BUILD THE QUERY
$sql = "INSERT INTO hobbies (fullname, birthday, hobbies) VALUES ('$fullname','$birthday','$hobbies')";
//NOW TRY AND TALK TO THE DATABASE
if ($conn->query($sql) === TRUE) {
    echo " New User added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
//WE'RE DONE SO HANG UP
$conn->close();
header('Location: index.php');
exit;
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">

    <title>Project 9</title>
  </head>
  <body>
    <div id="wrap">
    <?php include_once('navbar.php');?>
    <br><br>
    <h1>Add New User</h1>
    <form action="add.php" method="POST" enctype="multipart/form-data" name="travelInfo">
    <div class="form-group">
    <label for="exampleInputName1">Full Name</label>
    <input type="text" class="form-control" id="exampleInputName1" aria-describedby="emailHelp" placeholder="Enter Name" name="fullname">
    <br>
    <!--<label for="exampleInputName1">Birthday</label>
    <input type="date" class="form-control" id="exampleInputName1" aria-describedby="emailHelp" placeholder="Enter Birthday" name="birthday"> --> 
    <label for="exampleInputName1">Birthday - Day/Month/Year</label>
    <select type="text" class="custom-select" name="day">
        <option selected>Day</option>
        <option value="01">01</option>
        <option value="02">02</option>
        <option value="03">03</option>
        <option value="04">05</option>
        <option value="05">06</option>
        <option value="06">07</option>
        <option value="07">08</option>
        <option value="08">09</option>
        <option value="09">10</option>
        <option value="10">11</option>
        <option value="11">12</option>
        <option value="12">13</option>
        <option value="13">14</option>
        <option value="14">15</option>
        <option value="15">16</option>
        <option value="16">17</option>
        <option value="17">18</option>
        <option value="18">19</option>
        <option value="19">20</option>
        <option value="20">21</option>
        <option value="21">22</option>
        <option value="22">23</option>
        <option value="23">24</option>
        <option value="24">25</option>
        <option value="25">26</option>
        <option value="26">27</option>
        <option value="28">28</option>
        <option value="29">29</option>
        <option value="30">30</option>
        <option value="31">31</option>
    </select>
    <br>
    <select class="custom-select" type="text" name="month">
        <option selected>Month</option>
        <option value="01">01</option>
        <option value="02">02</option>
        <option value="03">03</option>
        <option value="04">05</option>
        <option value="05">06</option>
        <option value="06">07</option>
        <option value="07">08</option>
        <option value="08">09</option>
        <option value="09">10</option>
        <option value="10">11</option>
        <option value="11">12</option>
    </select> 
    <input type="text" class="form-control" id="exampleInputName1" aria-describedby="emailHelp" placeholder="2011" name="year" pattern="[0-9]{4}" required class="year">  
        <br>
    <div class="form-group">
    <label for="exampleFormControlTextarea1">Please List Your Hobbies</label>
    <textarea class="form-control"  name="hobbies" id="exampleFormControlTextarea1" rows="3" placeholder="Art, Gunsmithing, Outdoors,..."></textarea>
  </div>
  <button type="submit" name="submit" value="Add Member" class="btn btn-primary mb-2">Add User</button>
  </div>

    </form>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
