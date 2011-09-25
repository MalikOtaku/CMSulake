<div class="Big-Left">
<div class="box_header" id="blue">Random Users</div>
<?php
global $db, $users;
    $result = $db->Select("SELECT * FROM users ORDER BY rand() LIMIT 5");
    while($row = $db->Fetch_Array($result)){
        $users->RetrieveFigure($row['id']);
}
?>
</div>