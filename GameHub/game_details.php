<?php # Script 8.5 - register.php #2
include ('includes/session.php');

$page_title = 'Game Details';
include ('includes/header.php');

require_once ('mysqli_connect.php'); // Connect to the db.

$get_id = $_GET["gm_id"];

//$get = "SELECT title, description, genre_id, platform_id FROM games WHERE game_id = '$get_id' ";

$get = "SELECT title, description, genre_id, platform_id FROM games WHERE game_id = '$get_id' ";

$run = @\mysqli_query($dbc, $get);

// To get platform of selected game

$get_plat_id = "SELECT platform_id FROM games WHERE game_id = '$get_id' ";

$run_plat_id = @\mysqli_query($dbc, $get_plat_id);

$get_plat = "SELECT * FROM platform WHERE platform_id = '$get_plat_id' ";
$run_plat = @\mysqli_query($dbc, $get_plat);


// To display game details
	//echo'<p>'. $get_id .'</p>'
	while ($row = mysqli_fetch_array($run, MYSQLI_ASSOC)) {
		
		echo'<p>'.$row['title'].','.$row['description'].' </p>';
	}

// To display game platform title
	echo'<p>'.$get_plat_id.'</p>';
	while($row_plat = mysqli_fetch_array($run_plat, MYSQLI_ASSOC)) {
		echo '<p>'.$row_plat['platform_title'].'</p>';
	}

mysqli_close($dbc);
?>



<?php
include ('includes/footer.html');
?>