<?php echo !defined("INDEX") ? header("Location: index.php") : null; ?>

<div class="row">
<div class="col-lg-12"><h2 class="page-header"><?php print $sayfa['simge']; ?> <?php echo $sayfa['sayfa_baslik']; ?></h2></div>
</div>
<div class="panel panel-default">
<div class="panel-body">
<?php echo $sayfa['sayfa_icerik']; ?>
</div>
</div>