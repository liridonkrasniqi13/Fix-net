<?php

if (isset($_POST['create_post'])) {

    $post_title = $_POST['title'];
    $post_author = $_POST['author'];
    $post_category_id = $_POST['post_category_id'];
    $post_status = $_POST['post_status'];

    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];

    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    $post_date = date('d-m-y');
    $post_cmoment_count = 4;


    move_uploaded_file($post_image_temp, "../img/$post_image");

    $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_comment_count,post_status) ";

    $query .= "VALUE('{$post_category_id}','{$post_title}','{$post_author}',now() ,'{'$post_image'}','{$post_content}','$post_tags','{$post_cmoment_count}','{$post_status}')";

    $create_post_query = mysqli_query($connection, $query);

    confirmQuery($create_post_query);

}

?>


<form action="" method="post" enctype="multipart/form-data">
    <legend>Add Post</legend>

    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="title" id="" placeholder="Post Title">
    </div>

    <div class="form-group">
        <label for="post_category_id">Post Categori Id</label>
        <input type="text" class="form-control" name="post_category_id" id="" placeholder="Post Categori Id">
    </div>

    <div class="form-group">
        <label for="author">Post Author</label>
        <input type="text" class="form-control" name="author" id="" placeholder="Post Author">
    </div>

    <div class="form-group">
        <label for="post_status">Post Status</label>
        <input type="text" class="form-control" name="post_status" id="" placeholder="Post Status">
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
        <label for="post_content">Post Content</label>
        <textarea type="text" class="form-control" name="post_content" id="" placeholder="Post Content"></textarea>
    </div>



    <button type="submit" name="create_post" class="btn btn-primary">Submit</button>
</form>