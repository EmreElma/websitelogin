<!DOCTYPE html>
<html lang="tr">
	<head>
		<meta http-equiv = "Content-Type" content = "text/html;charset = UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap-wysihtml5.css">
		<title>Sayfa Ekle</title>
		<script src="js/wysihtml5-0.3.0.js"></script>
		<script src="js/jquery-1.7.2.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/bootstrap-wysihtml5.js"></script>
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
					<li><a href="adminuye.php">Üyeler</a></li>
					<li><a href="kategori.html">Kategori Ekle</a></li>
					<li class = "active" ><a href="sayfaekle.html">Sayfa Ekle</a></li>
					<li><a href="goster.php">Kategorileri Göster</a></li>
					<li><a href="../index.html">Çıkış Yap</a></li>
			 </ul>
			</div> 
		 </nav>
		 <div>
		 <div class="row">
			  <form action = "sayfaekle-islem.php" role="form" method = "POST">
					<div class="col-lg-7">
					   <div class="form-group">
						   <div class="input-group">
							   <label for="kategori_adi">Kategori Adı</label>
							   <select name="kategori_adi">
								   <?php
										include("../veritabani.php");
										db_baglanti();
										db_baglanti2();
										 
										$kategorileriGetir= mysql_query("SELECT * FROM kategoriler");
										while($s2 = mysql_fetch_array($kategorileriGetir))	
										{
											echo '<option value="'.$s2['kategori_id'].'">'.$s2['kategori_adi'].'</option>';
										}
								   ?>
									<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
							   </select>    
						   </div>
						</div>
						<div class="form-group" >
							<label for="sayfa_adi">Sayfa Adı</label>
							<div class="input-group">
								<input type="text" class="form-control" name="sayfa_adi" id="sayfa_adi" placeholder="Sayfa Adı" required>
								<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
							</div>
						</div>
						  <div class="container">
							  <label for="sayfa_icerik">Sayfa İçeriği</label>
								   <div class="hero-unit" style="margin-top:5px">
									  <textarea class="textarea" name="sayfa_icerik" id="sayfa_icerik" placeholder="Metin girin..." style="width: 600px; height: 250px;"></textarea>
									</div>
						   </div>
						<input type="submit" name="submit" id="submit" value="Ekle" class="btn btn-info pull-right"><br>
					 </div>
				</form><br><br>
			</div><br>
		 </div>
	</div>
	<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
  </body>
</html>