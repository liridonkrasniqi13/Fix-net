<?php include "../admin/includes/header.php" ?>

<!-- Navigation -->
<?php include "navigation.php" ?>

<main class="container-fluid px-0 g-pt-65">
    <div class="row no-gutters g-pos-rel g-overflow-x-hidden">

        <?php include "menu.php" ?>

        <div class="col g-ml-45 g-ml-0--lg g-pb-65--md">

            <div class="g-pa-20">

                <?php

                if (isset($_GET['p_id'])) {
                    $the_post_id = $_GET['p_id'];
                }

                $query = "SELECT * FROM project_depo WHERE id = $the_post_id";
                $select_all_post_query = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_all_post_query)) {
                    $id                 = $row['id'];
                    $author             = $row['username'];
                    $comment            = $row['comment'];
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

                ?>

                    <h1 class="page-header">
                        <small class="float-right">
                            <?php
                            if (($_SESSION['user_role'] == "admin") || ($_SESSION['user_role'] == "superadmin")) {
                                $username = "";
                                echo "
                                <a href='project-depo.php?source=edit_project_depo&p_id={$the_post_id}'>Edit post</a>
                            ";
                            }   ?></small>
                    </h1>

                    <div class="u-shadow-v1-3 g-line-height-2 g-pa-40 g-mb-30" role="alert">
                        <p class="mb-0">Author</p>
                        <h3 class="h2 g-font-weight-300 g-mb-20"><?php echo $author ?></h3>
                        <p class="mb-0">Date</p>
                        <h3 class="h5 g-font-weight-300 g-mb-20"> <i class="hs-admin-timer"></i> <?php echo $project_date ?></h3>
                        <p class="mb-0">Comment</p>
                        <h3 class="h5 g-font-weight-300 g-mb-20">
                            <?php echo $comment ?>
                        </h3>

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>

                                        <th>Id</th>
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

                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <?php

                                        echo "<td>$id</td>";
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

                                        ?>

                                </tbody>
                            </table>
                        </div>

                    </div>

                <?php } ?>

            </div>

        </div>
    </div>
</main>

<?php include "../admin/includes/footer.php" ?>