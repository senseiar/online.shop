<?php require_once ROOT . '/views/layouts/header.php' ?>


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

                <div class="col-sm-9 padding-right">
                    <div class="features_items">
                        <!--features_items-->
                        <h2 class="title text-center">Результаты поиска</h2>
                        <?php if ($foundProducts) : ?>
                            <h3 class="title-search">Товары</h3>
                            <?php foreach ($foundProducts as $foundProduct) : ?>

                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="<?= Product::getImage($foundProduct['id']); ?>" alt="" />
                                                <h2><?= $foundProduct['price'] ?> грн</h2>
                                                <p><a href="/product/<?= $foundProduct['id'] ?>">
                                                        <?= $foundProduct['name'] ?>
                                                    </a></p>
                                                <a href="#" data-id="<?= $foundProduct['id'] ?>" class="btn btn-default add-to-cart">
                                                    <i class="fa fa-shopping-cart"></i>В корзину</a>
                                            </div>

                                            <?php if ($foundProduct['is_new']) : ?>
                                                <img src="/template/images/home/new.png" class="new">
                                            <?php endif; ?>

                                        </div>
                                    </div>
                                </div>

                            <?php endforeach; ?>
                        <?php else : ?>
                            <p>По данному запросу ничего не найдено.</p>
                        <?php endif; ?>
                    </div>

                    <?php if ($foundCategories) : ?>

                        <div class="col-sm-12">
                            <div class="features_items">

                                <h3 class="title-search">Категории</h3>
                                <?php foreach ($foundCategories as $foundCategory) : ?>
                                    <div class="category-wrapper text-center">
                                        <a href="/category/<?= $foundCategory['id'] ?>"><?= $foundCategory['name'] ?></a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                    <?php endif; ?>


                </div>


            </div>
        </div>


    </section>
    <script>
        window.history.pushState('', '', '/search');
    </script>

    <?php require_once ROOT . '/views/layouts/footer.php' ?>