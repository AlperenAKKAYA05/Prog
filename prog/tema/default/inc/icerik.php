<?php echo !defined("INDEX") ? header("Location: index.php") : null; ?>
<div class="row">
<div class="col-lg-12"><h2 class="page-header"><i class="fa fa-file-text-o"></i> <?php echo $icerik['icerik_title']; ?></h2></div>
</div>
<div class="panel panel-default">
<div class="panel-body">
<?php echo $icerik['icerik']; ?>
</div>
<div class="panel-footer">
<?php echo ss($icerik['kadi']); ?> tarafından, <?php echo tarih_saatsiz(ss($icerik['icerik_tarih'])); ?> Tarihinda paylaşıldı.
</div>
</div>
<?php
// İçeriğin hitini arttırma
$icerikid = $icerik['icerik_id'];
$hitim = $icerik['icerik_hit'] + 1;
row("UPDATE icerikler SET icerik_hit='{$hitim}' WHERE icerik_id='{$icerikid}'", $db);

// Benzer içerikler
$benzericerikvarmi = rows("SELECT * FROM icerikler WHERE icerik_kategori='{$icerik['icerik_kategori']}' && icerik_id != '{$icerik['icerik_id']}'", $db);
if($benzericerikvarmi>0){
?>
<div class="panel panel-default">
<div class="panel-body">
<h4><i class="fa fa-spinner"></i> Benzer İçerikler :</h4><hr/>
<?php
foreach(row("SELECT * FROM icerikler WHERE icerik_kategori='{$icerik['icerik_kategori']}' && icerik_id != '{$icerik['icerik_id']}' ORDER BY rand() LIMIT 3", $db) as $kayit){
?>
<div class="col-sm-4 col-lg-4 col-md-4">
<div class="thumbnail">
<a href="<?php print URL."/".ss($kayit['icerik_link']); ?>"><img src="<?php print url(ss($kayit['icerik_kresim'])); ?>" alt="<?php print ss($kayit['icerik_title']); ?>"></a>
<div class="caption"><h4><a href="<?php print URL."/".ss($kayit['icerik_link']); ?>" title="<?php print ss($kayit['icerik_title']); ?>"><?php print kisalt(ss($kayit['icerik_title']), 38); ?></a></h4></div>
<div class="ratings"><p class="pull-right"><span class="fa fa-eye"></span> <?php echo sayi_format(ss($kayit['icerik_hit'])); ?></p><p><span class="fa fa-calendar"></span> <?php print tarih_saatsiz(ss($kayit['icerik_tarih'])); ?></p></div>
</div></div>
<?php
}
?>
</div>
</div>
<?php } ?>