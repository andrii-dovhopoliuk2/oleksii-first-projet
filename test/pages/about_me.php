<?php
require "../includes/config.php";
?>


<?php
require "../includes/config.php";
?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="../media/fifa.css">
</head>
<body>
	<div id="wrapper">
		<?php
 		include "../includes/header.php";
		?>
		<div id="content">
			<div class="container">
				<div class="row">
					<selection class="content_left col=md-8">
					<h3>Про мене</h3>
					<div class="block_content">
						<div class="full_text">
							Привіт, мене звати Олексій
						</div>
					</div>
				</selection>
				<selection class="content_right col=md-4">
					<?php
					include "../includes/sitebar.php";
					?>
				</selection>
			</div>
		</div>
		<?php
		require_once "../includes/footer.php"
		?>
	</div>
</body>
</html>