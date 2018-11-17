<?php
	session_start();
	ob_start();
	
	error_reporting(1);
	
	$host = "localhost";
	$dbname = "prog";
	$dbuser = "root";
	$dbpass = "";

	try {
		$db = new PDO("mysql:host=$host;dbname=$dbname;charset=UTF8", $dbuser, $dbpass);
	} catch (Exception $e) {
		print $e->getMessage();
	}
	
	$ayar = $db->query("SELECT * FROM ayarlar")->fetch(PDO::FETCH_ASSOC);
	
	## SABİTLER ##
	define("PATH", realpath("."));
	define("URL", $ayar['site_url']);
	define("TEMA_URL", $ayar['site_url']."/tema/".$ayar['site_tema']);
	define("TEMA", PATH."/tema/".$ayar['site_tema']);
	
	
?>