<?php echo !defined("INDEX") ? header("Location: index.php") : null; ?>
<?php
$varmi = rows("SELECT * FROM icerikler WHERE icerik_onay=1", $db);
if($varmi>0){
$sayfa = g("s") ? g("s") : 1;
$ksayisi = rows("SELECT * FROM icerikler WHERE icerik_onay=1", $db);
$limit = 9;
$ssayisi = ceil($ksayisi/$limit);
if($sayfa>$ssayisi) { $sayfa=$ssayisi; } 
$baslangic = ($sayfa * $limit) - $limit;
?>
<div class="row">
<div class="col-lg-12"><h2 class="page-header"><i class="fa fa-clock-o"></i> Son Eklenenler <small>Sayfa <?php echo $sayfa; ?></small></h2></div>
</div>
<div class="row">
<?php
foreach(row("SELECT * FROM icerikler INNER JOIN uyeler ON uyeler.uye_id=icerikler.icerik_yazar WHERE icerik_onay=1 ORDER BY icerik_id DESC LIMIT $baslangic, $limit", $db) as $kayit){
?>
<div class="col-sm-4 col-lg-4 col-md-4">
<div class="thumbnail">
<a href="<?php print URL."/".ss($kayit['icerik_link']); ?>"><img src="<?php print url(ss($kayit['icerik_kresim'])); ?>" alt="<?php print ss($kayit['icerik_title']); ?>"></a>
<div class="caption"><h4><a href="<?php print URL."/".ss($kayit['icerik_link']); ?>" title="<?php print ss($kayit['icerik_title']); ?>"><?php print kisalt(ss($kayit['icerik_title']), 38); ?></a></h4></div>
<div class="ratings"><p class="pull-right"><span class="fa fa-eye"></span> <?php echo sayi_format(ss($kayit['icerik_hit'])); ?></p><p><span class="fa fa-calendar"></span> <?php print tarih_saatsiz(ss($kayit['icerik_tarih'])); ?></p></div>
</div></div>
<?php } ?>
</div>
<div class="row text-center">
<?php if($ksayisi>$limit) { ?>
<ul class="pagination">
<?php
echo "<li><a>".$sayfa."/".$ssayisi."</a></li>";
$forlimit = 1;
if($sayfa>$forlimit) {
echo "<li><a href='".URL."/sayfa/1'>İlk</a></li>";
}
for($i = $sayfa - $forlimit; $i <= $sayfa + $forlimit; $i++){
if($i>0 && $i<=$ssayisi){
if($i == $sayfa){
echo "<li class='active'><a href=''>".$i."</a></li>";
} else {
echo "<li><a href='".URL."/sayfa/".$i."'>".$i."</a></li>";
}
}
}
echo "<li><a href='".URL."/sayfa/".$ssayisi."'>Son</a></li>";
?>
</ul>
<?php } ?>
</div>
<?php } else { ?>
<div class="row">
<div class="col-lg-12">
<div style="margin-top:10px;" class="alert alert-warning alert-dismissable">
<h4><i class="fa fa-warning"></i><strong> Henüz hiç içerik eklenmemiş.</strong></h4>
</div>
</div>
</div>
<?php } ?>