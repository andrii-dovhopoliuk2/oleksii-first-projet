<?php
require "includes/config.php";
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_STRICT);
// declare(strict_types=1);
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Блог айті мінімаліста</title>
	<link rel="stylesheet" type="text/css" href="/media/fifa.css">


</head>

<body>
	<div id="wrapper">
		<?php require "includes/header.php"; ?>

		<?php
		$article = mysqli_query($connection, "SELECT * FROM `articles` WHERE `id` = " . (int) $_GET['article_id']);
		// print_r(mysqli_num_rows ($article));
		// die;
		
		if (mysqli_num_rows($article) <= 0) {
			?>
			<div id="content">
				<div class="container">
					<div class="row">
						<selection class="content_left col=md-8">
							<div class="block">
								<h3>Статі не знайдено</h3>
								<div class="block_content">
									<div class="full_text">
										Даної статі не існує
									</div>
								</div>
						</selection>
						<selection class="content_right col=md-4">
							<?php
							include "includes/sitebar.php";
							?>
						</selection>
					</div>
				</div>
			</div>
			<?php
		} else {
			$art = mysqli_fetch_assoc($article);
			mysqli_query($connection, "UPDATE `articles` SET `views` = `views` + 1 WHERE `id` = " . (int) $_GET['article_id'])
				?>
			<div id="content">
				<div class="container">
					<div class="row">
						<selection class="content__left col-md-8">
							<div class="block">
								<a>
									<?php echo $art['views']; ?> Переглядів
								</a>
								<h3>
									<?php echo $art['title']; ?>
								</h3>
								<div class="block_content">
									<img src="/static/images/<?php echo $art['image']; ?>" style="max-width: 100%;">
									<div class="full_text">
										<?php echo $art['text']; ?>
									</div><br><br>

									<div class="block">
										<a href="#comment-add-form">Добавити коментар</a>
										<h3>Коментарі</h3>
										<div class="block_content">
											<div class="articles articles_vertical">

												<?php

												$comments = mysqli_query($connection, "SELECT * FROM `Coment` WHERE `articles_id` = " . (int) $art['id'] . " ORDER BY `id` DESC");


												if (mysqli_num_rows($comments) <= 0) {
													echo "Немає коментарів";
												}

												while ($comment = mysqli_fetch_assoc($comments)) {
													?>
													<article class="article">
														<div class="article_image" style="background-image: url(https:
											//www.gravatar.com/avatar/<?php echo md5($comment['email']); ?>?s=125);"></div>

														<div class="article_info">
															<a href="/article.php?id=<?php

															echo $comment['article_id']; ?>">
																<?php echo $comment['author']; ?>
															</a>
															<div class="articles_info_meta"></div>
															<div class="articles_info_preview">
																<?php echo $comment['text']; ?>

															</div>
														</div>
													</article>
													<?php
												}
												?>
											</div>
										</div>
									</div>


									<div id="comment-add-form" class="block">
										<h3>Додати свій коментар</h3>
										<div class="block_content">
											<form class="form" method="POST"
												action="/article.php?article_id=<?php echo $art['id']; ?>#comment-add-form">
												<?php
												if (isset($_POST['do_post'])) {
													$errors = array();

													if ($_POST['name'] == '') {
														$errors[] = 'Ведіть імя';
													}
													if ($_POST['nickname'] == '') {
														$errors[] = 'Ведіть нікнейм';
													}
													if ($_POST['email'] == '') {
														$errors[] = 'Ведіть email';
													}
													if ($_POST['text'] == '') {
														$errors[] = 'Ведіть текст';
													}
													if (empty($errors)) {
														// добавити коментар
											
														mysqli_query($connection, "INSERT INTO `Coment` (`author`, `nickname`, `email`, `text`, `pubdate`, `articles_id`) VALUES ('" . $_POST['name'] . "', '" . $_POST['nickname'] . "', '" . $_POST['email'] . "', '" . $_POST['text'] . "', NOW(), '" . $art['id'] . "')
														");

														echo '<span style="color: green;font-weight: bold;margin-bottom: 10px;display: block;">
													Коментар успішно додано
													</span>';
													} else {
														// вивести помилку на екран
														echo '<span style="color: red;font-weight: bold;">' . $errors['0'] . '<hr>' . '</span>';
													}
												}
												?>
												<div class="form__group">
													<div class="row">
														<div class="col-md-4">
															<input type="text" name="name" class="form_control"
																placeholder="Імя" value="<?php echo $_POST['name']; ?>">
														</div>
														<div class="col-md-4">
															<input type="text" name="nickname" class="form_control"
																placeholder="Нікнейм"
																value="<?php echo $_POST['nickname']; ?>">
														</div>
														<div class="col-md-4">
															<input type="text" name="email" class="form_control"
																placeholder="Email (не буде показано)"
																value="<?php echo $_POST['email']; ?>">
														</div>
													</div>
												</div>
												<div class="form__group">
													<textarea class="form_control" name="text"
														placeholder="Текст коментаря ..."></textarea>
												</div>
												<div class="form__group">
													<input type="submit" name="do_post" value="Добавити коментар"
														class="form_control">
												</div>
											</form>
										</div>
									</div>


						</selection>
						<selection class="content__right col-md-4">
						</selection>
					</div>
				</div>
			</div>
			<?php
		}
		?>


</body>

</html>