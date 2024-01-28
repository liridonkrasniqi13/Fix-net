<?php
$per_page = 100;
$cont = "";
?>

<div class="table-responsive">

    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Id</th>
                <th>Author</th>
                <!-- <th>Comment</th> -->
                <th>FO48-Ads</th>
                <th>FO24-Adss</th>
                <th>FO12-Adss</th>
                <th>FDB FO48</th>
                <th>Fo12</th>
                <th>Fo04</th>
                <th>Fo2(Drop)</th>
                <th>Sp 1/4</th>
                <th>Sp 1/2</th>
                <th>FDB 1/4</th>
                <th>FDB 1/8</th>
                <th>SP 1/16</th>
                <th>PP 48</th>
                <th>PP 24</th>
                <th>PP 12</th>
                <th>Patch Cord</th>
                <th>Spirale</th>
                <th>Shtrenguse Flat</th>
                <th>Hallka</th>
                <th>ONU RF</th>
                <th>Instalime</th>
                <th>Date</th>
                <th>View Post</th>
                <?php
                if (($_SESSION['user_role'] == "admin") || ($_SESSION['user_role'] == "superadmin")) {
                    echo "<th>Edit</th>";
                    echo "<th>Delete</th>";
                }
                ?>

            </tr>
        </thead>
        <tbody>

            <?php

                $post_author_post = $_SESSION['username'];
                // $per_page = 50;
                if (($_SESSION['user_role'] == "admin") || ($_SESSION['user_role'] == "superadmin")) {

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

                    $post_query_count = "SELECT * FROM project_depo";
                    $find_conut = mysqli_query($connection, $post_query_count);
                    $cont = mysqli_num_rows($find_conut);

                    $cont = ceil($cont / $per_page);

                    $query = "SELECT * FROM project_depo ORDER BY id DESC LIMIT $page_1 , $per_page"; //  LIMIT $page_1 , 5
                    $select_posts = mysqli_query($connection, $query);
                } 

                while ($row = mysqli_fetch_assoc($select_posts)) {

                    $id                 = $row['id'];
                    $username           = $row['username'];
                    // $comment            = $row['comment'];
                    $fo48_ads           = $row['fo48_ads'];
                    $fo24_adss          = $row['fo24_adss'];
                    $fo12_adss          = $row['fo12_adss'];
                    $fo24               = $row['fo24'];
                    $fo12               = $row['fo12'];
                    $fo04               = $row['fo04'];
                    $fo2                = $row['fo2'];
                    $fosc               = $row['fosc'];
                    $fdt                = $row['fdt'];
                    $fdb_1_4            = $row['fdb_1_4'];
                    $fdb_1_8            = $row['fdb_1_8'];
                    $sp_1_16            = $row['sp_1_16'];
                    $pp48               = $row['pp48'];
                    $pp24               = $row['pp24'];
                    $pp12               = $row['pp12'];
                    $patch_cord         = $row['patch_cord'];
                    $spirale            = $row['spirale'];
                    $shtrenguse         = $row['shtrenguse'];
                    $hallka             = $row['hallka'];
                    $onu                = $row['onu'];
                    $instalime          = $row['instalime'];
                    $project_date       = $row['project_date'];

                    echo "<tr>";
                ?>

                <?php
                    echo "<td>$id</td>";
                    echo "<td>$username</td>";
                    // echo "<td>$comment</td>";
                    echo "<td>$fo48_ads</td>";
                    echo "<td>$fo24_adss</td>";
                    echo "<td>$fo12_adss</td>";
                    echo "<td>$fo24</td>";
                    echo "<td>$fo12</td>";
                    echo "<td>$fo04</td>";
                    echo "<td>$fo2</td>";
                    echo "<td>$fosc</td>";
                    echo "<td>$fdt</td>";
                    echo "<td>$fdb_1_4</td>";
                    echo "<td>$fdb_1_8</td>";
                    echo "<td>$sp_1_16</td>";
                    echo "<td>$pp48</td>";
                    echo "<td>$pp24</td>";
                    echo "<td>$pp12</td>";
                    echo "<td>$patch_cord</td>";
                    echo "<td>$spirale</td>";
                    echo "<td>$shtrenguse</td>";
                    echo "<td>$hallka</td>";
                    echo "<td>$onu</td>";
                    echo "<td>$instalime</td>";
                    echo "<td>$project_date</td>";
                    echo "<td><a href='project_view_depo.php?p_id={$id}'>View Post</a></td>";
                    if (($_SESSION['user_role'] == "admin") || ($_SESSION['user_role'] == "superadmin")) {
                        echo "<td><a href='project-depo.php?source=edit_project_depo&p_id={$id}'>Edit</a></td>";
                        echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete'); \" href='project-depo.php?delete={$id}'>Delete</a></td>";
                    }
                    echo "</tr>";
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

    <?php

    if (isset($_GET['delete'])) {

        $the_post_id = $_GET['delete'];

        $query = "DELETE FROM project_depo WHERE id = {$the_post_id}";
        $delete_query = mysqli_query($connection, $query);

        header("Location: project-depo.php");
    }

    ?>

</div>
<br>

<?php include "total_project_depo.php" ?>