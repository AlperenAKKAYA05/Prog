<?php echo !defined("ADMIN") ? header("Location: kontrol.php") : null; ?>
<div class="row"><div class="col-lg-12"><h1 class="page-header"><i class="fa fa-cog"></i> Site Ayarları</h1></div></div>
<?php
if($_POST){
	$site_url = p("site_url", true);
	$site_title = p("site_title", true);
	$site_desc = p("site_desc", true);
	$site_keyw = p("site_keyw", true);
	$site_durum = p("site_durum", true);
	$duyuru = p("duyuru", true);
	$tema_css= p("tema_css", true);
	
	if(!$site_url || !$site_title || !$site_desc || !$site_keyw){
?>
<div class="alert alert-warning alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<i class="fa fa-warning"></i><strong> Tüm alanları doldurmanız gerekmektedir.</strong>
</div>
<?php
	} else {
	$update = row("UPDATE ayarlar SET site_url='{$site_url}',site_title='{$site_title}',site_desc='{$site_desc}',site_keyw='{$site_keyw}',site_durum='{$site_durum}',duyuru='{$duyuru}',tema_css='{$tema_css}'",$db);
	$update->execute();
	if($update){
?>
<div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<i class="fa fa-check"></i><strong> Site Ayarları</strong> başarıyla kaydedildi.
</div>
<?php
	$ayar = $db->query("SELECT * FROM ayarlar")->fetch(PDO::FETCH_ASSOC);
	}
}
}
?>
<form action="" role="form" method="post">
<label>Site URL: </label><input type="text" name="site_url" placeholder="Site URL" class="form-group form-control" value="<?php echo ss($ayar['site_url']); ?>" />
<label>Site Başlık: </label><input type="text" name="site_title" placeholder="Site Başlık (Title)" class="form-group form-control" value="<?php echo ss($ayar['site_title']); ?>" />
<label>Site Açıklaması: </label><input type="text" name="site_desc" placeholder="Site Açıklama (Description)" class="form-group form-control" value="<?php echo ss($ayar['site_desc']); ?>" />
<label>Site Anahtar Kelimeleri: </label><input type="text" name="site_keyw" placeholder="Site Anahtar Kelimeleri (Keywords)" class="form-group form-control" value="<?php echo ss($ayar['site_keyw']); ?>" />
<label>Site Duyuru (Eğer Boş Bırakırsanız Gözükmez): </label><textarea style="resize:none;" name="duyuru" class="form-group form-control" /><?php echo ss($ayar['duyuru']); ?></textarea>
<label>Site Renk Seçin : </label><select class="form-group form-control" name="tema_css">
	<option value="style" <?php echo $ayar['tema_css']=='style' ? 'selected' : null ?>>Mavi (Orjinal)</option>
	<option value="siyah" <?php echo $ayar['tema_css']=='siyah' ? 'selected' : null ?>>Siyah</option>
	<option value="sari" <?php echo $ayar['tema_css']=='sari' ? 'selected' : null ?>>Sarı</option>
	<option value="kirmizi" <?php echo $ayar['tema_css']=='kirmizi' ? 'selected' : null ?>>Kırmızı</option>
	<option value="turuncu" <?php echo $ayar['tema_css']=='turuncu' ? 'selected' : null ?>>Turuncu</option>
</select>
<label>Site Durumu: </label><select class="form-group form-control" name="site_durum">
	<option value="1" <?php echo $ayar['site_durum'] ? 'selected' : null ?>>Site Açık</option>
	<option value="0" <?php echo !$ayar['site_durum'] ? 'selected' : null ?>>Site Kapalı</option>
</select>
<input type="submit" class="btn btnGiris" value="Ayarları Kaydet" />
</form>