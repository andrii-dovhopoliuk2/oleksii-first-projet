<?php
//print_r(__DIR__);
require __DIR__."/config.php";
//require ("includes/config.php");
?>
<<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="../media/fifa5.css">
</head>
<body>
<div id="wrapper">
	<header id="header">
		<div class="header_top">
			<div class="container">
				<div class="header_top_logo">
					<h1><?php echo $config['title']; ?></h1>

				</div>
				<nav class="header_top_menu">
					<ul>
						<li><a href="/">Головна</a></li>
						<li><a href="../pages/about_me.php">Про мене</a></li>
						<li><a href="https://music.youtube.com/playlist?list=PLBdfjMptqt1EzQ7BRAY-UjIPJvffxlwwK&si=BoNdhJIO_y7uRBAm" target="blank">Мій плейлист</a></li>
					</ul>
				</nav>
			</div>
		</div>

		<?php
		$categories_q = mysqli_query($connection, "SELECT * FROM `articals categori`");
		$categories = array();
		while ( $cat = mysqli_fetch_assoc($categories_q) )
		{
			$categories[] = $cat;
		}
		?>

		<div class="header_bottom">
			<div class="container">
				<nav>
					<ul>
					<?php
					foreach( $categories as $cat )
					{
						?>
						<li><a href="/articles.php?categorie=<?php echo $cat['id'];?>"><?php echo $cat['title']; ?></a></li>
						<?php
					}
					?>

					</ul>
				</nav>
			</div>
		</div>
	</header>


</body>
</html>


