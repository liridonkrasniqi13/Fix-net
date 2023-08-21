<?php

// include_once '../../includes/uploads.php';
$statusMsg = "";
$status = 'danger';

// file Upload Directory
// $targetDir = '../../uploads/';
$targetDir = '../uploads/';

if (isset($_POST['create_shop'])) {

	if (!empty($_FILES["file"]['name'])) {

		$time = date("d-m-Y")."-".time() ;

		$imgName = basename($_FILES["file"]['name']);
		$fileName = $time."-".$imgName;
		$targetFilePath = $targetDir . $fileName;
		$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

		// Allow files Format
		$allowTypes = array('jpg', 'png', 'jpeg', 'pdf');
		if (in_array($fileType, $allowTypes)) {
			if (move_uploaded_file($_FILES["file"]['tmp_name'], $targetFilePath)) {
				// $query = " INSERT INTO shop (file_name,date_now) VALUES ('".$fileName."', now()) " ;

				$smart  		= $_POST['smart'];
				$author 		= $_SESSION['username'];
				$comment 		= $_POST['comment'];
				$cash 			= $_POST['cash'];
				$raporti 		= $_POST['raporti'];
				$anulime 		= $_POST['anulime'];
				$saldo 			= $_POST['saldo'];
				$date_now 	= date('d-m-y');

				$query = "INSERT INTO shop(smart, author, comment, cash, raporti, anulime, image_name, saldo , date_now ) ";

				$query .= "VALUE('{$smart}' ,'{$author}','{$comment}', '{$cash}', '{$raporti}', '{$anulime}', '{$fileName}','{$saldo}', now())";

				$create_shop_query = mysqli_query($connection, $query);

				confirmQuery($create_shop_query);

				// header("Location: ../admin/shop.php ");


				if ($query) {
					$status = 'success';
					$statusMsg = "The file is uploaded";
				} else {
					$statusMsg = "Sorry something was wrong. Please try again 2 ???";
				}
			} else {
				$statusMsg = "Sorry something was wrong. Please try again ???";
			}
		} else {
			$statusMsg = "Sorry only JPG ,JPEG, PNG, PDF file are allowed ???";
		}
	} else {
		$statusMsg = "Pleas select a file to upload ???";
	}



	// $smart  		= $_POST['smart'];
	// $author 		= $_SESSION['username'];
	// $comment 		= $_POST['comment'];
	// $cash 			= $_POST['cash'];
	// $raporti 		= $_POST['raporti'];
	// $anulime 		= $_POST['anulime'];
	// $date_now 	= date('d-m-y');

	// $query = "INSERT INTO shop(smart, author, comment, cash, raporti, anulime, date_now ) ";

	// $query .= "VALUE('{$smart}' ,'{$author}','{$comment}', '{$cash}', '{$raporti}', '{$anulime}', now())";

	// $create_shop_query = mysqli_query($connection, $query);

	// confirmQuery($create_shop_query);

	// header("Location: ../admin/shop.php ");
}

if (!empty($statusMsg)) {



?>


	<div class="noty_bar noty_type__info noty_theme__unify--v1--light noty_close_with_click noty_close_with_button g-mb-25">
		<div class="noty_body">
			<div class="g-mr-20">
				<div class="noty_body__icon">
					<i class="hs-admin-info"></i>
				</div>
			</div>
			<div> <strong> <?php echo $status ?> </strong> : <?php echo $statusMsg ?></div>
		</div>
	</div>



<?php } ?>

<form action="" method="post" enctype="multipart/form-data">
	<legend>Add Shop</legend>

	<div class="form-group">
		<label for="comment">Comment</label>
		<textarea type="text" class="form-control" name="comment" id="" placeholder="Post Comment"></textarea>
	</div>

	<div class="form-group">
		<label for="smart">Albi Smart</label>
		<input type="number" class="form-control" name="smart" id="" placeholder="Albi Smart" step="0.01" required="required">
	</div>

	<div class="form-group">
		<label for="cash">Shuma Cash </label>
		<input type="number" class="form-control" name="cash" id="" placeholder="Shuma Cash" step="0.01" required="required">
	</div>

	<div class="form-group">
		<label for="raporti">Z Raporti </label>
		<input type="number" class="form-control" name="raporti" id="" placeholder="Z Raporti" step="0.01" required="required">
	</div>

	<div class="form-group">
		<label for="anulime">Anulime </label>
		<input type="number" class="form-control" name="anulime" id="" placeholder="Anulime" step="0.01" required="required">
	</div>

	<div class="form-group">
		<label for="anulime">Saldo </label>
		<input type="number" class="form-control" name="saldo" id="" placeholder="Saldo" step="0.01" required="required">
	</div>

	<div class="form-group">
		<h4 class="h6 g-font-weight-600 g-color-black g-mb-20">File input</h4>

		<div class="input-group u-file-attach-v1 g-brd-gray-light-v2">
			<input class="form-control form-control-md rounded-0" placeholder="Text in field" readonly="" type="text">

			<div class="input-group-btn">
				<button class="btn btn-md h-100 u-btn-primary rounded-0" type="submit">Browse</button>
				<input type="file" name="file" required="required">
			</div>
		</div>
	</div>

	<button type="submit" name="create_shop" class="btn btn-primary subimit">Submit</button>
</form>