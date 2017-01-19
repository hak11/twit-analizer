<?php  

    include("koneksi.php");
    $no = 0;
    $tampung = array();
    $datatweet = "SELECT * FROM tweets WHERE status_latitude AND status_longtitude IS NOT NULL ORDER BY tweets.created_time DESC";
    $lihatdatatweet = mysqli_query($konek,$datatweet);
	$pretweet = "SELECT * FROM tweets";
	$hitpretweet = mysqli_query($konek,$pretweet);
	$jumlahtweet = mysqli_num_rows($hitpretweet);
	$jumlahtweet2 = mysqli_num_rows($lihatdatatweet);
	$adamap = $jumlahtweet-($jumlahtweet-$jumlahtweet2);
	$tdkmap = $jumlahtweet-$jumlahtweet2;
	$smap = ($jumlahtweet-($jumlahtweet-$jumlahtweet2))/$jumlahtweet*100;
	$stmap = ($jumlahtweet-$jumlahtweet2)/$jumlahtweet*100;
    while ($row = mysqli_fetch_array($lihatdatatweet)) {
      $data[] = array(
                "<b>".$row['account_name']."</b><br />".$row['status_text'],
                $row['status_latitude'],
                $row['status_longtitude'],
              );

      $tampung = $data;
    }
?>
<div class="text-right">
	<a href="?page=listunsada" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span>Kembali</a>
</div>
<hr />
<div class="jumbotron">
	<table class="table table-hover table-striped table-bordered">
		<thead>
			<tr>
				<th class="text-center success">Jumlah Data</th>
				<th class="text-center">Data Ada Map</th>
				<th class="text-center danger">Data Tidak Ada Map</th>
				<th class="text-center warning">Persentase Ada Map</th>
				<th class="text-center info">Persentase Tidak Ada Map</th>
			</tr>
		</thead>
		<tbody>
			<tr class="text-center">
			<td><?php echo $jumlahtweet ?></td>
			<td><?php echo $adamap ?></td>
			<td><?php echo $tdkmap ?></td>
			<td><?php echo number_format($smap,2),"%" ?></td>
			<td><?php echo number_format($stmap,2),"%" ?></td>
			</tr>
		</tbody>
	</table>
	</div>
	<hr/>
<div id='wrapper'>
<center>
     <div id='map-canvas'>
        <div id="map" style="width: 75%; height: 500px;"></div>
     </div>
     </center>
</div>

  <script type="text/javascript">

    var locations = <?php echo json_encode($tampung) ?>;

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 10,
      center: new google.maps.LatLng(-6.229978, 106.924091),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
  </script>