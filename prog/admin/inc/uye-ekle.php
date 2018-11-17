<?php echo !defined("ADMIN") ? header("Location: kontrol.php") : null; ?>
<div class="row"><div class="col-lg-12"><h1 class="page-header"><i class="fa fa-user"></i> Üye Ekle <a href="<?php echo URL."/admin/index.php?do=uyeler"; ?>" class="linkSag"><i class="fa fa-users"></i> Üyeleri Göster</a></h1></div></div>
<?php
if($_POST){
$kadi = p("kadi", true);
$sifre = md5(p("sifre", true));
$eposta = p("eposta", true);
$uyeRutbe = p("uyeRutbe", true);
$onayDurum = p("onayDurum", true);
if(!$kadi || !$sifre){
?>
<div class="alert alert-warning alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<i class="fa fa-warning"></i><strong> Tüm alanları doldurmanız gerekmektedir.</strong>
</div>
<?php
} else {
$varmi = rows("SELECT * FROM uyeler WHERE kadi='{$kadi}'", $db);
if($varmi>0){
?>
<div class="alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<i class="fa fa-warning"></i><strong> Eklemeye çalıştığınız üye zaten mevcut,</strong> başka bir tane deneyin.
</div>
<?php
}else{
$insert = row("INSERT INTO uyeler SET kadi='{$kadi}', sifre='{$sifre}', eposta='{$eposta}', uyeRutbe='{$uyeRutbe}', onayDurum='{$onayDurum}'",$db);
if($insert){
?>
<div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<i class="fa fa-user"></i><strong> Yeni Üye</strong> başarıyla eklendi. Yönlendiriliyorsunuz...
</div>
<?php
if($onayDurum==1){ go(URL."/admin/index.php?do=uyeler",1); } else { go(URL."/admin/index.php?do=bekleyen-uyeler",1); }
}}}}
?>
<form action="" role="form" method="post">
<label>Üye Kullanıcı Adı : </label><input type="text" name="kadi" placeholder="Üye Kullanıcı Adı" class="form-group form-control" />
<label>Üye Şifresi : </label><input type="password" name="sifre" placeholder="Üye Şifresi" class="form-group form-control" />
<label>Üye E-Postası : </label><input type="email" name="eposta" placeholder="Üye E-Postası" class="form-group form-control" />
<label>Üye Rütbesi : </label><select name="uyeRutbe" class="form-group form-control">
<option value="1">Yönetici</option>
<option value="2" selected>Üye</option>
</select>
<label>Üye Onay Durumu : </label><select name="onayDurum" class="form-group form-control">
<option value="1">Onaylı</option>
<option value="0">Onaylanmadı</option>
</select>
<input type="submit" class="btn btnGiris" value="Üye Ekle" />
</form>