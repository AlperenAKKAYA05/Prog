<?php echo !defined("ADMIN") ? header("Location: kontrol.php") : null; ?>
<div class="row"><div class="col-lg-12"><h1 class="page-header"><i class="fa fa-cog"></i> Profil Ayarları <small>| <?php print session("kadi"); ?></small></h1></div></div>
<?php
if($_POST['sifredegistir']){
$sifre = p("sifre", true);
$sifreonay = p("sifreOnay", true);
if(!$sifre){
?>
<div class="alert alert-warning alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<i class="fa fa-warning"></i><strong> Tüm alanları doldurmanız gerekmektedir.</strong>
</div>
<?php
} else {
if($sifre == $sifreonay){
$sifre = md5($sifre);
$update = row("UPDATE uyeler SET sifre='{$sifre}' WHERE uye_id='".session("uye_id")."'",$db);
$update->execute();
if($update){
?>
<div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<i class="fa fa-check"></i><strong> Şifreniz </strong> başarıyla güncellendi. Yeni şifreyle, tekrardan giriş yapmanız gerekiyor..
</div>
<?php
session_destroy();
go(URL."/admin/", 1);
}
} else {
?>
<div class="alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<i class="fa fa-warning"></i><strong> Şifreniz </strong> birbiriyle uyuşmuyor.
</div>
<?php
}}} // Şifre değiştir Postu bitti..
if($_POST['kadidegistir']){
$kadi = p("kadi", true);
$sifre = md5(p("sifre", true));
if(!$kadi || !$sifre){
?>
<div class="alert alert-warning alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<i class="fa fa-warning"></i><strong> Tüm alanları doldurmanız gerekmektedir.</strong>
</div>
<?php
} else {
$varmi = rows("SELECT * FROM uyeler WHERE kadi='{$kadi}' && uye_id != '".session("uye_id")."'", $db);
if($varmi>0){
?>
<div class="alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<i class="fa fa-warning"></i><strong> Girdiğiniz kullanıcı adı zaten kayıtlı,</strong> başka bir tane deneyin.
</div>
<?php
} else {
$sifredogrumu = rows("SELECT * FROM uyeler WHERE sifre='{$sifre}' && uye_id = '".session("uye_id")."'", $db);
if($sifredogrumu>0){
$update = row("UPDATE uyeler SET kadi='{$kadi}' WHERE uye_id='".session("uye_id")."'",$db);
if($update){
?>
<div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<i class="fa fa-user"></i><strong> Kullanıcı Adı</strong> başarıyla güncellendi. Şimdi tekrar giriş yapın...
</div>
<?php
session_destroy();
go(URL."/admin/",1);
}
} else {
?>
<div class="alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<i class="fa fa-warning"></i><strong> Yanlış şifre girdiniz.</strong> Kullanıcı Adını Değiştirmek İçin Kendi Şifrenizi Girin
</div>
<?php
}}}} // Kadi Değiştir Postu bitti
?>
<div class="row">
<div class="col-lg-6 col-md-6">
<div class="panel panel-green">
<div class="panel-heading"><i class="fa fa-user"></i> Şifremi Değiştir</div>
<div class="panel-body">
<form action="" name="sifredegistir" role="form" method="post">
<label>Yeni Şifre: </label><input type="password" name="sifre" placeholder="Yeni Şifrenizi Girin" class="form-group form-control" />
<label>Yeni Şifre Onay: </label><input type="password" name="sifreOnay" placeholder="Yeni Şifrenizi Onaylayın" class="form-group form-control" />
<input type="submit" class="btn btnGiris" name="sifredegistir" value="Şifremi Güncelle" />
</form>
</div>
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="panel panel-primary">
<div class="panel-heading"><i class="fa fa-user"></i> Kullanıcı Adımı Değiştir</div>
<div class="panel-body">
<form action="" name="kadidegistir" role="form" method="post">
<label>Kullanıcı Adı: </label><input type="text" name="kadi" placeholder="Yeni Bir Kullanıcı Adı Girin" class="form-group form-control" value="<?php echo session("kadi"); ?>" />
<label>Şuanki Şifre: </label><input type="password" name="sifre" placeholder="Şuanki Şifrenizi Girip Kullanıcı Adınızı Onaylayın" class="form-group form-control" />
<input type="submit" class="btn btnMavi" name="kadidegistir" value="Kullanıcı Adımı Güncelle" />
</form>
</div>
</div>
</div>
</div>