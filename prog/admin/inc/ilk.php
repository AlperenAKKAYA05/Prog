<?php echo !defined("ADMIN") ? header("Location: kontrol.php") : null; 
if($ayar['first_login']==1){
?>
<div class="row"><div class="col-lg-12"><h1 class="page-header">Sitenizin Ayarlanıyor</h1></div></div>
<p>Örnek : http://siteadresim.com</p>
<p><strong>Sonunda slash (/) kullanmayın!</strong></p>
<?php
if($_POST){
	$site_url = p("site_url", true);
	if(!$site_url){
?>
<p><strong> Lütfen Siteninizin URL'sini Boş Bırakmayın.</strong></p>
<?php
	} else {
	$update = row("UPDATE ayarlar SET site_url='{$site_url}'",$db);
	$update->execute();
	if($update){
		$login_finish = row("UPDATE ayarlar SET first_login=0",$db);
		$login_finish->execute();
?>
<div class="alert alert-success alert-dismissable">
<p><strong>Siteniz ayarlandı... Bekleyin!</strong></p>
<?php go($site_url."/admin/ayarlar"); ?>
</div>
<?php
	}
}
}
?>
<form action="" role="form" method="post">
<label>Site URL: </label><input type="text" name="site_url" placeholder="Site URL" class="form-group form-control" value="<?php echo ss($ayar['site_url']); ?>" />
<input type="submit" class="btn btnGiris" value="Siteyi Kaydet" />
</form>
<?php } else go(URL."/admin"); ?>