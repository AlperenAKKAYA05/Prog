<?php
echo !defined("ADMIN") ? header("Location: kontrol.php") : null; 
session_destroy();
go(URL."/admin",1);
?>
<div class="row">
<div class="col-lg-12">
<h1 class="page-header"><i class="fa fa-cell"></i> Çıkış Yaptınız</h1>
</div>
</div>	
<div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<i class="fa fa-check"></i> Başarıyla <strong> Çıkış Yaptınız.</strong>
</div>