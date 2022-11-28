<?php include "includes/header.php" ?>
<!-- Navigation -->
<?php include "includes/navigation.php" ?>

<main class="container-fluid px-0 g-pt-65">
    <div class="row no-gutters g-pos-rel g-overflow-x-hidden">


        <?php include "menu.php" ?>

        <div class="col g-ml-45 g-ml-0--lg g-pb-65--md">

            <div class="g-pa-20">

                <div class="col-xs-6 col-sm-6 col-md-5 col-lg-5">

                    <?php insert_categoris(); ?>

                    <form action="" method="post" role="form">
                        <legend>Form title</legend>

                        <div class="form-group">
                            <label for="cat_title">Category Title</label>
                            <input type="text" class="form-control" id="" name="cat_title" placeholder="Input field">
                        </div>



                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>

                    <?php

                    if (isset($_GET['edit'])) {
                        $cat_id = $_GET['edit'];

                        include "includes/update_category.php";
                    }

                    ?>


                </div>

                <div class="col-xs-6 col-sm-6 col-md-5 col-lg-5">

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Category Title</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php findeAllCategoris(); ?>


                            <?php deleteCategoris(); ?>


                        </tbody>
                    </table>


                </div>


            </div>
        </div>
    </div>
</main>


<?php include "includes/footer.php" ?>