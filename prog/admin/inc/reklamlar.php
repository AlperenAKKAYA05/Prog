<?php echo !defined("ADMIN") ? header("Location: kontrol.php") : null; ?>
<div class="row"><div class="col-lg-12"><h1 class="page-header"><i class="fa fa-try"></i> Reklam Ayarları</h1></div></div>
<?php
if($_POST){
	$reklam1 = p("reklam1");
	$reklam2 = p("reklam2");
	
	$update = row("UPDATE ayarlar SET reklam1='{$reklam1}',reklam2='{$reklam2}'",$db);
	$update->execute();
	if($update){
?>
<div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<i class="fa fa-check"></i><strong> Reklamlar </strong> başarıyla kaydedildi.
</div>
<?php
	$ayar = $db->query("SELECT * FROM ayarlar")->fetch(PDO::FETCH_ASSOC);
	}
}
?>
<form action="" role="form" method="post">
<label>Reklam (Üst Kısımdaki 728x90) : </label><textarea style="resize:none;" name="reklam1" class="form-group form-control" /><?php echo ss($ayar['reklam1']); ?></textarea>
<label>Reklam (Sağ Kısımdaki Kare) : </label><textarea style="resize:none;" name="reklam2" class="form-group form-control" /><?php echo ss($ayar['reklam2']); ?></textarea>
<input type="submit" class="btn btnGiris" value="Reklamları Kaydet" />
</form>