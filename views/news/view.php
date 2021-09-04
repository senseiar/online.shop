<?php require_once ROOT . '/views/layouts/header.php'; ?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Категории</h2>
                    <div class="panel-group category-products">

                        <?php foreach ($categories as $catItem) : ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="/category/<?= $catItem['id'] ?>">
                                            <?= $catItem['name'] ?></a></h4>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>

                </div>
            </div>
            <div class="col-sm-9">
                <div class="blog-post-area">
                    <div class="single-blog-post">
                        <h2><?= $fullArticle['title']; ?></h2>
                        <div class="post-meta">
                            <ul>
                                <li><i class="fa fa-calendar"></i><?= $fullArticle['date']; ?></li>

                                <li><i class="fa fa-user"></i> <?= $fullArticle['author']; ?></li>
                            </ul>
                        </div>

                        <img src="<?= News::getImage($fullArticle['id']); ?>" alt="" width="500">

                        <p><?= $fullArticle['text']; ?></p>
                        <p>Автор: <strong><?= $fullArticle['author']; ?></strong></p>
                        <hr>
                        <div class="response-area">
                            <h2>Коментарии</h2>
                            <form method="post" id="comment_form" class="comment-form" data-id="<?= $fullArticle['id']; ?>">
                                <div class="comm-group">
                                    <div class="comm-username">Пользователь:<strong><?php echo ($_SESSION['user']) ? " ".User::getUserById($_SESSION['user'])['name'] : ' Неизвестно (не авторизован)'; ?></strong></p>
                                    </div>
                                    <div class="comm-group">
                                        <textarea name="сomm-content" id="comm-content" class="form-control" rows="5" placeholder="Комментарий..."></textarea>
                                    </div>
                                    
                                    <input type="hidden" name="comment_id" id="comment_id" value="0">
                                    <input type="submit" name="submit-comm" id="submit_comm" class="btn btn-default" value="Комментировать">
                                    <br>
                            </form>
                            <br>
                            <span id="comment_message">
                                <!-- comm message-->
                            </span>
                            <ul class="media-list" id="display-comment">
                                <!-- comments -->
                            </ul>
                        </div>

                        <!-- <li class="media second-media">
                                    <a class="pull-left" href="#">
                                        <img class="media-object" src="images/blog/man-three.jpg" alt="">
                                    </a>
                                    <div class="media-body">
                                        <ul class="sinlge-post-meta">
                                            <li><i class="fa fa-user"></i>Janis Gallagher</li>
                                            <li><i class="fa fa-clock-o"></i> 1:33 pm</li>
                                            <li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
                                        </ul>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                        <a class="btn btn-primary" href=""><i class="fa fa-reply"></i>Replay</a>
                                    </div>
                                </li> -->
                        <!--/Response-area-->
                    </div>

                    <hr>




                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once ROOT . '/views/layouts/footer.php'; ?>