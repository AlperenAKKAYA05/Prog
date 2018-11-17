<?php
	define("INDEX", true);
	require_once "sistem/ayar.php";
	require_once "sistem/sistem.php";
	
	if($ayar['site_durum']==1)
	{
		require(TEMA."/index.php");
	} else {
		require("bakim.php");
	}
?>