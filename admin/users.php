<?php include "includes/header.php" ?>
<!-- Navigation -->
<?php include "includes/navigation.php" ?>



<main class="container-fluid px-0 g-pt-65">
    <div class="row no-gutters g-pos-rel g-overflow-x-hidden">


        <?php include "menu.php" ?>

        <div class="col g-ml-45 g-ml-0--lg g-pb-65--md">

            <div class="g-pa-20">

                <?php

                if (isset($_GET['source'])) {

                    $source = $_GET['source'];
                } else {
                    $source = '';
                }

                switch ($source) {
                    case 'add_user';
                        include "includes/add_user.php";
                        break;

                    case 'edit_user';
                        include "includes/edit_user.php";
                        break;


                    default:
                        include "includes/views_all_users.php";
                        break;
                }

                ?>


            </div>

        </div>
    </div>
</main>


<?php include "includes/footer.php" ?>