<?php 



function insert_categoris() { 

    global $connection;

    if (isset($_POST['submit'])) {
        $cat_title = $_POST['cat_title'];

        if ($cat_title == "" || empty($cat_title)) {

            echo "this field should not be empty";
        } else {

            $query = "INSERT INTO categories(cat_title)";
            $query .= "VALUE('{$cat_title}') ";

            $create_category_query = mysqli_query($connection, $query);

            if (!$create_category_query) {
                die('Save faild' . mysqli_errno($connection));
            }
        }
    }

}

function findeAllCategoris() {
    global $connection;

    // Finde all categories
    $query = "SELECT * FROM categories";
    $select_categries = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($select_categries)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

        echo "<tr>";
        echo "<td>{$cat_id}</td>";
        echo "<td>{$cat_title}</td>";
        echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
        echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
        echo "</tr>";
    }
}


function deleteCategoris() {
    global $connection;

    if (isset($_GET['delete'])) {

        $the_cat_id = $_GET['delete'];

        $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id} ";

        $delete_query = mysqli_query($connection, $query);

        header("Location: categories.php");
    }
}






?>