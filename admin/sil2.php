<?php
	include '../veritabani.php';
	db_baglanti2();

	$kategori_adi=mysql_escape_string($_GET['kategori_adi']);
	$sayfa_adi=mysql_escape_string($_GET['sayfa_adi']);

		  $sorgu1=mysql_query("DELETE FROM kategoriler WHERE kategori_adi = '$kategori_adi'");
			  if($sorgu1)
				 header("Location:http://localhost:81/admin/goster.php");

			$sorgu2=mysql_query("DELETE FROM sayfalar WHERE sayfa_adi = '$sayfa_adi'");
			   if($sorgu2)
					header("Location:http://localhost:81/admin/goster.php");
?>