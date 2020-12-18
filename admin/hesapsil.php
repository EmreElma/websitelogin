<!DOCTYPE html>
<html lang="tr">
	<head>
	    <title>Hesap Sil</title>
		<meta http-equiv = "Content-Type" content = "text/html;charset = UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/bootstrap.css"/>
	</head>
<body>
  <div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
			  </button>
		</div>
	</div>

  <?php
	error_reporting(E_ALL ^ E_NOTICE);
	ini_set('error_reporting', E_ALL ^ E_NOTICE);

	include("../veritabani.php");
    db_baglanti();
	 
	$email = stripslashes($_POST['email']);
	$sifre = stripslashes($_POST['sifre']);
	 
	$email_kontrol = mysql_query("SELECT email FROM kullanicilar where email = '$email'");
	$email_kontrol2 = mysql_num_rows($email_kontrol);
	  
	if ($email_kontrol2 > 0)
	  { 
		 $sifre_kontrol= mysql_query("SELECT sifre FROM kullanicilar WHERE sifre = '$sifre'");
		 $sifre_kontrol2 = mysql_num_rows($sifre_kontrol);
		 
		 if ($sifre_kontrol2 > 0)
			  {
				 $sorgu=mysql_query("DELETE FROM kullanicilar WHERE sifre='$sifre'");

				  if($sorgu)
					   {
						  include ("../index.html"); 
						  echo '
							<br/><div class="col-lg-5 col-md-push-1">
							<div class="col-md-12">
							<div class="alert alert-success">
							<strong>Hesabınızı başarılı bir şekilde sildiniz.</strong>
							</div>';
						  } 
						  else
						  { 
							 echo '
						   <br/><div class="col-lg-5 col-md-push-1">
							<div class="col-md-12">
						   <div class="alert alert-danger">
						  <strong>Hesabınız silinemedi. Lütfen daha sonra tekrar deneyiniz.</strong>
					</div>
				</div>
			</div>';
			
		                  }
	                }
	}
?>

	<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	
	</body>
</html>
