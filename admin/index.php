<?php include "includes/header.php" ?>
<?php 

$post_author_post = $_SESSION['username'];
if ($_SESSION['user_role'] == "admin") {
    $query = "SELECT * FROM posts";
    $select_all_post = mysqli_query($connection, $query);
    $post_count = mysqli_num_rows($select_all_post);

    echo "<div class='huge'>{$post_count}</div>";
    } else {
    $query = "SELECT * FROM posts WHERE post_author = '$post_author_post'";
    $select_all_post = mysqli_query($connection, $query);
    $post_count = mysqli_num_rows($select_all_post);

        echo "<div class='huge'>{$post_count}</div>";
    }

    $query = "SELECT * FROM comments ";
    $select_all_comments = mysqli_query($connection, $query);
    $comments_count = mysqli_num_rows($select_all_comments);

    $query = "SELECT * FROM users ";
    $select_all_users = mysqli_query($connection, $query);
    $users_count = mysqli_num_rows($select_all_users);

    $query = "SELECT * FROM categories ";
    $select_all_categories = mysqli_query($connection, $query);
    $categories_count = mysqli_num_rows($select_all_categories);


    if ($_SESSION['user_role'] == "admin") { 

        $query = "SELECT * FROM posts WHERE post_category_id = '15' ";
        $select_categories_instalime = mysqli_query($connection, $query);
        $categories_status_count = mysqli_num_rows($select_categories_instalime);

        $query = "SELECT * FROM posts WHERE post_category_id = '16' ";
        $select_categories_ticked = mysqli_query($connection, $query);
        $categories_status_coun_ticked = mysqli_num_rows($select_categories_ticked);

        $query = "SELECT * FROM posts WHERE post_category_id = '17'";
        $select_categories_general = mysqli_query($connection, $query);
        $categories_status_coun_general = mysqli_num_rows($select_categories_general);

    } else {

        $query = "SELECT * FROM posts WHERE post_category_id = '16' &&  post_author = '$post_author_post' ";
        $select_categories_instalime = mysqli_query($connection, $query);
        $categories_status_count = mysqli_num_rows($select_categories_instalime);

        $query = "SELECT * FROM posts WHERE post_category_id = '15' &&  post_author = '$post_author_post' ";
        $select_categories_ticked = mysqli_query($connection, $query);
        $categories_status_coun_ticked = mysqli_num_rows($select_categories_ticked);



        $query = "SELECT * FROM posts WHERE post_category_id = '17' &&  post_author = '$post_author_post' ";
        $select_categories_general = mysqli_query($connection, $query);
        $categories_status_coun_general = mysqli_num_rows($select_categories_general);

    }

?>
<div id="wrapper">

    <!-- <?php if ($connection) echo "HEllo"; ?> -->

    <!-- Navigation -->
    <?php include "includes/navigation.php" ?>


    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">

                        <small><?php echo $_SESSION['username'] ?></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i> <a href="index.html">Dashboard</a>
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->


            <?php 

            if ($_SESSION['user_role'] == "admin") { 
                include "icone.php" ;
            }
            
            ?>

            <div class="row">
                <script type="text/javascript">
                    google.charts.load('current', {
                        'packages': ['bar']
                    });
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                            ['Data', 'Count'],

                            <?php 

                            if ($_SESSION['user_role'] == "admin") {
                                $element_text = ['Active Post', 'Instalime', 'Ticked', 'Generale', 'Comments', 'Users', 'Category'];
                                $element_count = [$post_count, $categories_status_count, $categories_status_coun_ticked, $categories_status_coun_general , $comments_count, $users_count, $categories_count];

                                for ($i = 0; $i < 7; $i++) {
                                    echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";
                            }
                                
                            } else {

                                $element_text = ['Active Post', 'Instalime', 'Ticked', 'Generale'];
                            $element_count = [$post_count, $categories_status_count, $categories_status_coun_ticked, $categories_status_coun_general];

                            for ($i = 0; $i < 4; $i++) {
                                echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";
                            }

                            }

                            

                            ?>
                            // ['2022', 1000]
                        ]);

                        var options = {
                            chart: {
                                title: '',
                                subtitle: '',
                            }
                        };

                        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                        chart.draw(data, google.charts.Bar.convertOptions(options));
                    }
                </script>

                <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>
            </div>


        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<?php include "includes/footer.php" ?>