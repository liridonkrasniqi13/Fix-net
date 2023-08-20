<?php

if (isset($_GET['from_date']) && isset($_GET['to_date'])) {
    $from_date = $_GET['from_date'];
    $to_date = $_GET['to_date'];
    if (($_SESSION['user_role'] == "admin") || ($_SESSION['user_role'] == "superadmin")) {
        $username = $_GET['post_author'];
    }
} else {
    $from_date = "";
    $to_date = "";
    if (($_SESSION['user_role'] == "admin") || ($_SESSION['user_role'] == "superadmin")) {
        $username = "";
    }
}

?>

<form action="" method="get">
    <div class="g-pa-20">
        <div class="row">
            <div class="col-sm-6 col-lg-6 col-xl-3 g-mb-30">
                <div class="g-brd-around g-brd-gray-light-v7 g-rounded-4 g-pa-20 g-mb-30">
                    <div class="form-group mb-0 g-max-width-400">
                        <div id="datepickerWrapper" class="u-datepicker-right u-datepicker--v3 g-pos-rel w-100 g-cursor-pointer g-brd-around g-brd-gray-light-v7 g-rounded-4">
                            <input name="from_date" value="2022-11-01" required="required" class="js-range-datepicker w-100 g-bg-transparent g-font-size-12 g-font-size-default--md g-color-gray-dark-v6 g-pr-80 g-pl-15 g-py-9" type="text" placeholder="From Date" data-rp-wrapper="#datepickerWrapper" data-rp-date-format="Y-m-d">
                            <div class="d-flex align-items-center g-absolute-centered--y g-right-0 g-color-gray-light-v6 g-color-lightblue-v9--sibling-opened g-mr-15">
                                <i class="hs-admin-calendar g-font-size-18 g-mr-10"></i>
                                <i class="hs-admin-angle-down"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-6 col-xl-3 g-mb-30">
                <div class="g-brd-around g-brd-gray-light-v7 g-rounded-4 g-pa-20 g-mb-30">
                    <div class="form-group mb-0 g-max-width-400">
                        <div id="datepickerWrapper" class="u-datepicker-right u-datepicker--v3 g-pos-rel w-100 g-cursor-pointer g-brd-around g-brd-gray-light-v7 g-rounded-4">
                            <input name="to_date" value="<?php echo $to_date; ?>" required="required" class="js-range-datepicker w-100 g-bg-transparent g-font-size-12 g-font-size-default--md g-color-gray-dark-v6 g-pr-80 g-pl-15 g-py-9" type="text" placeholder="To Date" data-rp-wrapper="#datepickerWrapper" data-rp-date-format="Y-m-d">
                            <div class="d-flex align-items-center g-absolute-centered--y g-right-0 g-color-gray-light-v6 g-color-lightblue-v9--sibling-opened g-mr-15">
                                <i class="hs-admin-calendar g-font-size-18 g-mr-10"></i>
                                <i class="hs-admin-angle-down"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if (($_SESSION['user_role'] == "admin") || ($_SESSION['user_role'] == "superadmin")) { ?>
                <div class="col-sm-6 col-lg-6 col-xl-3 g-mb-30">
                    <div class="g-brd-around g-brd-gray-light-v7 g-rounded-4 g-pa-20 g-mb-30">
                        <div class="form-group mb-0 g-max-width-400">
                            <div class="form-group u-select--v3 g-pos-rel g-brd-gray-light-v7 rounded-0 mb-0">
                                <div class="dropdown bootstrap-select js-select u-select--v3-select u-sibling w-100">
                                    <select name="post_author" id="post_author" class="js-select u-select--v3-select u-sibling w-100" required="required" tabindex="-98">

                                        <?php



                                        $query = "SELECT * FROM users ";
                                        $select_categries = mysqli_query($connection, $query);
                                        echo "<option value='{$username}'>{$username}</option>";
                                        // confirmQuery($select_categries);

                                        while ($row = mysqli_fetch_assoc($select_categries)) {
                                            $username = $row['username'];
                                            echo "<option value='{$username}'>{$username}</option>";
                                        }


                                        ?>
                                    </select>
                                </div>

                                <div class="d-flex align-items-center g-absolute-centered--y g-right-0 g-color-gray-light-v6 g-color-lightblue-v9--sibling-opened g-mr-15">
                                    <i class="hs-admin-angle-down"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php 
                

                    $current_url = "http" . (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "s" : "") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

if (strpos($current_url, 'posts.php') !== false) { ?>



               

                <div class="col-sm-6 col-lg-6 col-xl-3 g-mb-30">
                    <div class="g-brd-around g-brd-gray-light-v7 g-rounded-4 g-pa-20 g-mb-30">
                        <div class="form-group mb-0 g-max-width-400">
                            <div class="form-group u-select--v3 g-pos-rel g-brd-gray-light-v7 rounded-0 mb-0">
                                <div class="dropdown bootstrap-select js-select u-select--v3-select u-sibling w-100">
                                    <select name="ticekd" id="ticekd" class="js-select u-select--v3-select u-sibling w-100" required="required" tabindex="-98">
                                        <option value="all">All </option>
                                        <?php

                                            $query = "SELECT * FROM categories ";
                                            $select_categries = mysqli_query($connection, $query);

                                            // confirmQuery($select_categries);

                                            while ($row = mysqli_fetch_assoc($select_categries)) {
                                                // $cat_id = $row['cat_id'];
                                                $cat_title = $row['cat_title'];

                                                echo "<option value='{$cat_title}'>{$cat_title}</option>";
                                            }

                                            ?>
                                    </select>
                                </div>


                                <div class="d-flex align-items-center g-absolute-centered--y g-right-0 g-color-gray-light-v6 g-color-lightblue-v9--sibling-opened g-mr-15">
                                    <i class="hs-admin-angle-down"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <?php 
} 

?>
            <?php } ?>
            <div class="col-sm-6 col-lg-6 col-xl-3 g-mb-30">
                <button type="submit" name="submit" class="btn btn-md u-btn-primary rounded g-py-13 g-px-25">Apply</button>
                <a href="index.php" class="btn btn-md u-btn-secondary rounded g-py-13 g-px-25">Cancel</a>
            </div>
        </div>
    </div>
</form>





<!-- JS Global Compulsory -->
<script src="../assets/vendor/jquery/jquery.min.js"></script>
<script src="../assets/vendor/jquery-migrate/jquery-migrate.min.js"></script>


<!-- JS Plugins Init. -->
<script>
    $(document).on('ready', function() {
        // initialization of custom select
        $('.js-select').selectpicker();

        $('.js-select').on('shown.bs.select', function(e) {
            $(this).addClass('opened');
        });

        $('.js-select').on('hidden.bs.select', function(e) {
            $(this).removeClass('opened');
        });

        // initialization of range datepicker
        $.HSCore.components.HSRangeDatepicker.init('.js-range-datepicker');


    });
</script>