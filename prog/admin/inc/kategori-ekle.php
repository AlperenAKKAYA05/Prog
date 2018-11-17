<?php echo !defined("ADMIN") ? header("Location: kontrol.php") : null; ?>
<div class="row"><div class="col-lg-12"><h1 class="page-header"><i class="fa fa-folder-open"></i> Kategori Ekle <a href="<?php echo URL."/admin/index.php?do=kategoriler"; ?>" class="linkSag"><i class="fa fa-folder"></i> Kategorileri Göster</a></h1></div></div>
<?php
if($_POST){
$kategori_baslik = p("kategori_baslik", true);
$kategori_desc = p("kategori_desc", true);
$kategori_link = seo($kategori_baslik);
if(!$kategori_baslik || !$kategori_desc){
?>
<div class="alert alert-warning alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<i class="fa fa-warning"></i><strong> Tüm alanları doldurmanız gerekmektedir.</strong>
</div>
<?php
} else {
$varmi = rows("SELECT * FROM kategoriler WHERE kategori_link='{$kategori_link}'", $db);
if($varmi>0){
?>
<div class="alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<i class="fa fa-warning"></i><strong> Eklemeye çalıştığınız kategori zaten mevcut.</strong> Başka bir başlık ile tekrar deneyin.
</div>
<?php
}else{
$insert = row("INSERT INTO kategoriler SET kategori_baslik='{$kategori_baslik}', kategori_desc='{$kategori_desc}', kategori_link='{$kategori_link}'",$db);
if($insert){
?>
<div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<i class="fa fa-folder-open"></i><strong> Kategori</strong> başarıyla eklendi. Yönlendiriliyorsunuz...
</div>
<?php
go(URL."/admin/index.php?do=kategoriler",1);
}}}}
?>
<form action="" role="form" method="post">
<label>Kategori Başlığı: </label><input type="text" name="kategori_baslik" placeholder="Kategori Başlığı" class="form-group form-control" />
<label>Kategori Açıklaması: </label><input type="text" name="kategori_desc" placeholder="Kategori Açıklaması (Description)" class="form-group form-control" />
<input type="submit" class="btn btnGiris" value="Kategori Ekle" />
 </form>