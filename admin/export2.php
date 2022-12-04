
<?php


$db['db_host'] = "localhost";
$db['db_user'] = "krasniqi13";
$db['db_pass'] = "Liverpool13";
$db['db_name'] = "cms";

foreach($db as $key => $value) {
    define(strtoupper($key), $value);
}

$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

if($connection) {
    
    // echo "we are connected";

}



$output = '';

if(isset($_POST["expor_excel"])) {  
    $sql = "SELECT * FROM posts " ;
    $result = mysqli_query($connection, $sql);
    if(mysqli_num_rows($result) > 0) {
        $output .= '
        <table class="table" bordered="1">
        <tr>

            <th>Id</th>
            <th>Author</th>
            <th>Klienti</th>
            <th>Comment</th>
            <th>Tiket</th>
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
        ';
    }
    while ($row = mysqli_fetch_array($result)) {
        $output .=  '

            <tr>
                <th>' .$row['post_id']. '</th>
                <th>' .$row['post_author']. '</th>
                <th>' .$row['post_title']. '</th>
                <th>' .$row['post_content']. '</th>
                <th>' .$row['post_category_id']. '</th>

            <th>' .$row['post_resiver']. '</th>
            <th>' .$row['post_modem']. '</th>
            <th>' .$row['post_rg6']. '</th>
            <th>' .$row['post_konektor_rg6']. '</th>
            <th>' .$row['post_spliter']. '</th>
            <th>' .$row['post_konektor_tv']. '</th>
            <th>' .$row['post_rg11']. '</th>
            <th>' .$row['post_t32']. '</th>
            <th>' .$row['post_kupler_7402']. '</th>
            <th>' .$row['post_amp']. '</th>
            <th>' .$row['tap_26']. '</th>
            <th>' .$row['tap_23']. '</th>
            <th>' .$row['tap_20']. '</th>
            <th>' .$row['tap_17']. '</th>
            <th>' .$row['tap_14']. '</th>
            <th>' .$row['tap_11']. '</th>
            <th>' .$row['tap_10']. '</th>
            <th>' .$row['tap_8']. '</th>
            <th>' .$row['tap_4']. '</th>
            <th>' .$row['post_date']. '</th>
            </tr>

        ';
    }
    $output .= '</table>';

    header("Content-Disposition: attachment; filename=test.xls");
    header("Content-Type: application/xls");

    echo $output; 

    exit;
}

