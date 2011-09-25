<div class="Small-Right">
<div class="box_header" id="green">News Articles</div>
<?php
global $db;
echo '<center>';
 $result = $db->Select("SELECT * FROM news ORDER BY timestamp DESC LIMIT 5");

    while($row = $db->Fetch_Array($result)){
        echo '<a href="./article.php?id='.$row['id'].'"><b>'.$row['title'].'</b></a>';
        echo '<br>';
        echo '<i>'.$row['snippet'].'</i><br>';
    }
echo '</center>';
?>
</div>

