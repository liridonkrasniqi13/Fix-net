<?php
$per_page = 100;
$cont = "";
if (isset($_POST['checkBoxArray'])) {

    foreach ($_POST['checkBoxArray'] as $postValueID) {

        // echo $checkBoxValue;

        $bulk_options = $_POST['bulk_options'];

        switch ($bulk_options) {

            case 'published':

                $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$postValueID}  ";

                $update_to_published = mysqli_query($connection,  $query);

                confirmQuery($update_to_published);

                break;

            case 'draft':

                $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$postValueID}  ";

                $update_to_draft = mysqli_query($connection,  $query);

                confirmQuery($update_to_draft);

                break;

            case 'delete':

                $query = "DELETE FROM posts WHERE post_id = {$postValueID}  ";

                $update_to_delete = mysqli_query($connection,  $query);

                confirmQuery($update_to_delete);

                break;
        };
    }
};


if (isset($_GET['from_date']) && isset($_GET['to_date'])) {
    $from_date = $_GET['from_date'];
    $to_date = $_GET['to_date'];
    
    if ($_SESSION['user_role'] == "admin") {
        $username = $_GET['post_author'];
        $ticekd = $_GET['ticekd'];
    }
} else {
    $from_date = "";
    $to_date = "";
    if ($_SESSION['user_role'] == "admin") {
        $username = "";
    }
}

?>

<form action="" method='GET'>
    <div class="table-responsive">

        <div id="bulkOptionsContainer">

            <?php if ($_SESSION['user_role'] == "admin") { ?>
                <!-- <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <select name="bulk_options" id="bulk_options" class="form-control">
                        <option value="">Select Option</option>
                        <option value="published">Published</option>
                        <option value="draft">Draft</option>
                        <option value="delete">Delete</option>
                    </select>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <input type="submit" name="submit" class="btn btn-success" value="Apply">

                    <a href="posts.php?source=add_post" class="btn btn-primary">Add new Post</a>

                    <a href="posts.php" class="btn  btn-default">Cancel</a>


                </div> -->

            <?php } ?>


</form>


<?php include "filter.php"; ?>


</div>






<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <?php if ($_SESSION['user_role'] == "admin") { ?>
                <th><input type="checkbox" name="" id="selectAllBoxes"></th>
            <?php } ?>
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
            <th>View Post</th>
            <?php
            if ($_SESSION['user_role'] == "admin") {
                echo "<th>Edit</th>";
                echo "<th>Delete</th>";
            }
            ?>

        </tr>
    </thead>
    <tbody>

        <?php




        if (isset($_GET['from_date']) && isset($_GET['to_date'])) {
            $from_date = $_GET['from_date'];
            $to_date = $_GET['to_date'];

           

            if ($_SESSION['user_role'] == "admin") {
                $username = $_GET['post_author'];
                if ($ticekd == "all") {
                    $filter_ticked = "" ;
                } else {
                    $filter_ticked = " AND post_category_id = '$ticekd' ";
                }
                if ($username == "liridonkrasniqi") {

                    

                    $query = "SELECT * FROM posts WHERE post_date BETWEEN '$from_date' AND '$to_date'  $filter_ticked ";
                    $date_query = mysqli_query($connection, $query);

                } else {



                    $query = "SELECT * FROM posts WHERE post_author = '$username' $filter_ticked AND  post_date BETWEEN '$from_date' AND '$to_date'  ";
                    $date_query = mysqli_query($connection, $query);
                }
            } else {



                $post_author = $_SESSION['username'];
                $query = "SELECT * FROM posts WHERE post_author = '$post_author' AND  post_date BETWEEN '$from_date' AND '$to_date' ";
                $date_query = mysqli_query($connection, $query);
            }



            if (mysqli_num_rows($date_query) > 0) {

                foreach ($date_query as $row) {
        ?>
                    <tr>
                        <?php if ($_SESSION['user_role'] == "admin") { ?>
                            <td><input type='checkbox' class='checkBoxes' name='checkBoxArray[]' value='<?php echo $post_id; ?>'></td>
                        <?php } ?>
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
                        <th>
                            <a href='post.php?p_id=<?php echo $row['post_id']; ?>'>View Post</a>
                        </th>
                        <?php if ($_SESSION['user_role'] == "admin") { ?>
                            <th>
                                <a href='posts.php?source=edit_post&p_id=<?php echo $row['post_id']; ?>'>Edit</a>
                            </th>
                            <th>
                                <a onClick="javascript: return confirm('Are you sure you want to delete'); " href='posts.php?delete=<?php echo $row['post_id']; ?>'>Delete</a>
                            </th>
                        <?php
                        }
                        ?>



                    </tr>

                <?php   }
            } else { ?>

                <br>
                <br>
                <br>
                <br>
                <br>
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Nuk ka poste me kete date</strong>
                </div>

            <?php   }
        }
        if (isset($_GET['from_date']) == "") {


            $post_author_post = $_SESSION['username'];
            // $per_page = 50;
            if ($_SESSION['user_role'] == "admin") {



                if (isset($_GET['page'])) {

                    $page = $_GET['page'];
                } else {
                    $page = "";
                }

                if ($page == "" || $page == 1) {
                    $page_1 = 0;
                } else {
                    $page_1 = ($page * $per_page) - $per_page;
                }

                $post_query_count = "SELECT * FROM posts";
                $find_conut = mysqli_query($connection, $post_query_count);
                $cont = mysqli_num_rows($find_conut);

                $cont = ceil($cont / $per_page);

                $query = "SELECT * FROM posts ORDER BY post_id DESC LIMIT $page_1 , $per_page"; //  LIMIT $page_1 , 5
                $select_posts = mysqli_query($connection, $query);
            } else {

                if (isset($_GET['page'])) {

                    $page = $_GET['page'];
                } else {
                    $page = "";
                }

                if ($page == "" || $page == 1) {
                    $page_1 = 0;
                } else {
                    $page_1 = ($page * $per_page) - $per_page;
                }

                $post_query_count = "SELECT * FROM posts WHERE post_author = '$post_author_post'";
                $find_conut = mysqli_query($connection, $post_query_count);
                $cont = mysqli_num_rows($find_conut);

                $cont = ceil($cont / $per_page);

                $query = "SELECT * FROM posts WHERE post_author = '$post_author_post' ORDER BY post_id DESC LIMIT $page_1 , $per_page "; // LIMIT $page_1 , 5
                $select_posts = mysqli_query($connection, $query);
            }

            while ($row = mysqli_fetch_assoc($select_posts)) {
                $post_id = $row['post_id'];
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_content = $row['post_content'];
                $post_resiver = $row['post_resiver'];
                $post_category_id = $row['post_category_id'];

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

                echo "<tr>";
            ?>

                <?php if ($_SESSION['user_role'] == "admin") { ?>
                    <td><input type='checkbox' class='checkBoxes' name='checkBoxArray[]' value='<?php echo $post_id; ?>'></td>
                <?php } ?>

        <?php
                echo "<td>$post_id</td>";
                echo "<td>$post_author</td>";
                echo "<td>$post_title</td>";

                echo "<td>$post_category_id</td>";
                echo "<td>$post_resiver</td>";
                echo "<td>$post_modem</td>";
                echo "<td>$post_rg6</td>";
                echo "<td>$post_konektor_rg6</td>";
                echo "<td>$post_spliter</td>";
                echo "<td>$post_konektor_tv</td>";
                echo "<td>$post_rg11</td>";
                echo "<td>$post_t32</td>";
                echo "<td>$post_kupler_7402</td>";
                echo "<td>$post_amp</td>";
                echo "<td>$tap_26</td>";
                echo "<td>$tap_23</td>";
                echo "<td>$tap_20</td>";
                echo "<td>$tap_17</td>";
                echo "<td>$tap_14</td>";
                echo "<td>$tap_11</td>";
                echo "<td>$tap_10</td>";
                echo "<td>$tap_8</td>";
                echo "<td>$tap_4</td>";
                echo "<td>$post_date</td>";
                echo "<td><a href='post.php?p_id={$post_id}'>View Post</a></td>";
                if ($_SESSION['user_role'] == "admin") {
                    echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
                    echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete'); \" href='posts.php?delete={$post_id}'>Delete</a></td>";
                }
                echo "</tr>";
            }
        }




        ?>


    </tbody>
</table>


<!-- Pagination States -->
<nav aria-label="...">
    <ul class="pagination">


        <?php

        for ($i = 1; $i <= $cont; $i++) {

            if ($i == $page) {

                echo "
        <li class='page-item active'>
        <a class='u-pagination-v1__item u-pagination-v1-2 g-bg-secondary--active g-color-white--active g-brd-gray-light-v7 g-brd-secondary--hover g-brd-secondary--active g-rounded-4 g-py-8 g-px-15 active' href='posts.php?page={$i}'>{$i}
        </a>
      </li>";
            } else {

                echo "
        <li class='page-item active'>
        <a class='u-pagination-v1__item u-pagination-v1-2 g-bg-secondary--active g-color-white--active g-brd-gray-light-v7 g-brd-secondary--hover g-brd-secondary--active g-rounded-4 g-py-8 g-px-15' href='posts.php?page={$i}'>{$i}
        </a>
      </li>";
            }
        }

        ?>

    </ul>
</nav>
<!-- End Pagination States -->

<?php if ($_SESSION['user_role'] == "admin") { include "total_post.php"; } ?>


<?php



if (isset($_GET['delete'])) {

    $the_post_id = $_GET['delete'];

    $query = "DELETE FROM posts WHERE post_id = {$the_post_id}";
    $delete_query = mysqli_query($connection, $query);

    header("Location: posts.php");
}


?>


</div>
<br>

<?php if ($_SESSION['user_role'] == "admin") { ?>

    <form action="../admin/export2.php" method="post">
        <div class="g-pa-20">
            <div class="row">
                <div class="col-sm-6 col-lg-6 col-xl-3 g-mb-30 d-none">
                    <div class="g-brd-around g-brd-gray-light-v7 g-rounded-4 g-pa-20 g-mb-30">
                        <div class="form-group mb-0 g-max-width-400">
                            <div id="datepickerWrapper" class="u-datepicker-right u-datepicker--v3 g-pos-rel w-100 g-cursor-pointer g-brd-around g-brd-gray-light-v7 g-rounded-4">
                                <input name="from_date" value="<?php echo $from_date; ?>" required="required" class="js-range-datepicker w-100 g-bg-transparent g-font-size-12 g-font-size-default--md g-color-gray-dark-v6 g-pr-80 g-pl-15 g-py-9" type="text" placeholder="From Date" data-rp-wrapper="#datepickerWrapper" data-rp-date-format="Y-m-d">
                                <div class="d-flex align-items-center g-absolute-centered--y g-right-0 g-color-gray-light-v6 g-color-lightblue-v9--sibling-opened g-mr-15">
                                    <i class="hs-admin-calendar g-font-size-18 g-mr-10"></i>
                                    <i class="hs-admin-angle-down"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6 col-xl-3 g-mb-30 d-none">
                    <div class="g-brd-around g-brd-gray-light-v7 g-rounded-4 g-pa-20 g-mb-30">
                        <div class="form-group mb-0 g-max-width-400">
                            <div id="datepickerWrapper" class="u-datepicker-right u-datepicker--v3 g-pos-rel w-100 g-cursor-pointer g-brd-around g-brd-gray-light-v7 g-rounded-4">
                                <input name="to_date" value="<?php echo $to_date; ?>" required="required" class="js-range-datepicker w-100 g-bg-transparent g-font-size-12 g-font-size-default--md g-color-gray-dark-v6 g-pr-80 g-pl-15 g-py-9" type="text" placeholder="To Date" data-rp-wrapper="#datepickerWrapper" data-rp-date-format="Y-m-d">
                                <div class="d-flex align-items-center g-absolute-centered--y g-right-0 g-color-gray-light-v6 g-color-lightblue-v9--sibling-opened g-mr-15">
                                    <i class="hs-admin-calendar g-font-size-18 g-mr-10"></i>
                                    <i class="hs-admin-angle-down"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if ($_SESSION['user_role'] == "admin") { ?>
                    <div class="col-sm-6 col-lg-6 col-xl-3 g-mb-30 d-none">
                        <div class="g-brd-around g-brd-gray-light-v7 g-rounded-4 g-pa-20 g-mb-30">
                            <div class="form-group mb-0 g-max-width-400">
                                <div class="form-group u-select--v3 g-pos-rel g-brd-gray-light-v7 rounded-0 mb-0">
                                    <div class="dropdown bootstrap-select js-select u-select--v3-select u-sibling w-100">
                                        <select name="post_author" id="post_author" class="js-select u-select--v3-select u-sibling w-100" required="required" tabindex="-98">

                                            <?php



                                            $query = "SELECT * FROM users ";
                                            $select_categries = mysqli_query($connection, $query);
                                            echo "<option value='{$username}'>{$username}</option>";
                                            // confirmQuery($select_categries);

                                            while ($row = mysqli_fetch_assoc($select_categries)) {
                                                $username = $row['username'];
                                                echo "<option value='{$username}'>{$username}</option>";
                                            }


                                            ?>
                                        </select>
                                    </div>

                                    <div class="d-flex align-items-center g-absolute-centered--y g-right-0 g-color-gray-light-v6 g-color-lightblue-v9--sibling-opened g-mr-15">
                                        <i class="hs-admin-angle-down"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <div class="col-sm-6 col-lg-6 col-xl-3 g-mb-30">
                    <input class="btn btn-success" type="submit" name="expor_excel" value="Export Raport" />
                </div>
            </div>
        </div>
    </form>

<?php } ?>