<?php require_once ROOT . '/views/layouts/header_admin.php'; ?>
<?php require_once ROOT . '/views/layouts/admin_sidebar.php'; ?>
<section class="content container-fluid">
    <div class="breadcrumbs">
        <ol class="breadcrumb">
            <li><a href="/admin">Админпанель</a></li>
            <li><a href="/admin/category">Управление категориями</a></li>
            <li class="active">Редактировать категорию</li>
        </ol>
    </div>


    <h4>Редактировать категорию #<?php echo $id; ?></h4>

    <div class="col-md-4">
        <?php if (isset($errors) && is_array($errors)) : ?>
            <ul>
                <?php foreach ($errors as $error) : ?>
                    <li> - <?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Название категории:</label>
                <input type="text" name="name" class="form-control" value="<?= $category['name']; ?>" id="name">
            </div>
            <div class="form-group">
                <label for="num">Порядковый номер:</label>
                <input type="text" name="sort_order" class="form-control" id="num" value="<?= $category['sort_order']; ?>">
            </div>
            <div class="form-group">
                <label for="status">Статус:</label>
                <select name="status" class="form-control" id="status">
                    <option value="1" selected="selected">Отображается</option>
                    <option value="0">Скрыта</option>
                </select>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>

</section>

<?php require_once ROOT . '/views/layouts/footer_admin.php'; ?>