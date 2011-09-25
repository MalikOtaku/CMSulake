<div class="Big-Left">
<?php
global $db, $users;
    $news = $db->Select("SELECT * FROM news WHERE id = '".$_GET['id']."'");

    while($n = $db->Fetch_Array($news)){
            echo '<div class="box_header" id="red">'.$n['title'].'</div>';
            echo 'Posted by <b>'.$n['author'].'</b> on <b>'.$n['date'].'</b><br><br>';
            echo '<i>'.$n['snippet'].'</i>';
            echo '<br><br>';
            echo $n['story'];
        }   
        echo '<br><br>';
        echo '<div class="box_header" id="blue">Comments</div>';

    $comment = $db->Select("SELECT * FROM comments WHERE story = '".$_GET['id']."'");
    if (is_null($comment)){
        echo 'No one has commented yet, so be the first!<br />';
      }else{
    while($c = $db->Fetch_Array($comment)){
        $user = $db->Select("SELECT * FROM users WHERE id = '".$c['user']."'");
            while($u = $db->Fetch_Array($user)){
                echo '<div class="Avatar">'.$users->RetrieveFigure($u['id']).'</div>';
                echo '<div class="CommentBox">';
                echo 'Posted by <b><a href="profile.php?id='.$u['id'].'">'.$u['username'].'</a></b> on '.$c['date'];
                echo '<div class="Comment">'.$c['message'].'</div>';
                echo '</div>';
            }
        }
    }
?>
</div>
<div class="Small-Right">
<div class="box_header" id="green">News Articles</div>
<?php
echo '<center>';
 $result = $db->Select("SELECT * FROM news WHERE not id = '".$_GET['id']."' ORDER BY timestamp DESC LIMIT 5");

    while($row = $db->Fetch_Array($result)){
        echo '<a href="./article.php?id='.$row['id'].'"><b>'.$row['title'].'</b></a>';
        echo '<br>';
        echo '<i>'.$row['snippet'].'</i>';
    }
echo '</center>';
?>
</div>