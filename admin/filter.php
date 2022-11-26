<?php

if (isset($_GET['from_date']) && isset($_GET['to_date'])) {
    $from_date = $_GET['from_date'];
    $to_date = $_GET['to_date']; 
    if ($_SESSION['user_role'] == "admin") {
    $username = $_GET['post_author']; }
    
} else {
        $from_date = "";
        $to_date = ""; 
        if ($_SESSION['user_role'] == "admin") {
        $username = ""; }
    }

?>
<div class="row">
    <form action="" method="get">

        <div class="col-md-2">
            <div class="form-group">
                <label for="from">From</label>
                <input type="text" class="date form-control" name="from_date" value="<?php echo $from_date; ?>" required="required" />
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label for="end">End</label>
                <input type="text" class="date form-control" name="to_date" value="<?php echo $to_date; ?>" required="required" />
            </div>
        </div>
        <?php if ($_SESSION['user_role'] == "admin") { ?>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="title">User</label>
                    <select name="post_author" id="post_author" class="form-control">

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
            </div>
        <?php } ?>
        <div class="col-md-2">
            <div class="form-group">
                <label for="end" style="color:white;">End</label>
                <input type="submit" name="submit" class="btn btn-success btn-block" value="Apply">

            </div>
        </div>

        <div class="col-md-2">
            <label for="end" style="color:white;">End</label>
            <a href="index.php" class="btn  btn-default btn-block">Cancel</a>
        </div>


    </form>

    <script type="text/javascript">
        $(".date").datepicker({
            format: "yyyy-mm-dd",
        });
    </script>
</div>