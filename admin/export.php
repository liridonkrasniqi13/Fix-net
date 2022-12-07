<?php include "includes/header.php"; ?>


<?php

function filterData(&$str) {
    $str =  preg_replace("/\t","\\t", $str);
    $str =  preg_replace("/\r?n/","\\n", $str);
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"' ;
}


$fileName = "members-data" . date('Y-m-d') . "xls";

$filds = array('ID', 'FIRST NAME', 'LAST NAME', 'EMAIL');

$exelData = implode("/t" , array_values($filds)) . "/n";

$query = $db->query("SELECT * FROM posts ORDER BY post_id DESC ");
    if($query->num_rows > 0) {
        while ($row = $query->fetch_assoc()){
            $lineData = array($row['post_id'], $row['post_author'],$row['post_title'],$row['post_resiver'] );
            array_walk($lineData, 'filterData');
            $exelData .= implode("\t", array_values($lineData)) . "\n";
        }
    } else {
        $exelData .= "NO nonononononon";
    }


    header("Content-Disposition: attachment; filename=\"$fileName\"");
    header("Content-Type: application/vnd.ms-excel");

    echo $exelData; 

    exit;


?>


