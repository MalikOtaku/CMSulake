<div class="Big-Right">
<div class="box_header" id="green">Staff List</div>
<?php
global $db,$users,$funcs;
    $staff = $db->Select("SELECT * FROM ranks ORDER BY rank DESC");

    if ($staff != null){
        while($s = $db->Fetch_Array($staff)){
            $user = $db->Select("SELECT * FROM users WHERE rank = '".$s['rank']."' ORDER BY rank DESC");

            while($u = $db->Fetch_Array($user)){
                echo $users->GetFigure($u['id']).'style="float:left" />';
                echo '<div class="Username"><b>'.$u['username'].' ('.$s['name'].')</b></div>';
                echo '<div class="Mottoo">'.$u['motto'].'</div>';
                $funcs->RetrieveImage('./gallery/badges/'.$s['badge']);
            }
        }
    }
?>
</div>