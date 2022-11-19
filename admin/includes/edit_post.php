<?php

if (isset($_GET['p_id'])) {

    $the_post_id = $_GET['p_id'];
}

$query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
$select_posts_by_id = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($select_posts_by_id)) {
    $post_id = $row['post_id'];
    $post_title = $row['post_title'];
    $post_author = $_SESSION['username'];
    $post_date = $row['post_date'];
    $post_image = $row['post_image'];
    $post_content = $row['post_content'];
    $post_comment_count = $row['post_comment_count'];
    $post_status = $row['post_status'];
    $post_tags = $row['post_tags'];
    $post_resiver = $row['post_resiver'];
    $post_category_id = $row['post_category_id'];
}

if (isset($_POST['update_post'])) {
    $post_author = $_SESSION['username'];
    $post_title = $_POST['post_title'];
    $post_category_id = $_POST['post_category'];
    $post_status = $_POST['post_status'];
    $post_content = $_POST['post_content'];
    $post_tags = $_POST['post_tags'];
    $post_resiver = $_POST['post_resiver'];


    $query = "UPDATE posts SET 
    post_author = '{$post_author}', 
    post_title = '{$post_title}',
    post_content = '{$post_content}',
    post_category_id = '{$post_category_id}',
    post_status = '{$post_status}',
    post_tags = '{$post_tags}',
    post_resiver = '{$post_resiver}',
    post_date = now()
    WHERE post_id = {$the_post_id}";
    // $query .="post_author = '{$post_author}', ";
    // $query .="WHERE post_id = {$the_post_id}";

    $update_post = mysqli_query($connection, $query);

    confirmQuery($update_post);

    echo "<div class='alert alert-success' role='alert'>Post Updated. <a href='posts.php'>View Post</a> or <a href='../post.php?p_id={$the_post_id}'>View the Post</a></div>";
}

?>


<form action="" method="post" enctype="multipart/form-data">
    <legend>Add Post</legend>

    <div class="form-group">
        <label for="title">Post Title</label>
        <input value="<?php echo $post_title; ?>" type="text" class="form-control" name="post_title" id="" placeholder="Post Title">
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
        <select name="post_status" id="post_status" class="form-control" required="required">
            <option value="<?php echo $post_status; ?>"><?php echo $post_status; ?></option>
            <?php 
            
            if($post_status == 'published') {

                echo "<option value='draft'>Draft</option>";

            } else {
                echo "<option value='published'>Published</option>";
            }

            

            ?>

        </select>
    </div>


    <div class="form-group">
        <img width="100" src="../img/<?php echo $post_image; ?>" alt="">
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input value="<?php echo $post_tags; ?>" type="text" class="form-control" name="post_tags" id="" placeholder="Post Tags">
    </div>
    
    <div class="form-group">
        <label for="post_resiver">Resever</label>
        <input value="<?php echo $post_resiver; ?>" type="number" class="form-control" name="post_resiver" id="" >
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea value="" type="text" class="form-control" name="post_content" id="" placeholder="Post Content"><?php echo $post_content; ?></textarea>
    </div>

    <button type="submit" name="update_post" class="btn btn-primary">Submit</button>
</form>