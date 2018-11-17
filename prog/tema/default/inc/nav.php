<?php echo !defined("INDEX") ? header("Location: index.php") : null; ?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
<div class="container">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="<?php echo URL; ?>"><i class="fa fa-diamond"></i> <?php echo ss($ayar['site_title']); ?></a>
</div>
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<ul class="nav navbar-nav">
<?php
	foreach(row("SELECT * FROM sayfalar INNER JOIN simgeler ON sayfalar.sayfa_simge=simgeler.simge_id WHERE menu=1", $db) as $kayit){
?>
<li><a href="<?php print URL."/p/".$kayit['sayfa_link']; ?>"><?php print $kayit['simge']; ?> <?php print $kayit['sayfa_baslik']; ?></a></li>
<?php
	}
?>
</ul>
<form action="<?php echo URL."/ara.html"; ?>" method="get" class="navbar-form navbar-right">
<div class="input-group">
<input type="text" pattern=".{3,255}" required title="En Az 3 Karakter Olmalı" placeholder="Arama yapın..." name="q" class="form-control">
<span class="input-group-btn">
<button class="btn btn-default form-control" type="submit"><i class="fa fa-search"></i></button>
</span>
</div>
</form>
</div>
</div>
</nav>