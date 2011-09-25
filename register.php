<?php
/*=======================================================================*\
| CMSulake - A mock of Habbo's Content Management System                  |
| ======================================================================= |
| Copyright (c) 2011, Cobe Makarov                                        |
| ======================================================================= |
| This program is free software: you can redistribute it and/or modify    |
| it under the terms of the GNU General Public License as published by    |
| the Free Software Foundation, either version 3 of the License, or       |
| (at your option) any later version.                                     |
| ======================================================================= |
| This program is distributed in the hope that it will be useful,         |
| but WITHOUT ANY WARRANTY; without even the implied warranty of          |
| MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the            |
| GNU General Public License for more details.                            |
\*=======================================================================*/

define('PAGE', 'Register');
define('NAVI', false);
define('AUTHREQ', false);
require('global.php');
if (isset($user[uID])){
    $funcs->Redirect('me');
}

if (!isset($_GET['step']) || $_GET['step'] < 0 || $_GET['step'] > 2 || ($_GET['step'] == 2 && !isset($_POST['rname']))){
    $funcs->Redirect('index');
}
switch($_GET['step'])
    {
        case "1":
        {
            $register = new Sulake\Template('step_one');
            break;
        }
        
        case "2":
        {
            $name = $funcs->Secure($_POST['rname']);
            $pw1 = $_POST['rpassword'];
            $pw2 = $_POST['rpassword2'];
            $email = htmlentities($_POST['email']);
            $error = 0;
            if (empty($name) || empty($pw1) || empty($pw2) || empty($email)){
                $error = 1;
            }
            if ($users->NameCheck($name)){
                $error = 2;
            }
            
            if ($users->MailCheck($email)){
                $error = 3;
            }
            
            if ($users->PasswordCheck($pw1, $pw2) != 2){
                $error = 4;
            }
            $register = new Sulake\Register('step_two');
            if ($error == 0){
                $funcs->AddUser($name, $funcs->SulakeHash($pw1.$name), $email);
                $register->Write('You\'ve successfully registered as '.$name);
            }
            break;
        }
    }
$register->Fetch('footer');
$register->Output();
?>


