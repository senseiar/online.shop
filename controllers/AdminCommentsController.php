<?php

class AdminCommentsController extends AdminBase
{
    public function actionIndex()
    {
        self::checkAdmin();

        $commentsList = Comments::getCommentsAdmin();

        require_once ROOT . '/views/admin_comments/index.php';
        return true;
    }

    public function actionUpdate($id)
    {
        self::checkAdmin();

        $comment = Comments::getCommentById($id);

        if (isset($_POST['submit'])) {

            $options['comment'] = $_POST['comment'];
            $options['status'] = $_POST['status'];

            $errors = false;

            if (empty($options['comment'])) {
                $errors[] = 'поле комментария пустое';
            } 

            if ($errors == false){
                
                Comments::updateCommentById($id, $options);

                header("Location: /admin/comments");
            }


        }

        require_once ROOT . '/views/admin_comments/update.php';
        return true;
    }

    
    public function actionDelete($id)
    {
        self::checkAdmin();
  
        Comments::deleteCommentById($id);

        return true;
    }
}
