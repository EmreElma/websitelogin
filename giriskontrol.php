<!DOCTYPE html>
<html lang="tr">
	<head>
		<meta http-equiv = "Content-Type" content = "text/html;charset = UTF-8"/>
		<meta charset="UTF-8">
		<title>Giriş Kontrol</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$("#myModal").modal('show');
			});
		</script>
	</head>
<body>
	<?php
	  @session_start();
	  include("veritabani.php");
	  db_baglanti();
	  $admin = "12345";
	  
	  $kullanici = addslashes($_POST['kullanici']);
	  $sifre = addslashes($_POST['sifre']);
	  
	  $kullan = mysql_query("SELECT kullanici FROM kullanicilar WHERE kullanici = '$kullanici'");
	  $kullanici2 = mysql_num_rows($kullan);
	  
	  if($kullanici2 > 0)
		{
			$sql = mysql_query("SELECT * FROM kullanicilar where kullanici = '$kullanici' AND sifre = '$sifre' AND aktiflik = '1'");
			$sql2 = mysql_num_rows($sql);
			if($sql2 > 0)
				{
					while ($yaz = mysql_fetch_array($sql))
						{
							 $_SESSION['kullanici']= $kullanici;
							 $_SESSION['sifre']=$sifre;
							 $_SESSION['kullanici_seviye']= $yaz['kullanici_seviye'];
							 
							 if(($admin == $sifre) && ($kullanici == 'admin')) {
	 ?>
	 <form action = "admin/admin.php" method = "POST">
			<div id="myModal" class="modal fade">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title"><font color = "Pink">HOŞGELDİNİZ</font></h4>
						</div>
						<div class="modal-body">
							<p>Admin olarak giriş yaptınız.</p>
					        <p class="text-warning"><small>Admin sayfasına gitmek için GİT butonuna tıklayınız..</small></p>
						</div>
						<div class="modal-footer">
							<button type="submit" name = "submit" class="btn btn-default" >Kapat</button>
							<button type="submit" name = "submit" class="btn btn-primary">Git</button>
						</div>
				   </div>
				</div>
			</div>
	   </form>
	<?php
	 } else {
				// echo 'Anasayfaya yönlendiriliyorsunuz, lütfen bekleyiniz...';
				header("Location:http://localhost:81/admin/index.php");
				// header ("Location:admin/index.php");
			}
	    }
	  }
	else {
    ?>
	 <form action = "index.html" method = "POST">
			<div id="myModal" class="modal fade">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title"><font color = "red">HATA</font></h4>
						</div>
						<div class="modal-body">
							<p>Üyeliğinizi etkinleştirdiğinizden emin olun.</p>
							<p class="text-warning"><small>Kullanıcı adı yada şifre yanlış..</small></p>
						</div>
						<div class="modal-footer">
							<button type="submit" name = "submit" class="btn btn-default" >Kapat</button>
							<button type="submit" name = "submit" class="btn btn-primary">Tekrar Dene</button>
						</div>
				   </div>
				</div>
			</div>
	   </form>
  <?php }
	  }
	  else
	  {
   ?>
	 <form action = "index.html" method = "POST">
			<div id="myModal" class="modal fade">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title"><font color = "red">HATA</font></h4>
						</div>
						<div class="modal-body">
							<p>Girdiğiniz kullanıcı adı kayıtlı değil.</p>
							<p class="text-warning"><small>Kullanıcı adı yada şifre yanlış..</small></p>
						</div>
						<div class="modal-footer">
							<button type="submit" name = "submit" class="btn btn-default" >Kapat</button>
							<button type="submit" name = "submit" class="btn btn-primary">Tekrar Dene</button>
						</div>
				   </div>
				</div>
			</div>
	   </form>
  <?php } ?>
	</body>
</html> 