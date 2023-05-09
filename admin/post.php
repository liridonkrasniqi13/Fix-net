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

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>

                                        <th>Id</th>
                                        <th>Author</th>
                                        <th>Klienti</th>
                                        <th>Tiket</th>
                                        <th>Resiver</th>
                                        <th>Modem</th>
                                        <th>RG6</th>
                                        <th>Konektor RG6</th>
                                        <th>Spliter</th>
                                        <th>Konektor Tv</th>
                                        <th>RG11</th>
                                        <th>T32</th>
                                        <th>Kupler 7402</th>
                                        <th>AMP</th>
                                        <th>Tap 26</th>
                                        <th>Tap 23</th>
                                        <th>Tap 20</th>
                                        <th>Tap 17</th>
                                        <th>Tap 14</th>
                                        <th>Tap 11</th>
                                        <th>Tap 10</th>
                                        <th>Tap 8</th>
                                        <th>Kartela</th>
                                        <th>Date</th>


                                    </tr>
                                </thead>
                                <tbody>




                                    <tr>
                                        <th><?php echo $row['post_id']; ?></th>
                                        <th><?php echo $row['post_author']; ?></th>
                                        <th><?php echo $row['post_title']; ?></th>
                                        <th><?php echo $row['post_category_id']; ?></th>
                                        <th><?php echo $row['post_resiver']; ?></th>
                                        <th><?php echo $row['post_modem']; ?></th>
                                        <th><?php echo $row['post_rg6']; ?></th>
                                        <th><?php echo $row['post_konektor_rg6']; ?></th>
                                        <th><?php echo $row['post_spliter']; ?></th>
                                        <th><?php echo $row['post_konektor_tv']; ?></th>
                                        <th><?php echo $row['post_rg11']; ?></th>
                                        <th><?php echo $row['post_t32']; ?></th>
                                        <th><?php echo $row['post_kupler_7402']; ?></th>
                                        <th><?php echo $row['post_amp']; ?></th>
                                        <th><?php echo $row['tap_26']; ?></th>
                                        <th><?php echo $row['tap_23']; ?></th>
                                        <th><?php echo $row['tap_20']; ?></th>
                                        <th><?php echo $row['tap_17']; ?></th>
                                        <th><?php echo $row['tap_14']; ?></th>
                                        <th><?php echo $row['tap_11']; ?></th>
                                        <th><?php echo $row['tap_10']; ?></th>
                                        <th><?php echo $row['tap_8']; ?></th>
                                        <th><?php echo $row['tap_4']; ?></th>
                                        <th><?php echo $row['post_date']; ?></th>

                                    </tr>


                                </tbody>
                            </table>
                        </div>

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