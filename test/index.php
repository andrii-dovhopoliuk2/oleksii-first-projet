<?php
 require "includes/config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>
		<?php echo $config['title']; ?>
	</title>
	<link rel="stylesheet" type="text/css" href="/media/fifa.css">



</head>

<body>

	<?php include "includes/header.php"; ?>

	<div id="wrapper">


		<div id="content">
			<div class="container">
				<div class="row">
					<section class="content_left col=md-8">
						<div class="block">
							<h3>Найновіше в блозі</h3>
							<a href="/articles.php">Всі записи</a>
							<div class="block_content">
								<div class="articles articles_horizontal">

									<?php
									$articles = mysqli_query($connection, "SELECT * FROM `articles` ORDER BY `id` DESC LIMIT 4");
									?>

									<?php
									while ($art = mysqli_fetch_assoc($articles)) {
										?>
										<article class="article">
											<div class="article_image"
												style="background-image: url(/static/images/<?php echo $art['image'] ?>);">
											</div>
											<div class="article_info">
												<a href="/article.php?article_id=<?php echo $art['id']; ?>">
													<?php echo $art['title'] ?>
												</a>
												<div class="articles_info_meta">

													<?php
													$art_cat = false;
													foreach ($categories as $cat) {
														if ($cat['id'] == $art['categorie_id']) {
															$art_cat = $cat;
															break;
														}
													}
													?>

													<small>Категорія: <a
															href="/articles.php?categorie=<?php echo $art_cat['id']; ?>">
															<?php echo $art_cat['title']; ?>
														</a></small>
												</div>
												<div class="articles_info_preview">
													<?php echo mb_substr(strip_tags($art['text']), 0, 30, 'utf-8') . ' ...'; ?>
												</div>
											</div>
										</article>




										<?php
									}
									?>
								</div>
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>
	</div>



	<div id="wrapper">


		<div class="block">
			<h3>Безпека [Найновіше]</h3>
			<a href="/articles.php">Всі записи</a>
			<div class="block_content">
				<div class="articles articles_horizontal">

					<?php
					$articles = mysqli_query($connection, "SELECT * FROM `articles` WHERE `categorie_id` = 10 ORDER BY `id` DESC LIMIT 4");
					?>

					<?php
					while ($art = mysqli_fetch_assoc($articles)) {
						?>
						<article class="article">
							<div class="article_image"
								style="background-image: url(/static/images/<?php echo $art['image'] ?>);"></div>
							<div class="article_info">
								<a href="/article.php?article_id=<?php echo $art['id']; ?>">
									<?php echo $art['title'] ?>
								</a>
								<div class="articles_info_meta">

									<?php
									$art_cat = false;
									foreach ($categories as $cat) {
										if ($cat['id'] == $art['categorie_id']) {
											$art_cat = $cat;
											break;
										}
									}
									?>

									<small>Категорія: <a href="/articles.php?categorie=<?php echo $art_cat['id']; ?>">
											<?php echo $art_cat['title']; ?>
										</a></small>
								</div>
								<div class="articles_info_preview">
									<?php echo mb_substr(strip_tags($art['text']), 0, 30, 'utf-8') . ' ...'; ?>
								</div>
							</div>
						</article>



						<?php
					}
					?>
				</div>
			</div>
		</div>
		</section>
	</div>
	</div>
	</div>
	</div>

	<div id="wrapper">


		<div class="block">
			<h3>Гра [Найновіше]</h3>
			<a href="/articles.php">Всі записи</a>
			<div class="block_content">
				<div class="articles articles_horizontal">

					<?php
					$articles = mysqli_query($connection, "SELECT * FROM `articles` WHERE `categorie_id` = 6 ORDER BY `id` DESC LIMIT 4");
					?>

					<?php
					while ($art = mysqli_fetch_assoc($articles)) {
						?>
						<article class="article">
							<div class="article_image"
								style="background-image: url(/static/images/<?php echo $art['image'] ?>);"></div>
							<div class="article_info">
								<a href="/article.php?article_id=<?php echo $art['id']; ?>">
									<?php echo $art['title'] ?>
								</a>
								<div class="articles_info_meta">

									<?php
									$art_cat = false;
									foreach ($categories as $cat) {
										if ($cat['id'] == $art['categorie_id']) {
											$art_cat = $cat;
											break;
										}
									}
									?>

									<small>Категорія: <a href="/articles.php?categorie=<?php echo $art_cat['id']; ?>">
											<?php echo $art_cat['title']; ?>
										</a></small>
								</div>
								<div class="articles_info_preview">
									<?php echo mb_substr(strip_tags($art['text']), 0, 30, 'utf-8') . ' ...'; ?>
								</div>
							</div>
						</article>



						<?php
					}
					?>
				</div>
			</div>
		</div>
		</section>
	</div>
	</div>
	</div>
	</div>

	<div id="wrapper">


		<div class="block">
			<h3>Lifestyle [Найновіше]</h3>
			<a href="/articles.php">Всі записи</a>
			<div class="block_content">
				<div class="articles articles_horizontal">

					<?php
					$articles = mysqli_query($connection, "SELECT * FROM `articles` WHERE `categorie_id` = 5 ORDER BY `id` DESC LIMIT 4");
					?>

					<?php
					while ($art = mysqli_fetch_assoc($articles)) {
						?>
						<article class="article">
							<div class="article_image"
								style="background-image: url(/static/images/<?php echo $art['image'] ?>);"></div>
							<div class="article_info">
								<a href="/article.php?article_id=<?php echo $art['id']; ?>">
									<?php echo $art['title'] ?>
								</a>
								<div class="articles_info_meta">

									<?php
									$art_cat = false;
									foreach ($categories as $cat) {
										if ($cat['id'] == $art['categorie_id']) {
											$art_cat = $cat;
											break;
										}
									}
									?>

									<small>Категорія: <a href="/articles.php?categorie=<?php echo $art_cat['id']; ?>">
											<?php echo $art_cat['title']; ?>
										</a></small>
								</div>
								<div class="articles_info_preview">
									<?php echo mb_substr(strip_tags($art['text']), 0, 30, 'utf-8') . ' ...'; ?>
								</div>
							</div>
						</article>



						<?php
					}
					?>
				</div>
			</div>
		</div>
		</section>
	</div>
	</div>
	</div>
	</div>

	<div id="wrapper">


		<div class="block">
			<h3>Програмування [Найновіше]</h3>
			<a href="/articles.php">Всі записи</a>
			<div class="block_content">
				<div class="articles articles_horizontal">

					<?php
					$articles = mysqli_query($connection, "SELECT * FROM `articles` WHERE `categorie_id` = 4 ORDER BY `id` DESC LIMIT 4");
					?>

					<?php
					while ($art = mysqli_fetch_assoc($articles)) {
						?>
						<article class="article">
							<div class="article_image"
								style="background-image: url(/static/images/<?php echo $art['image'] ?>);"></div>
							<div class="article_info">
								<a href="/article.php?article_id=<?php echo $art['id']; ?>">
									<?php echo $art['title'] ?>
								</a>
								<div class="articles_info_meta">

									<?php
									$art_cat = false;
									foreach ($categories as $cat) {
										if ($cat['id'] == $art['categorie_id']) {
											$art_cat = $cat;
											break;
										}
									}
									?>

									<small>Категорія: <a href="/articles.php?categorie=<?php echo $art_cat['id']; ?>">
											<?php echo $art_cat['title']; ?>
										</a></small>
								</div>
								<div class="articles_info_preview">
									<?php echo mb_substr(strip_tags($art['text']), 0, 30, 'utf-8') . ' ...'; ?>
								</div>
							</div>
						</article>



						<?php
					}
					?>
				</div>
			</div>
		</div>
		</section>
	</div>
	</div>
	</div>
	</div>

	<div id="wrapper">


		<div class="block">
			<h3>Хакірство [Найновіше]</h3>
			<a href="/articles.php">Всі записи</a>
			<div class="block_content">
				<div class="articles articles_horizontal">

					<?php
					$articles = mysqli_query($connection, "SELECT * FROM `articles` WHERE `categorie_id` = 11 ORDER BY `id` DESC LIMIT 4");
					?>

					<?php
					while ($art = mysqli_fetch_assoc($articles)) {
						?>
						<article class="article">
							<div class="article_image"
								style="background-image: url(/static/images/<?php echo $art['image'] ?>);"></div>
							<div class="article_info">
								<a href="/article.php?article_id=<?php echo $art['id']; ?>">
									<?php echo $art['title'] ?>
								</a>
								<div class="articles_info_meta">

									<?php
									$art_cat = false;
									foreach ($categories as $cat) {
										if ($cat['id'] == $art['categorie_id']) {
											$art_cat = $cat;
											break;
										}
									}
									?>

									<small>Категорія: <a href="/articles.php?categorie=<?php echo $art_cat['id']; ?>">
											<?php echo $art_cat['title']; ?>
										</a></small>
								</div>
								<div class="articles_info_preview">
									<?php echo mb_substr(strip_tags($art['text']), 0, 30, 'utf-8') . ' ...'; ?>
								</div>
							</div>
						</article>



						<?php
					}
					?>
				</div>
			</div>
		</div>
		</section>
	</div>
	</div>
	</div>
	</div>

	<div id="wrapper">


		<div class="block">
			<h3>Різне [Найновіше]</h3>
			<a href="/articles.php">Всі записи</a>
			<div class="block_content">
				<div class="articles articles_horizontal">

					<?php
					$articles = mysqli_query($connection, "SELECT * FROM `articles` WHERE `categorie_id` = 12 ORDER BY `id` DESC LIMIT 4");
					?>

					<?php
					while ($art = mysqli_fetch_assoc($articles)) {
						?>
						<article class="article">
							<div class="article_image"
								style="background-image: url(/static/images/<?php echo $art['image'] ?>);"></div>
							<div class="article_info">
								<a href="/article.php?article_id=<?php echo $art['id']; ?>">
									<?php echo $art['title'] ?>
								</a>
								<div class="articles_info_meta">

									<?php
									$art_cat = false;
									foreach ($categories as $cat) {
										if ($cat['id'] == $art['categorie_id']) {
											$art_cat = $cat;
											break;
										}
									}
									?>

									<small>Категорія: <a href="/articles.php?categorie=<?php echo $art_cat['id']; ?>">
											<?php echo $art_cat['title']; ?>
										</a></small>
								</div>
								<div class="articles_info_preview">
									<?php echo mb_substr(strip_tags($art['text']), 0, 30, 'utf-8') . ' ...'; ?>
								</div>
							</div>
						</article>



						<?php
					}
					?>
				</div>
			</div>
		</div>
		</section>
	</div>
	</div>
	</div>
	</div>




	<?php
	require_once "includes/sitebar.php"
		?>

	<?php
	require_once "includes/footer.php"
		?>

</body>

</html>