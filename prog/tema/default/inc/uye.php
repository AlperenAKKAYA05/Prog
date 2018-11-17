<?php echo !defined("INDEX") ? header("Location: index.php") : null; 
$uye = query("SELECT * FROM uyeler WHERE kadi='{$url}'", $db);
$uyeicerikadeti = rows("SELECT * FROM icerikler WHERE icerik_yazar='{$uye['uye_id']}' && icerik_onay=1", $db)
?>
<div class="row">
<div class="col-lg-12"><h2 class="page-header"><i class="fa fa-user"></i> <?php echo $uye['kadi']; ?></h2></div>
</div>
<div class="panel panel-default">
<div class="panel-body">
<p><i class="fa fa-shield"></i> Rütbe : Yönetici</p>
<p><i class="fa fa-calendar"></i> Üyelik Tarihi : <?php echo tarih_saatsiz($uye['uye_tarih']); ?></p>
<p><i class="fa fa-user"></i> Kullanıcı Adı : <?php echo $uye['kadi']; ?></p>
<p><i class="fa fa-file-text-o"></i> Toplam <?php echo $uyeicerikadeti; ?> İçerik Paylaşmış</p>
<a href="<?php echo URL."/yazar/".$uye['kadi']; ?>">Tüm İçeriklerini Göster</a>
</div>
</div>