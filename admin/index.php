<?php include "includes/header.php" ?>
<?php include "includes/navigation.php" ?>
<?php

if ($_SESSION['user_role'] == "shop") {
    header("Location: shop.php ");
}

if (($_SESSION['user_role'] == "admin") || ($_SESSION['user_role'] == "superadmin")) {

    if (isset($_GET['from_date']) && isset($_GET['to_date'])) {
        $from_date = $_GET['from_date'];
        $to_date = $_GET['to_date'];
        $username = $_GET['post_author'];

        if ($username == "liridonkrasniqi") {

            $query = "SELECT * FROM posts WHERE post_date BETWEEN '$from_date' AND '$to_date' ORDER BY post_id DESC";
            $select_all_post = mysqli_query($connection, $query);
            $post_count = mysqli_num_rows($select_all_post);

            $query = "SELECT * FROM posts WHERE post_category_id = 'Ticked' AND post_date BETWEEN '$from_date' AND '$to_date' ORDER BY post_id DESC";
            $select_categories_ticked = mysqli_query($connection, $query);
            $categories_status_coun_ticked = mysqli_num_rows($select_categories_ticked);

            $query = "SELECT * FROM posts WHERE post_category_id = 'Instalime' AND post_date BETWEEN '$from_date' AND '$to_date' ORDER BY post_id DESC";
            $select_categories_instalime = mysqli_query($connection, $query);
            $categories_status_count = mysqli_num_rows($select_categories_instalime);

            $query = "SELECT * FROM posts WHERE post_category_id = 'Generale' AND post_date BETWEEN '$from_date' AND '$to_date' ORDER BY post_id DESC";
            $select_categories_general = mysqli_query($connection, $query);
            $categories_status_coun_general = mysqli_num_rows($select_categories_general);
            
            $query = "SELECT * FROM posts WHERE post_category_id = 'Rikyqje' AND post_date BETWEEN '$from_date' AND '$to_date' ORDER BY post_id DESC";
            $select_categories_rikyqje = mysqli_query($connection, $query);
            $categories_status_coun_rikyqje = mysqli_num_rows($select_categories_rikyqje);
            
            $query = "SELECT * FROM posts WHERE post_category_id = 'Catv2' AND post_date BETWEEN '$from_date' AND '$to_date' ORDER BY post_id DESC";
            $select_categories_catv = mysqli_query($connection, $query);
            $categories_status_coun_catv = mysqli_num_rows($select_categories_catv);
            
            $query = "SELECT * FROM posts WHERE post_category_id = 'Transfer' AND post_date BETWEEN '$from_date' AND '$to_date' ORDER BY post_id DESC";
            $select_categories_transfer = mysqli_query($connection, $query);
            $categories_status_coun_transfer = mysqli_num_rows($select_categories_transfer);

        } else {

            $query = "SELECT * FROM posts WHERE post_author = '$username' AND  post_date BETWEEN '$from_date' AND '$to_date' ORDER BY post_id DESC ";
            $select_all_post = mysqli_query($connection, $query);
            $post_count = mysqli_num_rows($select_all_post);

            $query = "SELECT * FROM posts WHERE post_category_id = 'Ticked' AND  post_author = '$username' AND post_date BETWEEN '$from_date' AND '$to_date' ORDER BY post_id DESC";
            $select_categories_ticked = mysqli_query($connection, $query);
            $categories_status_coun_ticked = mysqli_num_rows($select_categories_ticked);

            $query = "SELECT * FROM posts WHERE post_category_id = 'Instalime' AND  post_author = '$username' AND post_date BETWEEN '$from_date' AND '$to_date' ORDER BY post_id DESC";
            $select_categories_instalime = mysqli_query($connection, $query);
            $categories_status_count = mysqli_num_rows($select_categories_instalime);

            $query = "SELECT * FROM posts WHERE post_category_id = 'Generale' AND  post_author = '$username' AND post_date BETWEEN '$from_date' AND '$to_date' ORDER BY post_id DESC";
            $select_categories_general = mysqli_query($connection, $query);
            $categories_status_coun_general = mysqli_num_rows($select_categories_general);
            
            $query = "SELECT * FROM posts WHERE post_category_id = 'Rikyqje' AND  post_author = '$username' AND post_date BETWEEN '$from_date' AND '$to_date' ORDER BY post_id DESC";
            $select_categories_rikyqje = mysqli_query($connection, $query);
            $categories_status_coun_rikyqje = mysqli_num_rows($select_categories_rikyqje);
            
            $query = "SELECT * FROM posts WHERE post_category_id = 'Catv2' AND  post_author = '$username' AND post_date BETWEEN '$from_date' AND '$to_date' ORDER BY post_id DESC";
            $select_categories_catv = mysqli_query($connection, $query);
            $categories_status_coun_catv = mysqli_num_rows($select_categories_catv);
            
            $query = "SELECT * FROM posts WHERE post_category_id = 'Transfer' AND  post_author = '$username' AND post_date BETWEEN '$from_date' AND '$to_date' ORDER BY post_id DESC";
            $select_categories_transfer = mysqli_query($connection, $query);
            $categories_status_coun_transfer = mysqli_num_rows($select_categories_transfer);

        }
    } else {

        $from_date = "";
        $to_date = "";

        $post_author_post = $_SESSION['username'];
        $query = "SELECT * FROM posts WHERE post_author = '$post_author_post'";
        $select_all_post = mysqli_query($connection, $query);
        $post_count = mysqli_num_rows($select_all_post);

        $query = "SELECT * FROM posts WHERE post_category_id = 'Ticked' AND  post_author = '$post_author_post'";
        $select_categories_ticked = mysqli_query($connection, $query);
        $categories_status_coun_ticked = mysqli_num_rows($select_categories_ticked);

        $query = "SELECT * FROM posts WHERE post_category_id = 'Instalime' AND  post_author = '$post_author_post'";
        $select_categories_instalime = mysqli_query($connection, $query);
        $categories_status_count = mysqli_num_rows($select_categories_instalime);


        $query = "SELECT * FROM posts WHERE post_category_id = 'Generale' AND  post_author = '$post_author_post'";
        $select_categories_general = mysqli_query($connection, $query);
        $categories_status_coun_general = mysqli_num_rows($select_categories_general);
        
        $query = "SELECT * FROM posts WHERE post_category_id = 'Rikyqje' AND  post_author = '$post_author_post'";
        $select_categories_rikyqje = mysqli_query($connection, $query);
        $categories_status_coun_rikyqje = mysqli_num_rows($select_categories_rikyqje);
        
        $query = "SELECT * FROM posts WHERE post_category_id = 'Catv2' AND  post_author = '$post_author_post'";
        $select_categories_catv = mysqli_query($connection, $query);
        $categories_status_coun_catv = mysqli_num_rows($select_categories_catv);
        
        $query = "SELECT * FROM posts WHERE post_category_id = 'Transfer' AND  post_author = '$post_author_post'";
        $select_categories_transfer = mysqli_query($connection, $query);
        $categories_status_coun_transfer = mysqli_num_rows($select_categories_transfer);
    }
} else {

    if (isset($_GET['from_date']) && isset($_GET['to_date'])) {

        $from_date = $_GET['from_date'];
        $to_date = $_GET['to_date'];

        $post_author_post = $_SESSION['username'];
        $query = "SELECT * FROM posts WHERE post_author = '$post_author_post' AND  post_date BETWEEN '$from_date' AND '$to_date' ORDER BY post_id DESC ";
        $select_all_post = mysqli_query($connection, $query);
        $post_count = mysqli_num_rows($select_all_post);

        $query = "SELECT * FROM posts WHERE post_category_id = 'Ticked' &&  post_author = '$post_author_post' AND post_date BETWEEN '$from_date' AND '$to_date' ORDER BY post_id DESC ";
        $select_categories_ticked = mysqli_query($connection, $query);
        $categories_status_coun_ticked = mysqli_num_rows($select_categories_ticked);

        $query = "SELECT * FROM posts WHERE post_category_id = 'Instalime' &&  post_author = '$post_author_post' AND post_date BETWEEN '$from_date' AND '$to_date' ORDER BY post_id DESC  ";
        $select_categories_instalime = mysqli_query($connection, $query);
        $categories_status_count = mysqli_num_rows($select_categories_instalime);


        $query = "SELECT * FROM posts WHERE post_category_id = 'Generale' &&  post_author = '$post_author_post' AND post_date BETWEEN '$from_date' AND '$to_date' ORDER BY post_id DESC ";
        $select_categories_general = mysqli_query($connection, $query);
        $categories_status_coun_general = mysqli_num_rows($select_categories_general);
        
        $query = "SELECT * FROM posts WHERE post_category_id = 'Rikyqje' &&  post_author = '$post_author_post' AND post_date BETWEEN '$from_date' AND '$to_date' ORDER BY post_id DESC ";
        $select_categories_rikyqje = mysqli_query($connection, $query);
        $categories_status_coun_rikyqje = mysqli_num_rows($select_categories_rikyqje);
        
        $query = "SELECT * FROM posts WHERE post_category_id = 'Catv2' &&  post_author = '$post_author_post' AND post_date BETWEEN '$from_date' AND '$to_date' ORDER BY post_id DESC ";
        $select_categories_catv = mysqli_query($connection, $query);
        $categories_status_coun_catv = mysqli_num_rows($select_categories_catv);
        
        $query = "SELECT * FROM posts WHERE post_category_id = 'Transfer' &&  post_author = '$post_author_post' AND post_date BETWEEN '$from_date' AND '$to_date' ORDER BY post_id DESC ";
        $select_categories_transfer = mysqli_query($connection, $query);
        $categories_status_coun_transfer = mysqli_num_rows($select_categories_transfer);

    } else {

        $from_date = "";
        $to_date = "";

        $post_author_post = $_SESSION['username'];
        $query = "SELECT * FROM posts WHERE post_author = '$post_author_post'  ";
        $select_all_post = mysqli_query($connection, $query);
        $post_count = mysqli_num_rows($select_all_post);

        $query = "SELECT * FROM posts WHERE post_category_id = 'Ticked' &&  post_author = '$post_author_post' ";
        $select_categories_ticked = mysqli_query($connection, $query);
        $categories_status_coun_ticked = mysqli_num_rows($select_categories_ticked);

        $query = "SELECT * FROM posts WHERE post_category_id = 'Instalime' &&  post_author = '$post_author_post' ";
        $select_categories_instalime = mysqli_query($connection, $query);
        $categories_status_count = mysqli_num_rows($select_categories_instalime);

        $query = "SELECT * FROM posts WHERE post_category_id = 'Generale' &&  post_author = '$post_author_post' ";
        $select_categories_general = mysqli_query($connection, $query);
        $categories_status_coun_general = mysqli_num_rows($select_categories_general);
        
        $query = "SELECT * FROM posts WHERE post_category_id = 'Rikyqje' &&  post_author = '$post_author_post' ";
        $select_categories_rikyqje = mysqli_query($connection, $query);
        $categories_status_coun_rikyqje = mysqli_num_rows($select_categories_rikyqje);
        
        $query = "SELECT * FROM posts WHERE post_category_id = 'Catv2' &&  post_author = '$post_author_post' ";
        $select_categories_catv = mysqli_query($connection, $query);
        $categories_status_coun_catv = mysqli_num_rows($select_categories_catv);
        
        $query = "SELECT * FROM posts WHERE post_category_id = 'Transfer' &&  post_author = '$post_author_post' ";
        $select_categories_transfer = mysqli_query($connection, $query);
        $categories_status_coun_transfer = mysqli_num_rows($select_categories_transfer);
    }
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

?>

<main class="container-fluid px-0 g-pt-65">
    <div class="row no-gutters g-pos-rel g-overflow-x-hidden">

        <?php include "menu.php" ?>

        <div class="col g-ml-45 g-ml-0--lg g-pb-65--md">

            <?php

            if (($_SESSION['user_role'] == "admin") || ($_SESSION['user_role'] == "superadmin")) {
                include "icone.php";
            }

            include "filter.php";

            ?>

            <div class="g-pa-20">

                <script type="text/javascript">
                    google.charts.load('current', {
                        'packages': ['bar']
                    });
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                            ['Data', 'Count'],

                            <?php

                            $element_text = ['All', 'Ticked', 'Instalime', 'Generale' , 'Rikyqje' , 'Catv2' , 'Transfer'];
                            $element_count = [$post_count, $categories_status_coun_ticked, $categories_status_count, 
                            $categories_status_coun_general, $categories_status_coun_rikyqje, $categories_status_coun_catv, 
                            $categories_status_coun_transfer];

                            for ($i = 0; $i < 7; $i++) {
                                echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";
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
</main>

<?php include "includes/footer.php" ?>