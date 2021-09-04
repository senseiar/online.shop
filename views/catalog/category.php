<?php require_once ROOT . '/views/layouts/header.php'?>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="left-sidebar">
                            <h2>Категории</h2>
                            <div class="panel-group category-products">

                                <?php foreach($categories as $catItem): ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a  href="/category/<?= $catItem['id'] ?>" 
                                            class="<?php if ($categoryId == $catItem['id']) echo 'active';?>">
                                                <?= $catItem['name'] ?>
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                                
                            </div>

                        </div>
                    </div>

                    <div class="col-sm-9 padding-right">
                        <div class="features_items"><!--features_items-->
                            <h2 class="title text-center">Товары в категории</h2>

                            <?php foreach($catProducts as $catProd): ?>

                            <div class="col-sm-4">
                                <div class="catuct-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="<?= Product::getImage($catProd['id']); ?>" alt="" />
                                            <h2><?= $catProd['price'] ?> грн</h2>
                                            <p><a href="/product/<?= $catProd['id'] ?>">
                                                <?= $catProd['name'] ?>
                                            </a></p>
                                            
                                            <a href="#" data-id="<?= $catProd['id'] ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                        </div>

                                    <?php if($catProd['is_new']): ?>
                                        <img src="/template/images/home/new.png" class="new">
                                    <?php endif; ?>

                                    </div>
                                </div>
                            </div>

                            <?php endforeach; ?>

                            
                        </div><!--features_items-->

                        <div class="col-md-5 col-md-offset-5">                    
                            <?php echo $pagination->get() ?>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <?php require_once ROOT . '/views/layouts/footer.php'?>
