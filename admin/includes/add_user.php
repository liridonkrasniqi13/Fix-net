<?php

if (isset($_POST['create_user'])) {

    // $user_id = $_POST['user_id'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];

    // $post_image = $_FILES['image']['name'];
    // $post_image_temp = $_FILES['image']['tmp_name'];

    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    // $post_date = date('d-m-y');


    // move_uploaded_file($post_image_temp, "../img/$post_image");

    $query = "INSERT INTO users(user_lastname, user_firstname,  user_email, username, user_role, user_password ) ";

    $query .= "VALUE('{$user_lastname}','{$user_firstname}','{$user_email}','$username','{$user_role}','{$user_password}')";

    $create_user_query = mysqli_query($connection, $query);

    confirmQuery($create_user_query);
    
    echo "User Crated: " . "" . "<a href='users.php'>View Users</a>";
}

?>


<form action="" method="post" enctype="multipart/form-data">
    <legend>Add User</legend>

    <div class="form-group">
        <label for="user_firstname">FirstName</label>
        <input type="text" class="form-control" name="user_firstname" id="" placeholder="FirstName">
    </div>

    <div class="form-group">
        <label for="user_lastname">Lastname</label>
        <input type="text" class="form-control" name="user_lastname" id="" placeholder="Lastname">
    </div>


    <div class="form-group">
        <select name="user_role" id="user_role" class="form-control" required="required">
            <option value="admin">admin</option>
            <option value="subscriber">subscriber</option>
        </select>
    </div>


    <!-- <div class="form-group">
        <label for="image">Post Image</label>
        <input type="file" class="form-control" name="image" id="">
    </div> -->

    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username" id="" placeholder="Username">
    </div>

    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="email" class="form-control" name="user_email" id="" placeholder="Email">
    </div>

    <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" class="form-control" name="user_password" id="" placeholder="Password">
    </div>



    <button type="submit" name="create_user" class="btn btn-primary">Add User</button>
</form>