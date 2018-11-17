<?php
echo !defined("ADMIN") ? header("Location: kontrol.php") : null;
$id = g("id");
$uyem = rows("SELECT * FROM uyeler WHERE uye_id='{$id}'", $db);
if($uyem>0){
?>
<div class="row"><div class="col-lg-12"><h1 class="page-header"><i class="fa fa-user"></i> Üye Sil</h1></div></div>
<?php
$delete = row("DELETE FROM uyeler WHERE uye_id='{$id}'", $db);
if($delete){
?>
<div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<i class="fa fa-user"></i><strong> Üye</strong> başarıyla silindi. Yönlendiriliyorsunuz...
</div>
<?php
go(URL."/admin/index.php?do=uyeler",1);
}
?>
<?php } else { go(URL."/admin"); } ?>