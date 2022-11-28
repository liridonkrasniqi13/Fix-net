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
                    <a class="media u-side-nav--second-level-menu-link g-px-15 g-py-12" href="posts.php">
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
        <?php

            if ($_SESSION['user_role'] == "admin") { ?>
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

        <!-- Layouts Settings -->
        <li class="u-sidebar-navigation-v1-menu-item u-side-nav--has-sub-menu u-side-nav--top-level-menu-item">
            <a class="media u-side-nav--top-level-menu-link u-side-nav--hide-on-hidden g-px-15 g-py-12" href="#" data-hssm-target="#subMenu3">
                <span class="d-flex align-self-center g-pos-rel g-font-size-18 g-mr-18">
                    <i class="hs-admin-package"></i>
                </span>
                <span class="media-body align-self-center">Depo</span>
                <span class="d-flex align-self-center u-side-nav--control-icon">
                    <i class="hs-admin-angle-right"></i>
                </span>
                <span class="u-side-nav--has-sub-menu__indicator"></span>
            </a>

            <!-- Layouts Settings: Submenu-1 -->
            <ul id="subMenu3" class="u-sidebar-navigation-v1-menu u-side-nav--second-level-menu mb-0">
                <!-- Fixed Header & Sidebar -->
                <li class="u-sidebar-navigation-v1-menu-item u-side-nav--second-level-menu-item">
                    <a class="media u-side-nav--second-level-menu-link g-px-15 g-py-12" href='depo.php'>
                        <span class="d-flex align-self-center g-mr-15 g-mt-minus-1">
                            <i class="hs-admin-layout-media-center-alt"></i>
                        </span>
                        <span class="media-body align-self-center">View all</span>
                    </a>
                </li>
                <!-- End Fixed Header & Sidebar -->

                <!-- Fixed Header & Static Sidebar -->
                <li class="u-sidebar-navigation-v1-menu-item u-side-nav--second-level-menu-item">
                    <a class="media u-side-nav--second-level-menu-link g-px-15 g-py-12" href='depo.php?source=add_depo'>
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

        <?php } ?>

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