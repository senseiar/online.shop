<?php include ROOT . '/views/layouts/header_admin.php'; ?>
<?php require_once ROOT . '/views/layouts/admin_sidebar.php'; ?>
<section class="content container-fluid">




    <div class="breadcrumbs">
        <ol class="breadcrumb">
            <li><a href="/admin">Админпанель</a></li>
            <li><a href="/admin/product">Управление товарами</a></li>
            <li class="active">Редактировать товар</li>
        </ol>
    </div>


    <h4>Редактировать товар #<?php echo $id; ?></h4>


    <div class="col-md-7">
        <?php if (isset($errors) && is_array($errors)) : ?>
            <ul>
                <?php foreach ($errors as $error) : ?>
                    <li> - <?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Название товара</label>
                <input type="text" class="form-control" name="name" placeholder="" value="<?php echo $product['name']; ?>" id="name">
            </div>
            <div class="form-group">
                <label for="articul">Артикул</label>
                <input type="text" class="form-control" name="code" placeholder="" value="<?php echo $product['code']; ?>" id="articul">
            </div>
            <div class="form-group">
                <label for="price">Стоимость, $</label>
                <input type="text" class="form-control" name="price" placeholder="" value="<?php echo $product['price']; ?>" id="price">
            </div>
            <div class="form-group">
                <label for="category">Категория</label>
                <select name="category_id" class="form-control" id="category">
                    <?php if (is_array($categoriesList)) : ?>
                        <?php foreach ($categoriesList as $category) : ?>
                            <option value="<?php echo $category['id']; ?>" <?php if ($product['category_id'] == $category['id']) echo ' selected="selected"'; ?>>
                                <?php echo $category['name']; ?>
                            </option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="manf">Производитель</label>
                <input type="text" name="brand" class="form-control" placeholder="" value="<?php echo $product['brand']; ?>" id="manuf">
            </div>
            <div class="form-group">
                <label for="image">Изображение товара</label><br>
                <img src="<?= Product::getImage($product['id']); ?>" width="200" alt="" />
                <br>
                <br>
                <input type="file" name="image" placeholder="" value="" id="image">
            </div>
            <div class="form-group">
                <label for="thumb">Детальное описание</label>
                <textarea id="thumb" class="form-control" name="description"><?php echo $product['description']; ?></textarea>
            </div>
            <div class="form-group">

                <label for="avail">Наличие на складе</label>
                <select name="availability" class="form-control" id="avail">
                <option value="1" <?php if ($product['availability'] == 1) echo ' selected="selected"'; ?>>Да</option>
                    <option value="0" <?php if ($product['availability'] == 0) echo ' selected="selected"'; ?>>Нет</option>
                </select>

            </div>
            <div class="form-group">
                <label for="new">Новинка</label>
                <select name="is_new" class="form-control" id="new">
                <option value="1" <?php if ($product['is_new'] == 1) echo ' selected="selected"'; ?>>Да</option>
                    <option value="0" <?php if ($product['is_new'] == 0) echo ' selected="selected"'; ?>>Нет</option>
                </select>
            </div>
            <div class="form-group">
                <label for="rec">Рекомендуемые</label>
                <select name="is_recommended" class="form-control" id="rec">
                <option value="1" <?php if ($product['is_recommended'] == 1) echo ' selected="selected"'; ?>>Да</option>
                    <option value="0" <?php if ($product['is_recommended'] == 0) echo ' selected="selected"'; ?>>Нет</option>
                </select>
            </div>

            <div class="form-group">
                <label for="status">Статус</label>
                <select name="status" class="form-control" id="status">
                <option value="1" <?php if ($product['status'] == 1) echo ' selected="selected"'; ?>>Отображается</option>
                    <option value="0" <?php if ($product['status'] == 0) echo ' selected="selected"'; ?>>Скрыт</option>
                </select>

            </div>

            <input type="submit" name="submit" class="btn btn-primary" value="Сохранить">



        </form>

    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>