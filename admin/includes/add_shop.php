<?php

if (isset($_POST['create_shop'])) {

	$smart  		= $_POST['smart'];
	$author 		= $_SESSION['username'];
	$comment 		= $_POST['comment'];
	$cash 			= $_POST['cash'];
	$raporti 		= $_POST['raporti'];
	$anulime 		= $_POST['anulime'];
	$date_now 	= date('d-m-y');

	$query = "INSERT INTO shop(smart, author, comment, cash, raporti, anulime, date_now ) ";

	$query .= "VALUE('{$smart}' ,'{$author}','{$comment}', '{$cash}', '{$raporti}', '{$anulime}', now())";

	$create_shop_query = mysqli_query($connection, $query);

	confirmQuery($create_shop_query);

	header("Location: ../admin/shop.php ");
}

?>

<form action="" method="post" enctype="multipart/form-data">
	<legend>Add Shop</legend>

	<div class="form-group">
		<label for="comment">Comment</label>
		<textarea type="text" class="form-control" name="comment" id="" placeholder="Post Comment"></textarea>
	</div>

	<div class="form-group">
		<label for="smart">Albi Smart</label>
		<input type="number" class="form-control" name="smart" id="" placeholder="Albi Smart" required="required">
	</div>

	<div class="form-group">
		<label for="cash">Shuma Cash </label>
		<input type="number" class="form-control" name="cash" id="" placeholder="Shuma Cash" required="required">
	</div>

	<div class="form-group">
		<label for="raporti">Z Raporti </label>
		<input type="number" class="form-control" name="raporti" id="" placeholder="Z Raporti" required="required">
	</div>

	<div class="form-group">
		<label for="anulime">Anulime </label>
		<input type="number" class="form-control" name="anulime" id="" placeholder="Anulime" >
	</div>

	<button type="submit" name="create_shop" class="btn btn-primary subimit">Submit</button>

</form>