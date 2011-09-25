<div class="Box-Right">
    Not a <b><?php echo Name; ?></b> User? <a href="register.php?step=1"><b>Register!</b></a>
    <form  action= "login.php" method="post">
    <p><label for="title">Username</label><br>
    <input type="text" name="name" value="" maxlength="48"/></p>
    <p><label for="title">Password</label><br>
    <input type="password" name="password" value="" maxlength="48"/></p>
    <input type="submit" class="button" value="Submit"/> 
    </form>
</div>