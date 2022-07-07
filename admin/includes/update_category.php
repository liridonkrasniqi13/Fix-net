<form action="" method="post" role="form">
    <legend>Form title</legend>

    <div class="form-group">
        <label for="cat_title">Edit Category</label>

        <?php

        if (isset($_GET['edit'])) {

            $cat_id = $_GET['edit'];

            $query = "SELECT * FROM categories WHERE  cat_id = $cat_id ";
            $select_categries_id = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($select_categries_id)) {
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];
            }

        ?>

            <input value="<?php if (isset($cat_title)) {echo $cat_title;} ?>" type="text" class="form-control" id="" name="cat_title" placeholder="Input field">

        <?php  } ?>



        <?php
        if (isset($_POST['update_category'])) {

            $the_cat_title = $_POST['cat_title'];

            $query = "UPDATE categories SET cat_title = '{$the_cat_title}' WHERE cat_id = {$cat_id} ";

            $update_query = mysqli_query($connection, $query);

            if (!$update_query) {
                die("Query Faild" . mysqli_errno($connection));
            }
        }

        ?>



    </div>



    <button type="submit" name="update_category" class="btn btn-primary">Edit</button>
</form>