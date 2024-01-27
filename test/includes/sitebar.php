<<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="../media/fifa6.css">

</head>
<body>
	<div id="wrapper">
		<div class="block">
							<h3>Найбільш читаєме</h3>
							<a href="/articles.php">Всі записи</a>
							<div class="block_content">
								<div class="articles articles_horizontal">

							<?php
								$articles = mysqli_query($connection, "SELECT * FROM `articles`  ORDER BY `views` DESC LIMIT 4");
							?>

								<?php
								while( $art = mysqli_fetch_assoc($articles))
								{

									?>
									<article class="article">
										<div class="article_image" style="background-image: url(/static/images/<?php echo $art['image'] ?>);"></div>
										<div class="article_info">
											<a href="/article.php?article_id=<?php echo $art ['id']; ?>"><?php echo $art['title']?></a>
											<div class="articles_info_meta">

												<?php
												$art_cat = false;
												foreach ($categories as $cat )
												{
													if( $cat['id'] == $art['categorie_id'])
													{
														$art_cat = $cat;
														break;
													}
												}
												?>

												<small>Категорія: <a href="/articles.php?categorie=<?php echo $art_cat['id']; ?>"><?php echo $art_cat['title']; ?></a></small>
											</div>
											<div class="articles_info_preview"><?php echo mb_substr(strip_tags($art['text']), 0,30, 'utf-8') . ' ...'; ?></div>
										</div>
									</article>



									<?php
								}
								?>
			</div>
		</div>
	</div>
</div>


								<div id="wrapper">
									<div class="block">
								<h3>Коментарі</h3>
							<a href="/articles.php?article_id">Всі записи</a>
							<div class="block_content">
								<div class="articles articles_horizontal">

							<?php
								$comments = mysqli_query($connection, "SELECT * FROM `Coment`  ORDER BY `id` DESC LIMIT 4");
							?>

								<?php
								while( $coment = mysqli_fetch_assoc($comments))
								{

									?>
									<article class="article">
										<div class="article_image" style="background-image: url(/static/images/<?php echo $art['image'] ?>);"></div>
										<div class="article_info">
											<a href="/article.php?article_id=<?php echo $coment ['articles_id']; ?>"><?php echo $coment['author']?></a>
											<div class="articles_info_meta">

												<?php
												$art_cat = false;
												foreach ($categories as $cat )
												{
													if( $cat['id'] == $art['categorie_id'])
													{
														$art_cat = $cat;
														break;
													}
												}
												?>


											</div>
											<div class="articles_info_meta"></div>
											<div class="articles_info_preview"><?php echo mb_substr(strip_tags($coment['text']), 0,30, 'utf-8') . ' ...'; ?></div>
										</div>

									</article>



									<?php
								}
								?>
			</div>
		</div>
	</div>
</div>

</body>
</html>




