<?php

if (isset($_GET['p_id'])) {

    $the_post_id = $_GET['p_id'];
}

$query = "SELECT * FROM project_depo WHERE id = $the_post_id ";
$select_project_by_id = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($select_project_by_id)) {
    // $post_id            = $row['id'];
    $username           = $row['username'];
    $comment            = $row['comment'];
    $fo48_ads           = $row['fo48_ads'];
    $fo24_adss          = $row['fo24_adss'];
    $fo12_adss          = $row['fo12_adss'];
    $fo24               = $row['fo24'];
    $fo12               = $row['fo12'];
    $fo04               = $row['fo04'];
    $fo2                = $row['fo2'];
    $fosc               = $row['fosc'];
    $fdt                = $row['fdt'];
    $fdb_1_4            = $row['fdb_1_4'];
    $fdb_1_8            = $row['fdb_1_8'];
    $sp_1_16            = $row['sp_1_16'];
    $pp48               = $row['pp48'];
    $pp24               = $row['pp24'];
    $pp12               = $row['pp12'];
    $patch_cord         = $row['patch_cord'];
    $spirale            = $row['spirale'];
    $shtrenguse         = $row['shtrenguse'];
    $hallka             = $row['hallka'];
    $onu                = $row['onu'];
    $instalime          = $row['instalime'];
}

if (isset($_POST['edit_depo_project'])) {
    $username           = $_SESSION['username'];
    $comment            = $_POST['comment'];
    $fo48_ads           = $_POST['fo48_ads'];
    $fo24_adss          = $_POST['fo24_adss'];
    $fo12_adss          = $_POST['fo12_adss'];
    $fo24               = $_POST['fo24'];
    $fo12               = $_POST['fo12'];
    $fo04               = $_POST['fo04'];
    $fo2                = $_POST['fo2'];
    $fosc               = $_POST['fosc'];
    $fdt                = $_POST['fdt'];
    $fdb_1_4            = $_POST['fdb_1_4'];
    $fdb_1_8            = $_POST['fdb_1_8'];
    $sp_1_16            = $_POST['sp_1_16'];
    $pp48               = $_POST['pp48'];
    $pp24               = $_POST['pp24'];
    $pp12               = $_POST['pp12'];
    $patch_cord         = $_POST['patch_cord'];
    $spirale            = $_POST['spirale'];
    $shtrenguse         = $_POST['shtrenguse'];
    $hallka             = $_POST['hallka'];
    $onu                = $_POST['onu'];
    $instalime          = $_POST['instalime'];




    $query = "UPDATE project_depo SET 
    username = '{$username}', 
    comment = '{$comment}',
    fo48_ads = '{$fo48_ads}',
    fo24_adss = '{$fo24_adss}',
    fo12_adss = '{$fo12_adss}',
    fo24 =  '{$fo24}', 
    fo12 =  '{$fo12}', 
    fdt =  '{$fdt}', 
    fdb_1_4 =  '{$fdb_1_4}', 
    fdb_1_8 =  '{$fdb_1_8}', 
    sp_1_16 =  '{$sp_1_16}', 
    pp48 =  '{$pp48}', 
    pp24 =  '{$pp24}', 
    pp12 =  '{$pp12}', 
    patch_cord =  '{$patch_cord}', 
    spirale =  '{$spirale}', 
    shtrenguse =  '{$shtrenguse}', 
    hallka =  '{$hallka}', 
    onu =  '{$onu}', 
    instalime =  '{$instalime}', 
    fo2 =  '{$fo2}', 
    fosc =  '{$fosc}', 
    fo04 =  '{$fo04}'
    WHERE id = {$the_post_id}";

    $edit_depo_project = mysqli_query($connection, $query);

    // function confirmQuery($edit_depo_project)
    // {
    //     global $connection; // Assuming $connection is your database connection variable
    //     if (!$edit_depo_project) {
    //         die("Database query failed: " . mysqli_error($connection));
    //     }
    // }

    confirmQuery($edit_depo_project);
    header("Location: ../project/project-depo.php ");
}

?>

<form action="" method="post" enctype="multipart/form-data">
    <legend>Edit Depo Project</legend>

    <div class="form-group">
        <label for="author">Post Author
            <?php
            if (isset($_SESSION['username'])) {
                echo  $_SESSION['username'];
            };
            ?></label>

        <?php if (($_SESSION['user_role'] == "admin") || ($_SESSION['user_role'] == "superadmin")) {
            echo $_SESSION['user_role'];
        } ?>
    </div>

    <div class="form-group">
        <label for="Comment">Comment</label>
        <textarea type="text" class="form-control" name="comment" id="" required><?php echo $comment; ?></textarea>
    </div>

    <div class="form-group">
        <label for="fo48_ads">FO48-Ads </label>
        <input type="number" value="<?php echo $fo48_ads; ?>" class="form-control" name="fo48_ads" id="">
    </div>

    <div class="form-group">
        <label for="fo24_adss">FO24-Adss </label>
        <input type="number" value="<?php echo $fo24_adss; ?>" class="form-control" name="fo24_adss" id="">
    </div>

    <div class="form-group">
        <label for="fo12_adss">FO12-Adss </label>
        <input type="number" value="<?php echo $fo12_adss; ?>" class="form-control" name="fo12_adss" id="">
    </div>

    <div class="form-group">
        <label for="fo24">FO24 </label>
        <input type="number" value="<?php echo $fo24; ?>" class="form-control" name="fo24" id="">
    </div>

    <div class="form-group">
        <label for="fo12">Fo12 </label>
        <input type="number" value="<?php echo $fo12; ?>" class="form-control" name="fo12" id="">
    </div>

    <div class="form-group">
        <label for="fo04">Fo04 </label>
        <input type="number" value="<?php echo $fo04; ?>" class="form-control" name="fo04" id="">
    </div>

    <div class="form-group">
        <label for="fo2">Fo2 ( Drop ) </label>
        <input type="number" value="<?php echo $fo2; ?>" class="form-control" name="fo2" id="">
    </div>

    <div class="form-group">
        <label for="fosc">FOSC(FiberOpticSpliceClosure) </label>
        <input type="number" value="<?php echo $fosc; ?>" class="form-control" name="fosc" id="">
    </div>

    <div class="form-group">
        <label for="fdt">FDT(FiberDistributionTerminal)</label>
        <input type="number" value="<?php echo $fdt; ?>" class="form-control" name="fdt" id="">
    </div>

    <div class="form-group">
        <label for="fdb_1_4">FDB(FiberDistributionBox)-meSP1/4</label>
        <input type="number" value="<?php echo $fdb_1_4; ?>" class="form-control" name="fdb_1_4" id="">
    </div>

    <div class="form-group">
        <label for="fdb_1_8">FDB(FiberDistributionBox)-meSP1/8</label>
        <input type="number" value="<?php echo $fdb_1_8; ?>" class="form-control" name="fdb_1_8" id="">
    </div>

    <div class="form-group">
        <label for="sp_1_16">SP 1/16 - without connector</label>
        <input type="number" value="<?php echo $sp_1_16; ?>" class="form-control" name="sp_1_16" id="">
    </div>

    <div class="form-group">
        <label for="pp48">Patch Panel - 48 Porte</label>
        <input type="number" value="<?php echo $pp48; ?>" class="form-control" name="pp48" id="">
    </div>

    <div class="form-group">
        <label for="pp24">Patch Panel - 24 Porte</label>
        <input type="number" value="<?php echo $pp24; ?>" class="form-control" name="pp24" id="">
    </div>

    <div class="form-group">
        <label for="pp12">Patch Panel - 12 Porte</label>
        <input type="number" value="<?php echo $pp12; ?>" class="form-control" name="pp12" id="">
    </div>

    <div class="form-group">
        <label for="patch_cord">Patch Cord</label>
        <input type="number" value="<?php echo $patch_cord; ?>" class="form-control" name="patch_cord" id="">
    </div>

    <div class="form-group">
        <label for="spirale">Spirale</label>
        <input type="number" value="<?php echo $spirale; ?>" class="form-control" name="spirale" id="">
    </div>

    <div class="form-group">
        <label for="shtrenguse">Shtrenguse per Flat</label>
        <input type="number" value="<?php echo $shtrenguse; ?>" class="form-control" name="shtrenguse" id="">
    </div>

    <div class="form-group">
        <label for="hallka">Hallka</label>
        <input type="number" value="<?php echo $hallka; ?>" class="form-control" name="hallka" id="">
    </div>

    <div class="form-group">
        <label for="onu">ONU with RF</label>
        <input type="number" value="<?php echo $onu; ?>" class="form-control" name="onu" id="">
    </div>

    <div class="form-group">
        <label for="instalime">Instalime</label>
        <input type="number" value="<?php echo $instalime; ?>" class="form-control" name="instalime" id="">
    </div>

    <button type="submit" name="edit_depo_project" class="btn btn-primary">Submit</button>
</form>