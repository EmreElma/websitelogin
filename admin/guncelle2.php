<!DOCTYPE html>
<html lang="tr">
	<head>
		<meta http-equiv = "Content-Type" content = "text/html;charset = UTF-8"/>
		<meta charset="UTF-8">
		<title>Bilgilerimi Güncelle</title>
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
		include("../veritabani.php");
		db_baglanti();
		 
		@session_start();
		$kullanici_2 =  $_SESSION['kullanici'];
		$_SESSION['sifre'];
					   
		$kullanici_id = $_REQUEST['id'];
		$akod = $_REQUEST['akod'];
					   
		 $yeniad = stripslashes($_POST['yeniad']);
		 $yenisoyad = stripslashes($_POST['yenisoyad']);
		 $yenisifre = stripslashes($_POST['yenisifre']);
		 $yenisifre2 = stripslashes($_POST['yenisifre2']);
		 $yeniemail = stripslashes($_POST['yeniemail']);
				  
		 if ($yenisifre != $yenisifre2)
			{    
			echo '
					<form action = "guncelle.php" method = "POST">
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
				  ';
			  }
		    else 
				$sql = mysql_query("UPDATE kullanicilar SET sifre = '$yenisifre' where kullanici = '$kullanici_2'");
							
		        if(($yeniad) || ($yenisoyad) || ($yeniemail)) 
					{
						if($yeniad)
							$sql = mysql_query("UPDATE kullanicilar SET ad = '$yeniad' where kullanici = '$kullanici_2'");
										 
						if($yenisoyad)
							$sql = mysql_query("UPDATE kullanicilar SET soyad = '$yenisoyad' where  kullanici = '$kullanici_2'");
										  
						if($yeniemail)
							  {
								  $email_kontrol = mysql_query("SELECT email FROM kullanicilar where email = '$yeniemail'");
								  $email_kontrol2 = mysql_num_rows($email_kontrol);
								  if($email_kontrol2 > 0) 
									  {
										echo '
											   <form action = "guncelle.php" method = "POST">
													<div id="myModal" class="modal fade">
														<div class="modal-dialog">
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
																	<h4 class="modal-title"><font color = "red">HATA</font></h4>
																</div>
																<div class="modal-body">
																	 <p>Girdiğiniz mail adresi zaten kullanılıyor. Lütfen tekrar deneyiniz...</p>
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
											  ';
										}
									  else 
										$sql = mysql_query("UPDATE kullanicilar SET email = '$yeniemail' where kullanici = '$kullanici_2'"); 								  
								}
						  }
						  else   
							  {
								echo '
										<form action = "profil.php" method = "POST">
											<div id="myModal" class="modal fade">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
															<h4 class="modal-title"><font color = "#FF66CC">GÜNCELLEME</font></h4>
														</div>
														<div class="modal-body">
															<p>Bilgileriniz başarılı bir şekilde değiştirilmiştir.</p>
								                            <p class="text-warning"><small>Güncelleme Tamamlandı.</small></p>
														</div>
														<div class="modal-footer">
															<button type="submit" name = "submit" class="btn btn-default" >Kapat</button>
															<button type="submit" name = "submit" class="btn btn-primary">Göz At</button>
														</div>
												   </div>
												</div>
											</div>
									   </form>
								';
							 }
							  echo '
									<form action = "profil.php" method = "POST">
										<div id="myModal" class="modal fade">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
														<h4 class="modal-title"><font color = "#FF66CC">GÜNCELLEME</font></h4>
													</div>
													<div class="modal-body">
														<p>Bilgileriniz başarılı bir şekilde değiştirilmiştir.</p>
													    <p class="text-warning"><small>Güncelleme Tamamlandı.</small></p>
													</div>
													<div class="modal-footer">
														<button type="submit" name = "submit" class="btn btn-default" >Kapat</button>
														<button type="submit" name = "submit" class="btn btn-primary">Göz At</button>
													</div>
											   </div>
											</div>
										</div>
								   </form>
                                   ';
	?>
	<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	</body>
</html>