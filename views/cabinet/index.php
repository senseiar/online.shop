<?php require_once ROOT . '/views/layouts/header.php'?>
    <section id="cabinet">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Личный кабинет</h2>
                    <h3>Привет <?= $user['name'] ?></h3>
                    <ul>
                        <li><a href="/cabinet/edit">- Редактировать данные</a></li>
                        <li><a href="/cabinet/history">- Список покупок</a></li>
                    </ul>

                </div>
            </div>
        </div>
    </section>
<?php require_once ROOT . '/views/layouts/footer.php'?>