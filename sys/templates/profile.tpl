<?php
global $db,$users;
    $prof = $db->Select("SELECT * FROM users WHERE id = '".$_GET['id']."'");
    $p = $db->Fetch_Array($prof);
?>
<div class="Black-Right">
<b><?php echo $p['username']; ?>'s</b> Stats<br />
<b>Motto: </b><?php echo $p['motto']; ?><br /> 
<b>Credits: </b><?php echo $p['credits']; ?><br />  
<b>Join Date: </b><?php echo $p['account_created']; ?><br />  
</div>
<?php
    $users->RetrieveFigure($_GET['id']);
?>
<div class="Long-Left">
<b><?php echo $p['username']; ?>'s</b> Badges<br />
</div>
