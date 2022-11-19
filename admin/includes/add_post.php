<?php

if (isset($_POST['create_post'])) {

    $post_title = $_POST['title'];
    $post_author = $_SESSION['username'];
    $post_category_id = $_POST['post_category'];
    $post_status = $_POST['post_status'];

    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];

    $post_tags = $_POST['post_tags'];
    $post_resiver = $_POST['post_resiver'];
    $post_content = $_POST['post_content'];
    $post_date = date('d-m-y');


    move_uploaded_file($post_image_temp, "../img/$post_image");

    $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_resiver, post_status) ";

    $query .= "VALUE('{$post_category_id}','{$post_title}','{$post_author}',now() ,'{'$post_image'}','{$post_content}','$post_tags','$post_resiver','{$post_status}')";

    $create_post_query = mysqli_query($connection, $query);

    confirmQuery($create_post_query);

    $the_post_id = mysqli_insert_id($connection);

    echo "<div class='alert alert-success' role='alert'>Post Created. <a href='posts.php'>View Post</a> or <a href='../post.php?p_id={$the_post_id}'>Edit the Post</a></div>";

}

?>


<form action="" method="post" enctype="multipart/form-data">
    <legend>Add Post</legend>

    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="title" id="" placeholder="Post Title">
    </div>

    <div class="form-group">

        <select name="post_category" id="post_category" class="form-control" required="required">

            <?php

            $query = "SELECT * FROM categories ";
            $select_categries = mysqli_query($connection, $query);

            // confirmQuery($select_categries);

            while ($row = mysqli_fetch_assoc($select_categries)) {
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];

                echo "<option value='{$cat_id}'>{$cat_title}</option>";
            }

            ?>


        </select>

    </div>

    <div class="form-group">
        <label for="author">Post Author <?php 
                        if(isset($_SESSION['username'])) {
                            echo  $_SESSION['username'];
                        };
                    ?></label>
        <!-- <input type="text" class="form-control" name="author" id="" placeholder="Post Author"> -->
    </div>

    <div class="form-group">
        <label for="post_status">Post Status</label>
        <select name="post_status" id="input" class="form-control" required="required">
            <option value="draft">Select Options</option>
            <option value="published">Published</option>
            <option value="draft">Draft</option>
        </select>
    </div>

    <div class="form-group">
        <label for="image">Post Image</label>
        <input type="file" class="form-control" name="image" id="">
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags" id="" placeholder="Post Tags">
    </div>
    <div class="form-group">
        <label for="post_resiver">Resever </label>
        <input type="number" class="form-control" name="post_resiver" id="" placeholder="Resever" value="0">
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea type="text" class="form-control" name="post_content" id="" placeholder="Post Content"></textarea>
    </div>



    <button type="submit" name="create_post" class="btn btn-primary">Submit</button>
</form>