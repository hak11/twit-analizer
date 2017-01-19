<div class="text-right">
	<a href="?page=listunsada" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span>Kembali</a>
</div>
<hr />
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
				<th class="text-center">Nama</th>
				<th class="text-center">Total Posting</th>
			</tr>
		</thead>
		<tbody>
		<?php
		include("koneksi.php");
		$no = 0;
		$datatweet = "SELECT created_time, account_name, COUNT(account_name) AS total FROM tweets GROUP BY account_name, LEFT(created_time, 10) ORDER BY tweets.created_time ASC";
		$lihatdatatweet = mysqli_query($konek,$datatweet);
				while ($row = mysqli_fetch_array($lihatdatatweet)) {
			$no++;
		?>
			<tr class="text-center">
				<td><?php echo $no ?></td>
				<td><?php echo date('d-M-Y',strtotime($row['created_time'])); ?></td>
				<td><?php echo $row['account_name'] ?></td>
				<td><?php echo $row['total'] ?>
			</tr>
		<?php
		}
		?>
		</tbody>
	</table>