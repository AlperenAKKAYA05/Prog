<?php 
echo !defined("ADMIN") ? header("Location: kontrol.php") : null;
$id = g("id");
$icerikim = rows("SELECT * FROM icerikler WHERE icerik_id='{$id}' && icerik_onay=0", $db);
if($icerikim>0){
?>
<div class="row"><div class="col-lg-12"><h1 class="page-header"><i class="fa fa-file-text"></i> İçerik Onayla <a href="<?php echo URL."/admin/index.php?do=iceriklerim"; ?>" class="linkSag"><i class="fa fa-file"></i> İçeriklerimi Göster</a></h1></div></div>	
<?php					
$icerik_onay = 1;
$update = row("UPDATE icerikler SET icerik_onay='{$icerik_onay}' WHERE icerik_id='{$id}'",$db);
if($update){
?>
<div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<i class="fa fa-check"></i><strong> İçerik</strong> başarıyla onaylandı. Yönlendiriliyorsunuz...
</div>
<?php
go(URL."/admin/index.php?do=icerikler",1);
}
?>
<?php } else { go(URL."/admin/index.php?do=bekleyen-icerikler"); } ?>