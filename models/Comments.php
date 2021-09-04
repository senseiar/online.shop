<?php

class Comments
{
    public static function addComment($сommContent, $articleId, $userId, $parent)
    {
        $db = Db::getConnection();

        $sql = 'INSERT INTO comments (parent_id, article_id, user_id, comment) VALUES (:parent_id, :article_id, :user_id, :comment)';

        $res = $db->prepare($sql);
        $res->bindParam(':parent_id', $parent, PDO::PARAM_INT);
        $res->bindParam(':article_id', $articleId, PDO::PARAM_INT);
        $res->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $res->bindParam(':comment', $сommContent, PDO::PARAM_STR);
            
        return $res->execute();
    }

    public static function getArticleCommentsAjax($userId, $articleId)
    {
        $db = Db::getConnection();

        // article_id - '.$articleId.' AND
        $sql = 'SELECT * FROM comments WHERE article_id = '.$articleId.' AND parent_id = 0 AND status = 1 ORDER by id DESC';

       
        $stat = $db->query($sql);
        
       
        $stat->setFetchMode(PDO::FETCH_ASSOC);
        $comments = $stat->fetchAll();
        array_unique($comments);

        $output = '';
      
        foreach ($comments as $comment) {
            
            $comment['author'] = News::getCommentAuthorById($comment['user_id']);
            
            $output .= '
                <li class="media">
                   <div class="media-body">
                        <ul class="sinlge-post-meta">
							<li><i class="fa fa-user"></i>' . $comment['author'] . '</li>
							
							<li><i class="fa fa-calendar"></i> ' . $comment['date'] . '</li>
						</ul>
                    <div class="comment-text">'. $comment['comment']. '</div>
            ';

            if ($comment['user_id'] == $userId) {
               $output  .= '<button type="button" class="hidden" id="'.$comment['id'].'"><i class="fa fa-reply"></i>Replay</button>
               </li>';
            }
            else
            {
                $output  .= '<button type="button" class="btn btn-primary reply" id="'.$comment['id'].'"><i class="fa fa-reply"></i>Replay</button>
               </li>';
            }
            
            $output .= self::getReplyComment($userId, $comment['id']);
        }

        echo $output;
    }
    
    public static function getReplyComment($userId, $parentId = 0, $marginLeft = 0)
    {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM comments WHERE parent_id = '. $parentId .' AND status = 1 ORDER by id DESC';

        $result = $db->prepare($sql);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $comments = $result->fetchAll();
        $count = $result->rowCount();
        array_unique($comments);
        $output = '';
        
        if($parentId == 0) {
        $marginLeft = 0;
        } else {
        $marginLeft += 48;
        }
        if ($count > 0) {
            foreach ($comments as $comment) {
                $comment['author'] = News::getCommentAuthorById($comment['user_id']);
                //style="margin-left: '.$marginLeft.'px
                $output .= '
                <li class="media" style="margin-left: '.$marginLeft.'px">
                   <div class="media-body">
                        <ul class="sinlge-post-meta">
							<li><i class="fa fa-user"></i>' . $comment['author'] . '</li>
							<li><i class="fa fa-calendar"></i> ' . $comment['date'] . '</li>
						</ul>
                    <div class="comment-text">'. $comment['comment']. '</div>
                ';

                if ($comment['user_id'] == $userId) {
                    $output  .= '<button type="button" class="hidden" id="' . $comment['id'] . '"><i class="fa fa-reply"></i>Replay</button>
                    </li>';
                } else {
                    $output  .= '<button type="button" class="btn btn-primary reply" id="' . $comment['id'] . '"><i class="fa fa-reply"></i>Replay</button>
                    </li>';
                }

                $output .= self::getReplyComment($userId, $comment["id"], $marginLeft);
            }
           
        }
       
       return $output;
    }

    public static function getCommentsAdmin()
    {
        $db = Db::getConnection();

        $commentsList = [];

        $res = $db->query('SELECT * FROM comments ORDER BY id DESC');
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $comments = $res->fetchAll();
        $commentsList = [];

        foreach ($comments as $row) {
            
            $row['author'] = News::getCommentAuthorById($row['user_id']);
            array_push($commentsList, $row);
        }

        return $commentsList;
    }

    public static function getCommentById($id)
    {
        $id = intval($id);

        if ($id) {

            $db = Db::getConnection();
            $singleComment = [];

            $result = $db->query('SELECT * FROM comments WHERE id=' . $id);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $singleComment = $result->fetch();
            
            $singleComment['author'] = News::getArticleAuthorById($singleComment['user_id']);
            $author = $singleComment['author'];

            array_push($singleComment, $author);

            return $singleComment;
        }
        
        
    }

    public static function deleteCommentById($id)
    {
        $db = Db::getConnection();

        $sql = 'DELETE FROM comments WHERE id = :id';

        $result = $db->prepare($sql);

        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();

    }

    public static function updateCommentById($id, $options)
    {
        $db = Db::getConnection();

        $sql = 'UPDATE comments SET comment = :comment, status = :status WHERE id = :id';

        $res = $db->prepare($sql);
        if (!$res) {
            print_r($db->errorInfo());
        } else {
            $res->bindParam(':id', $id, PDO::PARAM_INT);
            
            $res->bindParam(':comment', $options['comment'], PDO::PARAM_STR);
            $res->bindParam(':status', $options['status'], PDO::PARAM_INT);

            return $res->execute();
        }
    }
}