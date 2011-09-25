<?php
namespace Sulake;

class Functions
    {
        function RetrieveImage($dir){
            if (!file_exists($dir)){
                echo(Err.'Dude that image couldn\'t be located!');
                return;
            }
            echo '<img src="'.$dir.'" />';
        }
        
        function SetTitle($title){
            echo '<title>'.$title.'</title>';
        }
        function RegisterCSS($dir){
            echo '<link rel="stylesheet" type="text/css" href="'.$dir.'" />';
        }
        function LoggedIn(){
            return isset($_SESSION['username']);
        }
        
        function Error($prefix, $error)
	{
            echo 'CMSulake[<b>'.$prefix.'</b>]: '.$error;
	}
        
        function Secure($var) 
        { 
            return mysql_real_escape_string(htmlspecialchars($var)); 
        }
        
        function GenerateSSO($username){
            return 'Sulake-'.$username;
        }
        function SulakeHash($var){
            return sha1(md5($var));
        }
        function Redirect($path){
        if ($path == ".."){
            $path = 'index';
        }
        
        $php = strpos($path, '.php');
               
        if ($path != '..' && $php == false){
            $path = $path.'.php';
        }

        header('Location: '.$path);
        } 
        function AddUser($username, $password, $email){           
            Database::Query("INSERT INTO users(username, password, mail, auth_ticket, motto, account_created, ip_reg) VALUES ('".$username."',
                '".$password."' , '".$email."' , '".$this->GenerateSSO($username)."', 'This is a Motto', '".date('d-m-y')."', '".$_SERVER["REMOTE_ADDR"]."')");
        }
    }   
?>
