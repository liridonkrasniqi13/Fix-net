<?php include "includes/header.php" ?>
<?php include "includes/navigation.php" ?>
<?php


if ($_SESSION['user_role'] == "admin") {

    if (isset($_GET['from_date']) && isset($_GET['to_date'])) {
        $from_date = $_GET['from_date'];
        $to_date = $_GET['to_date'];
        $username = $_GET['post_author'];


        if ($username == "liridonkrasniqi") {

            $query = "SELECT * FROM posts WHERE post_date BETWEEN '$from_date' AND '$to_date' ORDER BY post_id DESC";
            $select_all_post = mysqli_query($connection, $query);
            $post_count = mysqli_num_rows($select_all_post);

            $query = "SELECT * FROM posts WHERE post_category_id = '15' AND post_date BETWEEN '$from_date' AND '$to_date' ORDER BY post_id DESC";
            $select_categories_instalime = mysqli_query($connection, $query);
            $categories_status_count = mysqli_num_rows($select_categories_instalime);

            $query = "SELECT * FROM posts WHERE post_category_id = '16' AND post_date BETWEEN '$from_date' AND '$to_date' ORDER BY post_id DESC";
            $select_categories_ticked = mysqli_query($connection, $query);
            $categories_status_coun_ticked = mysqli_num_rows($select_categories_ticked);

            $query = "SELECT * FROM posts WHERE post_category_id = '17' AND post_date BETWEEN '$from_date' AND '$to_date' ORDER BY post_id DESC";
            $select_categories_general = mysqli_query($connection, $query);
            $categories_status_coun_general = mysqli_num_rows($select_categories_general);
        } else {

            $query = "SELECT * FROM posts WHERE post_author = '$username' AND  post_date BETWEEN '$from_date' AND '$to_date' ORDER BY post_id DESC ";
            $select_all_post = mysqli_query($connection, $query);
            $post_count = mysqli_num_rows($select_all_post);

            $query = "SELECT * FROM posts WHERE post_category_id = '15' AND  post_author = '$username' AND post_date BETWEEN '$from_date' AND '$to_date' ORDER BY post_id DESC";
            $select_categories_instalime = mysqli_query($connection, $query);
            $categories_status_count = mysqli_num_rows($select_categories_instalime);

            $query = "SELECT * FROM posts WHERE post_category_id = '16' AND  post_author = '$username' AND post_date BETWEEN '$from_date' AND '$to_date' ORDER BY post_id DESC";
            $select_categories_ticked = mysqli_query($connection, $query);
            $categories_status_coun_ticked = mysqli_num_rows($select_categories_ticked);

            $query = "SELECT * FROM posts WHERE post_category_id = '17' AND  post_author = '$username' AND post_date BETWEEN '$from_date' AND '$to_date' ORDER BY post_id DESC";
            $select_categories_general = mysqli_query($connection, $query);
            $categories_status_coun_general = mysqli_num_rows($select_categories_general);
        }
    } else {

        $from_date = "";
        $to_date = "";

        $post_author_post = $_SESSION['username'];
        $query = "SELECT * FROM posts WHERE post_author = '$post_author_post'";
        $select_all_post = mysqli_query($connection, $query);
        $post_count = mysqli_num_rows($select_all_post);

        $query = "SELECT * FROM posts WHERE post_category_id = '15' AND  post_author = '$post_author_post'";
        $select_categories_instalime = mysqli_query($connection, $query);
        $categories_status_count = mysqli_num_rows($select_categories_instalime);

        $query = "SELECT * FROM posts WHERE post_category_id = '16' AND  post_author = '$post_author_post'";
        $select_categories_ticked = mysqli_query($connection, $query);
        $categories_status_coun_ticked = mysqli_num_rows($select_categories_ticked);

        $query = "SELECT * FROM posts WHERE post_category_id = '17' AND  post_author = '$post_author_post'";
        $select_categories_general = mysqli_query($connection, $query);
        $categories_status_coun_general = mysqli_num_rows($select_categories_general);
    }
} else {

    if (isset($_GET['from_date']) && isset($_GET['to_date'])) {

        $from_date = $_GET['from_date'];
        $to_date = $_GET['to_date'];

        $post_author_post = $_SESSION['username'];
        $query = "SELECT * FROM posts WHERE post_author = '$post_author_post' AND  post_date BETWEEN '$from_date' AND '$to_date' ORDER BY post_id DESC ";
        $select_all_post = mysqli_query($connection, $query);
        $post_count = mysqli_num_rows($select_all_post);

        $query = "SELECT * FROM posts WHERE post_category_id = '15' &&  post_author = '$post_author_post' AND post_date BETWEEN '$from_date' AND '$to_date' ORDER BY post_id DESC  ";
        $select_categories_instalime = mysqli_query($connection, $query);
        $categories_status_count = mysqli_num_rows($select_categories_instalime);

        $query = "SELECT * FROM posts WHERE post_category_id = '16' &&  post_author = '$post_author_post' AND post_date BETWEEN '$from_date' AND '$to_date' ORDER BY post_id DESC ";
        $select_categories_ticked = mysqli_query($connection, $query);
        $categories_status_coun_ticked = mysqli_num_rows($select_categories_ticked);

        $query = "SELECT * FROM posts WHERE post_category_id = '17' &&  post_author = '$post_author_post' AND post_date BETWEEN '$from_date' AND '$to_date' ORDER BY post_id DESC ";
        $select_categories_general = mysqli_query($connection, $query);
        $categories_status_coun_general = mysqli_num_rows($select_categories_general);
    } else {

        $from_date = "";
        $to_date = "";

        $post_author_post = $_SESSION['username'];
        $query = "SELECT * FROM posts WHERE post_author = '$post_author_post'  ";
        $select_all_post = mysqli_query($connection, $query);
        $post_count = mysqli_num_rows($select_all_post);

        $query = "SELECT * FROM posts WHERE post_category_id = '15' &&  post_author = '$post_author_post' ";
        $select_categories_instalime = mysqli_query($connection, $query);
        $categories_status_count = mysqli_num_rows($select_categories_instalime);

        $query = "SELECT * FROM posts WHERE post_category_id = '16' &&  post_author = '$post_author_post' ";
        $select_categories_ticked = mysqli_query($connection, $query);
        $categories_status_coun_ticked = mysqli_num_rows($select_categories_ticked);

        $query = "SELECT * FROM posts WHERE post_category_id = '17' &&  post_author = '$post_author_post' ";
        $select_categories_general = mysqli_query($connection, $query);
        $categories_status_coun_general = mysqli_num_rows($select_categories_general);
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
        <!-- Sidebar Nav -->
        <div id="sideNav" class="col-auto u-sidebar-navigation-v1 u-sidebar-navigation--dark">
            <ul id="sideNavMenu" class="u-sidebar-navigation-v1-menu u-side-nav--top-level-menu g-min-height-100vh mb-0">

                <!-- Metrics -->
                <li class="u-sidebar-navigation-v1-menu-item u-side-nav--top-level-menu-item  has-active">
                    <a class="media u-side-nav--top-level-menu-link u-side-nav--hide-on-hidden g-px-15 g-py-12" href="index.php">
                        <span class="d-flex align-self-center g-pos-rel g-font-size-18 g-mr-18">
                            <i class="hs-admin-dashboard"></i>
                        </span>
                        <span class="media-body align-self-center">Dashbord</span>
                    </a>
                </li>
                <!-- End Metrics -->
                <!-- Dashboards -->
                <li class="u-sidebar-navigation-v1-menu-item u-side-nav--has-sub-menu u-side-nav--top-level-menu-item u-side-nav-opened">
                    <a class="media u-side-nav--top-level-menu-link u-side-nav--hide-on-hidden g-px-15 g-py-12" href="#" data-hssm-target="#subMenu1">
                        <span class="d-flex align-self-center g-pos-rel g-font-size-18 g-mr-18">
                            <i class="hs-admin-server"></i>
                        </span>
                        <span class="media-body align-self-center">Intervenime</span>
                        <span class="d-flex align-self-center u-side-nav--control-icon">
                            <i class="hs-admin-angle-right"></i>
                        </span>
                        <span class="u-side-nav--has-sub-menu__indicator"></span>
                    </a>

                    <!-- Dashboards: Submenu-1 -->
                    <ul id="subMenu1" class="u-sidebar-navigation-v1-menu u-side-nav--second-level-menu mb-0" style="display: block;">
                        <!-- Dashboards v1 -->
                        <li class="u-sidebar-navigation-v1-menu-item u-side-nav--second-level-menu-item">
                            <a class="media u-side-nav--second-level-menu-link g-px-15 g-py-12"  href="posts.php">
                                <span class="d-flex align-self-center g-mr-15 g-mt-minus-1">
                                    <i class="hs-admin-blackboard"></i>
                                </span>
                                <span class="media-body align-self-center">View All</span>
                            </a>
                        </li>
                        <!-- End Dashboards v1 -->

                        <!-- Dashboards v2 -->
                        <li class="u-sidebar-navigation-v1-menu-item u-side-nav--second-level-menu-item">
                            <a class="media u-side-nav--second-level-menu-link g-px-15 g-py-12" href="posts.php?source=add_post">
                                <span class="d-flex align-self-center g-mr-15 g-mt-minus-1">
                                    <i class="hs-admin-plus"></i>
                                </span>
                                <span class="media-body align-self-center">Add New</span>
                            </a>
                        </li>
                        <!-- End Dashboards v2 -->
                    </ul>
                    <!-- End Dashboards: Submenu-1 -->
                </li>
                <!-- End Dashboards -->

                <!-- Metrics -->
                <li class="u-sidebar-navigation-v1-menu-item u-side-nav--top-level-menu-item">
                    <a class="media u-side-nav--top-level-menu-link u-side-nav--hide-on-hidden g-px-15 g-py-12" href='categories.php'>
                        <span class="d-flex align-self-center g-pos-rel g-font-size-18 g-mr-18">
                            <i class="hs-admin-widget"></i>
                        </span>
                        <span class="media-body align-self-center">Category</span>
                    </a>
                </li>
                <!-- End Metrics -->

                <!-- Metrics -->
                <li class="u-sidebar-navigation-v1-menu-item u-side-nav--top-level-menu-item">
                    <a class="media u-side-nav--top-level-menu-link u-side-nav--hide-on-hidden g-px-15 g-py-12" href='comments.php'>
                        <span class="d-flex align-self-center g-pos-rel g-font-size-18 g-mr-18">
                            <i class="hs-admin-comment"></i>
                        </span>
                        <span class="media-body align-self-center">Comment</span>
                    </a>
                </li>
                <!-- End Metrics -->

                <!-- Layouts Settings -->
                <li class="u-sidebar-navigation-v1-menu-item u-side-nav--has-sub-menu u-side-nav--top-level-menu-item">
                    <a class="media u-side-nav--top-level-menu-link u-side-nav--hide-on-hidden g-px-15 g-py-12" href="#" data-hssm-target="#subMenu2">
                        <span class="d-flex align-self-center g-pos-rel g-font-size-18 g-mr-18">
                            <i class="hs-admin-settings"></i>
                        </span>
                        <span class="media-body align-self-center">Users</span>
                        <span class="d-flex align-self-center u-side-nav--control-icon">
                            <i class="hs-admin-angle-right"></i>
                        </span>
                        <span class="u-side-nav--has-sub-menu__indicator"></span>
                    </a>

                    <!-- Layouts Settings: Submenu-1 -->
                    <ul id="subMenu2" class="u-sidebar-navigation-v1-menu u-side-nav--second-level-menu mb-0">
                        <!-- Fixed Header & Sidebar -->
                        <li class="u-sidebar-navigation-v1-menu-item u-side-nav--second-level-menu-item">
                            <a class="media u-side-nav--second-level-menu-link g-px-15 g-py-12" href='users.php'>
                                <span class="d-flex align-self-center g-mr-15 g-mt-minus-1">
                                    <i class="hs-admin-layout-media-center-alt"></i>
                                </span>
                                <span class="media-body align-self-center">View all</span>
                            </a>
                        </li>
                        <!-- End Fixed Header & Sidebar -->

                        <!-- Fixed Header & Static Sidebar -->
                        <li class="u-sidebar-navigation-v1-menu-item u-side-nav--second-level-menu-item">
                            <a class="media u-side-nav--second-level-menu-link g-px-15 g-py-12" href='../registration.php'>
                                <span class="d-flex align-self-center g-mr-15 g-mt-minus-1">
                                    <i class="hs-admin-layout-media-center-alt"></i>
                                </span>
                                <span class="media-body align-self-center">Add new</span>
                            </a>
                        </li>
                        <!-- End Fixed Header & Static Sidebar -->

                    </ul>
                    <!-- End Layouts Settings: Submenu-1 -->
                </li>
                <!-- End Layouts Settings -->

                <!-- Metrics -->
                <li class="u-sidebar-navigation-v1-menu-item u-side-nav--top-level-menu-item">
                    <a class="media u-side-nav--top-level-menu-link u-side-nav--hide-on-hidden g-px-15 g-py-12" href="profile.php">
                        <span class="d-flex align-self-center g-pos-rel g-font-size-18 g-mr-18">
                            <i class="hs-admin-user"></i>
                        </span>
                        <span class="media-body align-self-center">Profil</span>
                    </a>
                </li>
                <!-- End Metrics -->

            </ul>
        </div>
        <!-- End Sidebar Nav -->




        <div class="col g-ml-45 g-ml-0--lg g-pb-65--md">

            <?php

            if ($_SESSION['user_role'] == "admin") {
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

                            $element_text = ['All', 'Instalime', 'Ticked', 'Generale'];
                            $element_count = [$post_count, $categories_status_count, $categories_status_coun_ticked, $categories_status_coun_general];

                            for ($i = 0; $i < 4; $i++) {
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