<?php echo !defined("ADMIN") ? header("Location: kontrol.php") : null; ?>
<div class="row"><div class="col-lg-12"><h1 class="page-header"><i class="fa fa-folder"></i> Kategoriler <a href="<?php echo URL."/admin/index.php?do=kategori-ekle"; ?>" class="linkSag"><i class="fa fa-folder-open"></i> Yeni Kategori Ekle</a></h1></div></div>
<?php
$varmi = rows("SELECT * FROM kategoriler WHERE kategori_onay=1", $db);
if($varmi>0){
?>
<div class="table-responsive">
<table class="table table-bordered table-hover table-striped">
<thead>
<tr>
<th>Kategori Başlık</th>
<th>Tarih</th>
<th>İşlem</th>
</tr>
</thead>
<tbody>
<?php
$sayfa = g("s") ? g("s") : 1;
$ksayisi = rows("SELECT * FROM kategoriler WHERE kategori_onay=1", $db);
$limit = 10;
$ssayisi = ceil($ksayisi/$limit);
$baslangic = ($sayfa * $limit) - $limit;
foreach(row("SELECT * FROM kategoriler WHERE kategori_onay=1 ORDER BY kategori_id DESC LIMIT $baslangic, $limit", $db) as $kayit){
?>
<tr>
<td><?php print ss($kayit['kategori_baslik']); ?></td>
<td><?php print tarih(ss($kayit['kategori_tarih'])); ?></td>
<td class='text-center'><a title="Düzenle" href="<?php echo URL."/admin/index.php?do=kategori-duzenle&id=".$kayit['kategori_id']; ?>" class="fa fa-edit btnDuzenle"></a><a onclick="return confirm('Kategoriyi silmek istediğinizden emin misiniz?');" title="Sil" href="<?php echo URL."/admin/index.php?do=kategori-sil&id=".$kayit['kategori_id']; ?>" class="fa fa-trash btnSil"></a></td>
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
}}}
echo "<li><a href='".URL."/admin/index.php?do={$do}&s=".$ssayisi."'>Son</a></li>";
?>
</ul>
<?php } ?>
</div>
<?php } else { ?>
<div class="alert alert-warning alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<i class="fa fa-warning"></i><strong> Henüz hiç kategori eklenmemiş.</strong>
</div>
<?php } ?>