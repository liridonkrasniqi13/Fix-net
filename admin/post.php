<?php include "includes/header.php" ?>

<!-- Navigation -->
<?php include "includes/navigation.php" ?>

<main class="container-fluid px-0 g-pt-65">
    <div class="row no-gutters g-pos-rel g-overflow-x-hidden">


        <?php include "menu.php" ?>

        <div class="col g-ml-45 g-ml-0--lg g-pb-65--md">

            <div class="g-pa-20">

                <?php



                if (isset($_GET['p_id'])) {

                    $the_post_id = $_GET['p_id'];
                }


                $query = "SELECT * FROM posts WHERE post_id = $the_post_id";
                $select_all_post_query = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_all_post_query)) {
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_content = $row['post_content'];

                ?>

                    <h1 class="page-header">
                        <?php echo $post_author ?>
                        <small class="float-right"><?php
                                                    if ($_SESSION['user_role'] == "admin") {
                                                        $username = "";


                                                        echo "
                                <a href='posts.php?source=edit_post&p_id={$the_post_id}'>Edit post</a>
                            ";
                                                    }   ?></small>
                    </h1>

                    <div class="u-shadow-v1-3 g-line-height-2 g-pa-40 g-mb-30" role="alert">
                        <p class="mb-0">Client</p>
                        <h3 class="h2 g-font-weight-300 g-mb-20"><?php echo $post_title ?></h3>
                        <p class="mb-0">Date</p>
                        <h3 class="h5 g-font-weight-300 g-mb-20"> <i class="hs-admin-timer"></i> <?php echo $post_date ?></h3>
                        <p class="mb-0">Comment</p>
                        <h3 class="h5 g-font-weight-300 g-mb-20">
                            <?php echo $post_content ?>
                        </h3>
                    </div>

                    <hr>



                <?php } ?>

                <!-- Blog Comments -->



                <?php

                if (isset($_POST['create_comment'])) {

                    $the_post_id = $_GET['p_id'];

                    $comment_author = $_POST['comment_author'];
                    $comment_content = $_POST['comment_content'];

                    if (!empty($comment_author) && !empty($comment_content)) {







                        $query = "INSERT INTO comments (comment_post_id, comment_author,
         comment_content, comment_status, comment_date)";

                        $query .= "VALUES ($the_post_id, '{$comment_author}',
         '{$comment_content}', 'Unapproved', now())";

                        $create_comment_query = mysqli_query($connection, $query);

                        if (!$create_comment_query) {
                            die('Query faild' . mysqli_error($connection, $query));
                        }

                        $query = " UPDATE posts SET post_comment_count = post_comment_count + 1 
        WHERE post_id = $the_post_id ";
                        $update_comment_count =  mysqli_query($connection, $query);
                    } else {
                        echo "<script>alert('Fields cannot be empty')</script>";
                    }
                }

                ?>

                <?php

                $query = "SELECT * FROM comments WHERE comment_post_id = {$the_post_id} ";
                $query .= " AND comment_status = 'approved' ORDER BY comment_id DESC ";
                $select_comment_query = mysqli_query($connection, $query);
                if (!$select_comment_query) {
                    die('Query failed' . mysqli_errno($connection,  $query));
                }
                while ($row = mysqli_fetch_array($select_comment_query)) {
                    $comment_date = $row['comment_date'];
                    $comment_content = $row['comment_content'];
                    $comment_author = $row['comment_author'];



                ?>

                    <div class="u-shadow-v1-3 g-line-height-2 g-pa-40 g-mb-30" role="alert">
                        <p class="mb-0">Comment from</p>
                        <h3 class="h2 g-font-weight-300 g-mb-20"><?php echo $comment_author; ?></h3>
                        <p class="mb-0">Date</p>
                        <h3 class="h5 g-font-weight-300 g-mb-20"> <i class="hs-admin-timer"></i> <?php echo $comment_date; ?></h3>
                        <p class="mb-0">Comment</p>
                        <h3 class="h5 g-font-weight-300 g-mb-20">
                            <?php echo $comment_content; ?>
                        </h3>
                    </div>

                <?php } ?>


                <!-- Comments Form -->
                <div class="u-shadow-v1-3 g-line-height-2 g-pa-40 g-mb-30" role="alert">
                    <h4>Leave a Comment:</h4>
                    <form action="" method="post" role="form">
                        <div class="form-group">
                            <label for="Author">Author</label>
                            <input type="text" class="form-control" name="comment_author">
                        </div>
                        <div class="form-group">
                            <label for="Comment">Comment</label>
                            <textarea name="comment_content" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->






            </div>

        </div>
    </div>
</main>

<?php include "includes/footer.php" ?>