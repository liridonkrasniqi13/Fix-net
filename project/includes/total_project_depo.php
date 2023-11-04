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
          FROM project_depo ";

$query_result = mysqli_query($connection, $query);

if ($query_result) {
    $row = mysqli_fetch_assoc($query_result);
    $Tfo48_ads = $row['fo48_ads'];
    $Tfo24_adss = $row['fo24_adss'];
    $Tfo12_adss = $row['fo12_adss'];
    $Tfo24 = $row['fo24'];
    $Tfo12 = $row['fo12'];
    $Tfo04 = $row['fo04'];
    $Tfo2 = $row['fo2'];
    $Tfosc = $row['fosc'];
    $Tfdt = $row['fdt'];
    $Tfdb_1_4 = $row['fdb_1_4'];
    $Tfdb_1_8 = $row['fdb_1_8'];
    $Tsp_1_16 = $row['sp_1_16'];
    $Tpp48 = $row['pp48'];
    $Tpp24 = $row['pp24'];
    $Tpp12 = $row['pp12'];
    $Tpatch_cord = $row['patch_cord'];
    $Tspirale = $row['spirale'];
    $Tshtrenguse = $row['shtrenguse'];
    $Thallka = $row['hallka'];
    $Tonu = $row['onu'];
    $Tinstalime = $row['instalime'];
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
                    echo "<td>$Tfo48_ads</td>";
                    echo "<td>$Tfo24_adss</td>";
                    echo "<td>$Tfo12_adss</td>";
                    echo "<td>$Tfo24</td>";
                    echo "<td>$Tfo12</td>";
                    echo "<td>$Tfo04</td>";
                    echo "<td>$Tfo2</td>";
                    echo "<td>$Tfosc</td>";
                    echo "<td>$Tfdt</td>";
                    echo "<td>$Tfdb_1_4</td>";
                    echo "<td>$Tfdb_1_8</td>";
                    echo "<td>$Tsp_1_16</td>";
                    echo "<td>$Tpp48</td>";
                    echo "<td>$Tpp24</td>";
                    echo "<td>$Tpp12</td>";
                    echo "<td>$Tpatch_cord</td>";
                    echo "<td>$Tspirale</td>";
                    echo "<td>$Tshtrenguse</td>";
                    echo "<td>$Thallka</td>";
                    echo "<td>$Tonu</td>";
                    echo "<td>$Tinstalime</td>";
                    echo "</tr>";
                

            ?>

        </tbody>
    </table>


</div>

<br/>
<br/>


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

<h1>Shpenzime</h1>

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

<?php 


    $Lfo48_ads = $Tfo48_ads - $fo48_ads;
    $Lfo24_adss = $Tfo24_adss - $fo24_adss;
    $Lfo12_adss = $Tfo12_adss - $fo12_adss;
    $Lfo24 = $Tfo24 - $fo24;
    $Lfo12 = $Tfo12 - $fo12;
    $Lfo04 = $Tfo04 - $fo04;
    $Lfo2 = $Tfo2 - $fo2;
    $Lfosc = $Tfosc - $fosc;
    $Lfdt = $Tfdt - $fdt;
    $Lfdb_1_4 = $Tfdb_1_4 - $fdb_1_4;
    $Lfdb_1_8 = $Tfdb_1_8 - $fdb_1_8;
    $Lsp_1_16 = $Tsp_1_16 - $sp_1_16;
    $Lpp48 = $Tpp48 - $pp48;
    $Lpp24 = $Tpp24 - $pp24;
    $Lpp12 = $Tpp12 - $pp12;
    $Lpatch_cord = $Tpatch_cord - $patch_cord;
    $Lspirale = $Tspirale - $spirale;
    $Lshtrenguse = $Tshtrenguse - $shtrenguse;
    $Lhallka = $Thallka - $hallka;
    $Lonu = $Tonu - $onu;
    $Linstalime = $Tinstalime - $instalime;

?>

<br/>
<br/>

<h1>Gjendja</h1>

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
                    echo "<td>$Lfo48_ads</td>";
                    echo "<td>$Lfo24_adss</td>";
                    echo "<td>$Lfo12_adss</td>";
                    echo "<td>$Lfo24</td>";
                    echo "<td>$Lfo12</td>";
                    echo "<td>$Lfo04</td>";
                    echo "<td>$Lfo2</td>";
                    echo "<td>$Lfosc</td>";
                    echo "<td>$Lfdt</td>";
                    echo "<td>$Lfdb_1_4</td>";
                    echo "<td>$Lfdb_1_8</td>";
                    echo "<td>$Lsp_1_16</td>";
                    echo "<td>$Lpp48</td>";
                    echo "<td>$Lpp24</td>";
                    echo "<td>$Lpp12</td>";
                    echo "<td>$Lpatch_cord</td>";
                    echo "<td>$Lspirale</td>";
                    echo "<td>$Lshtrenguse</td>";
                    echo "<td>$Lhallka</td>";
                    echo "<td>$Lonu</td>";
                    echo "<td>$Linstalime</td>";
                    echo "</tr>";
                
            ?>

        </tbody>
    </table>


</div>