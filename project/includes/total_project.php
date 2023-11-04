<?php

$query = "SELECT
            SUM(CASE WHEN fo48_ads IS NOT NULL THEN fo48_ads ELSE 0 END) AS fo48_ads,
            SUM(CASE WHEN fo24_adss IS NOT NULL THEN fo24_adss ELSE 0 END) AS fo24_adss,
            SUM(CASE WHEN fo12_adss IS NOT NULL THEN fo12_adss ELSE 0 END) AS fo12_adss,
            SUM(CASE WHEN fo24 IS NOT NULL THEN fo24 ELSE 0 END) AS fo24,
            SUM(CASE WHEN fo12 IS NOT NULL THEN fo12 ELSE 0 END) AS fo12,
            SUM(CASE WHEN fo04 IS NOT NULL THEN fo04 ELSE 0 END) AS fo04,
            SUM(CASE WHEN fo2 IS NOT NULL THEN fo2 ELSE 0 END) AS fo2,
            SUM(CASE WHEN fosc IS NOT NULL THEN fosc ELSE 0 END) AS fosc,
            SUM(CASE WHEN fdt IS NOT NULL THEN fdt ELSE 0 END) AS fdt,
            SUM(CASE WHEN fdb_1_4 IS NOT NULL THEN fdb_1_4 ELSE 0 END) AS fdb_1_4,
            SUM(CASE WHEN fdb_1_8 IS NOT NULL THEN fdb_1_8 ELSE 0 END) AS fdb_1_8,
            SUM(CASE WHEN sp_1_16 IS NOT NULL THEN sp_1_16 ELSE 0 END) AS sp_1_16,
            SUM(CASE WHEN pp48 IS NOT NULL THEN pp48 ELSE 0 END) AS pp48,
            SUM(CASE WHEN pp24 IS NOT NULL THEN pp24 ELSE 0 END) AS pp24,
            SUM(CASE WHEN pp12 IS NOT NULL THEN pp12 ELSE 0 END) AS pp12,
            SUM(CASE WHEN patch_cord IS NOT NULL THEN patch_cord ELSE 0 END) AS patch_cord,
            SUM(CASE WHEN spirale IS NOT NULL THEN spirale ELSE 0 END) AS spirale,
            SUM(CASE WHEN shtrenguse IS NOT NULL THEN shtrenguse ELSE 0 END) AS shtrenguse,
            SUM(CASE WHEN hallka IS NOT NULL THEN hallka ELSE 0 END) AS hallka,
            SUM(CASE WHEN onu IS NOT NULL THEN onu ELSE 0 END) AS onu,
            SUM(CASE WHEN instalime IS NOT NULL THEN instalime ELSE 0 END) AS instalime
          FROM project ";

$query_result = mysqli_query($connection, $query);

if ($query_result) {
    $row = mysqli_fetch_assoc($query_result);
    $fo48_ads = $row['fo48_ads'];
    $fo24_adss = $row['fo24_adss'];
    $fo12_adss = $row['fo12_adss'];
    $fo24 = $row['fo24'];
    $fo12 = $row['fo12'];
    $fo04 = $row['fo04'];
    $fo2 = $row['fo2'];
    $fosc = $row['fosc'];
    $fdt = $row['fdt'];
    $fdb_1_4 = $row['fdb_1_4'];
    $fdb_1_8 = $row['fdb_1_8'];
    $sp_1_16 = $row['sp_1_16'];
    $pp48 = $row['pp48'];
    $pp24 = $row['pp24'];
    $pp12 = $row['pp12'];
    $patch_cord = $row['patch_cord'];
    $spirale = $row['spirale'];
    $shtrenguse = $row['shtrenguse'];
    $hallka = $row['hallka'];
    $onu = $row['onu'];
    $instalime = $row['instalime'];
} else {
    // Handle the query error here
    echo "Error: " . mysqli_error($connection);
}

?>

<br/>
<br/>

<h1>Total</h1>
<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>FO48-Ads</th>
                <th>FO24-Adss</th>
                <th>FO12-Adss</th>
                <th>FO24</th>
                <th>Fo12</th>
                <th>Fo04</th>
                <th>Fo2(Drop)</th>
                <th>FOSC</th>
                <th>FDT</th>
                <th>FDB 1/4</th>
                <th>FDB 1/8</th>
                <th>SP 1/16</th>
                <th>PP 48</th>
                <th>PP 24</th>
                <th>PP 12</th>
                <th>Patch Cord</th>
                <th>Spirale</th>
                <th>Shtrenguse Flat</th>
                <th>Hallka</th>
                <th>ONU RF</th>
                <th>Instalime</th>
            </tr>
        </thead>
        <tbody>
            <?php
            echo "<tr>";
            echo "<td>$fo48_ads</td>";
            echo "<td>$fo24_adss</td>";
            echo "<td>$fo12_adss</td>";
            echo "<td>$fo24</td>";
            echo "<td>$fo12</td>";
            echo "<td>$fo04</td>";
            echo "<td>$fo2</td>";
            echo "<td>$fosc</td>";
            echo "<td>$fdt</td>";
            echo "<td>$fdb_1_4</td>";
            echo "<td>$fdb_1_8</td>";
            echo "<td>$sp_1_16</td>";
            echo "<td>$pp48</td>";
            echo "<td>$pp24</td>";
            echo "<td>$pp12</td>";
            echo "<td>$patch_cord</td>";
            echo "<td>$spirale</td>";
            echo "<td>$shtrenguse</td>";
            echo "<td>$hallka</td>";
            echo "<td>$onu</td>";
            echo "<td>$instalime</td>";
            echo "</tr>";
            ?>
        </tbody>
    </table>
</div>