<?php

class AdminController extends AdminBase
{
    public function actionIndex()
    {
        self::checkAdmin();

        $userId = User::checkLogged();

        require_once ROOT. '/views/admin/index.php';
        return true;
    }

}