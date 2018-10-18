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
    <h1>Search</h1>
    <form class="form-inline my-2 my-lg-0" action="search.php" method="POST" enctype="multipart/form-data">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="hobby" value="">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit" value="Search for hobbies">Search</button>
    </form>
        
        <?php
        if (isset($_POST['submit'])) {
            //LOAD THE POST DATA
            $hobbies = strtolower($_POST[hobby]);
            //REMOVE COMMAS FROM SEARCH TERMS
            $hobbyCleanUp = str_replace(',','',$hobbies);
            //Turn the list into an array based on a space character
            $searchTerms = explode(' OR ',$hobbyCleanUp);
            foreach ($searchTerms as $temp ) {
                if(!empty($temp)) {
                    $searchArray[] = $temp;
                }//end the if
            }//end foreach statement
            
            //BUILD A WHERE CLAUSE FOR THE QUERY
            $whereList = array();
            foreach($searchArray as $temp) {
                $whereList[] = "hobbies LIKE '%$temp%'";
            }//end foreach
            //build the complete WHERE with OR between each term
            $whereClause = implode(' OR ',$whereList);
            
            
            //BUILD THE SEARCH QUERY
            $sql = "SELECT * FROM hobbies";
            if(!empty($whereClause)) {
                $sql = $sql . " WHERE $whereClause";
            }//end if statement
            echo '<br>';
            echo "<h5>Search Results for '$hobbyCleanUp'</h5>";
            
            require_once('variables.php');
//BUILD THE DATABASE CONNECTION WITH host, user, pass, database
$conn = new mysqli(HOST,USER,PASSWORD,DB_NAME) or die('Connection Failed');
            //NOW TRY AND TALK TO THE DATABASE
$result = mysqli_query($conn, $sql) or die ('Query Failed');
            
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_array($result)) {
                    echo '<div class="displayNames" style="background-color: #e4e4e4; padding: 20px; margin-bottom: 15px;">';
                    echo '<h4>'.$row[fullname] .'</h4>';
                    
                    $myResults = strtolower($row[hobbies]);
                    foreach ($searchArray as $temp) {
                        $insert = $temp;
                        $myResults = str_replace($temp, $insert, $myResults);
                    }//end foreach statement
                     echo $myResults;
                     echo '</div>';
                }
            } else {
                echo "no results found matching <strong>$hobbies</strong>";
            }//close num rows count
                
        }
        //WERE DONE SO HANG UP
        mysqli_close($conn);
        ?>
        
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
