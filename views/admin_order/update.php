<?php include ROOT . '/views/layouts/header_admin.php'; ?>
<?php require_once ROOT . '/views/layouts/admin_sidebar.php'; ?>
<section class="content container-fluid">


    <br />

    <div class="breadcrumbs">
        <ol class="breadcrumb">
            <li><a href="/admin">Админпанель</a></li>
            <li><a href="/admin/order">Управление заказами</a></li>
            <li class="active">Редактировать заказ</li>
        </ol>
    </div>


    <h3>Редактировать заказ #<?php echo $id; ?></h3>


    <div class="col-md-5">

        <form action="#" method="post">
            <div class="form-group">
                <label for="username">Имя клиента</label>
                <input type="text" name="userName" class="form-control" value="<?php echo $order['user_name']; ?>" id="username">
            </div>
            <div class="form-group">
                <label for="number">Телефон клиента</label>
                <input type="text" name="userPhone" class="form-control" value="<?php echo $order['user_phone']; ?>" id="number">
            </div>
            <div class="form-group">
                <label for="comment">Комментарий клиента</label>
                <input type="text" name="userComment" class="form-control" value="<?php echo $order['user_comment']; ?>" id="comment">
            </div>
            <div class="form-group">
                <label for="date">Дата оформления заказа</label>
                <input type="text" name="date" class="form-control" value="<?php echo $order['date']; ?>" id="date">
            </div>
            <div class="form-group">
                <label for="status">Статус</label>
                <select name="status" class="form-control" id="status">
                    <option value="0" <?php if ($order['status'] == 0) echo ' selected="selected"'; ?>>Отменен</option>
                    <option value="1" <?php if ($order['status'] == 1) echo ' selected="selected"'; ?>>Новый заказ</option>
                    <option value="2" <?php if ($order['status'] == 2) echo ' selected="selected"'; ?>>В обработке</option>
                    <option value="3" <?php if ($order['status'] == 3) echo ' selected="selected"'; ?>>Доставляется</option>
                    <option value="4" <?php if ($order['status'] == 4) echo ' selected="selected"'; ?>>Закрыт</option>
                </select>
            </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Сохранить">
        </form>

    </div>


</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>