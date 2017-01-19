<!DOCTYPE html>
<html>
<head>
	<title>Skripsi Widi</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/custom.css">
	<link rel="stylesheet" href="datatables/dataTables.bootstrap.css">
  <script src="js/Chart.bundle.min.js"></script>
  <script src="js/jquery211.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="http://maps.google.com/maps/api/js?key=AIzaSyDRvtDZrRrDqTbAXOR7Ca5dkETgnT4fKzg" 
          type="text/javascript"></script>
  <script type="js/akhir.js"></script>
</head>
<body>
<?php session_start(); ?>
	<nav class="navbar navbar-inverse navbar-fixed-top">
	<img src="gambar/b.png" class="nav navbar-nav" alt="brand">
	<div class="container">
	<div class="container-fluid">
    <div class="navbar-header">
    <a class="navbar-brand" href="?page=listunsada"><span class="glyphicon glyphicon-home"></span>Home</a>
    <a class="navbar-brand" href="?page=datatweet"><span class="glyphicon glyphicon-file"></span>DataTweets</a>
    <a class="navbar-brand" href="?page=statistik"><span class="glyphicon glyphicon-stats"></span>Statistic</span></a>
    <a class="navbar-brand" href="?page=map"><span class="glyphicon glyphicon-globe"></span>Map</a>
    <a class="navbar-brand" href="?page=testcodingakhir"><span class="glyphicon glyphicon-pencil"></span>Tes Coding</a>
    <!-- <a class="navbar-brand" href="?page=tesmap"><span class="glyphicon glyphicon-console"></span> Tes Map</a> -->
    <!-- <a class="navbar-brand" href="?page=testcoding"><span class="glyphicon glyphicon-pencil"></span>Tes Coding</a> -->
    </div>
    <div id="navbar" class="navbar-collapse collapse navbar-right">
    <a class="navbar-brand" href="?page=help"><span class="glyphicon glyphicon-question-sign"></span>Help</a>
    <a class="navbar-brand" href="logout.php"><span class="glyphicon glyphicon-log-out"></span>Logout</a>
    </div>
</nav>
<hr />
<hr />
	<div class="container">
  <?php include "halaman.php" ?>
	</div>
  <script src="datatables/jquery.dataTables.js"></script>
  <script src="datatables/dataTables.bootstrap.js"></script>
  <script type="text/javascript">
    $(".datatables").dataTable();
  </script>
  <hr />
  <footer class="footer">
    <div class="panel-footer">
      <p class="text-center">Website by <a href="https://twitter.com/wididy19" target="_blank">Susilo Widiksono</a></p>
    </div>
  </footer>
</body>
</html>