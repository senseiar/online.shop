<?php include ROOT . '/views/layouts/header_admin.php'; ?>
<?php require_once ROOT . '/views/layouts/admin_sidebar.php'; ?>
<section class="content container-fluid">

    <div class="breadcrumbs">
        <ol class="breadcrumb">
            <li><a href="/admin">Админпанель</a></li>
            <li><a href="/admin/comments">Управление комментариями</a></li>
            <li class="active">Изменить комментарий</li>
        </ol>
    </div>


    <h3>Изменить комментарий #<?= $id; ?></h3>
    <div class="col-md-7">
        <h4>Комментарий пользователя <em><?= $comment['author'] ?></em>:</h4>
        <?php if (isset($errors) && is_array($errors)) : ?>
            <ul>
                <?php foreach ($errors as $error) : ?>
                    <li> - <?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <form action="" method="post">
            <div class="form-group">
                <label>Текст комментария:</label>
                <textarea id="textEditor" name="comment" rows="10"><?= $comment['comment'] ?></textarea>
            </div>
            <div class="form-group">
                <label>Дата:</label>
                <span><em><?= $comment['date'] ?></em></span>
            </div>
            <div class="form-group">
                <label for="status">Статус:</label>
                <select name="status" class="form-control" id="status">
                    <option value="1" <?php if ($comment['status'] == 1) echo ' selected="selected"'; ?>>Отображается</option>
                    <option value="0" <?php if ($comment['status'] == 0) echo ' selected="selected"'; ?>>Скрыт</option>
                </select>
            </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Сохранить">
        </form>
    </div>



</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>