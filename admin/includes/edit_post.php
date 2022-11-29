<?php

if (isset($_GET['p_id'])) {

    $the_post_id = $_GET['p_id'];
}

$query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
$select_posts_by_id = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($select_posts_by_id)) {
    $post_id = $row['post_id'];
    $post_title = $row['post_title'];
    $post_author = $row['post_author'];
    $post_date = $row['post_date'];
    $post_content = $row['post_content'];
    $post_comment_count = $row['post_comment_count'];
    $post_resiver = $row['post_resiver'];
    $post_category_id = $row['post_category_id'];
    $post_resiver = $row['post_resiver'];
    $post_modem = $row['post_modem'];
    $post_rg6 = $row['post_rg6'];
    $post_konektor_rg6 = $row['post_konektor_rg6'];
    $post_spliter = $row['post_spliter'];
    $post_konektor_tv = $row['post_konektor_tv'];
    $post_rg11 = $row['post_rg11'];
    $post_t32 = $row['post_t32'];
    $post_kupler_7402 = $row['post_kupler_7402'];
    $post_amp = $row['post_amp'];
    $tap_26 = $row['tap_26'];
    $tap_23 = $row['tap_23'];
    $tap_20 = $row['tap_20'];
    $tap_17 = $row['tap_17'];
    $tap_14 = $row['tap_14'];
    $tap_11 = $row['tap_11'];
    $tap_10 = $row['tap_10'];
    $tap_8 = $row['tap_8'];
    $tap_4 = $row['tap_4'];
}

if (isset($_POST['update_post'])) {
    $post_author = $_POST['post_author'];
    $post_title = $_POST['post_title'];
    $post_category_id = $_POST['post_category'];
    $post_content = $_POST['post_content'];

    $post_resiver = $_POST['post_resiver'];
    $post_modem = $_POST['post_modem'];
    $post_rg6 = $_POST['post_rg6'];
    $post_konektor_rg6 = $_POST['post_konektor_rg6'];
    $post_spliter = $_POST['post_spliter'];
    $post_konektor_tv = $_POST['post_konektor_tv'];
    $post_rg11 = $_POST['post_rg11'];
    $post_t32 = $_POST['post_t32'];
    $post_kupler_7402 = $_POST['post_kupler_7402'];
    $post_amp = $_POST['post_amp'];
    $tap_26 = $_POST['tap_26'];
    $tap_23 = $_POST['tap_23'];
    $tap_20 = $_POST['tap_20'];
    $tap_17 = $_POST['tap_17'];
    $tap_14 = $_POST['tap_14'];
    $tap_11 = $_POST['tap_11'];
    $tap_10 = $_POST['tap_10'];
    $tap_8 = $_POST['tap_8'];
    $tap_4 = $_POST['tap_4'];


    $query = "UPDATE posts SET 
    post_author = '{$post_author}', 
    post_title = '{$post_title}',
    post_content = '{$post_content}',
    post_category_id = '{$post_category_id}',
    post_resiver = '{$post_resiver}',
    
    post_resiver =  '{$post_resiver}', 
    post_modem =  '{$post_modem}', 
    post_content =  '{$post_content}', 
    post_rg6 =  '{$post_rg6}', 
    post_konektor_rg6 =  '{$post_konektor_rg6}', 
    post_spliter =  '{$post_spliter}', 
    post_konektor_tv =  '{$post_konektor_tv}', 
    post_rg11 =  '{$post_rg11}', 
    post_t32 =  '{$post_t32}', 
    post_kupler_7402 =  '{$post_kupler_7402}', 
    post_amp =  '{$post_amp}', 
    tap_26 =  '{$tap_26}', 
    tap_23 =  '{$tap_23}', 
    tap_20 =  '{$tap_20}', 
    tap_17 =  '{$tap_17}', 
    tap_14 =  '{$tap_14}', 
    tap_11 =  '{$tap_11}', 
    tap_10 =  '{$tap_10}', 
    tap_8 =  '{$tap_8}', 
    tap_4 =  '{$tap_4}',
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
        <label for="title">Emri Klientit</label>
        <input value="<?php echo $post_title; ?>" type="text" class="form-control" name="post_title" id="" placeholder="Emri Klientit">
    </div>

    <div class="form-group">
    <label for="title">Tiket</label>
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
    <label for="title">Author</label>
        <select name="post_author" id="post_author" class="form-control" required="required">
        
            <option value='<?php echo $post_author; ?>' > <?php echo $post_author; ?></option>

            <?php

            $query = "SELECT * FROM users ";
            $select_categries = mysqli_query($connection, $query);

            // confirmQuery($select_categries);

            while ($row = mysqli_fetch_assoc($select_categries)) {
                $username = $row['username'];

                echo "<option value='{$username}'>{$username}</option>";
            }

            ?>


        </select>

    </div>

    
    <div class="form-group">
        <label for="post_content">Comment</label>
        <textarea value="<?php echo $post_content; ?>" type="text" class="form-control" name="post_content" id="" placeholder="Comment"></textarea>
    </div>


    <div class="form-group">
        <label for="post_modem">Modem </label>
        <input type="number" class="form-control" name="post_modem" id="" placeholder="Modem" value="<?php echo $post_modem; ?>">
    </div>
    
    <div class="form-group">
        <label for="post_resiver">Resever </label>
        <input type="number" class="form-control" name="post_resiver" id="" placeholder="Resever" value="<?php echo $post_resiver; ?>">
    </div>

    <div class="form-group">
        <label for="post_rg6">RG6 </label>
        <input type="number" class="form-control" name="post_rg6" id=""  value="<?php echo $post_rg6; ?>">
    </div>

    <div class="form-group">
        <label for="post_konektor_rg6">Konektor RG6 </label>
        <input type="number" class="form-control" name="post_konektor_rg6" id=""  value="<?php echo $post_konektor_rg6; ?>">
    </div>
    
    <div class="form-group">
        <label for="post_spliter">Spliter </label>
        <input type="number" class="form-control" name="post_spliter" id=""  value="<?php echo $post_spliter; ?>">
    </div>
    
    <div class="form-group">
        <label for="post_konektor_tv">Konektor Tv </label>
        <input type="number" class="form-control" name="post_konektor_tv" id=""  value="<?php echo $post_konektor_tv; ?>">
    </div>
    
    <div class="form-group">
        <label for="post_rg11">RG11 </label>
        <input type="number" class="form-control" name="post_rg11" id=""  value="<?php echo $post_rg11; ?>">
    </div>
    
    <div class="form-group">
        <label for="post_t32">T32 </label>
        <input type="number" class="form-control" name="post_t32" id=""  value="<?php echo $post_t32; ?>"> 
    </div>
    
    <div class="form-group">
        <label for="post_kupler_7402">Kupler 7402</label>
        <input type="number" class="form-control" name="post_kupler_7402" id=""  value="<?php echo $post_kupler_7402; ?>"> 
    </div>
    
    <div class="form-group">
        <label for="post_amp">AMP</label>
        <input type="number" class="form-control" name="post_amp" id=""  value="<?php echo $post_amp; ?>"> 
    </div>

    <div class="form-group">
        <label for="tap_26">Tap 26 db</label>
        <input type="number" class="form-control" name="tap_26" id=""  value="<?php echo $tap_26; ?>"> 
    </div>

    <div class="form-group">
        <label for="tap_23">Tap 23 db</label>
        <input type="number" class="form-control" name="tap_23" id=""  value="<?php echo $tap_23; ?>"> 
    </div>

    <div class="form-group">
        <label for="tap_20">Tap 20 db</label>
        <input type="number" class="form-control" name="tap_20" id=""  value="<?php echo $tap_20; ?>"> 
    </div>

    <div class="form-group">
        <label for="tap_17">Tap 17 db</label>
        <input type="number" class="form-control" name="tap_17" id=""  value="<?php echo $tap_17; ?>"> 
    </div>

    <div class="form-group">
        <label for="tap_14">Tap 14 db</label>
        <input type="number" class="form-control" name="tap_14" id=""  value="<?php echo $tap_14; ?>"> 
    </div>

    <div class="form-group">
        <label for="tap_11">Tap 11 db</label>
        <input type="number" class="form-control" name="tap_11" id=""  value="<?php echo $tap_11; ?>"> 
    </div>

    <div class="form-group">
        <label for="tap_10">Tap 10 db</label>
        <input type="number" class="form-control" name="tap_10" id=""  value="<?php echo $tap_10; ?>"> 
    </div>

    <div class="form-group">
        <label for="tap_8">Tap 8 db</label>
        <input type="number" class="form-control" name="tap_8" id=""  value="<?php echo $tap_8; ?>"> 
    </div>

    <div class="form-group">
        <label for="tap_4">Tap 4 db</label>
        <input type="number" class="form-control" name="tap_4" id=""  value="<?php echo $tap_4; ?>"> 
    </div>

    <button type="submit" name="update_post" class="btn btn-primary">Submit</button>
</form>