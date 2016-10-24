<?php // VIEW ALL, SEARCH, ADD
include ('includes/session.php');

$page_title = 'Game Catalog';
include ('includes/header.php');

require_once ('mysqli_connect.php'); // Connect to the db.

$type = $_SESSION['user_type_id'];

if($type == 3){
	echo '<form class="catalogForm" role="form" action="game_catalog.php" method="post">';
	echo '<input type="submit" class="btn btn-primary" name="submit" value="Add Game">';
	echo '</form>'; 		     	
} 


// View All button
//echo '<form class = "catalogForm" role = "form" action="game_catalog.php" method="post">';
//echo '<button type="submit" name="viewAll" class="btn btn-sm btn-primary" value="View All" /></button>';
//echo '</form>';



//echo '<p>'.$type.'</p>';
if(isset($_POST['submit'])){     
	$link = "<script>window.open('add_game.php','new', 'toolbars=0,width=600,height=400,left=200,top=200,scrollbars=1,resizable=1')</script>";
	echo $link;
}




/*if(isset(($_POST['search']))){
	$genre = mysqli_real_escape_string($dbc, trim($_POST['genre']));
	$platform = mysqli_real_escape_string($dbc, trim($_POST['platform']));
	$price = mysqli_real_escape_string($dbc, trim($_POST['price']));

	$get = "SELECT title, description, genre, platform FROM game WHERE platform = '$platform' AND genre = '$genre'";
	$run = @\mysqli_query($dbc, $get);

	$num = mysqli_num_rows($run);

	while ($row = mysqli_fetch_array($run, MYSQLI_ASSOC)) {
		$num = $num + 1;   */
		/*echo '<a href="game_details.php?gm_id='.$row['game_id'].'" class="list-group-item">'.$row['title'].'</a>
		';*/
		//echo '<div class = "panel panel-default"><div class = "panel-heading"><h4 class = "panel-title"> ';
		//echo '<a data-toggle = "collapse" data-parent = "#accordion" href = "#collapse'.$num.'">'.$row['title'].'</a>';
		/*echo '</h4></div><div id = "collapse'.$num.'" class = "panel-collapse collapse">
			<div calss = "panel-body">
				<p><b>Description: </b> '.$row['description'].'<br>
			</div></div></div>';
	}

	echo '</div></div>';
}*/




//if(isset(($_POST['viewAll']))){
	$get_details = "SELECT title, description, genre, platform FROM game";
	$run_details = @\mysqli_query($dbc, $get_details);

	$num_rows = mysqli_num_rows($run_details);

	echo'<div class="list-group">
		<div class = "panel-group" id ="accordion">';

		// Fetch and print all the records:
		$row_num = 0;
	while ($row = mysqli_fetch_array($run_details, MYSQLI_ASSOC)) {
		$row_num = $row_num + 1;
		/*echo '<a href="game_details.php?gm_id='.$row['game_id'].'" class="list-group-item">'.$row['title'].'</a>
		';*/
		echo '<div class = "panel panel-default"><div class = "panel-heading"><h4 class = "panel-title"> ';
		echo '<a data-toggle = "collapse" data-parent = "#accordion" href = "#collapse'.$row_num.'">'.$row['title'].'</a>';
		echo '</h4></div><div id = "collapse'.$row_num.'" class = "panel-collapse collapse">
			<div calss = "panel-body">
				<p><b>Description: </b> '.$row['description'].'<br>
				<p><b>Genre: </b> '.$row['genre'].'<br>
				<p>
			</div></div></div>';
	}

	echo '</div></div>';
//}
		  





 
mysqli_close($dbc);



?>

<!--HTML -->
<!--<form class = "catalogForm" role = "form" action="game_catalog.php" method="post">
	<p>Game Title: <input type="text" class="form-control" placeholder="Game Title" required autofocus name="game_title" maxlength="40" value="<?php
        /*if (isset($_POST['game_title']))
        echo $_POST['game_title'];
        ?>" /></p>
    <p>Game Description <input type="text" class="form-control" placeholder="Description" required name="description" maxlength="500" value="<?php
        if (isset($_POST['description']))
        echo $_POST['description'];
        ?>" /></p>
    <p>Rating (1-10): <input type="number" class="form-control" placeholder="Rating" required name="average_rating" maxlength="2" min="1" max="10" value="<?php
        if (isset($_POST['average_rating']))
        echo $_POST['average_rating'];
        ?>"  /> </p>
        
    <p>Genre: </p>
    <select id="genre" class="form-control" required name="genre">
        <option value="">Select Genre</option>
        <option value="Action">Action</option>
        <option value="Adventure">Adventure</option>
    </select>
    
    <p>Platform: </p>
    <select id="platform" class="form-control" required name="platform">
        <option value="">Select Platform</option>
        <option value="PS3">PS3</option>
        <option value="PS4">PS4</option>
        <option value="XBox">XBox</option>
        <option value="XOne">XOne</option>
    </select>
        
    <p>Price: <input type="number" step="0.01" class="form-control" placeholder="Price" required name="price" maxlength="10" value="<?php
        if (isset($_POST['price']))
        echo $_POST['price'];
        ?>" /></p>
    <p><button type="submit" name="search" class="btn btn-sm btn-primary" />Add</button></p>
    <input type="hidden" name="submitted" value="TRUE" />
</form>--> */

<?php
include ('includes/footer.html');
?>
