<?php 
echo !defined("ADMIN") ? header("Location: kontrol.php") : null;
$id = g("id");
$icerikim = rows("SELECT * FROM uyeler WHERE uye_id='{$id}' && onayDurum=0", $db);
if($icerikim>0){
?>
<div class="row"><div class="col-lg-12"><h1 class="page-header"><i class="fa fa-users"></i> İçerik Onayla <a href="<?php echo URL."/admin/index.php?do=bekleyen-uyeler"; ?>" class="linkSag"><i class="fa fa-users"></i> Onay Bekleyen Üyeler</a></h1></div></div>
<?php
$onayDurum = 1;
if(!$onayDurum || !$id){
?>
<div class="alert alert-warning alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<i class="fa fa-warning"></i><strong> Üye bulunamadı.</strong>
</div>
<?php
} else {
$update = row("UPDATE uyeler SET onayDurum='{$onayDurum}' WHERE uye_id='{$id}'",$db);
if($update){
?>
<div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<i class="fa fa-user"></i><strong> Üye</strong> başarıyla onaylandı. Yönlendiriliyorsunuz...
</div>
<?php
go(URL."/admin/index.php?do=bekleyen-uyeler",1);
}
}
?>
<?php } else { go(URL."/admin/index.php?do=uyeler"); } ?>