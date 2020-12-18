<?php
	include 'veritabani.php';
	db_baglanti();

	$kullanici=mysql_escape_string($_GET['kullanici']);
	
	$sorgu=mysql_query("DELETE FROM kullanicilar WHERE kullanici='$kullanici'");
	
	if($sorgu)
		header("Location:http://localhost:81/admin/adminuye.php");
?>