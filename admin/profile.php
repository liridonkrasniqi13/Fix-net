<?php include "includes/header.php" ?>
<!-- Navigation -->
<?php include "includes/navigation.php" ?>
<?php

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    $query = "SELECT * FROM users WHERE username = '{$username}' ";

    $select_user_profile_query = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_array($select_user_profile_query)) {
        $user_id = $row['user_id'];
        // $username = $row['username'];
        $user_password = $row['user_password'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        // $user_image = $row['user_image'];
        // $user_role = $row['user_role'];
    }
}

?>

<?php

if (isset($_POST['edit_user'])) {

    // $user_id = $_POST['user_id'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    // $user_role = $_POST['user_role'];

    // $post_image = $_FILES['image']['name'];
    // $post_image_temp = $_FILES['image']['tmp_name'];

    // $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    // $post_date = date('d-m-y');


    // move_uploaded_file($post_image_temp, "../img/$post_image");

    // $query = "INSERT INTO users(user_lastname, user_firstname,  user_email, username, user_role) ";

    // $query .= "VALUE('{$user_lastname}','{$user_firstname}','{$user_email}','$username','{$user_role}')";

    // $create_user_query = mysqli_query($connection, $query);

    // confirmQuery($create_user_query);


    $query = "UPDATE users SET 
    user_firstname = '{$user_firstname}', 
    user_lastname = '{$user_lastname}',
    user_email = '{$user_email}',
    user_password = '{$user_password}'
    WHERE username = '{$username}'";


    $edit_user_query = mysqli_query($connection, $query);

    confirmQuery($edit_user_query);
}

?>



<main class="container-fluid px-0 g-pt-65">
    <div class="row no-gutters g-pos-rel g-overflow-x-hidden">


        <?php include "menu.php" ?>

        <div class="col g-ml-45 g-ml-0--lg g-pb-65--md">

            <div class="g-pa-20">

                <form action="" method="post" enctype="multipart/form-data">
                    <legend>Add User</legend>

                    <div class="form-group">
                        <label for="user_firstname">FirstName</label>
                        <input type="text" class="form-control" name="user_firstname" id="user_firstname" value="<?php echo $user_firstname; ?>" placeholder="FirstName">
                    </div>

                    <div class="form-group">
                        <label for="user_lastname">Lastname</label>
                        <input type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname; ?>" placeholder="Lastname">
                    </div>



                    <!-- <div class="form-group">
                            <label for="image">Post Image</label>
                            <input type="file" class="form-control" name="image" id="">
                        </div> -->


                    <div class="form-group">
                        <label for="user_email">Email</label>
                        <input type="email" class="form-control" name="user_email" id="" value="<?php echo $user_email; ?>" placeholder="Email">
                    </div>

                    <div class="form-group">
                        <label for="user_password">Password</label>
                        <input type="password" class="form-control" name="user_password" id="" value="<?php echo $user_password; ?>" placeholder="Password">
                    </div>



                    <button type="submit" name="edit_user" class="btn btn-primary">Upate Profile</button>
                </form>

            </div>

        </div>
    </div>
</main>


<?php include "includes/footer.php" ?>