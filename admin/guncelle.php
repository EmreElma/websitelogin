<?php
	 include("../veritabani.php");
	 db_baglanti();
	 
	 @session_start();
	 $kullanici_2 =  $_SESSION['kullanici'];
	 $_SESSION['sifre'];
	 
	 $sorgu=mysql_query("SELECT * FROM kullanicilar where kullanici = '$kullanici_2'");
	 while($sorgu2=mysql_fetch_array($sorgu)) {
 ?>
<!DOCTYPE html>
<html lang="tr">
	  <head>
		  <meta http-equiv = "Content-Type" content = "text/html;charset = UTF-8"/>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
			<meta name="description" content="">
			<meta name="author" content="">
			<link rel="icon" href="#">
			<link rel="stylesheet" href="styles.css">
            <title>Güncelle</title>
			<!-- Bootstrap core CSS -->
			<link href="css/bootstrap.min.css" rel="stylesheet">
			   <style>
					/*
				 * Globals
				 */

				body {
				  font-family: Arial, Helvetica, sans-serif;
				  color: #00000;
				}

				h1, .h1,
				h2, .h2,
				h3, .h3,
				h4, .h4,
				h5, .h5,
				h6, .h6 {
				  margin-top: 0;
				  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
				  font-weight: normal;
				  color: #FF66CC;
				}


				/*
				 * Override Bootstrap's default container.
				 */

				@media (min-width: 1200px) {
				  .container {
					width: 970px;
				  }
				}


				/*
				 * Masthead for nav
				 */

				.blog-masthead {
				  background-color: #FF66FF;
				  -webkit-box-shadow: inset 0 -2px 5px rgba(0,0,0,.1);
						  box-shadow: inset 0 -2px 5px rgba(0,0,0,.1);
				}

				/* Nav links */
				.blog-nav-item {
				  position: relative;
				  display: inline-block;
				  padding: 10px;
				  font-weight: 500;
				  color: #cdddeb;
				}
				.blog-nav-item:hover,
				.blog-nav-item:focus {
				  color: #fff;
				  text-decoration: none;
				}

				/* Active state gets a caret at the bottom */
				.blog-nav .active {
				  color: #fff;
				}
				.blog-nav .active:after {
				  position: absolute;
				  bottom: 0;
				  left: 50%;
				  width: 0;
				  height: 0;
				  margin-left: -5px;
				  vertical-align: middle;
				  content: " ";
				  border-right: 5px solid transparent;
				  border-bottom: 5px solid;
				  border-left: 5px solid transparent;
				}


				/*
				 * Blog name and description
				 */

				.blog-header {
				  padding-top: 20px;
				  padding-bottom: 20px;
				}
				.blog-title {
				  margin-top: 30px;
				  margin-bottom: 0;
				  font-size: 60px;
				  font-weight: normal;
				}
				.blog-description {
				  font-size: 20px;
				  color: #999;
				}


				/*
				 * Main column and sidebar layout
				 */

				.blog-main {
				  font-size: 18px;
				  line-height: 1.5;
				}

				/* Sidebar modules for boxing content */
				.sidebar-module {
				  padding: 15px;
				  margin: 0 -15px 15px;
				}
				.sidebar-module-inset {
				  padding: 15px;
				  background-color: #f5f5f5;
				  border-radius: 4px;
				}
				.sidebar-module-inset p:last-child,
				.sidebar-module-inset ul:last-child,
				.sidebar-module-inset ol:last-child {
				  margin-bottom: 0;
				}


				/* Pagination */
				.pager {
				  margin-bottom: 60px;
				  text-align: left;
				}
				.pager > li > a {
				  width: 140px;
				  padding: 10px 20px;
				  text-align: center;
				  border-radius: 30px;
				}


				/*
				 * Blog posts
				 */

				.blog-post {
				  margin-bottom: 60px;
				}
				.blog-post-title {
				  margin-bottom: 5px;
				  font-size: 30px;
				}
				.blog-post-meta {
				  margin-bottom: 20px;
				  color: #999;
				}


				/*
				 * Footer
				 */

				.blog-footer {
				  padding: 40px 0;
				  color: #999;
				  text-align: center;
				  background-color: #FF66FF;
				  border-top: 1px solid #e5e5e5;
				}
				.blog-footer p:last-child {
				  margin-bottom: 0;
				}
		  </style>
	  </head>
  <body>
  <div>
    <div class="blog-masthead">
		  <div class="container">
			   <ul class="nav navbar-nav navbar-left">
					<nav class="blog-nav">
						  <a class="blog-nav-item" href="index.php">AnaSayfa</a>
						  <a class="blog-nav-item" href="uyeler.php">Üyeler</a>
						  <a class="blog-nav-item" href="iletisim.html">İletişim</a>
						  <a class="blog-nav-item active" href="guncelle.php">Güncelle</a>
					</nav>
				</ul>
				<div class="dropdown">
					<ul class="nav navbar-nav navbar-right">
						  <a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><font color = "#cdddeb">Hesabım</font> <span class="caret"></span></a>
						  <ul class="dropdown-menu">
								<li><a href="profil.php">Profil</a></li>
								<li><a href="guncelle.php">Bilgileri Güncelle</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="hesapsil.html">Hesabı Sil</a></li>
						  </ul>
						  </li>
						  <a class="blog-nav-item" href="../index.html">Çıkış Yap</a>
					  </ul>
				</div>
		  </div>
    </div>
	<br>
	<div class="container">
		 <h4>Sayın <?php echo $_SESSION['kullanici']?>;</h4>
		 <font color = "#FF66CC">Lütfen değiştirmek istediğiniz alana istediğiniz biligilerinizi giriniz...</font>
		 <br><br>
		<form action = "guncelle2.php" role="form" method = "POST">
			<div class="col-lg-7">
				<div class="form-group" >
					<label for="yeniad">Adınız</label>
					<div class="input-group">
						<input type="text" class="form-control" name="yeniad" id="yeniad" placeholder="<?php echo $sorgu2['ad'];?>">
						<span class="input-group-addon"></span>
					</div>
				</div>
				<div class="form-group">
					<label for="yenisoyad">Soyadınız</label>
					<div class="input-group">
						<input type="text" class="form-control" name="yenisoyad" id="yenisoyad" placeholder="<?php echo $sorgu2['soyad'];?>">
						<span class="input-group-addon"></span>
					</div>
				</div>
				<div class="form-group">
					<label for="yenisifre">Şifre</label>
					<div class="input-group">
						<input type="password" class="form-control" id="yenisifre" name="yenisifre" placeholder="Şifre" required>
						<span class="input-group-addon"></span>
					</div>
				</div>
				<div class="form-group">
					<label for="yenisifre2">Şifre Tekrar</label>
					<div class="input-group">
						<input type="password" class="form-control" id="yenisifre2" name="yenisifre2" placeholder="Şifre Tekrar" required>
						<span class="input-group-addon"></span>
					</div>
				</div>
				<div class="form-group">
					<label for="InputEmail">Mail</label>
					<div class="input-group">
						<input type="yeniemail" class="form-control" id="yeniemail" name="yeniemail" placeholder="<?php echo $sorgu2['email']; }?>">
						<span class="input-group-addon"></span>
					</div>
				</div>
				<input type="submit" name="submit" id="submit" value="Güncelle" class="btn btn-info pull-right"><br>
		</div>
	</div><br>
  </form>
</div>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	
	</body>
</html>