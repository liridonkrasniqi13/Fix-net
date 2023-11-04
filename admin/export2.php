<?php

$db['db_host'] = "localhost";
$db['db_user'] = "krasniqi13";
$db['db_pass'] = "Liverpool13";
$db['db_name'] = "cms";

foreach ($db as $key => $value) {
    define(strtoupper($key), $value);
}

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($connection) {
    // echo "we are connected";
}

if (isset($_POST["export_excel"])) {
    $from_date = $_POST['from_date'];
    $to_date = $_POST['to_date'];
    $post_author = $_POST['post_author'];

    if ($post_author == "liridonkrasniqi") {
        $sql = "SELECT * FROM posts WHERE post_date BETWEEN '$from_date' AND '$to_date' ORDER BY post_id DESC";
    } else {
        $sql = "SELECT * FROM posts WHERE post_author = '$post_author' AND post_date BETWEEN '$from_date' AND '$to_date' ORDER BY post_id DESC";
    }

    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Set response headers for a CSV file download
        header("Content-Disposition: attachment; filename=test.csv");
        header("Content-Type: text/csv");

        // Open the output stream
        $output = fopen('php://output', 'w');

        // Output CSV column headers
        fputcsv($output, array(
            'Id', 'Author', 'Klienti', 'Comment', 'Tiket', 'Resiver', 'Modem', 'RG6', 'Konektor RG6',
            'Spliter', 'Konektor Tv', 'RG11', 'T32', 'Kupler 7402', 'AMP', 'Tap 26', 'Tap 23', 'Tap 20',
            'Tap 17', 'Tap 14', 'Tap 11', 'Tap 10', 'Tap 8', 'Kartela', 'Date'
        ));

        // Output data as CSV rows
        while ($row = mysqli_fetch_assoc($result)) {
            fputcsv($output, array(
                $row['post_id'],
                $row['post_author'],
                $row['post_title'],
                $row['post_content'],
                $row['post_category_id'],
                $row['post_resiver'],
                $row['post_modem'],
                $row['post_rg6'],
                $row['post_konektor_rg6'],
                $row['post_spliter'],
                $row['post_konektor_tv'],
                $row['post_rg11'],
                $row['post_t32'],
                $row['post_kupler_7402'],
                $row['post_amp'],
                $row['tap_26'],
                $row['tap_23'],
                $row['tap_20'],
                $row['tap_17'],
                $row['tap_14'],
                $row['tap_11'],
                $row['tap_10'],
                $row['tap_8'],
                $row['tap_4'],
                $row['post_date']
            ));
        }

        // Close the output stream
        fclose($output);

        exit;
    }
}
?>
