<?php 
echo !defined("ADMIN") ? header("Location: kontrol.php") : null;
$onayliicerikSayisi = rows("SELECT * FROM icerikler WHERE icerik_yazar='".session("uye_id")."' && icerik_onay=1", $db);
$onaysizicerikSayisi = rows("SELECT * FROM icerikler WHERE icerik_yazar='".session("uye_id")."' && icerik_onay=0", $db);
$uye = query("SELECT * FROM uyeler WHERE uye_id='".session("uye_id")."'", $db);
$rutbe = ss($uye['uyeRutbe']);
if($rutbe==1){ $rutbe = "Yönetici"; }elseif($rutbe==2){ $rutbe = "Üye"; }else{ $rutbe = "Diğer"; }
?>
<div class="row"><div class="col-lg-12"><h1 class="page-header"><i class="fa fa-user"></i> <?php print session("kadi"); ?> - Profil Sayfası</h1></div></div>
<div class="row">
<div class="col-lg-12 col-md-12">
<div class="panel panel-green">
<div class="panel-heading">
<div class="row">
<div class="col-xs-3">
<i class="fa fa-shield fa-5x"></i>
</div>
<div class="col-xs-9 text-right">
<div class="huge"><?php print $rutbe; ?></div>
<div>Şuanki Rütbe</div>
</div>
</div>
</div>
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="panel panel-primary">
<div class="panel-heading">
<div class="row">
<div class="col-xs-3">
<i class="fa fa-file fa-5x"></i>
</div>
<div class="col-xs-9 text-right">
<div class="huge"><?php print $onayliicerikSayisi; ?></div>
<div>İçeriklerim</div>
</div>
</div>
</div>
<a href="<?php echo URL."/admin/index.php?do=iceriklerim"; ?>">
<div class="panel-footer">
<span class="pull-left">Detayları Göster</span>
<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
<div class="clearfix"></div>
</div>
</a>
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="panel panel-yellow">
<div class="panel-heading">
<div class="row">
<div class="col-xs-3">
<i class="fa fa-spinner fa-5x"></i>
</div>
<div class="col-xs-9 text-right">
<div class="huge"><?php print $onaysizicerikSayisi; ?></div>
<div>Bekleyen İçeriklerim</div>
</div>
</div>
</div>
<a href="<?php echo URL."/admin/index.php?do=bekleyen-iceriklerim"; ?>">
<div class="panel-footer">
<span class="pull-left">Detayları Göster</span>
<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
<div class="clearfix"></div>
</div>
</a>
</div>
</div>
</div>