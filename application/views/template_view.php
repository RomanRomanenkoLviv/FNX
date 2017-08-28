<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<title>FNX Journals</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

		<link rel="stylesheet" type="text/css" href="/css/jquery-ui.min.css">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="/css/style.css" />

		<script src="/js/jquery-1.11.1.min.js"></script>
	</head>
	<body>
<section class="menu">
	<div class="logo">
		<a href="/">FNX</a>
	</div>
	<div class="smenu">
		<a href="/category" class="item">Categories</a>
		<a href="/author" class="item">Authors</a>
	</div>
	<div class="user">
		<?php require_once "application/models/Users.php";
		$userinfo = new Users;
		$user = $userinfo->get_user();
		if($user === false){ ?>
			<p class="login">Please, <a href="/login">login</a></p>
		<?php }else{ ?>
			<p>Hello, <?= $user['username'] ?>! Your wallet: <?= $user['wallet'] ?> units. <a class="exit" href="/exit">exit</a></p>
		<?php } ?>
	</div>
</section>
<?php include 'application/views/'.$content_view; ?>
</body>
</html>