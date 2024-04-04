<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="assests/css/style.css">

	<title>Absentees & Late Comers</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description"
		content="The web based alert and reporting system for absentees and late comers of an organization" />
	<meta name="keywords" content="Absentees,late comers" />
	<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery.scrolly.min.js"></script>
	<script src="js/jquery.dropotron.min.js"></script>
	<script src="js/jquery.scrollex.min.js"></script>
	<script src="js/skel.min.js"></script>
	<script src="js/skel-layers.min.js"></script>
	<script src="js/init.js"></script>
	<noscript>
		<link rel="stylesheet" href="css/skel.css" />
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/style-xlarge.css" />
	</noscript>
</head>

<body class="landing"><!-- Header -->
	<header id="header">
		<h1 id="logo"><a href="../abs">WELCOME</a></h1>
		<nav id="nav">
			<ul>
				<li><a href="index.php">HOME</a></li>
				<li>
					<a href="">LOG-IN</a>
					<ul>
						<li><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#studModal"
								data-image-id="1">
								STUDENT
							</button></li>
						<li><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staffModal"
								data-image-id="1">
								STAFF
							</button></li>
						<li><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#gateModal"
								data-image-id="1">
								GATE
							</button></li>
						<li>
							<!-- <a href="">Submenu</a>
									<ul>
										<li><a href="#">Option 1</a></li>
										<li><a href="#">Option 2</a></li>
										<li><a href="#">Option 3</a></li>
										<li><a href="#">Option 4</a></li>
									</ul> -->
						</li>
					</ul>
				</li>
				<li><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#adminModal"
						data-image-id="1">
						Admin
					</button></li>
			</ul>
		</nav>
	</header>
	<?php
	include ("login.php");
	?>
	<!-- Banner -->
	<section id="banner">
		<div class="content">
			<header>
				<h2>Absentees & Late Comers</h2>
				<p>Alert & Reporting<br /></p>
			</header>
			<span class="image"><img src="images/educ.png" alt="" /></span>
		</div>
		<!-- <a href="#one" class="goto-next scrolly">Next</a> -->
	</section>

	<!-- Bootstrap JS and dependencies -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script>
		window.onpageshow = function (event) {
			if (event.persisted) {
				window.location.reload();
			}
		};
	</script>
</body>

</html>