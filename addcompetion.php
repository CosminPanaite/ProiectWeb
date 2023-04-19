<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "football");

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $titles = $_POST["title-field"];
  $lastWon = $_POST["last-won"];
  $competition = $_POST["comp-field"];

  $sql = "INSERT INTO trophies (competition, lastWon, titles) VALUES ('$competition', '$lastWon', '$titles')";

  if (mysqli_query($conn, $sql)) {
    header("Location: infopage.php");
    exit;
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" type="text/css" href="styleview.css" />
</head>

<body> 
  <form method="post">
    <div id="add-holder">
      <div id="wrapper-add">
        <div id="add-container">
          <label id="title-label" for="title">Titles</label>
          <input type="number" id="title-field" name="title-field" placeholder="Enter the title " required/>
          <label id="last-won" for="last-won">Last Won</label>
          <input type="number" id="last-won-field" name="last-won" placeholder="Enter the last won year " required/>
          <label id="comp-label" for="comp">Competition</label>
          <input type="text" id="comp-field" name="comp-field" placeholder="Enter the competition " required  />
          <button id="add-comp-button">Add competion</button>
        </div>
      </div>
    </div>
  </form>
  <footer id="footer-element">
    <div id="footer-container">
      <p id="logo">&copy; Chelsea official shop</p>
    </div>
  </footer>
</body>