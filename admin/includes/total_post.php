<?php

if (isset($_GET['from_date']) && isset($_GET['to_date'])) {
    $from_date = $_GET['from_date'];
    $to_date = $_GET['to_date'];
    if ($_SESSION['user_role'] == "admin") {
        $post_author = $_GET['post_author'];
        $filter_date = " WHERE post_author = '$post_author' AND  post_date BETWEEN '$from_date' AND '$to_date' ";
        if ($post_author == "liridonkrasniqi") {
            $filter_date = " WHERE post_date BETWEEN '$from_date' AND '$to_date' ";
        }
    } else {
        $post_author = $_SESSION['username'];
        $filter_date = " WHERE post_author = '$post_author' AND  post_date BETWEEN '$from_date' AND '$to_date' ";
    }
} else {
    $from_date = "";
    $to_date = "";
    $post_author = "";

    $filter_date = "";
}


// echo $filter_date;  



$query = "SELECT SUM(post_resiver) AS sum FROM posts $filter_date ";
$query_result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($query_result)) {
    $resiver = $row['sum'];
}

$query = "SELECT SUM(post_modem) AS sum FROM posts $filter_date";
$query_result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($query_result)) {
    $modem = $row['sum'];
}

$query = "SELECT SUM(post_rg6) AS sum FROM posts $filter_date";
$query_result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($query_result)) {
    $rg6 = $row['sum'];
}

$query = "SELECT SUM(post_konektor_rg6) AS sum FROM posts $filter_date";
$query_result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($query_result)) {
    $post_konektor_rg6 = $row['sum'];
}

$query = "SELECT SUM(post_spliter) AS sum FROM posts $filter_date";
$query_result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($query_result)) {
    $post_spliter = $row['sum'];
}

$query = "SELECT SUM(post_konektor_tv) AS sum FROM posts $filter_date";
$query_result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($query_result)) {
    $post_konektor_tv = $row['sum'];
}

$query = "SELECT SUM(post_rg11) AS sum FROM posts $filter_date";
$query_result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($query_result)) {
    $post_rg11 = $row['sum'];
}

$query = "SELECT SUM(post_t32) AS sum FROM posts $filter_date";
$query_result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($query_result)) {
    $post_t32 = $row['sum'];
}

$query = "SELECT SUM(post_kupler_7402) AS sum FROM posts $filter_date";
$query_result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($query_result)) {
    $post_kupler_7402 = $row['sum'];
}

$query = "SELECT SUM(post_amp) AS sum FROM posts $filter_date";
$query_result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($query_result)) {
    $post_amp = $row['sum'];
}

$query = "SELECT SUM(tap_26) AS sum FROM posts $filter_date";
$query_result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($query_result)) {
    $tap_26 = $row['sum'];
}

$query = "SELECT SUM(tap_23) AS sum FROM posts $filter_date";
$query_result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($query_result)) {
    $tap_23 = $row['sum'];
}

$query = "SELECT SUM(tap_20) AS sum FROM posts $filter_date";
$query_result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($query_result)) {
    $tap_20 = $row['sum'];
}

$query = "SELECT SUM(tap_17) AS sum FROM posts $filter_date";
$query_result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($query_result)) {
    $tap_17 = $row['sum'];
}

$query = "SELECT SUM(tap_14) AS sum FROM posts $filter_date";
$query_result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($query_result)) {
    $tap_14 = $row['sum'];
}

$query = "SELECT SUM(tap_11) AS sum FROM posts $filter_date";
$query_result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($query_result)) {
    $tap_11 = $row['sum'];
}

$query = "SELECT SUM(tap_10) AS sum FROM posts $filter_date";
$query_result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($query_result)) {
    $tap_10 = $row['sum'];
}

$query = "SELECT SUM(tap_8) AS sum FROM posts $filter_date";
$query_result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($query_result)) {
    $tap_8 = $row['sum'];
}

$query = "SELECT SUM(tap_4) AS sum FROM posts $filter_date";
$query_result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($query_result)) {
    $tap_4 = $row['sum'];
}

// /////////////////////////////////////////////////////////////////////////////

$query = "SELECT SUM(resiver) AS sum FROM vetura $filter_date ";
$query_result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($query_result)) {
    $vetura_resiver = $row['sum'];
}

$query = "SELECT SUM(modem) AS sum FROM vetura $filter_date ";
$query_result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($query_result)) {
    $vetura_modem = $row['sum'];
}

$query = "SELECT SUM(rg6) AS sum FROM vetura $filter_date";
$query_result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($query_result)) {
    $vetura_rg6 = $row['sum'];
}

$query = "SELECT SUM(konektor_rg6) AS sum FROM vetura $filter_date";
$query_result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($query_result)) {
    $vetura_konektor_rg6 = $row['sum'];
}

$query = "SELECT SUM(konektor_rg6) AS sum FROM vetura $filter_date";
$query_result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($query_result)) {
    $vetura_konektor_rg6 = $row['sum'];
}

$query = "SELECT SUM(spliter) AS sum FROM vetura $filter_date";
$query_result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($query_result)) {
    $vetura_spliter = $row['sum'];
}

$query = "SELECT SUM(konektor_tv) AS sum FROM vetura $filter_date";
$query_result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($query_result)) {
    $vetura_konektor_tv = $row['sum'];
}

$query = "SELECT SUM(rg11) AS sum FROM vetura $filter_date";
$query_result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($query_result)) {
    $vetura_rg11 = $row['sum'];
}

$query = "SELECT SUM(t32) AS sum FROM vetura $filter_date";
$query_result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($query_result)) {
    $vetura_t32 = $row['sum'];
}

$query = "SELECT SUM(kupler_7402) AS sum FROM vetura $filter_date";
$query_result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($query_result)) {
    $vetura_kupler_7402 = $row['sum'];
}

$query = "SELECT SUM(amp) AS sum FROM vetura $filter_date";
$query_result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($query_result)) {
    $vetura_amp = $row['sum'];
}

$query = "SELECT SUM(tap_26) AS sum FROM vetura $filter_date";
$query_result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($query_result)) {
    $vetura_tap_26 = $row['sum'];
}

$query = "SELECT SUM(tap_23) AS sum FROM vetura $filter_date";
$query_result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($query_result)) {
    $vetura_tap_23 = $row['sum'];
}

$query = "SELECT SUM(tap_20) AS sum FROM vetura $filter_date";
$query_result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($query_result)) {
    $vetura_tap_20 = $row['sum'];
}

$query = "SELECT SUM(tap_17) AS sum FROM vetura $filter_date";
$query_result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($query_result)) {
    $vetura_tap_17 = $row['sum'];
}

$query = "SELECT SUM(tap_14) AS sum FROM vetura $filter_date";
$query_result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($query_result)) {
    $vetura_tap_14 = $row['sum'];
}

$query = "SELECT SUM(tap_11) AS sum FROM vetura $filter_date";
$query_result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($query_result)) {
    $vetura_tap_11 = $row['sum'];
}

$query = "SELECT SUM(tap_10) AS sum FROM vetura $filter_date";
$query_result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($query_result)) {
    $vetura_tap_10 = $row['sum'];
}

$query = "SELECT SUM(tap_8) AS sum FROM vetura $filter_date";
$query_result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($query_result)) {
    $vetura_tap_8 = $row['sum'];
}

$query = "SELECT SUM(tap_4) AS sum FROM vetura $filter_date";
$query_result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($query_result)) {
    $vetura_tap_4 = $row['sum'];
}

$dallimiResiver = $vetura_resiver -  $resiver;
$dallimiModem = $vetura_modem -  $modem;
$dallimiRg6 = $vetura_rg6 -  $rg6;
$dallimikonektor_rg6 = $vetura_konektor_rg6 -  $post_konektor_rg6;
$dallimispliter = $vetura_spliter -  $post_spliter;
$dallimikonektor_tv = $vetura_konektor_tv -  $post_konektor_tv;
$dallimirg11 = $vetura_rg11 -  $post_rg11;
$dallimit32 = $vetura_t32 -  $post_t32;
$dallimikupler_7402 = $vetura_kupler_7402 -  $post_kupler_7402;
$dallimi_amp = $vetura_amp -  $post_amp;
$dallimi_tap_26 = $vetura_tap_26 -  $tap_26;
$dallimi_tap_23 = $vetura_tap_23 -  $tap_23;
$dallimi_tap_20 = $vetura_tap_20 -  $tap_20;
$dallimi_tap_17 = $vetura_tap_17 -  $tap_17;
$dallimi_tap_14 = $vetura_tap_14 -  $tap_14;
$dallimi_tap_11 = $vetura_tap_11 -  $tap_11;
$dallimi_tap_10 = $vetura_tap_10 -  $tap_10;
$dallimi_tap_8 = $vetura_tap_8 -  $tap_8;
$dallimi_tap_4 = $vetura_tap_4 -  $tap_4;


?>


<h1>Gjendja</h1>
<table class="table table-bordered table-hover">
    <thead>
        <tr>

            <th></th>
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
        </tr>
    </thead>
    <tbody>
        <?php

        echo "<td>TOTAL</td>";
        echo "<td>$dallimiResiver</td>";
        echo "<td>$dallimiModem</td>";
        echo "<td>$dallimiRg6</td>";
        echo "<td>$dallimikonektor_rg6</td>";
        echo "<td>$dallimispliter</td>";
        echo "<td>$dallimikonektor_tv</td>";
        echo "<td>$dallimirg11</td>";
        echo "<td>$dallimit32</td>";
        echo "<td>$dallimikupler_7402</td>";
        echo "<td>$dallimi_amp</td>";
        echo "<td>$dallimi_tap_26</td>";
        echo "<td>$dallimi_tap_23</td>";
        echo "<td>$dallimi_tap_20</td>";
        echo "<td>$dallimi_tap_17</td>";
        echo "<td>$dallimi_tap_14</td>";
        echo "<td>$dallimi_tap_11</td>";
        echo "<td>$dallimi_tap_10</td>";
        echo "<td>$dallimi_tap_8</td>";
        echo "<td>$dallimi_tap_4</td>";

        ?>
    </tbody>
</table>
<h1>Hargjime</h1>
<table class="table table-bordered table-hover">
    <thead>
        <tr>

            <th></th>
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
        </tr>
    </thead>
    <tbody>
        <?php

        echo "<td>TOTAL</td>";
        echo "<td>$resiver</td>";
        echo "<td>$modem</td>";
        echo "<td>$rg6</td>";
        echo "<td>$post_konektor_rg6</td>";
        echo "<td>$post_spliter</td>";
        echo "<td>$post_konektor_tv</td>";
        echo "<td>$post_rg11</td>";
        echo "<td>$post_t32</td>";
        echo "<td>$post_kupler_7402</td>";
        echo "<td>$post_amp</td>";
        echo "<td>$tap_26</td>";
        echo "<td>$tap_23</td>";
        echo "<td>$tap_20</td>";
        echo "<td>$tap_17</td>";
        echo "<td>$tap_14</td>";
        echo "<td>$tap_11</td>";
        echo "<td>$tap_10</td>";
        echo "<td>$tap_8</td>";
        echo "<td>$tap_4</td>";

        ?>
    </tbody>
</table>

<h1>Total</h1>
<table class="table table-bordered table-hover">
    <thead>
        <tr>

            <th></th>
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
        </tr>
    </thead>
    <tbody>
        <?php

        echo "<td>TOTAL</td>";
        echo "<td>$vetura_resiver</td>";
        echo "<td>$vetura_modem</td>";
        echo "<td>$vetura_rg6</td>";
        echo "<td>$vetura_konektor_rg6</td>";
        echo "<td>$vetura_spliter</td>";
        echo "<td>$vetura_konektor_tv</td>";
        echo "<td>$vetura_rg11</td>";
        echo "<td>$vetura_t32</td>";
        echo "<td>$vetura_kupler_7402</td>";
        echo "<td>$vetura_amp</td>";
        echo "<td>$vetura_tap_26</td>";
        echo "<td>$vetura_tap_23</td>";
        echo "<td>$vetura_tap_20</td>";
        echo "<td>$vetura_tap_17</td>";
        echo "<td>$vetura_tap_14</td>";
        echo "<td>$vetura_tap_11</td>";
        echo "<td>$vetura_tap_10</td>";
        echo "<td>$vetura_tap_8</td>";
        echo "<td>$vetura_tap_4</td>";

        ?>
    </tbody>
</table>