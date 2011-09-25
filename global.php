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

ob_start();
session_start();

    //Definitions
    define('Err', '<b>CMSulake Error:</b> ');
    
    //Get what's needed
    if (!require('./sys/config.php')){
        die(Err.'Your configuration file cannot be located');
    }
    if (!require('./sys/includes/funcs.php')){
        die(Err.'Your functions file cannot be located');
    }
    if (!require('./sys/includes/templates.php')){
        die(Err.'Your templates file cannot be located');
    }
    if (!require('./sys/includes/users.php')){
        die(Err.'Your user functions file cannot be located');
    }
    if (!require('./sys/includes/cron.php')){
        die(Err.'Your cron functions file cannot be located');
    }
    if (!require('./sys/includes/database.php')){
        die(Err.'Your database functions file cannot be located');
    }
    if (!dir('./styles/'.$config['style'])){
        die(Err.'Your style directory cannot be located');
    }
    
    //Configuration Definitions
    define('Name',$config['name']);
    define('Style', '/styles/'.$config['style']);
    define('Debug', $config['debug']);

    //OOP Magic
    $funcs = new Sulake\Functions();
    $users = new Sulake\Users();
    $db = new Sulake\Database($config['db']['name'], $config['db']['host'], $config['db']['username'], $config['db']['password']);
    $cron = new Sulake\Cron();

    //Some Error Checking
    if (AUTHREQ && !isset($_SESSION['name'])){
       $funcs->Redirect('index');
    }
    
    //OOP Magic Part 2
    echo '<!doctype html>';
    $funcs->SetTitle(Name.' ~ '.PAGE);
    $funcs->RegisterCSS(Style.'/main.css');
    
    if (isset($_SESSION['id'])){
        define('uName', $_SESSION['name']);
        define('uID', $_SESSION['id']);
        $user[uID] = $users->Fetch(uID);
    }
    
    //Get the header!
        switch(Debug){
        case 0:
        {
            error_reporting(0);
            break;
        }
        case 1:
        {
            error_reporting(E_ALL);
            break;
        }
        case 2:
        {
            error_reporting(E_STRICT);
            break;
        }
    }
    $cron->Execute();
    include('header.php');
?>