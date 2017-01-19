<!DOCTYPE html>
<html>
<head>
  <title>Skripsi Widi</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery211.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/login.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
        <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-home">Home</span></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
        <form class="navbar-form navbar-right" role="form" id="form" method="POST" action="proses/proses_login.php">
          <div class="form-group">
            <input type="text" placeholder="Username" id="username" class="form-control">
          </div>
          <div class="form-group">
            <input type="password" placeholder="Password" class="form-control" id="password">
          </div>
            <button type="submit" id="masuk" class="btn btn-success"><span class="glyphicon glyphicon-log-in
"></span> Login</button>
        </form>
        </div>
       </div>
</nav>
<hr />
<hr />
  <div class="container">
    <div class="jumbotron">
      <div class="panel panel-default">
      <div class="panel-heading" align="center">
       <h2>SELAMAT DATANG</h2>
      <br>       <h4> APLIKASI PENGOLAHAN DATA UNTUK MENGANALISA PENGGUNAAN HASHTAG PADA TWITTER</h4>
      </div>
      <div class="panel-body" align="center">
        <img src="gambar/a.png">
      </div>
      <div class="panel-footer" align="center">
       Website by <a href="https://twitter.com/wididy19" target="_blank">Susilo Widiksono</a>
    </div>
    </div>
    </div>
  </div>
</body>   
</html>