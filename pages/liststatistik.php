 <?php
    include("koneksi.php");
    $no = 0;
    $twit = "SELECT COUNT(id_user) AS total, created_time FROM tweets GROUP BY date(created_time)";
    $totaltwit = mysqli_query($konek,$twit);
    $smtwit = "SELECT * FROM tweets";
    $jmtwit = mysqli_query($konek,$smtwit);
    $jumlahtwit = mysqli_num_rows($jmtwit);
    while($row = mysqli_fetch_array($totaltwit)) {
    	$no++;
        $data[] = array(
                        'waktu' => date('d-M-Y',strtotime($row['created_time'])), 
                        'totalpost' => $row['total'], 
                );
    }
?>
<div class="text-right">
	<a href="?page=listunsada" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span>Kembali</a>
</div>
 <hr />
 <div class="panel panel-primary">
   <div class="panel-heading">
     <div class="panel-title">
      <div class="text-center">
      Statistik Penggunaan kata unsada
      </div>
      <div class="text-right">Total Posting : <?php echo $jumlahtwit ?></div>
     </div>
   </div>
   <div class="panel-body">
     <div class="row">
       <div class="col-md-12">
       		 <div id="canvas-holder1">
			    <canvas id="chart1"/>
			 </div>
       </div>
     </div>
   </div>
 </div>

  <script>

  	var data = <?php echo json_encode($data); ?>;
  	var waktu = [];
  	var jumlah = [];
  	for (var i = 0, len = data.length; i < len; i++) {
	  	waktu.push(data[i].waktu);
	  	jumlah.push(data[i].totalpost);
	}

	console.log(waktu);
	console.log(jumlah);

    var lineChartData = {
	      labels: waktu,
	      datasets: [{
	      	label: "Jumlah Posting",
	        fill: false,
	        lineTension: 0.1,
	        backgroundColor: "rgba(75,192,192,0.4)",
	        borderColor: "rgba(75,192,192,1)",
	        borderCapStyle: 'butt',
	        borderDash: [],
	        borderDashOffset: 0.0,
	        borderJoinStyle: 'miter',
	        pointBorderColor: "rgba(75,192,192,1)",
	        pointBackgroundColor: "#fff",
	        pointBorderWidth: 1,
	        pointHoverRadius: 5,
	        pointHoverBackgroundColor: "rgba(75,192,192,1)",
	        pointHoverBorderColor: "rgba(220,220,220,1)",
	        pointHoverBorderWidth: 2,
	        pointRadius: 1,
	        pointHitRadius: 10,
	        data: jumlah
	      }]
	    };

	      var chartEl = document.getElementById("chart1");
	      window.myLine = new Chart(chartEl, {
	        type: 'line',
	        data: lineChartData,
	        options: {
	        }
      });
  </script>