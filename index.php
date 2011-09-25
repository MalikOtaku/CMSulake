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

/*
 * The PAGE is the actual page name, makes it easier if defined in each foreground page.
 * NAVI is a bool and if true it shows the navigation bar, if not it doesn't
 * AUTHREQ just checks if the user needs to be logged in to access the page.
 */
define('PAGE', 'Home');
define('NAVI', false);
define('TAB_ID', 0);
define('AUTHREQ', false);
require('global.php');
if (isset($user[uID])){
    $funcs->Redirect('me');
}
$temp = new Sulake\Template('index');
$temp->Write($funcs->RetrieveImage('./gallery/sulake.png'));
$temp->Fetch('footer');
$temp->Output();
?>

