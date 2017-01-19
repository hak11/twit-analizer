<?php
    include("koneksi.php");
    $no = 0;
    $twit = "SELECT COUNT(id_user) AS total, created_time FROM tweets GROUP BY date(created_time)";
    $totaltwit = mysqli_query($konek,$twit);
    while($row = mysqli_fetch_array($totaltwit)) {
    	$no++;
        $data[] = array(
                        'waktu' => $row['created_time'], 
                        'totalpost' => $row['total'], 
                );
    }

    echo "<pre>";
    print_r($data);
    echo "</pre>";
?>