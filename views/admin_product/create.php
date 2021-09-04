<?php require_once ROOT . '/views/layouts/header_admin.php'; ?>
<?php require_once ROOT . '/views/layouts/admin_sidebar.php'; ?>
<section class="content container-fluid">


    <div class="breadcrumbs">
        <ol class="breadcrumb">
            <li><a href="/admin">Админпанель</a></li>
            <li><a href="/admin/product">Управление товарами</a></li>
            <li class="active">Редактировать товар</li>
        </ol>
    </div>


    <h4>Добавить новый товар</h4>


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
                <input type="text" class="form-control" name="name" placeholder="" value="" id="name">
            </div>
            <div class="form-group">
                <label for="articul">Артикул</label>
                <input type="text" class="form-control" name="code" placeholder="" value="" id="articul">
            </div>
            <div class="form-group">
                <label for="price">Стоимость, $</label>
                <input type="text" class="form-control" name="price" placeholder="" value="" id="price">
            </div>
            <div class="form-group">
                <label for="category">Категория</label>
                <select name="category_id" class="form-control" id="category">
                    <?php if (is_array($categoriesList)) : ?>
                        <?php foreach ($categoriesList as $category) : ?>
                            <option value="<?php echo $category['id']; ?>">
                                <?php echo $category['name']; ?>
                            </option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="manf">Производитель</label>
                <input type="text" name="brand" class="form-control" placeholder="" value="" id="manuf">
            </div>
            <div class="form-group">
                <label for="image">Изображение товара</label>
                <input type="file" name="image" placeholder="" value="" id="image">
            </div>
            <div class="form-group">
                <label for="thumb">Детальное описание</label>
                <textarea id="thumb" class="form-control" name="description"></textarea>
            </div>
            <div class="form-group">

                <label for="avail">Наличие на складе</label>
                <select name="availability" class="form-control" id="avail">
                    <option value="1" selected="selected">Да</option>
                    <option value="0">Нет</option>
                </select>

            </div>
            <div class="form-group">
                <label for="new">Новинка</label>
                <select name="is_new" class="form-control" id="new">
                    <option value="1" selected="selected">Да</option>
                    <option value="0">Нет</option>
                </select>
            </div>
            <div class="form-group">
                <label for="rec">Рекомендуемые</label>
                <select name="is_recommended" class="form-control" id="rec">
                    <option value="1" selected="selected">Да</option>
                    <option value="0">Нет</option>
                </select>
            </div>

            <div class="form-group">
                <label for="status">Статус</label>
                <select name="status" class="form-control" id="status">
                    <option value="1" selected="selected">Отображается</option>
                    <option value="0">Скрыт</option>
                </select>

            </div>

            <input type="submit" name="submit" class="btn btn-primary" value="Сохранить">



        </form>

    </div>

</section>

<?php require_once ROOT . '/views/layouts/footer_admin.php'; ?>