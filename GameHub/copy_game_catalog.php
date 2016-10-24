<?php 
include ('includes/session.php');

$page_title = 'Game Catalog';
include ('includes/header.php');

require_once ('mysqli_connect.php'); // Connect to the db.

$type = $_SESSION['user_type_id'];

//echo '<p>'.$type.'</p>';
			     	if(isset($_POST['submit'])){     
    						$link = "<script>window.open('add_game.php','new', 'toolbars=0,width=600,height=400,left=200,top=200,scrollbars=1,resizable=1')</script>";
    						echo $link;
    					}
			     	/*if($type == 3){
			     		echo '<form class="catalogForm" role="form" action="game_catalog.php" method="post">';
    					echo '<input type="submit" class="btn btn-primary" name="submit" value="Add">';
    					echo '</form>'; 		     	
    				} */
//Get genre		
$get_genre = "SELECT * FROM genre";
$run_genre = @\mysqli_query($dbc, $get_genre);

//Get platform
$get_platform = "SELECT * FROM platform";
$run_platform = @\mysqli_query($dbc, $get_platform);

//Get price range
$get_price = "SELECT * FROM price_range";
$run_price = @\mysqli_query($dbc, $get_price);

echo'<div class="container-fluid text-center">  
	  	<div class="row content">
				<div class="col-sm-2 sidenav">
				    	<br><br><br><br><br>
				    	<h4>Filter by..</h4> 
				    	<p><div class="dropdown">
				    		<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">&nbsp;&nbsp;Genre&nbsp;&nbsp;&nbsp;
				    		<span class="caret"></span></button>
				    		<ul class="dropdown-menu">';

								//Fetch and print all the genre
					    		while($row_genre = mysqli_fetch_array($run_genre, MYSQLI_ASSOC)) {

					    			echo'<li><a href=game_catalog.php?genre='.$row_genre['genre_id'].'>'.$row_genre['genre_title'].'</a></li>';
				    			}
echo'
							</ul>
						</div></p>
						<p><div class="dropdown">
				    		<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">&nbsp;Platform
				    		<span class="caret"></span></button>
				    		<ul class="dropdown-menu">';
				    			//Fetch and print all the platforms
				    			while($row_plat = mysqli_fetch_array($run_platform, MYSQLI_ASSOC)) {

					    			echo'<li><a href=game_catalog.php?plat='.$row_plat['platform_id'].'>'.$row_plat['platform_title'].'</a></li>';
				    			}
echo'
				    		</ul>
				    	</p></div>
				    	<p><div class="dropdown">
				    		<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">&nbsp;&nbsp;&nbsp;&nbsp;Price&nbsp;&nbsp;&nbsp;
				    		<span class="caret"></span></button>
				    		<ul class="dropdown-menu">';
				    			//Fetch and print all the price range
				    			while($row_price = mysqli_fetch_array($run_price, MYSQLI_ASSOC)) {

					    			echo'<li><a href=game_catalog.php?plat='.$row_price['price_range_id'].'>'.$row_price['price_range_title'].'</a></li>';
				    			}
echo'						</ul>
						</p></div>	
				</div>';

$get = "SELECT title,description, game_id FROM games";

$run = @\mysqli_query($dbc, $get);

$num_rows = mysqli_num_rows($run);

echo'			<div class="col-sm-10 text-left"> 
			     	<h1>Games</h1><br>';
			     	// ADD game button
			     	if($type == 3){
			     		echo '<form class="catalogForm" role="form" action="game_catalog.php" method="post">';
    					echo '<input type="submit" class="btn btn-primary" name="submit" value="Add Game">';
    					echo '</form>'; 		     	
    				} 
			     	echo'
			     	<div class="list-group">
			     		<div class = "panel-group" id ="accordion">

			     		';

			      		// Fetch and print all the records:
			      		$row_num = 0;
						while ($row = mysqli_fetch_array($run, MYSQLI_ASSOC)) {
							$row_num = $row_num + 1;
							/*echo '<a href="game_details.php?gm_id='.$row['game_id'].'" class="list-group-item">'.$row['title'].'</a>
							';*/
							echo '<div class = "panel panel-default"><div class = "panel-heading"><h4 class = "panel-title"> ';
							echo '<a data-toggle = "collapse" data-parent = "#accordion" href = "#collapse'.$row_num.'">'.$row['title'].'</a>';
							echo '</h4></div><div id = "collapse'.$row_num.'" class = "panel-collapse collapse">
								<div calss = "panel-body">
									<p><b>Description: </b> '.$row['description'].'<br>
								</div></div></div>';
						}

echo'				</div>
				<div>
				<hr>
				<h3>Disclaimer</h3>
				<p>Lorem ipsum......
		</div> 
	</div>';  
mysqli_close($dbc);
?>

<!--HTML -->

<?php
include ('includes/footer.html');
?>
