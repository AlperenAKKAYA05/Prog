<?php echo !defined("INDEX") ? header("Location: ../../index.php") : null; ?>
<?php 
require_once "sistem/ayar.php";
?>
<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="Crpsem">
<html>
    <head>
        <meta charset="UTF-8">
        <title>Under Maintenance | Coco - Responsive Bootstrap Admin Template</title>   
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="description" content="">
        <meta name="keywords" content="coco bootstrap template, coco admin, bootstrap,admin template, bootstrap admin,">
        <meta name="author" content="Huban Creative">

        <!-- Base Css Files -->
        <link href="<?php echo URL."/assets/"; ?>libs/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <link href="<?php echo URL."/assets/"; ?>/libs/fontello/css/fontello.css" rel="stylesheet" />
        <link href="<?php echo URL."/assets/"; ?>/libs/animate-css/animate.min.css" rel="stylesheet" />
        <link href="<?php echo URL."/assets/"; ?>/libs/nifty-modal/css/component.css" rel="stylesheet" />

        <!-- Code Highlighter for Demo -->
        <link href="<?php echo URL."/assets/"; ?>/libs/prettify/github.css" rel="stylesheet" />
        
                <!-- Extra CSS Libraries Start -->
                <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
                <!-- Extra CSS Libraries End -->
        <link href="<?php echo URL."/assets/"; ?>/css/style-responsive.css" rel="stylesheet" />

    </head>
    <body class="fixed-left login-page">
	<!-- Begin page -->
	<div class="container">
		<div class="full-content-center">
			<div class="maintenance animated flipInX">
				<div class="">
					<h1><i class="icon-wrench"></i><br>
					Sitemiz Bakımda</h1>
					<h2>Bir süre sonra tekrar giriş yapmayı deneyebilirsiniz.</h2>
				</div>
			</div>
			
		</div>
	</div>
	
	</body>
</html>