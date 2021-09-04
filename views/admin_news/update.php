<?php include ROOT . '/views/layouts/header_admin.php'; ?>
<?php require_once ROOT . '/views/layouts/admin_sidebar.php'; ?>
<section class="content container-fluid">

    <div class="breadcrumbs">
        <ol class="breadcrumb">
            <li><a href="/admin">Админпанель</a></li>
            <li><a href="/admin/news">Управление статьями</a></li>
            <li class="active">Изменить статью</li>
        </ol>
    </div>


    <h4>Изменить статью #<?= $id; ?></h4>


    <div class="col-md-12">
        <?php if (isset($errors) && is_array($errors)) : ?>
            <ul>
                <?php foreach ($errors as $error) : ?>
                    <li> - <?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Название статьи</label>
                <input type="text" name="title" class="form-control" value="<?= $article['title'] ?>">
            </div>
            <div class="form-group">
                <label for="image">Изображение статьи</label><br>
                <img src="<?= News::getImage($article['id']) ?>" width="200" alt="">
                <br><br>
                <input type="file" name="image" width="200" id="image">
            </div>
            <div class="form-group">
                <label>Описание</label>
                <textarea id="thumb" name="description" rows="10" cols="70"><?= $article['description'] ?></textarea>
            </div>
            <div class="form-group">
                <label>Текст статьи</label>
                <textarea id="textEditor" name="text" rows="25" cols="100"><?= $article['text'] ?></textarea>
            </div>
            <div class="form-group">
                <label for="date">Дата</label>
                <input type="text" name="date" class="form-control" value="<?= $article['date'] ?>" id="date">
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