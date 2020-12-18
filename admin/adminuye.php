<!DOCTYPE html>
<html lang="tr">
	<head>
		<meta http-equiv = "Content-Type" content = "text/html;charset = UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/bootstrap.css"/>
		<title>Kayıtlı Olan Üyeler</title>
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
			<div>
			  <ul class="nav navbar-nav">
					<li><a href="admin.php">Admin Paneli</a></li>
					<li><a href="index.php">Anasayfa</a></li>
					<li class = "active"><a href="adminuye.php">Üyeler</a></li>
					<li><a href="kategori.html">Kategoriler</a></li>
					<li><a href="goster.php">Kategorileri Göster</a></li>
					<li><a href="../index.html">Çıkış Yap</a></li>
			  </ul>
		  </div> 
	   </nav>
		 <div>
			 <div>
				<font color  = "#FF00FF">Hoşgeldiniz Sayın Admin,</font><br> 
				<h1>Kayıtlı Olan Üyeler</h1>
				<table class="table table-striped">
				  <thead>
						<tr>
							  <th>Ad</th>
							  <th>Soyad</th>
							  <th>Kullanıcı Adı</th>
							  <th>Şifre</th>
							  <th>Mail Adresi</th>
							  <th>İşlemler</th>
						</tr>
				  </thead>
				  <tbody>   
			</div>
				  <?php
					include("../veritabani.php");
					db_baglanti();
					$sorgu=mysql_query("SELECT * FROM kullanicilar");
					while($sorgu2=mysql_fetch_array($sorgu))
					{
					  echo'
						  <tr>
							 <th>'.$sorgu2['ad'].'</th>
							 <th>'.$sorgu2['soyad'].'</th>
							 <th>'.$sorgu2['kullanici'].'</th>
							 <th>***********</th>
							 <th>'.$sorgu2['email'].'</th>
							 <th><a href="../sil.php?kullanici='.$sorgu2['kullanici'].'">Kullanıcıyı Sil</a></th>
						</tr>';
					}
			       echo '
				 </tbody>
			 </table> ';
			 
				 $sql2 = mysql_query("SELECT * FROM kullanicilar where kullanici = '$kullanici'  AND aktiflik = '0'");
				 $kontrol = mysql_num_rows($sql2);
		   
				 if($kontrol == 0) { ?>
					  <div class="col-lg-5 col-md-push-1">
						  <div class="col-md-12">
							  <div class="alert alert-success">
							    <strong>Üyeler Aktifleştirildi.</strong>
							  </div>
						     <?php } else {?>
							<div class="col-lg-5 col-md-push-1">
								<div class="col-md-12">
									<div class="alert alert-danger">
									   <strong>Bazı Üyeler Alktifleştirilmedi.</strong>
									</div>
								</div>
							</div>
						    <?php }?>
						  </div>
					</div> 
			</div>
	</div>
	<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>	
	</body>
</html>