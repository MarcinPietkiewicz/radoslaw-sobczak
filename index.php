<!DOCTYPE html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="assets/mystyle.css" type="text/css" />
	<link rel="stylesheet" href="assets/all.min.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="description" content="Radosław Sobczak - Pianist - Official Website" />
	<meta name="keywords" content="Radosław, Sobczak, Radek, Pianist" />
	<meta name="robots" content="index, follow" />
	<meta name="revisit-after" content="1 month" />
	<title>Radosław Sobczak - Pianist - Official Website</title>
</head>

<body>
<?php include 'protected/functions.php' ?>
	<div class="kontener">
		<div id="title">Radosław Sobczak</div>
		<br>
		<nav>
			<ul>
				<li><a href="#first-popup" class="first-popup-link">Bio</a></li>
				<li><a class="simple-ajax-popup" href="concerts.php">Concerts</a></li>
				<li>
					<div class="popup-gallery"><a href="assets/radoslaw_sobczak_cd1.jpg" title="Live performances: Bach, Haydn, Chopin, Rachmaninov, Lutosławski">CD</a><a href="assets/radoslaw_sobczak_cd2.jpg" title="Beethoven - Piano Sonatas No. 1, No. 23, No. 32"></a><a href="assets/radoslaw_sobczak_cd3.jpg" title="Paderewski - Utwory fortepianowe"></a><a href="assets/radoslaw_sobczak_cd4.jpg" title="Szymanowski - Utwory fortepianowe"></a>
				</li>
				<li><a class="simple-ajax-popup" href="contact.php">Contact</a></li>
			</ul>
		</nav>
		<div class="zdjecie"><img src="assets/radek.jpg" /></div>
		<!-- Contents of first window -->
		<div id="first-popup" class="mfp-hide white-popup">
			<div class="jezyki">ENG</a> | <a href="#second-popup" class="second-popup-link">POL</a>
				| <a href="#third-popup" class="third-popup-link">KOR</a> | <a href="#fourth-popup" class="fourth-popup-link">CHI</a> | <a href="#fifth-popup" class="fifth-popup-link">JPN</a></div>
		<?php read_file_to_bio_modal('ENG','bio') ?>


		</div>
		<!-- Contents of second window -->
		<div id="second-popup" class="mfp-hide white-popup">
			<div class="jezyki"><a href="#first-popup" class="first-popup-link">ENG </a>| POL |
				<a href="#third-popup" class="third-popup-link">KOR</a> | <a href="#fourth-popup" class="fourth-popup-link">CHI</a> | <a href="#fifth-popup" class="fifth-popup-link">JPN</a></div>
			<?php read_file_to_bio_modal('POL','bio') ?>

		</div>
		<!-- Contents of third window -->
		<div id="third-popup" class="mfp-hide white-popup">
			<div class="jezyki"><a href="#first-popup" class="first-popup-link">ENG</a> | <a href="#second-popup" class="second-popup-link">POL</a>
				| KOR | <a href="#fourth-popup" class="fourth-popup-link">CHI</a> | <a href="#fifth-popup" class="fifth-popup-link">JPN</a></div>
			<?php read_file_to_bio_modal('KOR','bio') ?>

		</div>
		<!-- Contents of fourth window -->
		<div id="fourth-popup" class="mfp-hide white-popup">
			<div class="jezyki"><a href="#first-popup" class="first-popup-link">ENG</a> | <a href="#second-popup" class="second-popup-link">POL</a>
				| <a href="#third-popup" class="third-popup-link">KOR</a> | CHI | <a href="#fifth-popup" class="fifth-popup-link">JPN</a></div>
			<?php read_file_to_bio_modal('CHI','bio') ?>

		</div>
		<!-- Contents of fifth window -->
		<div id="fifth-popup" class="mfp-hide white-popup">
			<div class="jezyki"><a href="#first-popup" class="first-popup-link">ENG</a> | <a href="#second-popup" class="second-popup-link">POL</a>
				| <a href="#third-popup" class="third-popup-link">KOR</a> | <a href="#fourth-popup" class="fourth-popup-link">CHI</a> | JPN</div>
			<?php read_file_to_bio_modal('JPN','bio') ?>
		</div>
		<br><br><br><br><br><br>
		<div class="stopka"><a href="https://github.com/MarcinPietkiewicz" target="_blank">Web design by Marcin Pietkiewicz</a>
		<div><a href="login.php">Login</>
	</div>
	<!--<script src="assets/css3-mediaqueries.js"></script>-->
	<script src="assets/jquery.min.js"></script>
	<script src="assets/jquery.magnific-popup.min.js"></script>
	<script src="assets/index.js"></script>

</body>

</html>