<!DOCTYPE html>
<html lang="tr">
	<head>
		<meta http-equiv = "Content-Type" content = "text/html;charset = UTF-8"/>
		<meta charset="UTF-8">
		<title>Kayıt</title>
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
		 error_reporting(E_ALL ^ E_NOTICE);
		 ini_set('error_reporting', E_ALL ^ E_NOTICE);

		 include("veritabani.php");
		 db_baglanti();
		 
		 $ad = stripslashes($_POST['ad']);
		 $soyad = stripslashes($_POST['soyad']);
		 $kullanici = stripslashes($_POST['kullanici']);
		 $sifre = stripslashes($_POST['sifre']);
		 $sifre2 = stripslashes($_POST['sifre2']);
		 $email = stripslashes($_POST['email']);
		 
		  if ($sifre != $sifre2)
			{
	?>
	<form action = "uyeol.html" method = "POST">
			<div id="myModal" class="modal fade">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title"><font color = "red">HATA</font></h4>
						</div>
						<div class="modal-body">
							<p>Girdiğiniz şifreler aynı değil. Lütfen tekrar deneyiniz...</p>
					        <p class="text-warning"><small>Şifre Hatası</small></p>
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
	exit;
	   }
    if ( filter_var($email, FILTER_VALIDATE_EMAIL) ){ 
		//echo 'adres gecerli';
		} else {
	?>
	<form action = "uyeol.html" method = "POST">
			<div id="myModal" class="modal fade">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title"><font color = "red">HATA</font></h4>
						</div>
						<div class="modal-body">
							<p>Girdiğiniz email adresi geçerli değil. Lütfen tekrar deneyiniz...</p>
					        <p class="text-warning"><small>Email Hatası</small></p>
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
			}
			
	  $email_kontrol = mysql_query("SELECT email FROM kullanicilar where email = '$email'");
	  $kullanici_kontrol = mysql_query("SELECT kullanici FROM kullanicilar where kullanici = '$kullanici'");
	  
	  $email_kontrol2 = mysql_num_rows($email_kontrol);
	  $kullanici_kontrol2 = mysql_num_rows($kullanici_kontrol);
	  
	  if (($email_kontrol2 > 0) || ($kullanici_kontrol2 > 0))
	  {
		if($email_kontrol2 > 0)
		   {
				unset($email); 
	?>
	<form action = "uyeol.html" method = "POST">
			<div id="myModal" class="modal fade">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title"><font color = "red">HATA</font></h4>
						</div>
						<div class="modal-body">
							<p>Girdiğiniz email adresi zaten kullanılıyor. Lütfen tekrar deneyiniz...</p>
					        <p class="text-warning"><small>Email Hatası</small></p>
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
		   }
	  if($kullanici_kontrol2 > 0)
		   {
			unset($kullanici);	
	  ?>
	<form action = "uyeol.html" method = "POST">
			<div id="myModal" class="modal fade">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title"><font color = "red">HATA</font></h4>
						</div>
						<div class="modal-body">
							<p>Girdiğiniz kullanıcı adı zaten kullanılıyor. Lütfen tekrar deneyiniz...</p>
					        <p class="text-warning"><small>Kullanıcı Adı Hatası</small></p>
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
      }
	   exit;
	  }
	  $rastgele_sayi = rastgelesayi();
	  
	  $sql = "INSERT INTO kullanicilar (ad,soyad,kullanici,sifre,email,kayit_tarih,akod,aktiflik)
			  VALUES ('$ad','$soyad','$kullanici','$sifre','$email',now(),'$rastgele_sayi','1')";
		
	   $sql2 = mysql_query($sql);
	   if(!$sql2) 
			{ 
	?>
	<form action = "uyeol.html" method = "POST">
			<div id="myModal" class="modal fade">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title"><font color = "red">HATA</font></h4>
						</div>
						<div class="modal-body">
							<p>Bir hata oluştu lütfen daha sonra tekrar deneyiniz...</p>
					        <p class="text-warning"><small>Bilinmeyen Hata</small></p>
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
		}   
		 else
		  {
			$kullanici_id = mysql_insert_id();
			$baslik = "Gönderen : Admin<admin@admin.com>";
			$konu = "Üyelik Onayı";
			$mesaj = "Sayın $ad,
					  Üyelik işleminizi tamamlamamk için linke tıklayın yada linki adres çubuğunuza kopyalayın.
					  Giriş Bilgileriniz;
					  Kullanıcı Adı: $kullanici
					  Şifre: $sifre
					  Teşekkürler...";
			mail($email,$konu,$mesaj,$baslik);   
	?>
	<form action = "index.html" method = "POST">
			<div id="myModal" class="modal fade">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title"><font color = "Pink">HOŞGELDİNİZ</font></h4>
						</div>
						<div class="modal-body">
							<p>Başarılı bir şekillde üye oldunuz.Kullanıcı adınız ve şifreniz email adresinize  gönderilmiştir.</p>
					        <p class="text-warning"><small>Lütfen e-postanıza giderek üyeliğinizi onaylayın, onaylamadığınız taktirde üyeliğiniz 2 gün içinde silinecektir.</small></p>
						</div>
						<div class="modal-footer">
							<button type="submit" name = "submit" class="btn btn-default" >Kapat</button>
							<button type="submit" name = "submit" class="btn btn-primary">Giriş Yap</button>
						</div>
				   </div>
				</div>
			</div>
	   </form>
	<?php } ?>
	</body>
</html>  