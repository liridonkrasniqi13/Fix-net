<?php include "includes/header.php" ?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include "includes/navigation.php" ?>


    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Blank Page
                        <small>Subheading</small>
                    </h1>


                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

                        <form action="" method="POST" role="form">
                            <legend>Form title</legend>

                            <div class="form-group">
                                <label for="cat_title">Category Title</label>
                                <input type="text" class="form-control" id="" name="cat_title" placeholder="Input field">
                            </div>



                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </form>

                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <?php

                        $query = "SELECT * FROM categories LIMIT 3";
                        $select_categries = mysqli_query($connection, $query);

                        ?>

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Title</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                while ($row = mysqli_fetch_assoc($select_categries)) {
                                    $cat_id = $row['cat_id'];
                                    $cat_title = $row['cat_title'];

                                    echo "<tr>";
                                    echo "<td>{$cat_id}</td>";
                                    echo "<td>{$cat_title}</td>";
                                    echo "</tr>";
                                } ?>


                            </tbody>
                        </table>


                    </div>


                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<?php include "includes/footer.php" ?>