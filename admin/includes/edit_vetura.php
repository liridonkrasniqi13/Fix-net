<?php

if (isset($_GET['p_id'])) {

    $the_id = $_GET['p_id'];
}

echo $the_id;

$query = "SELECT * FROM vetura WHERE id = $the_id ";
$select_posts_by_id = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($select_posts_by_id)) {
    $id = $row['id'];
    $title = $row['title'];
    $username = $row['username'];
    $date = $row['date'];
    $content = $row['content'];
    $resiver = $row['resiver'];
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
}

if (isset($_POST['update_post'])) {
    $title = $_POST['title'];
    $username = $_POST['username'];
    $content = $_POST['content'];

    $resiver = $_POST['resiver'];
    $modem = $_POST['modem'];
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

    echo $the_id;

    $query = "UPDATE vetura SET 
    title = '{$title}',
    username = '{$username}',
    content = '{$content}',
    resiver = '{$resiver}',
    
    resiver =  '{$resiver}', 
    modem =  '{$modem}', 
    content =  '{$content}', 
    rg6 =  '{$rg6}', 
    konektor_rg6 =  '{$konektor_rg6}', 
    spliter =  '{$spliter}', 
    konektor_tv =  '{$konektor_tv}', 
    rg11 =  '{$rg11}', 
    t32 =  '{$t32}', 
    kupler_7402 =  '{$kupler_7402}', 
    amp =  '{$amp}', 
    tap_26 =  '{$tap_26}', 
    tap_23 =  '{$tap_23}', 
    tap_20 =  '{$tap_20}', 
    tap_17 =  '{$tap_17}', 
    tap_14 =  '{$tap_14}', 
    tap_11 =  '{$tap_11}', 
    tap_10 =  '{$tap_10}', 
    tap_8 =  '{$tap_8}', 
    tap_4 =  '{$tap_4}',
    date = now()
    WHERE id = $the_id ";
    echo $the_id;
    // $query .="author = '{$author}', ";
    // $query .="WHERE id = {$the_id}";

    $update_post = mysqli_query($connection, $query);

    confirmQuery($update_post);

    echo "<div class='alert alert-success' role='alert'>Post Updated. <a href='posts.php'>View Post</a> or <a href='../post.php?p_id={$the_id}'>View the Post</a></div>";
}

?>


<form action="" method="post" enctype="multipart/form-data">
    <legend>Edit vetura</legend>

    <div class="form-group">
        <label for="title">Emri Klientit</label>
        <input value="<?php echo $title; ?>" type="text" class="form-control" name="title" id="" placeholder="Emri Klientit">
    </div>

    <div class="form-group">
        <label for="username">Veturat</label>
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
        <label for="content">Komet</label>
        <textarea value="<?php echo $content; ?>" type="text" class="form-control" name="content" id="" placeholder="Post Content"></textarea>
    </div>


    <div class="form-group">
        <label for="modem">Modem </label>
        <input type="number" class="form-control" name="modem" id="" placeholder="Modem" value="<?php echo $modem; ?>">
    </div>
    
    <div class="form-group">
        <label for="resiver">Resever </label>
        <input type="number" class="form-control" name="resiver" id="" placeholder="Resever" value="<?php echo $resiver; ?>">
    </div>

    <div class="form-group">
        <label for="rg6">RG6 </label>
        <input type="number" class="form-control" name="rg6" id=""  value="<?php echo $rg6; ?>">
    </div>

    <div class="form-group">
        <label for="konektor_rg6">Konektor RG6 </label>
        <input type="number" class="form-control" name="konektor_rg6" id=""  value="<?php echo $konektor_rg6; ?>">
    </div>
    
    <div class="form-group">
        <label for="spliter">Spliter </label>
        <input type="number" class="form-control" name="spliter" id=""  value="<?php echo $spliter; ?>">
    </div>
    
    <div class="form-group">
        <label for="konektor_tv">Konektor Tv </label>
        <input type="number" class="form-control" name="konektor_tv" id=""  value="<?php echo $konektor_tv; ?>">
    </div>
    
    <div class="form-group">
        <label for="rg11">RG11 </label>
        <input type="number" class="form-control" name="rg11" id=""  value="<?php echo $rg11; ?>">
    </div>
    
    <div class="form-group">
        <label for="t32">T32 </label>
        <input type="number" class="form-control" name="t32" id=""  value="<?php echo $t32; ?>"> 
    </div>
    
    <div class="form-group">
        <label for="kupler_7402">Kupler 7402</label>
        <input type="number" class="form-control" name="kupler_7402" id=""  value="<?php echo $kupler_7402; ?>"> 
    </div>
    
    <div class="form-group">
        <label for="amp">AMP</label>
        <input type="number" class="form-control" name="amp" id=""  value="<?php echo $amp; ?>"> 
    </div>

    <div class="form-group">
        <label for="tap_26">Tap 26 db</label>
        <input type="number" class="form-control" name="tap_26" id=""  value="<?php echo $tap_26; ?>"> 
    </div>

    <div class="form-group">
        <label for="tap_23">Tap 23 db</label>
        <input type="number" class="form-control" name="tap_23" id=""  value="<?php echo $tap_23; ?>"> 
    </div>

    <div class="form-group">
        <label for="tap_20">Tap 20 db</label>
        <input type="number" class="form-control" name="tap_20" id=""  value="<?php echo $tap_20; ?>"> 
    </div>

    <div class="form-group">
        <label for="tap_17">Tap 17 db</label>
        <input type="number" class="form-control" name="tap_17" id=""  value="<?php echo $tap_17; ?>"> 
    </div>

    <div class="form-group">
        <label for="tap_14">Tap 14 db</label>
        <input type="number" class="form-control" name="tap_14" id=""  value="<?php echo $tap_14; ?>"> 
    </div>

    <div class="form-group">
        <label for="tap_11">Tap 11 db</label>
        <input type="number" class="form-control" name="tap_11" id=""  value="<?php echo $tap_11; ?>"> 
    </div>

    <div class="form-group">
        <label for="tap_10">Tap 10 db</label>
        <input type="number" class="form-control" name="tap_10" id=""  value="<?php echo $tap_10; ?>"> 
    </div>

    <div class="form-group">
        <label for="tap_8">Tap 8 db</label>
        <input type="number" class="form-control" name="tap_8" id=""  value="<?php echo $tap_8; ?>"> 
    </div>

    <div class="form-group">
        <label for="tap_4">Tap 4 db</label>
        <input type="number" class="form-control" name="tap_4" id=""  value="<?php echo $tap_4; ?>"> 
    </div>

    <button type="submit" name="update_post" class="btn btn-primary">Submit</button>
</form>