<?php echo !defined("INDEX") ? header("Location: index.php") : null; ?>
<?php if($icerik) { ?>
<div class="panel panel-default">
<div class="panel-heading">
<h1 class="panel-title"><span class="fa fa-line-chart"></span> İstatistikler</h1>
</div>
<div class="panel-body">
<p><i class="fa fa-user"></i> Yazar : <a href="<?php echo URL."/uye/".$icerik['kadi']; ?>" title="<?php echo $icerik['kadi']; ?>"><?php echo $icerik['kadi']; ?></a></p>
<p><i class="fa fa-folder-open"></i> Kategori : <a href="<?php echo URL."/kategori/".$icerik['kategori_link']; ?>" title="<?php echo $icerik['kategori_baslik']; ?>"><?php echo $icerik['kategori_baslik']; ?></a></p>
<p><i class="fa fa-eye"></i> Görüntülenme : <?php echo sayi_format(ss($icerik['icerik_hit'])); ?></p>
<p><i class="fa fa-calendar"></i> Tarih : <?php echo tarih(ss($icerik['icerik_tarih'])); ?></p>
</div>
</div>
<?php } ?>
<?php if($kategori) { ?>
<div class="panel panel-default">
<div class="panel-heading">
<h1 class="panel-title"><span class="fa fa-folder-open"></span> Açıklama</h1>
</div>
<div class="panel-body">
<h4><?php echo $kategori['kategori_baslik']; ?></h4>
<?php echo $kategori['kategori_desc']; ?>
<hr/>
<p><i class="fa fa-calendar"></i> Oluşturulma Tarihi : <?php echo tarih(ss($kategori['kategori_tarih'])); ?></p>
</div>
</div>
<?php } ?>
<?php if($ayar['duyuru']) { ?>
<div class="panel panel-default">
<div class="panel-heading">
<h1 class="panel-title"><span class="fa fa-chevron-circle-right"></span> Duyuru</h1>
</div>
<div class="panel-body">
<?php print ss($ayar['duyuru']); ?>
</div>
</div>
<?php } ?>
<?php $populervarmi = rows("SELECT * FROM icerikler WHERE icerik_onay=1 ORDER BY icerik_hit DESC LIMIT 5", $db); if($populervarmi>0){ ?>
<div class="panel panel-default">
<div class="panel-heading">
<h1 class="panel-title"><span class="fa fa-thumbs-up"></span> Popüler Paylaşımlar</h1>
</div>
<div class="panel-body">
<div class="list-group">
<?php
foreach(row("SELECT * FROM icerikler WHERE icerik_onay=1 ORDER BY icerik_hit DESC LIMIT 5", $db) as $kayit){
echo "<a title='".ss($kayit['icerik_title'])."' href='".URL."/".ss($kayit['icerik_link'])."' class='list-group-item'><i class='fa fa-thumbs-up'></i> ".kisalt(ss($kayit['icerik_title']), 24)."<span class='badge'><i class='fa fa-eye'></i> ".sayi_format(ss($kayit['icerik_hit']))."</span></a>";
}
?>
</div>
</div>
</div>
<?php } ?>
<div class="panel panel-default">
<div class="panel-heading">
<h1 class="panel-title"><span class="fa fa-try"></span> Reklam</h1>
</div>
<div class="panel-body">
<?php echo ss($ayar['reklam2']); ?>
</div>
</div>
<?php $katvarmi = rows("SELECT * FROM kategoriler WHERE kategori_onay=1 ORDER BY kategori_baslik ASC", $db); if($katvarmi>0){ ?>
<div class="panel panel-default">
<div class="panel-heading">
<h1 class="panel-title"><span class="fa fa-folder"></span> Kategoriler</h1>
</div>
<div class="panel-body">
<div class="list-group">
<?php
foreach(row("SELECT * FROM kategoriler WHERE kategori_onay=1 ORDER BY kategori_baslik ASC", $db) as $kayit){
echo "<a title='".ss($kayit['kategori_baslik'])."' href='".URL."/kategori/".ss($kayit['kategori_link'])."' class='list-group-item'><i class='fa fa-folder-open'></i> ".kisalt(ss($kayit['kategori_baslik']), 34)."</a>";
}
?>
</div>
</div>
</div>
<?php } ?>