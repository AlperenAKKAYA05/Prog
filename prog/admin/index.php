<?php
require_once "../sistem/ayar.php";
require_once "../sistem/fonksiyon.php";
define("ADMIN", true);
?>
<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="Crpsem">
<title><?php echo $ayar['site_title']; ?> - Yönetim Paneli</title>
<link href="<?php echo URL."/sistem/bootstrap/"; ?>css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo URL."/admin/"; ?>css/admin.css" rel="stylesheet">
<link href="<?php echo URL."/sistem/"; ?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<script src="https://cdn.ckeditor.com/4.7.0/full-all/ckeditor.js"></script>
<!-- Base Css Files -->
		<link href="<?php echo URL."/admin/"; ?>css/animate.min.css" rel="stylesheet" />

        <!-- Code Highlighter for Demo -->
        
        
                <!-- Extra CSS Libraries Start -->
                <link href="<?php echo URL."/admin/"; ?>css/style2.css" rel="stylesheet" type="text/css" />
                <!-- Extra CSS Libraries End -->
        <link href="<?php echo URL."/admin/"; ?>css/style-responsive.css" rel="stylesheet" />

        
		<link href="<?php echo URL."/sistem/bootstrap/"; ?>css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo URL."/admin/"; ?>css/admin.css" rel="stylesheet">
<link href="<?php echo URL."/sistem/"; ?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    </head>
<body>
<?php
if(session('login') && session('uyeRutbe')==1) {

if($ayar['first_login']==1){
	require_once "inc/ilk.php";
} else {
	require_once "inc/default.php";
}

} else {
if($_POST){
$kadi = p("kadi");
$sifre = md5(p("sifre"));
if(!$kadi || !$sifre){
$mesaj = "Kullanıcı Adı ve Şifre boş bırakılamaz...";
} else {
$giris = row("SELECT * FROM uyeler WHERE kadi='{$kadi}' AND sifre='{$sifre}'",$db);
if($giris->rowCount()){
$girdi = query("SELECT * FROM uyeler WHERE kadi='{$kadi}'", $db);
$session = array(
"login" => true,
"uye_id" => $girdi['uye_id'],
"kadi" => $girdi['kadi'],
"eposta" => $girdi['eposta'],
"uyeRutbe" => $girdi['uyeRutbe'],
"onayDurum" => $girdi['onayDurum']
);
session_olustur($session);

$first_login = rows("SELECT * FROM ayarlar WHERE first_login=1", $db);
if($first_login>0) { go("index.php?do=ayarlar"); } else { go(URL."/admin"); }

} else {
$mesaj = "Hatalı Giriş.";
}}}
?>
<div class="col-md-3"></div>
<div class="col-md-6">
<div class="container">
		<div class="full-content-center">
			<p class="text-center"><a href="#"><img src="<?php echo URL."/admin/"; ?>images/login-logo.png" alt="Logo"></a></p>
			<div class="login-wrap animated flipInX">
				<div class="login-block">
					<img src="<?php echo URL."/admin/"; ?>images/user.png" class="img-circle not-logged-avatar">
					
					<?php if($mesaj) { ?><div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-warning">
					</i>
					<strong> 
					<?php echo $mesaj; ?></strong></div> <?php } ?>				

					<form action="" method="post">
						<div class="form-group login-input">
						<i class="fa fa-user overlay"></i>
						<input type="text" class="form-control txt text-input" name="kadi" pattern=".{0,}" title="Kullanıcı Adı: Dört veya daha fazla karakter olmalı" placeholder="Kulanıcı Adı">
						</div>
						<div class="form-group login-input">
						<i class="fa fa-key overlay"></i>
						<input type="password" class="form-control txt text-input" name="sifre" pattern=".{0,}" title="Şifre: Altı veya daha fazla karakter olmalı" placeholder="*****">
						</div>
						
						<div class="row">
							<div class="col-sm-12">
							<button type="submit" class="btn btn-success btn-block">Giriş</button>
							</div>
						</div>
					</form>
				</div>
			</div>






<div class="col-md-3"></div>
<?php
}
?>
<script src="<?php echo URL."/sistem/javascript/"; ?>jquery.js"></script>
<script src="<?php echo URL."/sistem/javascript/"; ?>bootstrap.min.js"></script>
<script src="<?php echo URL."/admin/"; ?>js/plugins/morris/raphael.min.js"></script>
<script src="<?php echo URL."/admin/"; ?>js/plugins/morris/morris.min.js"></script>
<script src="<?php echo URL."/admin/"; ?>js/plugins/morris/morris-data.js"></script>

</body>
</html>