<div class="text-right">
	<form role="form" id="form" method="POST" action="?page=testcodingakhir">
          <div class="form-group">
          <input type="text" placeholder="Search" id="search" name="cari" class="form-control">
          </div>
          <button type="submit" id="masuk" name="masuk1" class="btn btn-success"><span class="glyphicon glyphicon-log-in"></span> Cari</button>
     	<button id="reset" class="btn btn-danger">Reset</button>
     </form>
</div>
<hr />
<?php
if( isset($_POST['cari'])) {
	if ($_POST['cari']!='') {
		$cari = $_POST['cari'];
		include("koneksi.php");
		$no = 0;
		$datatweet = "SELECT status_place, COUNT(*) AS total FROM `tweets` WHERE status_text LIKE '%$cari%' GROUP BY status_place";
		$lihatdatatweet = mysqli_query($konek,$datatweet);
		
?>
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Data Tweet</h3>
	</div>
	<div class="panel-body">
	<table class="table table-hover table-striped">
		<thead>
			<tr> 
				<th class="text-center">No</th>
				<th class="text-center">Lokasi</th>
				<th class="text-center">Jumlah</th>
			</tr>
		</thead>
		<tbody>
<?php
		while ($row = mysqli_fetch_array($lihatdatatweet)) {
			if ($row['status_place']!="") {
				$isiplace = $row['status_place'];
			} else {
				$isiplace = "Lokasi Tidak Diketahui";
			}
			$no++;
		?>
			<tr>
				<td><?php echo $no ?></td>
				<td><?php echo $isiplace ?></td>
				<td><?php echo $row['total'] ?></td>
			</tr>
		<?php
		}
		?>
		</tbody>
	</table>
	</div>
</div>
<?php 
	}
} 

$_POST = array();

?>

<!-- <script type="text/javascript">
	$('#reset').click(){
		windows.location.replace('?page=testcodingakhir');
	}
</script> -->