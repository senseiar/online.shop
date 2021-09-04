<?php include ROOT . '/views/layouts/header_admin.php'; ?>
<?php require_once ROOT . '/views/layouts/admin_sidebar.php'; ?>
<section class="content container-fluid">

    <div class="breadcrumbs">
        <ol class="breadcrumb">
            <li><a href="/admin">Админпанель</a></li>
            <li><a href="/admin/news">Управление статьями</a></li>
            <li class="active">Добавить статью</li>
        </ol>
    </div>

    <h4>Добавить новую статью</h4>
   

    <div class="col-md-12">
    
        <?php if (isset($errors) && is_array($errors)) : ?>
            <ul>
                <?php foreach ($errors as $error) : ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Название статьи</label>
                <input type="text" class="form-control" name="title" value="" id="title">
            </div>

            <div class="form-group">
                <label for="image">Изображение статьи</label>
                <input type="file" name="image" value="" id="image">
            </div>

            <div class="form-group">
                <label for="thumb">Описание</label>
                <textarea id="thumb" class="form-control" name="description" rows="10" cols="70"></textarea>
            </div>

            <div class="form-group">
                <label for="textEditor">Текст статьи</label>
                <textarea id="textEditor" class="form-control" name="text" rows="25" cols="100"></textarea>
            </div>

            <div class="form-group">
                <label for="date">Дата</label>
                <input type="text" id="date" class="form-control" name="date" placeholder="" value="<?= date("Y-m-d H:i:s") ?>">
            </div>
            <!-- <p>Статус</p>
                        <select name="status">
                            <option value="1" selected="selected">Отображается</option>
                            <option value="0">Скрыт</option>
                        </select> -->
            <input type="submit" name="submit" class="btn btn-primary" value="Сохранить">
        </form>

    </div>


</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>