<?php echo !defined("INDEX") ? header("Location: ../../index.php") : null; ?>
<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="utf-8">
<meta charset="ISO-8859-1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="<?php echo TEMA_URL; ?>/img/favicon.ico">
<link href="<?php echo URL."/sistem/bootstrap/"; ?>css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo URL."/sistem/"; ?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo TEMA_URL; ?>/css/<?php echo ss($ayar['tema_css']); ?>.css" rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<?php
$do = g("do");
$url = g("url");
$url = strip_tags($url);
switch($do){
	case "icerik":
		$icerik = query("SELECT * FROM icerikler INNER JOIN uyeler ON uyeler.uye_id=icerikler.icerik_yazar INNER JOIN kategoriler ON kategoriler.kategori_id=icerikler.icerik_kategori WHERE icerik_link='{$url}'", $db);
		if($icerik){
?>
<title><?php echo ss($icerik['icerik_title']); ?> - <?php echo ss($ayar['site_title']); ?></title>
<meta name="description" content="<?php echo ss($icerik['icerik_desc']); ?>">
<meta name="keywords" content="<?php echo ss($icerik['icerik_keyw']); ?>">
<?php
		} else { go(URL); }
	break;
	
	case "kategori":
	$kategori = query("SELECT * FROM kategoriler WHERE kategori_link='{$url}' && kategori_onay=1", $db);
		if($kategori){
			$kategori_id = $kategori['kategori_id'];
?>
<title><?php echo ss($kategori['kategori_baslik']); ?> - <?php echo ss($ayar['site_title']); ?></title>
<meta name="description" content="<?php echo ss($kategori['kategori_desc']); ?>">
<?php
		} else { go(URL); }
	break;
	
	case "ara":
	$q= g("q");
?>
<title><?php echo ss($q); ?> arandı - <?php echo ss($ayar['site_title']); ?></title>
<?php
	break;
	
	case "uye":
?>
<title><?php echo ss($url) ?> - <?php echo ss($ayar['site_title']); ?></title>
<?php
	break;
	
	case "yazar":
	$uyem = query("SELECT * FROM uyeler WHERE kadi='{$url}' && onayDurum=1", $db);
	if($uyem){
		$uye_id = $uyem['uye_id']
?>
<title><?php echo ss($url) ?> - <?php echo ss($ayar['site_title']); ?></title>
	<?php } else go(URL); ?>
<?php
	break;
	
	case "sayfa":
	$sayfa = query("SELECT * FROM sayfalar INNER JOIN simgeler ON sayfalar.sayfa_simge=simgeler.simge_id WHERE sayfa_link='{$url}'", $db);
		if($sayfa){ ?>
<title><?php echo ss($sayfa['sayfa_baslik']); ?> - <?php echo ss($ayar['site_title']); ?></title>
<?php
} else { go(URL); }
	break;
	
	default:
?>
<title><?php echo ss($ayar['site_title']); ?></title>
<meta name="description" content="<?php echo ss($ayar['site_desc']); ?>">
<meta name="keywords" content="<?php echo ss($ayar['site_keyw']); ?>">
<meta name="author" content="Crpsem">
<?php
	break;
}
?>
<style>
	img {
		max-width: 100% !important;
		height:auto !important;
	}
	.thumbnail img {
		height:150px !important;
	}
</style>
</head>
<body>
<?php include 'inc/nav.php'; ?>
<div class="container">
<div class="row">
<div class="col-lg-8">
<div class="row reklam1"><div class="col-lg-12"><?php echo ss($ayar['reklam1']); ?></div></div>
<?php
$do = g("do");
switch($do){
	case "icerik":
		require_once "inc/icerik.php";
	break;
	
	case "sayfa":
		require_once "inc/sayfa.php";
	break;
	
	case "kategori":
		require_once "inc/kategori.php";
	break;
	
	case "ara":
		require_once "inc/ara.php";
	break;
	
	case "uye":
		require_once "inc/uye.php";
	break;
	
	case "yazar":
		require_once "inc/yazar.php";
	break;
	
	default:
		require_once "default.php";
	break;
}
?>
</div>
<div class="col-lg-4">
<?php include 'inc/sag-kisim.php'; ?>
</div>
</div>
<hr/>
<footer>
<div class="row">
<div class="col-lg-12">
<p>Copyright © 2018 Tüm Hakları Saklıdır. | <a href="<?php echo URL; ?>"><?php echo ss($ayar['site_title']); ?></a></p>
</div>
</div>
</footer>
</div>
<script src="<?php echo URL."/sistem/javascript/"; ?>jquery.js"></script>
<script src="<?php echo URL."/sistem/javascript/"; ?>bootstrap.min.js"></script>
</body>
</html>