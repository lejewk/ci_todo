<html>
<head>
    <title>Todo List</title>
    <link rel="stylesheet" href="/assets/bootstrap-3.3.7-dist/css/bootstrap.css">
    <link rel="stylesheet" href="/assets/bootstrap-3.3.7-dist/css/bootstrap-theme.css">

    <link rel="stylesheet" href="/assets/style.css">
    <script type="text/javascript" href="assets/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="col-sm-6">
            <a href="/">CI Todo list</a>
        </div>
		<div class="col-sm-6">
		<?php if (isset($this->session->user)) { ?>
			<?php echo $this->session->user['username'] ?>
			<a href="/auth/logout/action">Logout</a>
		<?php } else { ?>
			<a href="/auth/login">Login</a>
			<a href="/auth/regist">Regist</a>
		<?php } ?>
		</div>
    </div>
</nav>
<div class="col-sm-6 col-sm-offset-3">
