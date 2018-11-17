<?php echo !defined("ADMIN") ? header("Location: kontrol.php") : null; ?>
<div class="row"><div class="col-lg-12"><h1 class="page-header"><i class="fa fa-file-text-o"></i> Sayfa Ekle <a href="<?php echo URL."/admin/index.php?do=sayfalar"; ?>" class="linkSag"><i class="fa fa-file-text-o"></i> Sayfaları Göster</a></h1></div></div>
<?php
if($_POST){
$sayfa_baslik = p("sayfa_baslik", true);
$sayfa_link = seo($sayfa_baslik);
$sayfa_icerik = p("sayfa_icerik");
$menu = p("menu", true);
$sayfa_simge = p("sayfa_simge", true);

if(!$sayfa_baslik || !$sayfa_icerik){
?>
<div class="alert alert-warning alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<i class="fa fa-warning"></i><strong> Tüm alanları doldurmanız gerekmektedir.</strong>
</div>
<?php
} else {
$varmi = rows("SELECT * FROM sayfalar WHERE sayfa_link='{$sayfa_link}'", $db);
if($varmi>0){
?>
<div class="alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<i class="fa fa-warning"></i><strong> Eklemeye çalıştığınız sayfa zaten mevcut,</strong> başka bir tane deneyin.
</div>
<?php
}else{
$insert = row("INSERT INTO sayfalar SET sayfa_baslik='{$sayfa_baslik}', sayfa_link='{$sayfa_link}', sayfa_icerik='{$sayfa_icerik}', menu='{$menu}', sayfa_simge='{$sayfa_simge}'",$db);
if($insert){
?>
<div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<i class="fa fa-check"></i><strong> Sayfa</strong> başarıyla eklendi. Yönlendiriliyorsunuz...
</div>
<?php
go(URL."/admin/index.php?do=sayfalar",1);
}
}
}
}
?>
<form action="" role="form" method="post">
<label>Sayfa Başlık : </label><input type="text" name="sayfa_baslik" placeholder="Sayfaya Bir Başlık Ekleyin" class="form-group form-control" />
<label>Sayfa Menüde Gösterilsin Mi ? : </label><select name="menu" class="form-group form-control">
<option value="1">Gösterilsin</option>
<option value="0" selected>Gösterilmesin</option>
</select>
<label>Sayfaya Simge Seçin : </label><select name="sayfa_simge" class="form-group form-control">
<?php
foreach(row("SELECT * FROM simgeler ORDER BY simge_baslik ASC", $db) as $kayit){
if($kayit['simge_id']==3) { echo '<option value="'.$kayit['simge_id'].'" selected>'.ss($kayit['simge_baslik']).'</option>'; } else { echo '<option value="'.$kayit['simge_id'].'">'.ss($kayit['simge_baslik']).'</option>'; }
}
?>
</select>
<label>Sayfa İçerik : </label><textarea name="sayfa_icerik"></textarea>
<script>
CKEDITOR.replace( 'sayfa_icerik' );
</script>
<input type="submit" class="btn btnGiris" style="margin-top:10px;" value="Sayfayı Ekle" />
</form>