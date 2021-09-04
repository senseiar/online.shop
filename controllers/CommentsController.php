<?php

class CommentsController 
{
    public function actionAddNewComment($articleId)
    {
        $сommContent = $_POST['сomm-content'];
        $userId = User::checkLogged();
        $parent = $_POST["comment_id"];
        $error = '';

        if ($userId == false) {
            $error .= '<p><div class="alert alert-warning alert-dismissible fade in comment_message"><strong>Залогинтесь</strong> чтобы оставить комментарий!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div></p>';
        } 
        
        if ($userId) {
            if (empty($_POST['сomm-content'])) {
                $error .= '<p><div class="alert alert-danger alert-dismissible fade in comment_message">Поле комментария <b>пустое</b>!<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div></p>';
            }

            if ($error == '') {
                Comments::addComment($сommContent, $articleId, $userId, $parent);
                $error .= '<p><div class="alert alert-success alert-dismissible fade in comment_message"><b>Успех!</b> Комментарий добавлен.<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div></p>';
            }
        }
           
        
        $data = array(
            'error'  => $error
        );

        //require_once ROOT. '/views/news/view.php';
        echo json_encode($data);
        //require_once ROOT. '/views/news/view.php';
        
    }

    public function actionLoadComments($articleId)
    {
        $userId = User::checkLogged();
        Comments::getArticleCommentsAjax($userId, $articleId);

        return true;
    }
}