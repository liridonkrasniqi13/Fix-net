<?php

if (isset($_GET['p_id'])) {

    $the_post_id = $_GET['p_id'];
}

$query = "SELECT * FROM shop WHERE id = $the_post_id ";
$select_shop = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($select_shop)) {
    $id = $row['id'];
    $author = $row['author'];
    $title = $row['title'];
    $comment = $row['comment'];
    $cash = $row['cash'];
    $raporti = $row['raporti'];
    $anulime = $row['anulime'];
    $date_now = $row['date_now'];
    
}

if (isset($_POST['edit_shop'])) {
    $title = $_POST['title'];
    $comment = $_POST['comment'];
    $cash = $_POST['cash'];
    $raporti = $_POST['raporti'];
    $anulime = $_POST['anulime'];
    // $date_now = $_POST['date_now'];

    $query = "UPDATE shop SET 
    title = '{$title}',
    comment = '{$comment}',
    cash = '{$cash}',
    raporti = '{$raporti}',
    anulime =  '{$anulime}'
   
    WHERE id = {$the_post_id}";
    // $query .="post_author = '{$post_author}', ";
    // $query .="WHERE post_id = {$the_post_id}";

    $edit_shop = mysqli_query($connection, $query);

    confirmQuery($edit_shop);
    header("Location: ../admin/shop.php ");

}

?>


<form action="" method="post" enctype="multipart/form-data">
	<legend>Edit Shop</legend>

	

	<div class="form-group">
		<label for="comment">Comment</label>
		<textarea type="text" value="" class="form-control" name="comment" id="" placeholder="Post Comment"><?php echo $comment; ?></textarea>
	</div>

    <div class="form-group">
		<label for="title">Albi Smart</label>
		<input type="number" value="<?php echo $title; ?> " class="form-control" name="title" id="" placeholder="Albi Smart" required="required">
	</div>

	<div class="form-group">
		<label for="cash">Shuma Cash </label>
		<input type="number" value="<?php echo $cash; ?>" class="form-control" name="cash" id="" placeholder="Shuma Cash">
	</div>

	<div class="form-group">
		<label for="raporti">Z Raporti </label>
		<input type="number" value="<?php echo $raporti; ?>" class="form-control" name="raporti" id="" placeholder="Z Raporti">
	</div>

	<div class="form-group">
		<label for="anulime">Anulime </label>
		<input type="number" value="<?php echo $anulime; ?>" class="form-control" name="anulime" id="" placeholder="Anulime">
	</div>

	<button type="submit" name="edit_shop" class="btn btn-primary subimit">Submit</button>

</form>