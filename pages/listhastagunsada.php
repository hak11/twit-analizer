<?php

include("config_auth.php");


$querylastid = "SELECT * FROM sysparam where sgroup='id_terakhir_hashtag' ORDER BY id DESC LIMIT 1";
$panggillastid = mysqli_query($konek,$querylastid);
$datalastid = mysqli_fetch_array($panggillastid);

$lastid = $datalastid['value'];


$query = array(
  "q" => "#unsada", 
  "count" => 150,
  "since_id" => $lastid,
  // "result_type" => "mixed, recent, popular",
  // "since" => "2016-01-01",
  // "until" => "2016-07-19"
);

$results = search($query);

$no=1;
$data=array();
?>
<div class="modal"><!-- Place at bottom of page --></div>
<div class="text-right">
	<button type="button" class="btn btn-success" id="simpandata">Simpan Data</button>
	<a href="?page=datatweet" type="button" class="btn btn-warning">Lihat Data Keseluruhan</a>
</div>
<hr />
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">List Data Twitter Kata Kunci Unsada</h3>
	</div>
	<div class="panel-body">
	<table class="table table-hover table-striped datatables">
		<thead>
			<tr>
				<th class="text-center">No</th>
				<th class="text-center">Tanggal Pembuatan</th>
				<th class="text-center">Username</th>
				<th class="text-center">Nama</th>
				<th class="text-center">Isi Status</th>
			</tr>
		</thead>
		<tbody>
<?php
foreach ($results->statuses as $result) {

if ($result->geo) {
	$data_geo_latitude = $result->geo->coordinates[0];
	$data_geo_longtitude = $result->geo->coordinates[1];
} else {
	$data_geo_latitude = null;
	$data_geo_longtitude = null;
}

if ($result->place) {
	$data_place_location = $result->place->name;
	$data_place_country = $result->place->country;
} else {
	$data_place_location = null;
	$data_place_country = null;
}
?>
<tr>
	<td><?php echo $no ?></td>
	<td><?php echo $result->created_at ?></td>
	<td><?php echo $result->user->screen_name ?></td>
	<td><?php echo $result->user->name ?></td>
	<td><?php echo $result->text ?></td>
</tr>

<?php
	$row[] = array(
			"status_id_str" => $result->id_str,
			"created_time" => $result->created_at,
			"status_id" => $result->id,
			"status_text" => $result->text,
			"status_latitude" => $data_geo_latitude,
			"status_longtitude" => $data_geo_longtitude,
			"status_place" => $data_place_location,
			"status_country" => $data_place_country,
			"account_id" => $result->user->id,
			"account_id_str" => $result->user->id_str,
			"account_name" => $result->user->name,
			"account_screen_name" => $result->user->screen_name,
			"account_location" => $result->user->location,
			"account_profile_img" => $result->user->profile_image_url,
			);
	$data=$row;
	$no++;
}


// $date = new DateTime();
// $result = $date->format('d-m-Y');

// $file = "alldata/".$result.".json";
// $datasimpan = json_encode($data,JSON_PRETTY_PRINT);
// file_put_contents($file, $datasimpan, FILE_APPEND | LOCK_EX);
// $_SESSION['datasekarnglistunsada'] = $data;
?>
		</tbody>
	</table>
	</div>
</div>

<script type="text/javascript">

$("#simpandata").click(function() {
	var datakirim = <?php echo json_encode($data) ?>;

	$.ajax({
		url: 'proses/proses_hastag.php',
		type: 'POST',
		data: {data: datakirim},
		success:function(data){
			if (data="success") {
				alert("Data Berhasil Disimpan");
				location.reload();
			} else {
				alert("Terjadi Kesalahan Saat Simpan Data");
			};
		}
	})
});
	
$body = $("body");

$(document).on({
    ajaxStart: function() { $body.addClass("loading");    },
    ajaxStop: function() { $body.removeClass("loading"); }    
});
</script>
