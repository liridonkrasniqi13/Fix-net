<?php

if (isset($_POST['checkBoxArray'])) {

    foreach ($_POST['checkBoxArray'] as $postValueID) {

        // echo $checkBoxValue;

        $bulk_options = $_POST['bulk_options'];

        switch ($bulk_options) {

            case 'published':

                $query = "UPDATE vetura SET status = '{$bulk_options}' WHERE id = {$postValueID}  ";

                $update_to_published = mysqli_query($connection,  $query);

                confirmQuery($update_to_published);

                break;

            case 'draft':

                $query = "UPDATE vetura SET status = '{$bulk_options}' WHERE id = {$postValueID}  ";

                $update_to_draft = mysqli_query($connection,  $query);

                confirmQuery($update_to_draft);

                break;

            case 'delete':

                $query = "DELETE FROM vetura WHERE id = {$postValueID}  ";

                $update_to_delete = mysqli_query($connection,  $query);

                confirmQuery($update_to_delete);

                break;
        };
    }
};


if (isset($_GET['from_date']) && isset($_GET['to_date'])) {
    $from_date = $_GET['from_date'];
    $to_date = $_GET['to_date'];
    if ($_SESSION['user_role'] == "admin") {
        $username = $_GET['post_author'];
    }
} else {
    $from_date = "";
    $to_date = "";
    if ($_SESSION['user_role'] == "admin") {
        $username = "";
    }
}

?>

<form action="" method='GET'>
    <legend>Veturat Material</legend>
    <div class="table-responsive">

        <div id="bulkOptionsContainer">

            <?php if ($_SESSION['user_role'] == "admin") { ?>
                <!-- <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <select name="bulk_options" id="bulk_options" class="form-control">
                        <option value="">Select Option</option>
                        <option value="published">Published</option>
                        <option value="draft">Draft</option>
                        <option value="delete">Delete</option>
                    </select>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <input type="submit" name="submit" class="btn btn-success" value="Apply">

                    <a href="posts.php?source=add_post" class="btn btn-primary">Add new Post</a>

                    <a href="posts.php" class="btn  btn-default">Cancel</a>


                </div> -->

            <?php } ?>


</form>


<?php include "filter.php"; ?>


</div>






<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <?php if ($_SESSION['user_role'] == "admin") { ?>
                <th><input type="checkbox" name="" id="selectAllBoxes"></th>
            <?php } ?>
            <th>Id</th>
            <th>Spoc</th>
            <th>Veturat</th>
            <th>Resiver</th>
            <th>Modem</th>
            <th>RG6</th>
            <th>Konektor RG6</th>
            <th>Spliter</th>
            <th>Konektor Tv</th>
            <th>RG11</th>
            <th>T32</th>
            <th>Kupler 7402</th>
            <th>AMP</th>
            <th>Tap 26</th>
            <th>Tap 23</th>
            <th>Tap 20</th>
            <th>Tap 17</th>
            <th>Tap 14</th>
            <th>Tap 11</th>
            <th>Tap 10</th>
            <th>Tap 8</th>
            <th>Kartela</th>
            <th>Date</th>
            <?php
            if ($_SESSION['user_role'] == "admin") {
                echo "<th>View Post</th>";
                echo "<th>Edit</th>";
                echo "<th>Delete</th>";
            }
            ?>

        </tr>
    </thead>
    <tbody>

        <?php


        if (isset($_GET['from_date']) && isset($_GET['to_date'])) {
            $from_date = $_GET['from_date'];
            $to_date = $_GET['to_date'];


            if ($_SESSION['user_role'] == "admin") {
                $username = $_GET['post_author'];
                if ($username == "liridonkrasniqi") {
                    $query = "SELECT * FROM vetura WHERE date_v BETWEEN '$from_date' AND '$to_date' ORDER BY id DESC";
                    $date_query = mysqli_query($connection, $query);
                } else {
                    $query = "SELECT * FROM vetura WHERE username = '$username' AND  date_v BETWEEN '$from_date' AND '$to_date' ORDER BY id DESC";
                    $date_query = mysqli_query($connection, $query);
                }
            } else {
                $username = $_SESSION['username'];
                $query = "SELECT * FROM vetura WHERE username = '$username' AND  date_v BETWEEN '$from_date' AND '$to_date' ORDER BY id DESC";
                $date_query = mysqli_query($connection, $query);
            }



            if (mysqli_num_rows($date_query) > 0) {

                foreach ($date_query as $row) {
        ?>
                    <tr>
                        <?php if ($_SESSION['user_role'] == "admin") { ?>
                            <td><input type='checkbox' class='checkBoxes' name='checkBoxArray[]' value='<?php echo $id; ?>'></td>
                        <?php } ?>
                        <th><?php echo $row['id']; ?></th>
                        <th><?php echo $row['title']; ?></th>
                        <th><?php echo $row['username']; ?></th>
                        <th><?php echo $row['resiver']; ?></th>
                        <th><?php echo $row['modem']; ?></th>
                        <th><?php echo $row['rg6']; ?></th>
                        <th><?php echo $row['konektor_rg6']; ?></th>
                        <th><?php echo $row['spliter']; ?></th>
                        <th><?php echo $row['konektor_tv']; ?></th>
                        <th><?php echo $row['rg11']; ?></th>
                        <th><?php echo $row['t32']; ?></th>
                        <th><?php echo $row['kupler_7402']; ?></th>
                        <th><?php echo $row['amp']; ?></th>
                        <th><?php echo $row['tap_26']; ?></th>
                        <th><?php echo $row['tap_23']; ?></th>
                        <th><?php echo $row['tap_20']; ?></th>
                        <th><?php echo $row['tap_17']; ?></th>
                        <th><?php echo $row['tap_14']; ?></th>
                        <th><?php echo $row['tap_11']; ?></th>
                        <th><?php echo $row['tap_10']; ?></th>
                        <th><?php echo $row['tap_8']; ?></th>
                        <th><?php echo $row['tap_4']; ?></th>
                        <th><?php echo $row['date_v']; ?></th>
                        <?php if ($_SESSION['user_role'] == "admin") { ?>
                            <th>
                                <a href='../vetura.php?p_id=<?php echo $row['id']; ?>'>View Post</a>
                            </th>
                            <th>
                                <a href='vetura.php?source=edit_vetura&p_id=<?php echo $row['id']; ?>'>Edit</a>
                            </th>
                            <th>
                                <a onClick="javascript: return confirm('Are you sure you want to delete'); " href='vetura.php?delete=<?php echo $row['id']; ?>'>Delete</a>
                            </th>
                        <?php
                        }
                        ?>



                    </tr>

                <?php   }
            } else { ?>

                <br>
                <br>
                <br>
                <br>
                <br>
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Nuk ka poste me kete date</strong>
                </div>

            <?php   }
        }
        if (isset($_GET['from_date']) == "") {


            $username_post = $_SESSION['username'];
            if ($_SESSION['user_role'] == "admin") {
                $query = "SELECT * FROM vetura ORDER BY id DESC";
                $select_vetura = mysqli_query($connection, $query);
            } else {
                $query = "SELECT * FROM vetura WHERE username = '$username_post' ORDER BY id DESC ";
                $select_vetura = mysqli_query($connection, $query);
            }

            while ($row = mysqli_fetch_assoc($select_vetura)) {
                $id = $row['id'];
                $title = $row['title'];
                $username = $row['username'];
                $date_v = $row['date_v'];
                $content = $row['content'];
                $resiver = $row['resiver'];

                $modem = $row['modem'];
                $rg6 = $row['rg6'];
                $konektor_rg6 = $row['konektor_rg6'];
                $spliter = $row['spliter'];
                $konektor_tv = $row['konektor_tv'];
                $rg11 = $row['rg11'];
                $t32 = $row['t32'];
                $kupler_7402 = $row['kupler_7402'];
                $amp = $row['amp'];

                $tap_26 = $row['tap_26'];
                $tap_23 = $row['tap_23'];
                $tap_20 = $row['tap_20'];
                $tap_17 = $row['tap_17'];
                $tap_14 = $row['tap_14'];
                $tap_11 = $row['tap_11'];
                $tap_10 = $row['tap_10'];
                $tap_8 = $row['tap_8'];
                $tap_4 = $row['tap_4'];

                echo "<tr>";
            ?>

                <?php if ($_SESSION['user_role'] == "admin") { ?>
                    <td><input type='checkbox' class='checkBoxes' name='checkBoxArray[]' value='<?php echo $id; ?>'></td>
                <?php } ?>

        <?php
                echo "<td>$id</td>";
                echo "<td>$title</td>";
                echo "<td>$username</td>";


                echo "<td>$resiver</td>";
                echo "<td>$modem</td>";
                echo "<td>$rg6</td>";
                echo "<td>$konektor_rg6</td>";
                echo "<td>$spliter</td>";
                echo "<td>$konektor_tv</td>";
                echo "<td>$rg11</td>";
                echo "<td>$t32</td>";
                echo "<td>$kupler_7402</td>";
                echo "<td>$amp</td>";
                echo "<td>$tap_26</td>";
                echo "<td>$tap_23</td>";
                echo "<td>$tap_20</td>";
                echo "<td>$tap_17</td>";
                echo "<td>$tap_14</td>";
                echo "<td>$tap_11</td>";
                echo "<td>$tap_10</td>";
                echo "<td>$tap_8</td>";
                echo "<td>$tap_4</td>";
                echo "<td>$date_v</td>";
                if ($_SESSION['user_role'] == "admin") {
                    echo "<td><a href='../vetura.php?p_id={$id}'>View Post</a></td>";
                    echo "<td><a href='vetura.php?source=edit_vetura&p_id={$id}'>Edit</a></td>";
                    echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete'); \" href='vetura.php?delete={$id}'>Delete</a></td>";
                }
                echo "</tr>";
            }
        }




        ?>


    </tbody>
</table>

<?php



if (isset($_GET['delete'])) {

    $the_id = $_GET['delete'];

    $query = "DELETE FROM vetura WHERE id = {$the_id}";
    $delete_query = mysqli_query($connection, $query);

    header("Location: vetura.php");
}


?>


</div>