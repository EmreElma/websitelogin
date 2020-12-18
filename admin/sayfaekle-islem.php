<!DOCTYPE html>
  <html lang="tr">
    <head>
		  <meta http-equiv = "Content-Type" content = "text/html;charset = UTF-8"/>
		  <meta charset="UTF-8">
		  <title>Yeni Sayfa</title>
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
    db_baglanti2();
	 
	$kategori_adi = stripslashes($_POST['kategori_adi']);
	$sayfa_adi = stripslashes($_POST['sayfa_adi']);
	$sayfa_icerik = stripslashes($_POST['sayfa_icerik']);
	
	$kategori_kontrol = mysql_query("SELECT * FROM kategoriler WHERE kategori_id = '$kategori_adi'");
    $kategori_kontrol2 = mysql_num_rows($kategori_kontrol);
  
    if($kategori_kontrol2 == 0)
        {   
              echo '
					 <form action = "sayfaekle.php" method = "POST">
						<div id="myModal" class="modal fade">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<h4 class="modal-title"><font color = "red">HATA</font></h4>
									</div>
									<div class="modal-body">
										<p>Girdiğiniz kategori bulunamadı.</p>
                                        <p class="text-warning"><small>Lütfen tekrar deneyin.</small></p>
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
		{   
		 $sorgu = mysql_query ("SELECT * FROM kategoriler");
		 $sorgu2=mysql_fetch_array($sorgu);
		 $sayfa_kategori = $sorgu2['kategori_id'];
						
		 $sql = "INSERT INTO sayfalar (sayfa_adi,sayfa_icerik,sayfa_kategori)
                 VALUES ('$sayfa_adi', '$sayfa_icerik','$kategori_adi')";
				 
	    $sql2 = mysql_query($sql);
	    if(!$sql2) 
			{
	          echo '
					<form action = "sayfaekle.php" method = "POST">
						<div id="myModal" class="modal fade">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<h4 class="modal-title"><font color = "red">HATA</font></h4>
									</div>
									<div class="modal-body">
										<p>Sayfa eklenemedi.</p>
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
			      ';
	          }
		else 
			{
			   header("Location:http://localhost:81/admin/index.php");
			}
	}
	?>
  </body>
</html>