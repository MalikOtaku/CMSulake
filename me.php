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

define('PAGE', 'Home');
define('TAB_ID', 1);
define('NAVI', true);
define('AUTHREQ', true);
require('global.php');
$me = new Sulake\Template('me');
$me->Write($users->GetFigure(uID).'align ="left"/>');
$me->BreakLine();
$me->Bold(uName, true);
$me->WriteDiv();
$me->Fetch('news-preview');
$me->Fetch('footer');
$me->Output();
?>
