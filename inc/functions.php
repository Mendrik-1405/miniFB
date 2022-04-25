<?php
include("connection.php");
function check_log($email,$mdp)
{
    mysqli_set_charset(dbconnect(), "utf8");
    $sql="select idmembre from membre where email='%s' and motdepasse='%s';";
    $sql=sprintf($sql,$email,$mdp);
    // echo $sql;
    $result = mysqli_query(dbconnect(), $sql);
    $row=mysqli_fetch_assoc($result);
    return $row;
}

function get_news($id)
{
    $sql="SELECT * FROM news WHERE id='%s'";
    $sql=sprintf($sql,$id);
    $news_req = mysqli_query(dbconnect(),$sql );
    $result=mysqli_fetch_assoc($news_req);
    mysqli_free_result($news_req);    
    return $result;
}

function get_comment($news_id)
{
    $sql="SELECT * FROM commentaires WHERE news_id='%s'";
    $sql=sprintf($sql,$news_id);
    $comment_req = mysqli_query(dbconnect(), $sql );
    $result = array();
    while ($comment = mysqli_fetch_array($comment_req)) {
        $result[] = $comment;
    }
    mysqli_free_result($comment_req);
    return $result;
}

function insert_comment($comment)
{
    
    $sql="INSERT INTO commentaires SET news_id='%d', auteur='%s', texte='%s', date=NOW()";
    $sql=sprintf($sql, $comment['news_id'],$comment['auteur'], $comment['texte']);
    mysqli_query(dbconnect(), $sql);

}

?>