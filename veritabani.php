<?php
  function db_baglanti()
	  {
		error_reporting(0);
		$db_host  = "127.0.0.1";
		$db_user  = "root";
		$db_sifre = "";
		
		$baglanti = mysql_connect($db_host,$db_user,$db_sifre);
		mysql_select_db('uyelik');
		
		header("content-type: text/html; charset=utf-8");
		mysql_query("SET CHARACTER 'UTF8'");
		mysql_query("SET NAMES 'utf8'");
		
		if(mysql_errno())
			{
			 echo 'Veritabanına Bağlanamıyor...';
			 exit;
			}
	  }
  function db_baglanti2()
	  {
		error_reporting(0);
		$db_host  = "127.0.0.1";
		$db_user  = "root";
		$db_sifre = "";
		

		
		$baglanti2 = mysql_connect($db_host,$db_user,$db_sifre);
		mysql_select_db('yukle');
		
		header("content-type: text/html; charset=utf-8");
		mysql_query("SET CHARACTER 'UTF8'");
		mysql_query("SET NAMES 'utf8'");
		
		if(mysql_errno())
			{
			 echo 'Veritabanına Bağlanamıyor...';
			 exit;
			}
	  }
  function rastgelesayi() 
	{ 
	  $salt = "abchefghjkmnpqrstuvwxyz0123456789"; 
	  srand((double)microtime()*1000000); 
      $i = 0; 
	  while ($i <= 7) 
	      { 
			$num = rand() % 33; 
			$tmp = substr($salt, $num, 1); 
			$pass = $pass . $tmp; 
			$i++; 
		  } 
	 return $pass; 
	}

?>