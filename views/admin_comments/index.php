<?php include ROOT . '/views/layouts/header_admin.php'; ?>
<?php require_once ROOT . '/views/layouts/admin_sidebar.php'; ?>
<?php require_once ROOT . '/views/admin_comments/delete.php'; ?>
<section class="content container-fluid">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li class="active">Управление комментариями</li>
                </ol>
            </div>
            
            <h4>Список комментариев</h4>

            <br/>

            <table class="table-bordered table-striped table">
                <tr>
                    <th>id</th>
                    <th>Автор</th>
                    <th>Содержание</th>
                    <th>Дата</th>
                    <th>Статус</th>
                    <th>Ред.</th>
                    <th>Удалить</th>
                </tr>
                <?php foreach ($commentsList as $comment): ?>
                    <tr>
                        <td><?php echo $comment['id']; ?></td>
                        <td><?= $comment['author'];  ?></td>
                        <td><?php echo $comment['comment']; ?></td>
                        <td><?php echo $comment['date']; ?></td>
                        <?php if($comment['status'] == 1):?>
                        <td><?php echo 'Отображается' ?></td>
                        <?php else: ?>
                        <td><?php echo 'Скрыт' ?></td>   
                        <?php endif; ?>   
                        <td><a href="/admin/comments/update/<?php echo $comment['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><a type="button" id="modComment" href="#" data-id="<?php echo $comment['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>