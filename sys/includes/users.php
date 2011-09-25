<?php
namespace Sulake;

class Users
    {
        function Fetch($id){
            global $db;
            
            $result = $db->Select("SELECT * FROM users WHERE id = '".$id."'");
            while ($row = $db->Fetch_Array($result)){
                return $row;
            }
        }
        
        function GetFigure($id){
           global $db;           
           $result = $db->Select("SELECT * FROM users WHERE id = '".$id."'");
            
            while ($row = $db->Fetch_Array($result)){
                if (!file_exists('./cache/figures/'.$row['look'])){                   
                    file_put_contents('./cache/figures/'.$row['look'].'.png', file_get_contents('http://www.habbo.com/habbo-imaging/avatarimage?figure='.$row['look'].'.gif'));
                }
                return '<img src="./cache/figures/'.$row['look'].'.png"';
            } 
        }
        function RetrieveFigure($id){
            global $db;
            $result = $db->Select("SELECT * FROM users WHERE id = '".$id."'");
            
            while ($row = $db->Fetch_Array($result)){
                if (!file_exists('./cache/figures/'.$row['look'])){                   
                    file_put_contents('./cache/figures/'.$row['look'].'.png', file_get_contents('http://www.habbo.com/habbo-imaging/avatarimage?figure='.$row['look'].'.gif'));
                }
                echo '<img src="./cache/figures/'.$row['look'].'.png" />';
            }
        }

        function RegisterUser($username, $id){
            $_SESSION['name'] = $username;
            $_SESSION['id'] = $id;
        }
        
        function Login($username, $password){
            
            global $db, $funcs;
            
            $hash = $funcs->SulakeHash($password.$username);
            $result = $db->Select("SELECT * FROM users WHERE username = '".$username."'");
           
            while($row = $db->Fetch_Array($result)){
                if ($row['password'] == $hash){
                    $this->RegisterUser($username, $row['id']);
                    $funcs->Redirect('me');
                }else{$funcs->Redirect('index'); }
            }
        }
        
        /* User Checks */
        function PasswordCheck($first, $second){
            if ($first != $second){
                return 0;
            }

            if (strlen($first) < 7 || strlen($first) > 18){
                return 1;
            }
            return 2;
        }
        
        function MailCheck($mail){
            global $db;
            $error = false;
            
            if ($db->Count($db->Query("SELECT * FROM users WHERE mail = '".$mail."'")) > 0){
                $error = true;
            }
            return $error;
        }
        
        function Validate($email){
            return preg_match("/^[a-z0-9_\.-]+@([a-z0-9]+([\-]+[a-z0-9]+)*\.)+[a-z]{2,7}$/i", $email);
        }
        
        function NameCheck($name){
            global $db;
            $error = false;
            
            if ($db->Count($db->Query("SELECT * FROM users WHERE username = '".$name."'")) > 0){
                $error = true;
            }
            return $error;
        }
    }
?>
