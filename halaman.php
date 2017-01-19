<?php

include 'koneksi.php';

if (isset($_GET['page'])) {
	$page=$_GET['page'];
} else {
	$page = '';
}

	switch ($page) {
		case 'dashboard':
			include("pages/dashboard.php");
		break;

		case 'listunsada':
			include("pages/listunsada.php");
		break;

		case 'datatweet':
			include("pages/datatweet.php");
			break;

		case 'statistik':
			include("pages/liststatistik.php");
		break;

		case 'contohstatistik':
			include("pages/statistik.php");
		break;

		case 'map':
			include("pages/map.php");
		break;

		case 'help':
			include("pages/help.php");
		break;

		case 'tesmap':
			include("pages/tesmap.php");
		break;

		case 'testcoding':
			include("pages/testcoding.php");
		break;

		case 'testcodingakhir':
			include("pages/testcodingakhir.php");
		break;

		case 'hasilakhir':
			include("pages/hasilakhir.php");
		break;

		default:
			include("404.php");
		break;
	}
?>