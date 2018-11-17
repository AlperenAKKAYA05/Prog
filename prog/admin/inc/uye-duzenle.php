<?php
echo !defined("ADMIN") ? header("Location: kontrol.php") : null;
$id = g("id");
$uyem = rows("SELECT * FROM uyeler WHERE uye_id='{$id}'", $db);
if($uyem>0){
$uye = query("SELECT sifre FROM uyeler WHERE uye_id='{$id}'", $db); // Şifre kısmı için gerekli ..
?>
<div class="row"><div class="col-lg-12"><h1 class="page-header"><i class="fa fa-user"></i> Üye Düzenle <a href="<?php echo URL."/admin/index.php?do=uyeler"; ?>" class="linkSag"><i class="fa fa-users"></i> Üyeleri Göster</a></h1></div></div>
<?php
if($_POST){
$kadi = p("kadi", true);
if(p("sifre")){
$sifre = md5(p("sifre", true));
} else {
$sifre = $uye['sifre'];
}
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
$varmi = rows("SELECT * FROM uyeler WHERE kadi = '{$kadi}' && uye_id != $id", $db);
if($varmi>0){
?>
<div class="alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<i class="fa fa-warning"></i><strong> Eklemeye çalıştığınız üye zaten mevcut.</strong> Başka bir başlık ile tekrar deneyin.
</div>
<?php
}else{
$update = row("UPDATE uyeler SET kadi='{$kadi}', sifre='{$sifre}', eposta='{$eposta}', uyeRutbe='{$uyeRutbe}', onayDurum='{$onayDurum}' WHERE uye_id={$id}",$db);
if($update){
?>
<div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<i class="fa fa-user"></i><strong> Üye</strong> başarıyla düzenlendi. Yönlendiriliyorsunuz...
</div>
<?php
if($onayDurum==1){ go(URL."/admin/index.php?do=uyeler",1); } else { go(URL."/admin/index.php?do=bekleyen-uyeler",1); }
}}}}										
$uye = query("SELECT * FROM uyeler WHERE uye_id='{$id}'", $db); // Postlara veri yazdırmak için..
?>
<form action="" role="form" method="post">
<label>Üye Kullanıcı Adı : </label><input type="text" name="kadi" placeholder="Üye Kullanıcı Adı" class="form-group form-control" value="<?php echo $uye['kadi'] ?>" />
<label>Üye Şifresi : (Burası Boş Bırakılırsa Şifre Değişmez)</label><input type="password" name="sifre" placeholder="Üye Şifresi" class="form-group form-control" />
<label>Üye E-Postası : </label><input type="email" name="eposta" placeholder="Üye E-Postası" class="form-group form-control" value="<?php echo $uye['eposta'] ?>" />
<label>Üye Rütbesi : </label><select name="uyeRutbe" class="form-group form-control">
<option value="1" <?php echo $uye['uyeRutbe'] == 1 ? 'selected' : null; ?>>Yönetici</option>
<option value="2" <?php echo $uye['uyeRutbe'] == 2 ? 'selected' : null; ?>>Üye</option>
</select>
<label>Üye Onay Durumu : </label><select name="onayDurum" class="form-group form-control">
<option value="1" <?php echo $uye['onayDurum'] == 1 ? 'selected' : null; ?>>Onaylı</option>
<option value="0" <?php echo $uye['onayDurum'] == 0 ? 'selected' : null; ?>>Onaylanmadı</option>
</select>
<input type="submit" class="btn btnGiris" value="Düzenlemeyi Bitir" />
</form>
<?php } else { go(URL."/admin"); } ?>