<!DOCTYPE html>
<html lang="tr">
	<head>
		<meta http-equiv = "Content-Type" content = "text/html;charset = UTF-8"/>
		<meta charset="UTF-8">
		<title>Mesaj</title>
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
		  
		  $mesaj = stripslashes($_POST['mesaj']);
		  if($mesaj)
			{
	   ?>
	   <form action = "index.html" method = "POST">
			<div id="myModal" class="modal fade">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title"><font color = "Pink">MESAJ</font></h4>
						</div>
						<div class="modal-body">
							<p>Mesajınız başarılı bir şekilde alınmıştır.</p>
							<p class="text-warning"><small>...</small></p>
						</div>
						<div class="modal-footer">
							<button type="submit" name = "submit" class="btn btn-default" >Kapat</button>
							<button type="submit" name = "submit" class="btn btn-primary">Giriş Yap</button>
						</div>
				   </div>
				</div>
			</div>
	   </form>
	  <?php  }  ?>
	</body>
</html> 