<?php 

if(isset($_GET['p_id'])) {

    $the_post_id = $_GET['p_id'];
}

$query = "SELECT * FROM posts ";
$select_posts_by_id = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($select_posts_by_id)) {
    $post_id = $row['post_id'];
    $post_title = $row['post_title'];
    $post_author = $row['post_author'];
    $post_date = $row['post_date'];
    $post_image = $row['post_image'];
    $post_content = $row['post_content'];
    $post_comment_count = $row['post_comment_count'];
    $post_status = $row['post_status'];
    $post_tags = $row['post_tags'];
    $post_category_id = $row['post_category_id'];

}

?>


<form action="" method="post" enctype="multipart/form-data">
    <legend>Add Post</legend>

    <div class="form-group">
        <label for="title">Post Title</label>
        <input value="<?php echo $post_title; ?>" type="text" class="form-control" name="title" id="" placeholder="Post Title">
    </div>

    <div class="form-group">
        
        <select name="post_category_id" id="post_category_id" class="form-control" required="required">

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
        <label for="author">Post Author</label>
        <input value="<?php echo $post_author; ?>" type="text" class="form-control" name="author" id="" placeholder="Post Author">
    </div>

    <div class="form-group">
        <label for="post_status">Post Status</label>
        <input value="<?php echo $post_status; ?>" type="text" class="form-control" name="post_status" id="" placeholder="Post Status">
    </div>

    <div class="form-group">
        <img width="100" src="../img/<?php echo $post_image; ?>" alt="">
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input value="<?php echo $post_tags; ?>" type="text" class="form-control" name="post_tags" id="" placeholder="Post Tags">
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea value="" type="text" class="form-control" name="post_content" id="" placeholder="Post Content"><?php echo $post_content; ?></textarea>
    </div>

    <button type="submit" name="create_post" class="btn btn-primary">Submit</button>
</form>