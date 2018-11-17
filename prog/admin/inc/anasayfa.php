<?php echo !defined("ADMIN") ? header("Location: kontrol.php") : null; ?>
<div class="row">
<div class="col-lg-12"><h1 class="page-header"><i class="fa fa-dashboard"></i> Yönetim Paneli | <small><?php echo ss($ayar['site_title']); ?></small></h1></div>
</div>
<div class="row">
<div class="col-lg-3 col-md-6">
<div class="panel panel-primary">
<div class="panel-heading">
<div class="row">
<div class="col-xs-3"><i class="fa fa-file fa-5x"></i></div>
<div class="col-xs-9 text-right">
<?php $iceriksayisi = rows("SELECT * FROM icerikler WHERE icerik_onay=1", $db); ?>
<div class="huge"><?php print $iceriksayisi; ?></div>
<div>Toplam İçerik</div>
</div>
</div>
</div>
<a href="<?php print URL."/admin/" ?>icerikler">
<div class="panel-footer">
<span class="pull-left">İçerikleri Göster</span>
<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
<div class="clearfix"></div>
</div>
</a>
</div>
</div>
<div class="col-lg-3 col-md-6">
<div class="panel panel-yellow">
<div class="panel-heading">
<div class="row">
<div class="col-xs-3"><i class="fa fa-spinner fa-5x"></i></div>
<div class="col-xs-9 text-right">
<?php $bekleyenicerik = rows("SELECT * FROM icerikler WHERE icerik_onay=0", $db); ?>
<div class="huge"><?php print $bekleyenicerik; ?></div>
<div>Bekleyen İçerik</div>
</div>
</div>
</div>
<a href="<?php print URL."/admin/" ?>bekleyen-icerikler">
<div class="panel-footer">
<span class="pull-left">Bekleyen İçerikler</span>
<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
<div class="clearfix"></div>
</div>
</a>
</div>
</div>
<div class="col-lg-3 col-md-6">
<div class="panel panel-red">
<div class="panel-heading">
<div class="row">
<div class="col-xs-3"><i class="fa fa-users fa-5x"></i></div>
<div class="col-xs-9 text-right">
<?php $uyesayisi = rows("SELECT * FROM uyeler WHERE onayDurum=1", $db); ?>
<div class="huge"><?php print $uyesayisi; ?></div>
<div>Toplam Üye</div>
</div>
</div>
</div>
<a href="<?php print URL."/admin/" ?>uyeler">
<div class="panel-footer">
<span class="pull-left">Üyeleri Göster</span>
<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
<div class="clearfix"></div>
</div>
</a>
</div>
</div>
<div class="col-lg-3 col-md-6">
<div class="panel panel-yellow">
<div class="panel-heading">
<div class="row">
<div class="col-xs-3"><i class="fa fa-support fa-5x"></i></div>
<div class="col-xs-9 text-right">
<?php $ouyesayisi = rows("SELECT * FROM uyeler WHERE onayDurum=0", $db); ?>
<div class="huge"><?php print $ouyesayisi; ?></div>
<div>Bekleyen Üye</div>
</div>
</div>
</div>
<a href="<?php print URL."/admin/" ?>bekleyen-uyeler">
<div class="panel-footer">
<span class="pull-left">Onaylanmamış Üyeler</span>
<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
<div class="clearfix"></div>
</div>
</a>
</div>
</div>
<div class="col-lg-3 col-md-6">
<div class="panel panel-green">
<div class="panel-heading">
<div class="row">
<div class="col-xs-3"><i class="fa fa-folder fa-5x"></i></div>
<div class="col-xs-9 text-right">
<?php $kategorisayisi = rows("SELECT * FROM kategoriler", $db); ?>
<div class="huge"><?php print $kategorisayisi; ?></div>
<div>Toplam Kategori</div>
</div>
</div>
</div>
<a href="<?php print URL."/admin/" ?>kategoriler">
<div class="panel-footer">
<span class="pull-left">Kategorileri Göster</span>
<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
<div class="clearfix"></div>
</div>
</a>
</div>
</div>
<div class="col-lg-3 col-md-6">
<div class="panel panel-primary">
<div class="panel-heading">
<div class="row">
<div class="col-xs-3"><i class="fa fa-file-text-o fa-5x"></i></div>
<div class="col-xs-9 text-right">
<?php $saysayfa = rows("SELECT * FROM sayfalar", $db); ?>
<div class="huge"><?php print $saysayfa; ?></div>
<div>Toplam Sayfa</div>
</div>
</div>
</div>
<a href="<?php print URL."/admin/" ?>sayfalar">
<div class="panel-footer">
<span class="pull-left">Sayfaları Göster</span>
<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
<div class="clearfix"></div>
</div>
</a>
</div>
</div>
</div>