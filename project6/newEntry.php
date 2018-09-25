<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Assignment 6</title>
	<meta content="The HTML5 Herald" name="description">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta content="SitePoint" name="author">
	<link href="main.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Noto+Serif+KR|Oswald" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Display<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="newEntry.php">Make a Comment</a>
      </li>
        <li class="nav-item">
        <a class="nav-link" href="approve.php">Approve</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
    
	<div id="wrap">
        
		<h2>Make a Comment</h2>
        <form action="saveToDatabase.php" method="post">
  <div class="form-group">
    <label for="exampleFormControlInput1">Name</label>
    <input name="name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="John Doe">
  </div>
              <div class="form-group">
    <label for="exampleFormControlInput1">Date</label>
    <input name="date" type="text" class="form-control" id="exampleFormControlInput1" placeholder="01/01/1992">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Topic</label>
    <select name="topic" class="form-control" id="exampleFormControlSelect1">
      <option name="topic">Health</option>
      <option name="topic">Beauty</option>
      <option name="topic">Life</option>
      <option name="topic">Social Media</option>
      <option name="topic">Government</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Comment</label>
    <textarea name="comment" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
            
	</div>
	<script src="scripts.js">
	</script>
</body>
</html>