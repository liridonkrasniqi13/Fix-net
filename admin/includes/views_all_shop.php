<?php

if (isset($_GET['from_date']) && isset($_GET['to_date'])) {
	$from_date = $_GET['from_date'];
	$to_date = $_GET['to_date'];
	if ($_SESSION['user_role'] == "admin") {
		$author = $_GET['post_author'];
	}
} else {
	$from_date = "";
	$to_date = "";
	if ($_SESSION['user_role'] == "admin") {
		$author = "";
	}
}

?>

<legend>Shop Pagest </legend>
<div class="table-responsive">
	
	<div class="container">
	<?php include "filter-shop.php"; ?>
	</div>
	
	

	<table class="table table-bordered table-hover">
		<thead>
			<tr>

				<th>Id</th>
				<th>Shop</th>
				<?php if ($_SESSION['user_role'] == "admin") { ?>
				<th>Comment</th>
				<?php } ?>
				<th>Albi Smart</th>
				<th>Shuma Cash</th>
				<th>Z Raporti</th>
				<th>Anulime</th>

				<th>Date</th>
				<?php
				if ($_SESSION['user_role'] == "admin") {
					echo "<th>View Post</th>";
					echo "<th>Edit</th>";
					echo "<th>Delete</th>";
				}
				?>

			</tr>
		</thead>
		<tbody>

			<?php

			if (isset($_GET['from_date']) && isset($_GET['to_date'])) {
				$from_date = $_GET['from_date'];
				$to_date = $_GET['to_date'];

				if ($_SESSION['user_role'] == "admin") {
					$author = $_GET['post_author'];
					if ($author == "liridonkrasniqi") {
						$query = "SELECT * FROM shop WHERE date_now BETWEEN '$from_date' AND '$to_date' ORDER BY id DESC";
						$date_query = mysqli_query($connection, $query);
					} else {
						$query = "SELECT * FROM shop WHERE author = '$author' AND  date_now BETWEEN '$from_date' AND '$to_date' ORDER BY id DESC";
						$date_query = mysqli_query($connection, $query);
					}
				} else {

					$author = $_SESSION['username'];
					$query = "SELECT * FROM shop WHERE author = '$author' AND  date_now BETWEEN '$from_date' AND '$to_date' ORDER BY id DESC";
					$date_query = mysqli_query($connection, $query);
				}

				if (mysqli_num_rows($date_query) > 0) {

					foreach ($date_query as $row) {
			?>
						<tr>
							<th><?php echo $row['id']; ?></th>
							<th><?php echo $row['author']; ?></th>
							<?php if ($_SESSION['user_role'] == "admin") { ?>
							<th><?php echo $row['comment']; ?></th>
							<?php } ?>
							<th><?php echo $row['title']; ?></th>
							<th><?php echo $row['cash']; ?></th>
							<th><?php echo $row['raporti']; ?></th>
							<th><?php echo $row['anulime']; ?></th>
							<th><?php echo $row['date_now']; ?></th>
							<?php if ($_SESSION['user_role'] == "admin") { ?>
								<th>
									<a href='../shop.php?p_id=<?php echo $row['id']; ?>'>View Post</a>
								</th>
								<th>
									<a href='shop.php?source=edit_shop&p_id=<?php echo $row['id']; ?>'>Edit</a>
								</th>
								<th>
									<a onClick="javascript: return confirm('Are you sure you want to delete'); " href='shop.php?delete=<?php echo $row['id']; ?>'>Delete</a>
								</th>
							<?php
							}
							?>
						</tr>
					<?php   }
				} else { ?>

					<br>
					<br>
					<br>
					<br>
					<br>
					<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong>Nuk ka poste me kete date</strong>
					</div>

				<?php  }
			}
			if (isset($_GET['from_date']) == "") {

				$username_post = $_SESSION['username'];
				if ($_SESSION['user_role'] == "admin") {
					$query = "SELECT * FROM shop ORDER BY id DESC";
					$select_vetura = mysqli_query($connection, $query);
				} else {
					$query = "SELECT * FROM shop WHERE author = '$username_post' ORDER BY id DESC ";
					$select_vetura = mysqli_query($connection, $query);
				}

				while ($row = mysqli_fetch_assoc($select_vetura)) {
					$id = $row['id'];
					$author = $row['author'];
					$comment = $row['comment'];
					$title = $row['title'];
					$cash = $row['cash'];
					$raporti = $row['raporti'];
					$anulime = $row['anulime'];
					$date_now = $row['date_now'];

					echo "<tr>";
				?>



			<?php
					echo "<td>$id</td>";
					echo "<td>$author</td>";
					if ($_SESSION['user_role'] == "admin") { 
					echo "<td>$comment</td>";
					};
					echo "<td>$title</td>";
					echo "<td>$cash</td>";
					echo "<td>$raporti</td>";
					echo "<td>$anulime</td>";
					echo "<td>$date_now</td>";

					if ($_SESSION['user_role'] == "admin") {
						echo "<td><a href='shops.php?p_id={$id}'>View Post</a></td>";
						echo "<td><a href='shop.php?source=edit_shop&p_id={$id}'>Edit</a></td>";
						echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete'); \" href='shop.php?delete={$id}'>Delete</a></td>";
					}
					echo "</tr>";
				}
			}

			?>

		</tbody>
	</table>

	<?php

	if (isset($_GET['delete'])) {

		$the_id = $_GET['delete'];

		$query = "DELETE FROM shop WHERE id = {$the_id}";
		$delete_query = mysqli_query($connection, $query);

		header("Location: shop.php");
	}

	?>

</div>