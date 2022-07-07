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

                        <?php

                        if (isset($_POST['submit'])) {
                            $cat_title = $_POST['cat_title'];

                            if ($cat_title == "" || empty($cat_title)) {

                                echo "this field should not be empty";
                            } else {

                                $query = "INSERT INTO categories(cat_title)";
                                $query .= "VALUE('{$cat_title}') ";

                                $create_category_query = mysqli_query($connection, $query);

                                if (!$create_category_query) {
                                    die('Save faild' . mysqli_errno($connection));
                                }
                            }
                        }

                        ?>

                        <form action="" method="post" role="form">
                            <legend>Form title</legend>

                            <div class="form-group">
                                <label for="cat_title">Category Title</label>
                                <input type="text" class="form-control" id="" name="cat_title" placeholder="Input field">
                            </div>



                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </form>

                        <form action="" method="post" role="form">
                            <legend>Form title</legend>

                            <div class="form-group">
                                <label for="cat_title">Edit Category</label>
                                <input type="text" class="form-control" id="" name="cat_title" placeholder="Input field">
                            </div>



                            <button type="submit" name="submit" class="btn btn-primary">Edit</button>
                        </form>     

                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Title</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                // Finde all categories
                                $query = "SELECT * FROM categories LIMIT 3";
                                $select_categries = mysqli_query($connection, $query);
                                while ($row = mysqli_fetch_assoc($select_categries)) {
                                    $cat_id = $row['cat_id'];
                                    $cat_title = $row['cat_title'];

                                    echo "<tr>";
                                    echo "<td>{$cat_id}</td>";
                                    echo "<td>{$cat_title}</td>";
                                    echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
                                    echo "</tr>";
                                } ?>


                                <?php
                                
                                    if(isset($_GET['delete'])) {

                                        $the_cat_id = $_GET['delete'];

                                        $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id} ";

                                        $delete_query = mysqli_query($connection, $query);

                                        header("Location: categories.php");

                                    }
                                
                                ?>


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