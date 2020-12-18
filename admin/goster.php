<!DOCTYPE html>
<html lang="tr">
	<head>
		<meta http-equiv = "Content-Type" content = "text/html;charset = UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/bootstrap.css"/>
		<title>Kategoriler</title>
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
					<li><a href="admin.php">Admin Paneli</a></li>
					<li><a href="index.php">Anasayfa</a></li>
					<li><a href="adminuye.php">Üyeler</a></li>
					<li><a href="kategori.html">Kategori Ekle</a></li>
					<li class = "active"><a href="goster.php">Kategorileri Göster</a></li>
					<li><a href="../index.html">Çıkış Yap</a></li>
				  </ul>
			 </div> 
		 </nav>
		<div>
			<h1>Kategoriler</h1>
			<table class="table table-striped">
			  <thead>
					<tr>
						  <th>Kategoriler ve Sayfalar</th>
						  <th>İşlemler</th>
					</tr>
			  </thead>
			  <tbody>   
		</div>
		 <?php
			    include("../veritabani.php");
			    db_baglanti2();
			 
				$sorgu1=mysql_query("SELECT * FROM kategoriler");
				$i = 1;
				while($sorgu2=mysql_fetch_array($sorgu1))
				{
					$ii = 1;
					$kid= $sorgu2['kategori_id'];
					$sorgu_1 = mysql_query ("SELECT * FROM sayfalar WHERE sayfa_kategori='$kid'");
				    echo '<tr class = "list-unstyled">
							   <th><font color = "#CC52CC"><b>'.$i.'.Kategori: </b>'.$sorgu2['kategori_adi'].'</font></th>
							   <th>  <a href="sil2.php?kategori_adi='.$sorgu2['kategori_adi'].'">Kategoriyi Sil</a></th>
						 </tr>';
				  while ($sorgu_2 = mysql_fetch_array($sorgu_1)) 
					{
					   echo '  
					         <tr class="list-unstyled">
								 <th><font color = "#803380"><b>'.$ii.'.Sayfa: </b>'.$sorgu_2['sayfa_adi'].'</font></th>
								 <th>   <a href="sil2.php?sayfa_adi='.$sorgu_2['sayfa_adi'].'">Sayfayı Sil</a></th>
							</tr>
						   ';
					  $ii++;
			        }
			      $i++;
			   }
		   ?>
		 </tbody>
	   </table>
	 </div>
  <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
	
</body>
</html>
