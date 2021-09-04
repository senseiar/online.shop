<?php

class News
{

    const SHOW_BY_DEFAULT = 3;

    public static function getTotalArticles()
    {

        $db = Db::getConnection();

        
        $sql = 'SELECT count(id) AS count FROM news';

       
        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $articles = $result->fetch();

        return $articles["count"];
    }

    public static function getArticlesList($page = 1)
    {
        $page = intval($page);
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

        $db = Db::getConnection();

        
        $sql = 'SELECT * FROM news ORDER by id ASC LIMIT ' . self::SHOW_BY_DEFAULT . 
        ' OFFSET ' . $offset;

        $result = $db->query($sql);

        if ($result) {
            $articles = $result->fetchAll();

            $articlesList = [];
            foreach ($articles as $article) {
                $article['author'] = self::getArticleAuthorById($article['user_id']);
                array_push($articlesList, $article);
            }

            return $articlesList;
        } //else {
        //     print_r($db->errorInfo());
        // }
        

        
    }

    public static function getArticlesAdmin()
    {
        
        $db = Db::getConnection();

        
        $sql = 'SELECT * FROM news ORDER by id ASC';

       
        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $articles = $result->fetchAll();

        $articlesList = [];
        foreach ($articles as $article) {
            $article['author'] = self::getArticleAuthorById($article['user_id']);
            array_push($articlesList, $article);
        }

        return $articlesList;
    }

    public static function getArticleById($id)
    {
        $id = intval($id);

        if ($id) {
            $db = Db::getConnection();

            
            $result = $db->query('SELECT * FROM news WHERE id=' . $id);
            $result->setFetchMode(PDO::FETCH_ASSOC);

            $singleArticle = [];
            $singleArticle = $result->fetch();
            
           
            $singleArticle['author'] = self::getArticleAuthorById($singleArticle['user_id']);
            array_push($singleArticle, $singleArticle['author']);
            

            return $singleArticle;

        }

    }

    public static function getArticleAuthorById($user_id)
    {
        $db = Db::getConnection();

        $sql = "SELECT name FROM user WHERE id = $user_id";
        
        $result = $db->query($sql);
       
        if ($result) {
            // return username
            $result->setFetchMode(PDO::FETCH_ASSOC);
            return $result->fetch()['name'];
        } else {
            return null;
        }
    }

    public static function getCommentAuthorById($user_id)
    {
        $db = Db::getConnection();

        $sql = "SELECT name FROM user WHERE id = $user_id";
        
        $result = $db->query($sql);
       
        if ($result) {
            // return username
            $result->setFetchMode(PDO::FETCH_ASSOC);
            return $result->fetch()['name'];
        } else {
            return null;
        }
    }

    public static function createArticle($options)
    {
        $db = Db::getConnection();

        $sql = 'INSERT INTO news (title, description, user_id, text, date)' . 
        'VALUES '. 
        '(:title, :description, :user_id, :text, :date)';

        $res = $db->prepare($sql);
        $res->bindParam(':title', $options['title'], PDO::PARAM_STR);
        $res->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $res->bindParam(':text', $options['text'], PDO::PARAM_STR);
        $res->bindParam(':user_id', $options['user_id'], PDO::PARAM_INT);
        $res->bindParam(':date', $options['date'], PDO::PARAM_STR);
        
        //$res->bindParam(':status', $options['status'], PDO::PARAM_INT);

        if ($res->execute()) {
           return $db->lastInsertId();
        }
        return 0;
    }
    
    public static function deleteArticleById($id)
    {
        $db = Db::getConnection();

        $sql = 'DELETE FROM news WHERE id = :id';

        $result = $db->prepare($sql);

        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    public static function updateArticleById($id, $options)
    {
        $db = Db::getConnection();

        $sql = 'UPDATE news SET title=:title, description=:description, user_id=:user_id, text=:text, date=:date '
        . 'WHERE id = :id';

        $res = $db->prepare($sql);
        if (!$res) {
            print_r($db->errorInfo());
        } else {

            $res->bindParam(':id', $id, PDO::PARAM_INT);
            $res->bindParam(':title', $options['title'], PDO::PARAM_STR);
            $res->bindParam(':description', $options['description'], PDO::PARAM_STR);
            $res->bindParam(':text', $options['text'], PDO::PARAM_STR);
            $res->bindParam(':user_id', $options['user_id'], PDO::PARAM_INT);
            $res->bindParam(':date', $options['date'], PDO::PARAM_STR);

            //$res->bindParam(':status', $options['status'], PDO::PARAM_INT);

            return $res->execute();
        }
        
    }

    public static function getImage($id)
    {
        $noImage = 'noimage.jpg';

        $path = '/upload/images/news/';

        $imageName = 'article-' . $id;

        $pathToArticleImage = $path . trim($imageName) . '.jpg';
 
        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pathToArticleImage)) {
            return $pathToArticleImage;
        }

        return $path . $noImage;
    }

   
    // public static function getArticleComments($articleId)
    // {
    //     $db = Db::getConnection();

        
    //     $sql = 'SELECT * FROM comments WHERE article_id = '. $articleId .' ORDER by id DESC';

       
    //     $result = $db->query($sql);
    //     $result->setFetchMode(PDO::FETCH_ASSOC);
    //     $comments = $result->fetchAll();

    //     $commentsList = [];
    //     foreach ($comments as $comment) {
    //         $comment['author'] = self::getCommentAuthorById($comment['user_id']);
    //         array_push($commentsList, $comment);
    //     }

    //     return $commentsList;
    // }

   

   
}