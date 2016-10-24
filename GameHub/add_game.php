<?php 
include ('includes/session.php');

$page_title = 'Add Games';
include ('includes/header.php');

require_once ('mysqli_connect.php'); // Connect to the db.


?>
<!--HTML form-->
<div class="page-header">
    <h1>Add New Game</h1>
</div>
<form class="form-signin" role="form" action="add_game.php" method="post">
   <p></p>
    
    
</form>

<?php
include ('includes/footer.html');
?>
