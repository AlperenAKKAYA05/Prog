<?php echo !defined("ADMIN") ? header("Location: kontrol.php") : null; ?>
<div class="row"><div class="col-lg-12"><h1 class="page-header"><i class="fa fa-file-text"></i> İçerik Ekle <a href="<?php echo URL."/admin/index.php?do=icerikler"; ?>" class="linkSag"><i class="fa fa-file"></i> İçerikleri Göster</a></h1></div></div>
<?php
$icerikicinkategorivarmi = rows("SELECT * FROM kategoriler WHERE kategori_onay=1", $db);
if($icerikicinkategorivarmi>0){
if($_POST){
$icerik_title = p("icerik_title", true);
$icerik_link = seo($icerik_title);
$icerik_desc = p("icerik_desc", true);
$icerik_keyw = p("icerik_keyw", true);
$icerik_kategori = p("icerik_kategori", true);
$icerik_kresim = p("icerik_kresim");
$icerik = p("icerik");
$icerik_yazar = session("uye_id");
$icerik_onay = p("icerik_onay", true);
if(!$icerik_title || !$icerik){
?>
<div class="alert alert-warning alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<i class="fa fa-warning"></i><strong> Tüm alanları doldurmanız gerekmektedir.</strong>
</div>
<?php
} else {
$varmi = rows("SELECT * FROM icerikler WHERE icerik_link='{$icerik_link}'", $db);
if($varmi>0){
?>
<div class="alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<i class="fa fa-warning"></i><strong> Eklemeye çalıştığınız içerik zaten mevcut,</strong> başka bir tane deneyin.
</div>
<?php
}else{
$insert = row("INSERT INTO icerikler SET icerik_title='{$icerik_title}', icerik_desc='{$icerik_desc}', icerik_link='{$icerik_link}', icerik_keyw='{$icerik_keyw}', icerik_kategori='{$icerik_kategori}', icerik_kresim='{$icerik_kresim}', icerik='{$icerik}', icerik_yazar='{$icerik_yazar}', icerik_onay='{$icerik_onay}'",$db);
if($insert){
?>
<div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<i class="fa fa-check"></i><strong> İçerik</strong> başarıyla eklendi. Yönlendiriliyorsunuz...
</div>
<?php
if($icerik_onay==1) go(URL."/admin/index.php?do=icerikler",1); else  go(URL."/admin/index.php?do=bekleyen-icerikler",1);
}
}
}
}
?>
<form action="" role="form" method="post">
<label>İçerik Başlık : </label><input type="text" name="icerik_title" placeholder="İçeriğe Bir Başlık Ekleyin" class="form-group form-control" />
<label>İçerik Açıklama : </label><input type="text" name="icerik_desc" placeholder="İçeriğe Bir Açıklama Ekleyin" class="form-group form-control" />
<label>İçerik Anahtar Kelimeler : </label><input type="text" name="icerik_keyw" placeholder="İçeriğin Anahtar Kelimelerini Belirtiniz" class="form-group form-control" />
<label>Kategori : </label><select name="icerik_kategori" class="form-group form-control">
<?php
foreach(row("SELECT * FROM kategoriler ORDER BY kategori_baslik ASC", $db) as $kayit){
echo '<option value="'.$kayit['kategori_id'].'">'.ss($kayit['kategori_baslik']).'</option>';
}
?>
</select>
<label>İçerik Küçük Resim : </label><input type="text" name="icerik_kresim" placeholder="Bir Küçük Resim Ekleyin (URL)" class="form-group form-control" />
<label>İçerik Durumu : </label><select name="icerik_onay" class="form-group form-control">
<option value="1">İçerik Gösterilsin</option>
<option value="0">İçerik Gizlensin</option>
</select>
<label>İçerik : </label><textarea name="icerik"></textarea>
<script>
CKEDITOR.replace( 'icerik' );
</script>
<input type="submit" class="btn btnGiris" style="margin-top:10px;" value="İçerik Ekle" />
</form>
<?php 
}else {
?>
<div class="alert alert-warning alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<i class="fa fa-warning"></i><strong> Hiç kategori bulunmadığı için içerik ekleyemiyorsunuz. Lütfen hemen şimdi <a href="<?php echo URL."/admin/index.php?do=kategori-ekle"; ?>">Kategori Ekle</a> sonra içerik eklemeye çalış.</strong>
</div>
<?php
}
?>