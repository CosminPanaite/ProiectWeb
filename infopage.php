<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Chelsea Football Club</title>
  <link rel="stylesheet" href="styleview.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
	$(document).ready(function() {
  $('#search-name').on('keyup', function() {
    var value = $(this).val().toLowerCase();
    $('#player-table tbody tr').filter(function() {
      $(this).toggle($(this).find('td:nth-child(3)').text().toLowerCase().indexOf(value) > -1)
    });
  });
});

$(document).ready(function() {
  var sortOrder = 'asc'; // variable to keep track of current sort order
  var originalRows = $('#player-table tbody tr').get(); // save a copy of the original rows

  $('#sort-button').on('click', function() {
    var rows = $('#player-table tbody tr').get();

    if (sortOrder === 'asc') {
      rows.sort(function(a, b) {
        var ageA = parseInt($(a).find('td:nth-child(5)').text());
        var ageB = parseInt($(b).find('td:nth-child(5)').text());

        if (ageA < ageB) {
          return -1;
        } else if (ageA > ageB) {
          return 1;
        } else {
          return 0;
        }
      });

      sortOrder = 'desc';
    } else {
      rows = originalRows; // restore the original rows
      sortOrder = 'asc';
    }

    $.each(rows, function(index, row) {
      $('#player-table tbody').append(row);
    });
  });
});


$(document).ready(function() {
  $('#position-dropdown').on('change', function() {
    var selectedPosition = $(this).val();

    $('#player-table tbody tr').each(function() {
      var rowPosition = $(this).find('td:nth-child(4)').text();

      if (selectedPosition === '' || selectedPosition === rowPosition) {
        $(this).show();
      } else {
        $(this).hide();
      }
    });
  });
});


  </script>

</head>
<body id="body-main-page">
<?php
session_start();
?>

  <header>
    <nav>
      <ul>
        <li><a id="info-page" href="infopage.php">Main Page</a></li>
        <li><a id="shop-page" href="magazin.php">Shop</a></li>
		<?php if ($_SESSION['role'] == 'admin'): ?>
        <li><a id="add-player" href="addcompetion.php">Add Competition</a></li>
      <?php endif; ?>
        <li><button onclick="location.href='login.php'">Logout</button></li>
      </ul>
    </nav>
  </header>
  
  
  <div id="pagina-principala-div">
    <section>
        <h2>About Chelsea FC</h2>
        <p><u>Chelsea Football Club</u> is a professional football club based in London, England. The club was founded in <b>1905</b> and has won numerous domestic and international titles. It was recently bought by American owners and has a bright future aiming to transfer all the best youngsters.</p>
	</section>        
    <section>
    <head>
    <h2>Best Players from Chelsea FC</h2>

	<title>Chelsea Players</title>
	<link rel="stylesheet" href="styleview.css">
</head>
<div>
	<input id="search-name" type="text" placeholder="Search By Name">
	<button id="sort-button">Sort By Age</button>
	<select id="position-dropdown">
      <option id="dropdown-placeholder" value="" disabled selected>Search by position</option>
      <option value="Goalkeeper">Goalkeeper</option>
      <option value="Centre Back">Centre Back</option>
      <option value="Defensive Midfielder">Defensive Midfielder</option>
	  <option value="Left Winger">Left Winger</option>
	  <option value="Right Winger">Right Winger</option>
	  <option value="Stricker">Stricker</option>
	  <option value="Center Forward">Center Forward</option>
    </select>
</div>
<body>
	<table id="player-table">
		<thead>
			<tr>
				<th>Photo</th>
				<th>Number</th>
				<th>Player</th>
				<th>Position</th>
				<th>Age</th>
				<th>Market Value</th>
			</tr>
		</thead>
		<tbody>
			<?php
				// Connect to the database
				$conn = mysqli_connect('localhost', 'root', '', 'football');

				// Check connection
				if (!$conn) {
				    die("Connection failed: " . mysqli_connect_error());
				}

				// Retrieve player data from the database
				$sql = "SELECT * FROM players";
				$result = mysqli_query($conn, $sql);

				// Loop through player data and display each player in a table row
				while ($row = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td><img id='img-player' src='".$row['path']."' alt='".$row['name']."'></td>";
					echo "<td>".$row['number']."</td>";
					echo "<td>".$row['name']."</td>";
					echo "<td>".$row['position']."</td>";
					echo "<td>".$row['age']."</td>";
					echo "<td>".$row['value']."</td>";
					echo "</tr>";
				}

				// Close connection
				mysqli_close($conn);
			?>
		</tbody>
	</table>
  <h2>Major trophies of Chelsea FC</h2>

	<table id="trophy-table">
		<thead>
			<tr>
				<th>Competition</th>
				<th>Titles</th>
				<th>Last Won Year</th>
			
			</tr>
		</thead>
		<tbody>
			<?php
				// Connect to the database
				$conn = mysqli_connect('localhost', 'root', '', 'football');

				// Check connection
				if (!$conn) {
				    die("Connection failed: " . mysqli_connect_error());
				}

				// Retrieve player data from the database
				$sql = "SELECT * FROM trophies";
				$result = mysqli_query($conn, $sql);

				// Loop through player data and display each player in a table row
				while ($row = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>".$row['competition']."</td>";
					echo "<td>".$row['titles']."</td>";
					echo "<td>".$row['lastWon']."</td>";
					echo "</tr>";
				}

				// Close connection
				mysqli_close($conn);
			?>
		</tbody>
	</table>

	<?php
$conn = new mysqli("localhost","root" , "", "football");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Select all names from the table
$sql = "SELECT name FROM chelsea_legends";
$result = $conn->query($sql);

// Build a nested list of names
echo "<div id='list-container'>";
echo "<ol id='names'>";
while ($row = $result->fetch_assoc()) {
  echo "<li>" . $row["name"] . "</li>";
}
echo "</ol>";

// Add a "View More" button
echo "<button id='view-more'>View More</button>";
echo "</div>";

$conn->close();
?>

<script>
const namesList = document.getElementById('names');
const viewMoreBtn = document.getElementById('view-more');
const initialLimit = 2; // initial number of names to show
let limit = initialLimit; // current number of names to show

viewMoreBtn.addEventListener('click', () => {
  // Increase the limit by 2 and show more names
  limit += 2;
  showNames();
});

function showNames() {
  // Hide all names first
  for (let i = 0; i < namesList.children.length; i++) {
    namesList.children[i].style.display = 'none';
  }

  // Show the first `limit` number of names
  for (let i = 0; i < limit; i++) {
    namesList.children[i].style.display = 'block';
  }

  // Hide the "View More" button if all names are shown
  if (limit >= namesList.children.length) {
    viewMoreBtn.style.display = 'none';
  }
}

// Show the initial number of names
showNames();
</script>

</body>
</html>
</div>
	<footer id="footer-element">
    <div id="footer-container">
      <p id="logo">&copy; Chelsea official shop</p>
    </div>
  </footer>