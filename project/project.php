<?php 

include "../admin/includes/header.php";

if ($_SESSION['user_role'] != "superadmin") {
    header("Location: ../admin ");
} 

?>




<!-- Navigation -->
<?php include "navigation.php" ?>


<main class="container-fluid px-0 g-pt-65">
    <div class="row no-gutters g-pos-rel g-overflow-x-hidden">


        <?php include "menu.php" ?>

        <div class="col g-ml-45 g-ml-0--lg  ">

        <div class="g-bg-lightblue-v10-opacity-0_5 g-pa-20">

        <?php

        

        if (isset($_GET['source'])) {

            $source = $_GET['source'];
        } else {
            $source = '';
        }

        switch ($source) {
            case 'project';
                include "includes/add_project.php";
                break;

            case 'edit_project';
                include "includes/edit_project.php";
                break;

            default:
                include "includes/views_all_project.php";
                break;
        }

        ?>
        </div>

    </div>
</main>




    <?php include "../admin/includes/footer.php" ?>