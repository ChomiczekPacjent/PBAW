<!doctype html>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php out($page_description); if (!isset($page_description)) {  ?> Opis domyślny ... <?php } ?>">
	<title><?php out($page_title); if (empty($page_title)) {  ?> Tytuł domyślny ... <?php } ?></title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/purecss@3.0.0/build/pure-min.css" integrity="sha384-X38yfunGUhNzHpBaEBsWLO+A0HDYOQi8ufWDkZ0k9e0eXz/tH3II7uKZ9msv++Ls" crossorigin="anonymous">

	<link rel="stylesheet" href="<?php print(_APP_URL); ?>/css/style.css">	
</head>
<body>

<div class="header">
	<h1><?php out($page_title); if (!isset($page_title)) {  ?> Tytuł domyślny ... <?php } ?></h1>
	<h2><?php out($page_header); if (!isset($page_header)) {  ?> Tytuł domyślny ... <?php } ?></h1>
	<p>
		<?php out($page_description); if (!isset($page_description)) {  ?> Opis domyślny ... <?php } ?>
	</p>
</div>

<div class="content">