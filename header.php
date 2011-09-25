
<div id="logo"><h1><a href=".."><?php echo Name; ?></h1></a></div>
<div class="container">
    <?php if (NAVI && TAB_ID != 0){ ?>
    <div class="header">
    <div class="Online-Users">0 Online<br /> <?php if (isset($_SESSION['name'])){ echo '<a href="logout.php">Log Out</a>';}; ?></div>
    <!-- Navigator Code!!-->
    <br />
    <div class="navi">
    <?php    
    $result = $db->Select("SELECT * FROM head_navi WHERE rank <= '".$user[$_SESSION['id']]['rank']."' ORDER BY id ASC");        
    while($row = $db->Fetch_Array($result)){
            echo '<div class="navb"><a href="'.$row['url'].'">'.$row['name'].'</a></div>';
        }
    ?>    
    </div>
    </div>
    <?php
     $sub = $db->Select("SELECT * FROM sub_navi WHERE parent = '".TAB_ID."'");
    if ($sub != null){
            echo '<div class="subnavi">';
        while ($s = $db->Fetch_Array($sub)){
            echo '<div class="subButton"><a href="'.$s['url'].'">'.$s['name'].'</a></div>';
            }
            echo '</div>';
            echo '<hr>';
        }
    }
    ?>
    <div class="BoxContainer">
