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

    <div id="wrapper">

        <?php include "includes/header.php"; ?>

        <div id="content">
            <div class="container">
                <div class="row">
                    <section class="content_left col-md-8">
                        <div class="block">
                            <h3>Всі записи</h3>
                            <div class="block_content">
                                <div class="articles articles_horizontal">

                                    <?php
                                    $per_page = 4;
                                    $page = 1;
                                    if (isset($_GET['page'])) {
                                        $page = (int) $_GET['page'];
                                    }



                                    $total_count_q = mysqli_query($connection, "SELECT COUNT(`id`) AS `total_count` FROM `articles` ");
                                    $total_count = mysqli_fetch_assoc($total_count_q);
                                    $total_count = $total_count['total_count'];

                                    $total_pages = ceil($total_count / $per_page);
                                    if ($page <= 1 || $page > $total_pages) {
                                        $page = 1;
                                    }



                                    $offset = ($per_page * $page) - $per_page;

                                    $articles = mysqli_query($connection, "SELECT * FROM `articles` ORDER BY `id` DESC LIMIT $offset,$per_page");

                                    $articles_exist = true;
                                    if (mysqli_num_rows($articles) <= 0) {

                                        echo "Не знайдено жодної статі";
                                        $articles_exist = false;

                                    }

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
                                <?php
                                if ($articles_exist == true) {
                                    echo '<div class="paginator">';
                                    if ($page > 1) {
                                        echo '<a href="/articles.php?page=' . ($page - 1) . '">&laquo; Попередня сторінка</a>  ';

                                    }
                                    if ($page < $total_pages) {
                                        echo '<a href="/articles.php?page=' . ($page + 1) . '">Наступна сторінка &raquo;</a>';
                                    }
                                    echo '</div>';
                                }
                                ?>

                            </div>
                        </div>
                    </section>
                    <section class="content__right col-md-4">

                    </section>
                </div>
            </div>
        </div>

        <?php
        require_once "includes/footer.php"
            ?>
    </div>
</body>

</html>