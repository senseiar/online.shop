<?php include ROOT . '/views/layouts/header_admin.php'; ?>
<?php require_once ROOT . '/views/layouts/admin_sidebar.php'; ?>
<?php require_once ROOT . '/views/admin_order/delete.php'; ?>
<section class="content container-fluid">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li class="active">Управление Заказами</li>
                </ol>
            </div>
            
            <h4>Список заказов</h4>

            <br/>

            <table class="table-bordered table-striped table">
                <tr>
                    <th>ID заказа</th>
                    <th>Имя покупателя</th>
                    <th>Телефон покупателя</th>
                    <th>Дата оформления</th>
                    <th>Статус</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach ($ordersList as $order): ?>
                    <tr>
                        <td><?php echo $order['id']; ?></td>
                        
                        <td><?php echo $order['user_name']; ?></td>

                        <td><?php echo $order['user_phone']; ?></td>

                        <td><?php echo $order['date']; ?></td>

                        <td><?php echo $order['status']; ?></td>
                         
                        <td><a href="/admin/order/view/<?php echo $order['id']; ?>" title="Подробнее"><i class="fa fa-eye"></i></a></td>
                        <td><a href="/admin/order/update/<?php echo $order['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><a type="button" id="modOrder" href="#" data-id="<?php echo $order['id']; ?>"><i class="fa fa-times"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>