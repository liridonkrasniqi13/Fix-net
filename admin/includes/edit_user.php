<?php

if(isset($_GET['edit_user'])) {
     $the_user_id = $_GET['edit_user'];

     $query = "SELECT * FROM users WHERE user_id = $the_user_id ";
            $select_users_query = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($select_users_query)) {
                $user_id = $row['user_id'];
                $username = $row['username'];
                $user_password = $row['user_password'];
                $user_firstname = $row['user_firstname'];
                $user_lastname = $row['user_lastname'];
                $user_email = $row['user_email'];
                $user_image = $row['user_image'];
                $user_role = $row['user_role'];
}

}

if (isset($_POST['edit_user'])) {

    // $user_id = $_POST['user_id'];
    echo $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];

    // $post_image = $_FILES['image']['name'];
    // $post_image_temp = $_FILES['image']['tmp_name'];

    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    // $post_date = date('d-m-y');


    // move_uploaded_file($post_image_temp, "../img/$post_image");

    $query = "SELECT rentSalt FROM users";
        $select_rentSalt_query = mysqli_query($connection, $query);

        if (!$select_rentSalt_query) {
            die("Query failde" . mysqli_error($connection));
        }

        $row = mysqli_fetch_array($select_rentSalt_query);
        $salt = $row['rentSalt']; 
        $hashed_password = crypt($user_password, $salt);


    $query = "UPDATE users SET 
    user_firstname = '{$user_firstname}', 
    user_lastname = '{$user_lastname}',
    user_role = '{$user_role}',
    username = '{$username}',
    user_email = '{$user_email}',
    user_password = '{$hashed_password}'
    WHERE user_id = {$the_user_id}";
    // $query .="post_author = '{$post_author}', ";
    // $query .="WHERE post_id = {$the_post_id}";

    $edit_user_query = mysqli_query($connection, $query);

    confirmQuery($edit_user_query);
}

?>


<form action="" method="post" enctype="multipart/form-data">
    <legend>Add User</legend>

    <div class="form-group">
        <label for="user_firstname">FirstName</label>
        <input type="text" class="form-control" name="user_firstname" id="user_firstname" value="<?php echo $user_firstname; ?>" placeholder="FirstName">
    </div>

    <div class="form-group">
        <label for="user_lastname">Lastname</label>
        <input type="text" class="form-control" name="user_lastname"  value="<?php echo $user_lastname; ?>" placeholder="Lastname">
    </div>


    <div class="form-group">
        <select name="user_role" id="user_role" class="form-control" required="required">
        <option value="subscriber"><?php echo $user_role; ?></option>
            <?php 
            
            if($user_role  == 'admin') {
                echo" <option value='subscriber'>subscriber</option>";
            } else {
                echo " <option value='admin'>admin</option>";
            }
            
            ?>
           
            
        </select>
    </div>


    <!-- <div class="form-group">
        <label for="image">Post Image</label>
        <input type="file" class="form-control" name="image" id="">
    </div> -->

    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username" id="" value="<?php echo $username; ?>" placeholder="Username">
    </div>

    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="email" class="form-control" name="user_email" id="" value="<?php echo $user_email; ?>" placeholder="Email">
    </div>

    <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" class="form-control" name="user_password" id="" value="<?php echo $user_password; ?>" placeholder="Password">
    </div>



    <button type="submit" name="edit_user" class="btn btn-primary">Edit User</button>
</form>