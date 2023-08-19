<?php

if (isset($_GET['from_date']) && isset($_GET['to_date'])) {
    $from_date = $_GET['from_date'];
    $to_date = $_GET['to_date'];

} else {
    $from_date = "";
    $to_date = "";
}

?>

    <legend>Depo Material</legend>
    

<?php include "filter.php"; ?>
<div class="table-responsive">
<table class="table table-bordered table-hover">
    <thead>
        <tr>

            <th>Id</th>
            <th>Klienti</th>
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

                $query = "SELECT * FROM depo WHERE  post_date BETWEEN '$from_date' AND '$to_date' ORDER BY id DESC";
                $date_query = mysqli_query($connection, $query);



            if (mysqli_num_rows($date_query) > 0) {

                foreach ($date_query as $row) {
        ?>
                    <tr>

                        <th><?php echo $row['id']; ?></th>
                        <th><?php echo $row['title']; ?></th>

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
                        <th><?php echo $row['post_date']; ?></th>
                        <?php if ($_SESSION['user_role'] == "admin") { ?>
                            <th>
                                <a href='../post.php?p_id=<?php echo $row['id']; ?>'>View Post</a>
                            </th>
                            <th>
                                <a href='depo.php?source=edit_depo&p_id=<?php echo $row['id']; ?>'>Edit</a>
                            </th>
                            <th>
                                <a onClick="javascript: return confirm('Are you sure you want to delete'); " href='depo.php?delete=<?php echo $row['id']; ?>'>Delete</a>
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


            if ($_SESSION['user_role'] == "admin") {
                $query = "SELECT * FROM depo ORDER BY id DESC";
                $select_depo = mysqli_query($connection, $query);
            } 

            while ($row = mysqli_fetch_assoc($select_depo)) {
                $id = $row['id'];
                $title = $row['title'];
                $post_date = $row['post_date'];
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



            <?php
                echo "<td>$id</td>";
                echo "<td>$title</td>";


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
                echo "<td>$post_date</td>";
                if ($_SESSION['user_role'] == "admin") {
                    echo "<td><a href='depos.php?p_id={$id}'>View Post</a></td>";
                    echo "<td><a href='depo.php?source=edit_depo&p_id={$id}'>Edit</a></td>";
                    echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete'); \" href='depo.php?delete={$id}'>Delete</a></td>";
                }
                echo "</tr>";
            }
        }




        ?>


    </tbody>
</table>

<?php include "total_depo.php" ; ?>

<?php



if (isset($_GET['delete'])) {

    $the_id = $_GET['delete'];

    $query = "DELETE FROM depo WHERE id = {$the_id}";
    $delete_query = mysqli_query($connection, $query);

    header("Location: depo.php");
}


?>


</div>