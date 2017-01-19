<?php
session_start();

	$username = $_POST['username'];
	$password = $_POST['password'];

	include('../koneksi.php');
	$query = "SELECT * from user where username='$username' AND password='$password'";
	$login = mysqli_query($konek,$query);
	$ketemu = mysqli_num_rows($login);
	$data = mysqli_fetch_array($login);
 
	if ($ketemu > 0 ) {
    
    $username=$data['username'];
    $password=$data['password'];
    $nama=$data['nama'];
	$_SESSION['username'] = $data['username'];
	$_SESSION['id_user'] = $data['id_user'];
	$_SESSION['nama'] = $data['nama'];
    echo "success";
}
?>