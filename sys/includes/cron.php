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

namespace Sulake;

class Cron
    {
        function Execute(){
            global $db,$funcs;
            $result = $db->Select("SELECT * FROM cron WHERE enabled = 'yes' ORDER BY priority ASC");
            while($row = $db->Fetch_Array($result)){
                if(($row['last'] + $row['interval']) <= time()){
                    $this->Run($row['id']);
                }
            }
        }
        
        function Run($id){
            global $db,$funcs;
            
            $result = $db->Select("SELECT file FROM cron WHERE id = '".$id."' LIMIT 1");
            $result = $db->Fetch_Array($result);
            $f = $result['file'];
            if (!$this->FindScript($f)){
                $funcs->Error('Cron', 'Could not execute cron '.$f);
                return;
            }
            
            include_once('./sys/cron/'.$f);
            $db->Query("UPDATE cron SET last = '".time()."' WHERE id = '".$id."' LIMIT 1");
        }
        
        function FindScript($dir){
            return file_exists('./sys/cron/'.$dir);
        }
    }
?>
