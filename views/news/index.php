<?php require_once ROOT . '/views/layouts/header.php'; ?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-8 ">
                <div class="blog-post-area">
                    <h2 class="title text-center">Последние записи в блоге</h2>
                    <?php foreach ($articles as $article) : ?>

                        <div class="single-blog-post">
                            <h3><?= $article['title']; ?></h3>
                            <div class="post-meta">
                                <ul>
                                    <li><i class="fa fa-calendar"></i><?= $article['date']; ?></li>
                                    <li><i class="fa fa-user"></i><?= $article['author']; ?></li>
                                </ul>
                            </div>
                            <a href="/news/<?= $article['id'] ?>">
                                <img src="<?= News::getImage($article['id']); ?>" alt="" width="400">
                            </a>
                            <p><?= $article['description']; ?></p>
                            <a class="btn btn-primary" href="/news/<?= $article['id'] ?>">Читать полностью</a>
                        </div>
                        <hr>
                    <?php endforeach; ?>


                   
                        <div class="col-md-5 col-md-offset-5">                    
                                <?php echo $pagination->get() ?>
                        </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>
<?php require_once ROOT . '/views/layouts/footer.php'; ?>