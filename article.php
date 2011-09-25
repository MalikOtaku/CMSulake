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
        
define('PAGE', 'Articles');
define('NAVI', true);
define('TAB_ID', 2);
define('AUTHREQ', false);
require('global.php');

if (!isset($_GET['id']) || !is_numeric($_GET['id'])){
    $funcs->Error('Generic', 'You did not specify a valid news ID.');
}
$news = new Sulake\Template('news');
$news->Fetch('footer');
$news->Output();
?>
