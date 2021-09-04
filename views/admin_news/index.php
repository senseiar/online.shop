<?php include ROOT . '/views/layouts/header_admin.php'; ?>
<?php require_once ROOT . '/views/layouts/admin_sidebar.php'; ?>
<?php require_once ROOT . '/views/admin_news/delete.php'; ?>
<section class="content container-fluid">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li class="active">Управление статьями</li>
                </ol>
            </div>

            <a href="/admin/news/create" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить статью</a>
            
            <h4>Список статей</h4>

            <br/>

            <table class="table-bordered table-striped table">
                <tr>
                    <th>id</th>
                    <th>Заголовок</th>
                    <th>Автор</th>
                    <th>Описание</th>
                    <th>Дата</th>
                    <th></th>
                    <th></th>
                    
                </tr>
                <?php foreach ($articlesList as $article): ?>
                    <tr>
                        <td><?php echo $article['id']; ?></td>
                        <td><?php echo $article['title']; ?></td>
                        <td><?= $article['author'];  ?></td>
                        <td><?php echo $article['description']; ?></td>
                        <td><?php echo $article['date']; ?></td>  
                        <td><a href="/admin/news/update/<?php echo $article['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><a type="button" id="modArticle" href="#" data-id="<?php echo $article['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>