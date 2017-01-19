<?php
session_start();
$datasaya = $_POST['data'];
include('../koneksi.php');

// $data = json_decode($datasaya,TRUE);
$jumlahdata  = count($datasaya);

$id_user = $_SESSION['id_user'];

$status = false;

for ($i=0; $i < $jumlahdata; $i++) { 
	$status_id_str = $datasaya[$i]['status_id_str'];
	$created_time = $datasaya[$i]['created_time'];
	$status_id = $datasaya[$i]['status_id'];
	$status_text = $datasaya[$i]['status_text'];
	$status_latitude = $datasaya[$i]['status_latitude'];
	$status_longtitude = $datasaya[$i]['status_longtitude'];
	$status_place = $datasaya[$i]['status_place'];
	$status_country = $datasaya[$i]['status_country'];
	$account_id = $datasaya[$i]['account_id'];
	$account_id_str = $datasaya[$i]['account_id_str'];
	$account_name = $datasaya[$i]['account_name'];
	$account_screen_name = $datasaya[$i]['account_screen_name'];
	$account_location = $datasaya[$i]['account_location'];
	$account_profile_img = $datasaya[$i]['account_profile_img'];

	$created = date("Y-m-d H:i:s", strtotime($created_time));

	$query = "INSERT INTO tweets (status_id_str,created_time,status_id,status_text,status_latitude,status_longtitude,status_place,status_country,account_id,account_id_str,account_name,account_screen_name,account_location,account_profile_img) VALUES ('$status_id_str','$created','$status_id','$status_text','$status_latitude','$status_longtitude','$status_place','$status_country','$account_id','$account_id_str','$account_name','$account_screen_name','$account_location','$account_profile_img')";
	$kirimdata = mysqli_query($konek,$query);


	if ($kirimdata) {
		$status = true;
	} else {
		$status = false;
	}
}

if ($status) {
	$dataterakhirpost = $datasaya[0]['status_id_str'];
	$queryupdate = "UPDATE sysparam SET value='$dataterakhirpost' where sgroup='id_terakhir_hashtag'";
	$jalankanquery = mysqli_query($konek,$queryupdate);
	echo "success";
} else {
	echo $query;
}

?>