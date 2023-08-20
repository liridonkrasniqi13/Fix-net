<?php

if (isset($_GET['p_id'])) {

    $the_post_id = $_GET['p_id'];
}

// include_once '../../includes/uploads.php';
$statusMsg = "";
$status = 'danger';

// file Upload Directory
// $targetDir = '../../uploads/';
$targetDir = '../uploads/';

$query = "SELECT * FROM shop WHERE id = $the_post_id ";
$select_shop = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($select_shop)) {

    $image_name  = $row['image_name'];
}

if (isset($_POST['edit_shop'])) {

    if (!empty($_FILES["file"]['name'])) {
        $fileName = basename($_FILES["file"]['name']);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        // Allow files Format
        $allowTypes = array('jpg', 'png', 'jpeg', 'pdf');

        if (in_array($fileType, $allowTypes)) {
            if (move_uploaded_file($_FILES["file"]['tmp_name'], $targetFilePath)) {

                $query = "UPDATE shop SET 
                image_name = '{$fileName}'
               
                WHERE id = {$the_post_id}";

                $edit_shop = mysqli_query($connection, $query);

                confirmQuery($edit_shop);

                if ($query) {
                    $status = 'success';
                    $statusMsg = "The file is uploaded";
                } else {
                    $statusMsg = "Sorry something was wrong. Please try again 2 ???";
                }
            } else {
                $statusMsg = "Sorry something was wrong. Please try again ???";
            }
        } else {
            $statusMsg = "Sorry only JPG ,JPEG, PNG, PDF file are allowed ???";
        }
    } else {
        $statusMsg = "Pleas select a file to upload ???";
    }
}

if (!empty($statusMsg)) {

?>

    <div class="noty_bar noty_type__info noty_theme__unify--v1--light noty_close_with_click noty_close_with_button g-mb-25">
        <div class="noty_body">
            <div class="g-mr-20">
                <div class="noty_body__icon">
                    <i class="hs-admin-info"></i>
                </div>
            </div>
            <div> <strong> <?php echo $status ?> </strong> : <?php echo $statusMsg ?></div>
        </div>
    </div>

<?php } ?>

<a class="js-fancybox d-block" href="javascript:;" data-fancybox="lightbox-gallery--10" data-src="../uploads/<?php echo $image_name ?>" data-caption="Lightbox Gallery" style="width: 30vw;">
    <img class="img-fluid" src="../uploads/<?php echo $image_name ?>" alt="Image description">
</a>

<form action="" method="post" enctype="multipart/form-data">
    <legend>Edit Image</legend>

    <div class="form-group">
        <h4 class="h6 g-font-weight-600 g-color-black g-mb-20">File input</h4>

        <div class="input-group u-file-attach-v1 g-brd-gray-light-v2">
            <input class="form-control form-control-md rounded-0" placeholder="Text in field" readonly="" type="text">

            <div class="input-group-btn">
                <button class="btn btn-md h-100 u-btn-primary rounded-0" type="submit">Browse</button>
                <input type="file" name="file" required="required">
            </div>
        </div>
    </div>

    <button type="submit" name="edit_shop" class="btn btn-primary subimit">Submit</button>

</form>