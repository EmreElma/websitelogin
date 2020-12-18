<!DOCTYPE html>
<html lang="tr">
	<head>
		<meta http-equiv = "Content-Type" content = "text/html;charset = UTF-8"/>
		<meta charset="UTF-8">
		<title>Yeni Şifre</title>
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
		<div class="container">
		  <nav class="navbar navbar-default">
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
			<div >
			  <ul class="nav navbar-nav">
				  <ul class="nav navbar-nav">
						<li><a href="anasayfa.html">Anasayfa</a></li>
						<li><a href="index.html">Giriş Yap</a></li>
						<li><a href="uyeol.html">Üye Ol</a></li>
						<li class="active"><a href="yenisifre.html">Şifremi Unuttum</a></li>
				  </ul>
			   </ul>
			 </div> 
	      </nav>
	 <div class="row, col-lg-7"><br>
	 <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span> Zorunlu Alan </strong></div>
	  <form action = "sifremi_unuttum.php" role="form" method = "POST">
			<div class="col-lg-7">
				<div class="form-group">
					<label for="InputEmail">Mail</label>
					<div class="input-group">
						<input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
						<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
					</div>
				</div>
				<input type="submit" name="submit" id="submit" value="Gönder" class="btn btn-info pull-right"><br>
			</div>
			<br>
	  </form>
	 </div>
	<?php
	  error_reporting(E_ALL ^ E_NOTICE);
	  ini_set('error_reporting', E_ALL ^ E_NOTICE);
	  
	  include("veritabani.php");
	  db_baglanti();
	  
	  $email = addslashes($_POST['email']);
	  $email_kontrol = mysql_query("SELECT email FROM kullanicilar where email = '$email'");
	  $email_kontrol2 = mysql_num_rows($email_kontrol);
	   
	  if($email_kontrol2 > 0)
		   {
			 $rastgele_sayi = rastgelesayi();
			 $yeni_sifre = sha1($rastgele_sayi);
			
			 $sql = mysql_query("UPDATE kullanicilar SET sifre = '$yeni_sifre' where email = '$email'");
			 $baslik = "From:Admin <admin@admin.com>";
			 $konu = "Şifre Hatırlatma";
			 $mesaj = "İyi Günler, Yeni şifreniz aşağıda bulunmaktadır,
                       Yeni Şifreniz: $rastgele_sayi
					   Teşekkürler...<br/>";
					   
			 mail ($email,$konu,$mesaj,$baslik);
     ?>
	<form action = "index.html" method = "POST">
		<div id="myModal" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title"><font color = "Pink">Şifre Değiştirme</font></h4>
					</div>
					<div class="modal-body">
						<p>Şifreniz Başarılı bir şekilde değiştirilmiştir.</p>
						<p class="text-warning"><small>Yeni şifrenizi öğrenmek için email adresinizi kontrol ediniz...</small></p>
					</div>
					<div class="modal-footer">
						<button type="submit" name = "submit" class="btn btn-default" >Kapat</button>
						<button type="submit" name = "submit" class="btn btn-primary">Giriş Yap</button>
					</div>
			   </div>
		    </div>
	    </div>
   </form>
	<?php
       }
	 else
	   {
	  ?>
	  	<form action = "yenisifre.html" method = "POST">
		<div id="myModal" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title"><font color = "red">HATA</font></h4>
					</div>
					<div class="modal-body">
						<p>Girdiğiniz email adresi kayıtlı değil.</p>
						<p class="text-warning"><small>Lütfen üye olurken girdiğniz email adresinizi giriniz.</small></p>
					</div>
					<div class="modal-footer">
						<button type="submit" name = "submit" class="btn btn-default" >Kapat</button>
						<button type="submit" name = "submit" class="btn btn-primary">Tekrar Dene</button>
					</div>
			   </div>
		    </div>
	    </div>
   </form>
	<?php
		unset($email);
		exit();
		}
	?>
  </div>
  <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>  