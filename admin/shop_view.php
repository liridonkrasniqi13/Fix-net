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

                $query = "SELECT * FROM shop WHERE id = $the_post_id";
                $select_all_post_query = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_all_post_query)) {
                    $id  = $row['id'];
                    $author  = $row['author'];
                    $smart  = $row['smart'];
                    $comment  = $row['comment'];
                    $cash  = $row['cash'];
                    $raporti  = $row['raporti'];
                    $anulime  = $row['anulime'];
                    $date_now  = $row['date_now'];

                ?>

                    <h1 class="page-header">
                        <?php echo $comment ?>
                        <small class="float-right">
                            <?php if ($_SESSION['user_role'] == "superadmin") {
                                $username = "";
                                echo " <a href='shop.php?source=edit_shop&p_id={$the_post_id}'>Edit post</a> ";
                            }
                            ?>
                        </small>
                    </h1>

                    <div class="u-shadow-v1-3 g-line-height-2 g-pa-40 g-mb-30" role="alert">
                        <p class="mb-0">Date</p>
                        <h3 class="h5 g-font-weight-300 g-mb-20"> <i class="hs-admin-timer"></i> <?php echo $date_now ?></h3>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Shop</th>
                                        <th>Albi Smart</th>
                                        <th>Shuma Cash</th>
                                        <th>Z Raporti</th>
                                        <th>Anulime</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>

                                        <th><?php echo $id; ?></th>
                                        <th><?php echo $author; ?></th>
                                        <th><?php echo $smart; ?></th>
                                        <th><?php echo $cash; ?></th>
                                        <th><?php echo $raporti; ?></th>
                                        <th><?php echo $anulime; ?></th>

                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>

                    <hr>

                <?php } ?>

            </div>

        </div>
    </div>
</main>

<?php include "includes/footer.php" ?>