<?php

if (isset($_POST['create_post'])) {

    $title = $_POST['title'];
    $username = $_POST['username'];

    $resiver = $_POST['resiver'];
    $modem = $_POST['modem'];
    $content = $_POST['content'];
    $rg6 = $_POST['rg6'];
    $konektor_rg6 = $_POST['konektor_rg6'];
    $spliter = $_POST['spliter'];
    $konektor_tv = $_POST['konektor_tv'];
    $rg11 = $_POST['rg11'];
    $t32 = $_POST['t32'];
    $kupler_7402 = $_POST['kupler_7402'];
    $amp = $_POST['amp'];
    $tap_26 = $_POST['tap_26'];
    $tap_23 = $_POST['tap_23'];
    $tap_20 = $_POST['tap_20'];
    $tap_17 = $_POST['tap_17'];
    $tap_14 = $_POST['tap_14'];
    $tap_11 = $_POST['tap_11'];
    $tap_10 = $_POST['tap_10'];
    $tap_8 = $_POST['tap_8'];
    $tap_4 = $_POST['tap_4'];
    $date_v = date('d-m-y');



    $query = "INSERT INTO vetura (title, date_v, username , content, resiver, modem, rg6,
    konektor_rg6, spliter, konektor_tv, rg11, t32, kupler_7402, amp,
    tap_26, tap_23, tap_20, tap_17, tap_14, tap_11, tap_10, tap_8, tap_4) ";

    $query .= "VALUE('{$title}',now(), '{$username}' ,'{$content}','{$resiver}', '{$modem}', '{$rg6}',
    '{$konektor_rg6}', '{$spliter}', '{$konektor_tv}', '{$rg11}', '{$t32}', '{$kupler_7402}', '{$amp}',
    '{$tap_26}', '{$tap_23}', '{$tap_20}', '{$tap_17}', '{$tap_14}', '{$tap_11}', '{$tap_10}', '{$tap_8}', '{$tap_4}')";

    $create_depo_query = mysqli_query($connection, $query);

    confirmQuery($create_depo_query);

    $the_id = mysqli_insert_id($connection);

    header("Location: ../admin/vetura.php ");
}

?>


<form action="" method="post" enctype="multipart/form-data">
    <legend>Add Veturat</legend>

    <div class="form-group">
        <label for="title">Spoc</label>
        <input type="text" class="form-control" name="title" id="" placeholder="Spoc author" required="required">
    </div>

    <div class="form-group">
        <label for="title">Veturat</label>
        <select name="username" id="username" class="form-control" required="required">

            <?php

            $query = "SELECT * FROM users ";
            $select_categries = mysqli_query($connection, $query);

            // confirmQuery($select_categries);

            while ($row = mysqli_fetch_assoc($select_categries)) {
                $username = $row['username'];

                echo "<option value='{$username}'>{$username}</option>";
            }

            ?>


        </select>

    </div>
    

    <div class="form-group">
        <label for="content">Comment</label>
        <textarea type="text" class="form-control" name="content" id="" placeholder="Post Comment"></textarea>
    </div>


    <div class="form-group">
        <label for="modem">Modem </label>
        <input type="number" class="form-control" name="modem" id="" placeholder="Modem" >
    </div>

    <div class="form-group">
        <label for="resiver">Resever </label>
        <input type="number" class="form-control" name="resiver" id="" placeholder="Resever" >
    </div>

    <div class="form-group">
        <label for="rg6">RG6 </label>
        <input type="number" class="form-control" name="rg6" id="" >
    </div>

    <div class="form-group">
        <label for="konektor_rg6">Konektor RG6 </label>
        <input type="number" class="form-control" name="konektor_rg6" id="" >
    </div>

    <div class="form-group">
        <label for="spliter">Spliter </label>
        <input type="number" class="form-control" name="spliter" id="" >
    </div>

    <div class="form-group">
        <label for="konektor_tv">Konektor Tv </label>
        <input type="number" class="form-control" name="konektor_tv" id="" >
    </div>

    <div class="form-group">
        <label for="rg11">RG11 </label>
        <input type="number" class="form-control" name="rg11" id="" >
    </div>

    <div class="form-group">
        <label for="t32">T32 </label>
        <input type="number" class="form-control" name="t32" id="" >
    </div>

    <div class="form-group">
        <label for="kupler_7402">Kupler 7402</label>
        <input type="number" class="form-control" name="kupler_7402" id="" >
    </div>

    <div class="form-group">
        <label for="amp">AMP</label>
        <input type="number" class="form-control" name="amp" id="" >
    </div>

    <div class="form-group">
        <label for="tap_26">Tap 26 db</label>
        <input type="number" class="form-control" name="tap_26" id="" >
    </div>

    <div class="form-group">
        <label for="tap_23">Tap 23 db</label>
        <input type="number" class="form-control" name="tap_23" id="" >
    </div>

    <div class="form-group">
        <label for="tap_20">Tap 20 db</label>
        <input type="number" class="form-control" name="tap_20" id="" >
    </div>

    <div class="form-group">
        <label for="tap_17">Tap 17 db</label>
        <input type="number" class="form-control" name="tap_17" id="" >
    </div>

    <div class="form-group">
        <label for="tap_14">Tap 14 db</label>
        <input type="number" class="form-control" name="tap_14" id="" >
    </div>

    <div class="form-group">
        <label for="tap_11">Tap 11 db</label>
        <input type="number" class="form-control" name="tap_11" id="" >
    </div>

    <div class="form-group">
        <label for="tap_10">Tap 10 db</label>
        <input type="number" class="form-control" name="tap_10" id="" >
    </div>

    <div class="form-group">
        <label for="tap_8">Tap 8 db</label>
        <input type="number" class="form-control" name="tap_8" id="" >
    </div>

    <div class="form-group">
        <label for="tap_4">Kartela db</label>
        <input type="number" class="form-control" name="tap_4" id="" >
    </div>



    <button type="submit" name="create_post" class="btn btn-primary">Submit</button>
</form>