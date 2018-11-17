<?php
echo !defined("ADMIN") ? header("Location: kontrol.php") : null;
$id = g("id");
$kategorim = rows("SELECT * FROM kategoriler WHERE kategori_id='{$id}'", $db);
if($kategorim>0){
?>
<div class="row"><div class="col-lg-12"><h1 class="page-header"><i class="fa fa-folder-open"></i> Kategori Sil</h1></div></div>
<?php $delete = row("UPDATE kategoriler SET kategori_onay=0 WHERE kategori_id='{$id}'", $db); if($delete){ ?>
<div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<i class="fa fa-folder-open"></i><strong> Kategori</strong> başarıyla silindi. Yönlendiriliyorsunuz...
</div>
<?php go(URL."/admin/index.php?do=kategoriler",1); } } else { go(URL."/admin"); } ?>