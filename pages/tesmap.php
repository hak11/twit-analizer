<?php
		include("koneksi.php");
		$no = 0;
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
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Data Tweet</h3>
	</div>
	<div class="panel-body">
	
	<table class="table table-hover table-striped datatables">
		<thead>
			<tr> 
				<th class="text-center">No</th>
				<th class="text-center">Tanggal Pembuatan</th>
				<th class="text-center">Username</th>
				<th class="text-center">Nama</th>
				<th class="text-center">Latitude</th>
				<th class="text-center">Longtitude</th>
				<th class="text-center"></th>
			</tr>
		</thead>
		<tbody>
		<?php
		while ($row = mysqli_fetch_array($lihatdatatweet)) {
			$no++;
		?>
			<tr>
				<td><?php echo $no ?></td>
				<td><?php echo date('d-M-Y',strtotime($row['created_time'])); ?></td>
				<td><?php echo $row['account_screen_name'] ?></td>
				<td><?php echo $row['account_name'] ?></td>
				<td><?php echo $row['status_latitude'] ?></td>
				<td><?php echo $row['status_longtitude'] ?></td>
				<td><a href="https://www.google.co.id/maps/place/<?php echo $row['status_latitude'] ?>, <?php echo $row['status_longtitude'] ?>" target="_blank" title="Lihat Lokasi" class="btn btn-warning"><span class="glyphicon glyphicon-map-marker"></span>Lihat Lokasi</a></td>
			</tr>
		<?php
		}
		?>
		</tbody>
	</table>
	</div>
</div>
	<hr />