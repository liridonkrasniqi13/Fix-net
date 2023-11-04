<?php

$db['db_host'] = "localhost";
$db['db_user'] = "krasniqi13";
$db['db_pass'] = "Liverpool13";
$db['db_name'] = "cms";

foreach($db as $key => $value) {
    define(strtoupper($key), $value);
}

$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

function confirmQuery($result) {
    global $connection;
    if(!$result) {
        die("Query Failed" . mysqli_errno($connection));
    }

}

?>