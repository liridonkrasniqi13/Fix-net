<?php

if (isset($_POST['create_post'])) {

    $post_title = $_POST['title'];
    $post_author = $_SESSION['username'];
    $post_category_id = $_POST['post_category'];


    $post_resiver = $_POST['post_resiver'];
    $post_modem = $_POST['post_modem'];
    $post_content = $_POST['post_content'];
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
    $post_date = date('d-m-y');



    $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_content, post_resiver, post_modem, post_rg6,
    post_konektor_rg6, post_spliter, post_konektor_tv, post_rg11, post_t32, post_kupler_7402, post_amp,
    tap_26, tap_23, tap_20, tap_17, tap_14, tap_11, tap_10, tap_8, tap_4) ";

    $query .= "VALUE('{$post_category_id}','{$post_title}','{$post_author}',now() ,'{$post_content}','{$post_resiver}', '{$post_modem}', '{$post_rg6}',
    '{$post_konektor_rg6}', '{$post_spliter}', '{$post_konektor_tv}', '{$post_rg11}', '{$post_t32}', '{$post_kupler_7402}', '{$post_amp}',
    '{$tap_26}', '{$tap_23}', '{$tap_20}', '{$tap_17}', '{$tap_14}', '{$tap_11}', '{$tap_10}', '{$tap_8}', '{$tap_4}')";

    $create_post_query = mysqli_query($connection, $query);

    confirmQuery($create_post_query);

    $the_post_id = mysqli_insert_id($connection);

    echo "<div class='alert alert-success' role='alert'>Post Created. <a href='posts.php'>View Post</a> or <a href='../post.php?p_id={$the_post_id}'>Edit the Post</a></div>";
}

?>


<form action="" method="post" enctype="multipart/form-data">
    <legend>Add Post</legend>

    <div class="form-group">
        <label for="title">Emri Klientit</label>
        <input type="text" class="form-control" name="title" id="" placeholder="Emri Klientit" required="required">
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
        <label for="author">Post Author
            <?php
            if (isset($_SESSION['username'])) {
                echo  $_SESSION['username'];
            };
            ?></label>

        <?php if ($_SESSION['user_role'] == "admin") {
            echo $_SESSION['user_role'];
        } ?>
        <!-- <input type="text" class="form-control" name="author" id="" placeholder="Post Author"> -->
    </div>

    <div class="form-group">
        <label for="post_content">Comment</label>
        <textarea type="text" class="form-control" name="post_content" id="" placeholder="Comment"></textarea>
    </div>


    <div class="form-group">
        <label for="post_modem">Modem </label>
        <input type="number" class="form-control" name="post_modem" id="" placeholder="Modem" >
    </div>

    <div class="form-group">
        <label for="post_resiver">Resever </label>
        <input type="number" class="form-control" name="post_resiver" id="" placeholder="Resever" >
    </div>

    <div class="form-group">
        <label for="post_rg6">RG6 </label>
        <input type="number" class="form-control" name="post_rg6" id="" >
    </div>

    <div class="form-group">
        <label for="post_konektor_rg6">Konektor RG6 </label>
        <input type="number" class="form-control" name="post_konektor_rg6" id="" >
    </div>

    <div class="form-group">
        <label for="post_spliter">Spliter </label>
        <input type="number" class="form-control" name="post_spliter" id="" >
    </div>

    <div class="form-group">
        <label for="post_konektor_tv">Konektor Tv </label>
        <input type="number" class="form-control" name="post_konektor_tv" id="" >
    </div>

    <div class="form-group">
        <label for="post_rg11">RG11 </label>
        <input type="number" class="form-control" name="post_rg11" id="" >
    </div>

    <div class="form-group">
        <label for="post_t32">T32 </label>
        <input type="number" class="form-control" name="post_t32" id="" >
    </div>

    <div class="form-group">
        <label for="post_kupler_7402">Kupler 7402</label>
        <input type="number" class="form-control" name="post_kupler_7402" id="" >
    </div>

    <div class="form-group">
        <label for="post_amp">AMP</label>
        <input type="number" class="form-control" name="post_amp" id="" >
    </div>

    <div class="form-group">
        <label for="tap_26">Tap 26 db</label>
        <input type="number" class="form-control" name="tap_26" id="" >
    </div>

    <div class="form-group">
        <label for="tap_23">Tap 23 db</label>
        <input type="number" class="form-control" name="tap_23" id="" >
    </div>

    <div class="form-group">
        <label for="tap_20">Tap 20 db</label>
        <input type="number" class="form-control" name="tap_20" id="" >
    </div>

    <div class="form-group">
        <label for="tap_17">Tap 17 db</label>
        <input type="number" class="form-control" name="tap_17" id="" >
    </div>

    <div class="form-group">
        <label for="tap_14">Tap 14 db</label>
        <input type="number" class="form-control" name="tap_14" id="" >
    </div>

    <div class="form-group">
        <label for="tap_11">Tap 11 db</label>
        <input type="number" class="form-control" name="tap_11" id="" >
    </div>

    <div class="form-group">
        <label for="tap_10">Tap 10 db</label>
        <input type="number" class="form-control" name="tap_10" id="" >
    </div>

    <div class="form-group">
        <label for="tap_8">Tap 8 db</label>
        <input type="number" class="form-control" name="tap_8" id="" >
    </div>

    <div class="form-group">
        <label for="tap_4">Tap 4 db</label>
        <input type="number" class="form-control" name="tap_4" id="" >
    </div>



    <button type="submit" name="create_post" class="btn btn-primary">Submit</button>
</form>