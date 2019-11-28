<?php 

$title = $site -> seo_title();
$description = $site -> seo_description();

?><!doctype html>
<html xml:lang="en" lang="en">
<head>
<title><?php echo $title; ?></title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
<?php if($description -> value()){ ?><meta name="description" content="<?php echo $description; ?>" /><?php } ?>

<!-- open graph -->
<meta property="og:title" content="<?php echo $title; ?>" />
<?php if($description -> value()){ ?><meta property="og:description" content="<?php echo $description; ?>" /><?php } ?>

<!-- css stylesheets -->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="//use.fontawesome.com/releases/v5.2.0/css/all.css" rel="stylesheet" type="text/css" /> 
<link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet" type="text/css" />
<?php 

$styles = '/css/style.css';
$stylesFile = $site->root().'/../'.$styles;

if(file_exists($stylesFile)){ ?>
<link href="<?php echo $styles; ?>?v=<?php echo filemtime($stylesFile); ?>" rel="stylesheet" type="text/css" /> 
<?php } ?>

<!--[if lt IE 9]>
<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

</head>

<body>

<header>

<div class="container">
	<div class="row">
		<div class="col-12">
			<span>Wibo.ca</span>
			<ul>
				<li><i class="fas fa-shopping-cart"></i></li>
				<li><i class="fa fa-bars"></i></li>
			</ul>
		</div>
	</div>
</div>

<div class="menu">
	<i class="fa fa-times"></i>
	<ul>
		<li><a href="#link1">Link 1</a></li>
		<li><a href="#link2">Link 2</a></li>
		<li><a href="#link3">Link 3</a></li>
		<li><a href="#link4">Link 4</a></li>
	</ul>
</div>	

</header> 

<main>