<?php
echo !defined("ADMIN") ? header("Location: kontrol.php") : null;
$id = g("id");
$içerikim = rows("SELECT * FROM sayfalar WHERE sayfa_id='{$id}'", $db);
if($içerikim>0){
?>
<div class="row"><div class="col-lg-12"><h1 class="page-header"><i class="fa fa-trash"></i> Sayfa Sil</h1></div></div>
<?php
$delete = row("DELETE FROM sayfalar WHERE sayfa_id='{$id}'", $db);
if($delete){
?>
<div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<i class="fa fa-trash"></i><strong> Sayfa</strong> başarıyla silindi. Yönlendiriliyorsunuz...
</div>
<?php
go(URL."/admin/index.php?do=sayfalar",1);
}
?>
<?php } else { go(URL."/admin"); } ?>