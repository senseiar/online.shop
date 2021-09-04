<?php include ROOT . '/views/layouts/header_admin.php'; ?>
<?php require_once ROOT . '/views/layouts/admin_sidebar.php'; ?>
<?php require_once ROOT . '/views/admin_product/delete.php'; ?>
<section class="content container-fluid">

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li class="active">Управление товарами</li>
                </ol>
            </div>

            <a href="/admin/product/create" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить товар</a>
            
            <h4>Список товаров</h4>

          

            <table class="table-bordered table-striped table">
                <tr>
                    <th>ID товара</th>
                    <th>Артикул</th>
                    <th>Бренд</th>
                    <th>Название товара</th>
                    <th>Цена</th>
                    <th>Ред.</th>
                    <th>Удалить</th>
                </tr>
                <?php foreach ($productsList as $product): ?>
                    <tr>
                        <td><?php echo $product['id']; ?></td>
                        <td><?php echo $product['code']; ?></td>
                        <td><?php echo $product['brand']; ?></td>
                        <td><?php echo $product['name']; ?></td>
                        <td><?php echo $product['price']; ?></td>  
                        <td><a href="/admin/product/update/<?php echo $product['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><a type="button" id="delProd" href="#" data-id="<?php echo $product['id']; ?>"><i class="fa fa-times"></i></a></td>
                        <!-- <td><a id="delProd" href="/admin/product/delete/<?php //echo $product['id']; ?>"><i class="fa fa-times"></i></a</td> -->
                    </tr>
                <?php endforeach; ?>
            </table>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>
