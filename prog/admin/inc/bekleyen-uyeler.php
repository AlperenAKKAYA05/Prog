<?php
echo !defined("ADMIN") ? header("Location: kontrol.php") : null; 
$icerik_yazar = session("uye_id");
?>
<div class="row"><div class="col-lg-12"><h1 class="page-header"><i class="fa fa-users"></i> Onay Bekleyen Üyeler <a href="<?php echo URL."/admin/index.php?do=uye-ekle"; ?>" class="linkSag"><i class="fa fa-user"></i> Yeni Üye Ekle</a></h1></div></div>
<?php
$varmi = rows("SELECT * FROM uyeler WHERE onayDurum=0", $db);
if($varmi>0){
?>
<div class="table-responsive">
<table class="table table-bordered table-hover table-striped">
<thead>
<tr>
<th>Kullanıcı Adı</th>
<th>Kayıt Tarih</th>
<th>Rütbe</th>
<th>İşlem</th>
</tr>
</thead>
<tbody>
<?php
$sayfa = g("s") ? g("s") : 1;
$ksayisi = rows("SELECT * FROM uyeler WHERE onayDurum=0", $db);
$limit = 10;
$ssayisi = ceil($ksayisi/$limit);
$baslangic = ($sayfa * $limit) - $limit;
foreach(row("SELECT * FROM uyeler WHERE onayDurum=0 ORDER BY uye_id DESC LIMIT $baslangic, $limit", $db) as $kayit){
$rutbe = ss($kayit['uyeRutbe']);
if($rutbe==1){ $rutbe = "Yönetici"; }elseif($rutbe==2){ $rutbe = "Üye"; }else{ $rutbe = "Diğer"; }
?>
<tr>
<td><?php print ss($kayit['kadi']); ?></td>
<td><?php print tarih(ss($kayit['uye_tarih'])); ?></td>
<td><?php print ss($rutbe); ?></td>
<td class='text-center'><a title="Onayla" href="<?php echo URL."/admin/index.php?do=uye-onayla&id=".$kayit['uye_id']; ?>" class="fa fa-check btnOnay"></a><a title="Düzenle" href="<?php echo URL."/admin/index.php?do=uye-duzenle&id=".$kayit['uye_id']; ?>" class="fa fa-edit btnDuzenle"></a><a onclick="return confirm('Üyeyi silmek istediğinizden emin misiniz?');" title="Sil" href="<?php echo URL."/admin/index.php?do=uye-sil&id=".$kayit['uye_id']; ?>" class="fa fa-trash btnSil"></a></td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
<div class="text-center">
<?php if($ksayisi>$limit) { ?>
<ul class="pagination">
<?php
echo "<li><a>".$sayfa."/".$ssayisi."</a></li>";
$forlimit = 1;
if($sayfa>$forlimit) {
echo "<li><a href='".URL."/admin/index.php?do={$do}&s=1'>İlk</a></li>";
}
for($i = $sayfa - $forlimit; $i <= $sayfa + $forlimit; $i++){
if($i>0 && $i<=$ssayisi){
if($i == $sayfa){
echo "<li class='active'><a href=''>".$i."</a></li>";
} else {
echo "<li><a href='".URL."/admin/index.php?do={$do}&s=".$i."'>".$i."</a></li>";
}
}
}
echo "<li><a href='".URL."/admin/index.php?do={$do}&s=".$ssayisi."'>Son</a></li>";
?>
</ul>
<?php } ?>
</div>
<?php } else { ?>
<div class="alert alert-warning alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<i class="fa fa-warning"></i><strong> Onay bekleyen üye bulunamadı.</strong>
</div>
<?php } ?>