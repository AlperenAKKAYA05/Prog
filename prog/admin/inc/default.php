<?php echo !defined("ADMIN") ? header("Location: kontrol.php") : null; ?>
<div id="wrapper">
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="<?php echo URL."/admin"; ?>"><?php echo $ayar['site_title']; ?> Admin</a>
</div>
<ul class="nav navbar-right top-nav">
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php print session('kadi'); ?> <b class="caret"></b></a>
<ul class="dropdown-menu">
<li><a href="<?php print URL."/admin/"?>profil"><i class="fa fa-fw fa-user"></i> Profil</a></li>
<li><a href="<?php print URL."/admin/"?>profil-ayarlar"><i class="fa fa-fw fa-gear"></i> Ayarlar</a></li>
<li class="divider"></li>
<li><a href="<?php print URL."/admin/"?>cikis-yap"><i class="fa fa-fw fa-power-off"></i> Çıkış Yap</a></li>
</ul>
</li>
</ul>
<div class="collapse navbar-collapse navbar-ex1-collapse">
<ul class="nav navbar-nav side-nav">
<li><a href="<?php print URL."/admin/"?>"><i class="fa fa-fw fa-dashboard"></i> Yönetim Paneli</a></li>
<li>
<a href="<?php print URL."/admin/"?>icerikler"><i class="fa fa-fw fa-file"></i> İçerikler</a>
<ul>
<li><a href="<?php print URL."/admin/"?>icerik-ekle"><i class="fa fa-fw fa-file-text"></i> İçerik Ekle</a></li>
<li><a href="<?php print URL."/admin/"?>icerikler"><i class="fa fa-fw fa-edit"></i> İçerikleri Düzenle</a></li>
<li><a href="<?php print URL."/admin/"?>bekleyen-icerikler"><i class="fa fa-fw fa-spinner"></i> Bekleyen İçerikler</a></li>
</ul>
</li>
<li>
<a href="<?php print URL."/admin/"?>sayfalar"><i class="fa fa-fw fa-file-text-o"></i> Sayfalar</a>
<ul>
<li><a href="<?php print URL."/admin/"?>sayfa-ekle"><i class="fa fa-fw fa-plus"></i> Sayfa Ekle</a></li>
<li><a href="<?php print URL."/admin/"?>sayfalar"><i class="fa fa-fw fa-edit"></i> Sayfaları Düzenle</a></li>
</ul>
</li>
<li>
<a href="<?php print URL."/admin/"?>kategoriler"><i class="fa fa-fw fa-folder"></i> Kategoriler</a>
<ul>
<li><a href="<?php print URL."/admin/"?>kategori-ekle"><i class="fa fa-fw fa-folder-open"></i> Kategori Ekle</a></li>
<li><a href="<?php print URL."/admin/"?>kategoriler"><i class="fa fa-fw fa-edit"></i> Kategorileri Düzenle</a></li>
</ul>
</li>
<li>
<a href="<?php print URL."/admin/"?>uyeler"><i class="fa fa-fw fa-users"></i> Üyeler</a>
<ul>
<li><a href="<?php print URL."/admin/"?>uye-ekle"><i class="fa fa-fw fa-user"></i> Üye Ekle</a></li>
<li><a href="<?php print URL."/admin/"?>uyeler"><i class="fa fa-fw fa-edit"></i> Üyeleri Düzenle</a></li>
<li><a href="<?php print URL."/admin/"?>bekleyen-uyeler"><i class="fa fa-fw fa-users"></i> Onay Bekleyen Üyeler</a></li>
</ul>
</li>
<li><a href="<?php print URL."/admin/"?>ayarlar"><i class="fa fa-fw fa-cog"></i> Site Ayarları</a></li>
<li><a href="<?php print URL."/admin/"?>reklamlar"><i class="fa fa-fw fa-try"></i> Reklamlar</a></li>
<li><a target="_blank" href="<?php echo URL; ?>"><i class="fa fa-fw fa-globe"></i> Siteyi Göster</a></li>
<li><a></a></li>
<footer class="text-center">
<p>Copyright © 2018 Tüm Hakları Saklıdır. | <a href="<?php echo URL; ?>"><?php echo ss($ayar['site_title']); ?></a></p>
</footer>
</ul>
</div>
</nav>
<div id="page-wrapper">
<div class="container-fluid">
<?php
$do = g("do");
if(file_exists("inc/{$do}.php")){
require("inc/{$do}.php");
} else {
require("inc/anasayfa.php");
}
?>
</div>
</div>
</div>