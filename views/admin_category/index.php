<?php require_once ROOT . '/views/layouts/header_admin.php'; ?>
<?php require_once ROOT . '/views/layouts/admin_sidebar.php'; ?>
<?php require_once ROOT . '/views/admin_category/delete.php'; ?>
<section class="content container-fluid">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li class="active">Управление категориями</li>
                </ol>
            </div>

            <a href="/admin/category/create" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить категорию</a>
            
            <h4>Список товаров</h4>

            <br/>

            <table class="table-bordered table-striped table">
                <tr>
                    <th>ID</th>
                    <th>Название категории</th>
                    <th>Порядковый номер категории</th>
                    <th>Статус</th>
                    <th>Ред.</th>
                    <th>Удалить</th>
                </tr>
                <?php foreach ($categoryList as $category): ?>
                    <tr>
                        <td><?php echo $category['id']; ?></td>
                        
                        <td><?php echo $category['name']; ?></td>

                        <td><?php echo $category['sort_order']; ?></td>

                        <td><?php echo $category['status']; ?></td>
                         
                        <td><a href="/admin/category/update/<?php echo $category['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><a type="button" id="modCategory" href="#" data-id="<?php echo $category['id']; ?>"><i class="fa fa-times"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
     
</section>

<?php require_once ROOT . '/views/layouts/footer_admin.php'; ?>