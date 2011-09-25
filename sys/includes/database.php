<?php
namespace Sulake;
class Database
    {
        /* Variables! */
        var $db;
        var $host;
        var $name;
        var $password;
        var $link;
        var $connected;
        var $last;
        var $usage;
        
        /* The Initializing Function!*/
        function __construct($db, $host, $name, $password){
            global $funcs;
            if (!$this->connected){
                $this->db = $db;
                $this->host = $host;
                $this->name = $name;
                $this->password = $password;
                $this->link = mysqli_connect($this->host, $this->name, $this->password);
                if (mysqli_select_db($this->link, $db)){
                    $this->connected = true;
                }else{ $funcs->Error('Database', 'Couldn\'t connect to your database.'); }
            }
        }
        
        function Close(){
            if ($this->connected){
                mysqli_close();
                $this->connected = false;
            }
        }
        
        /*How Everything is Handled! */
        function Query($sQuery){
            $this->last = $sQuery;
            $this->usage++;
            mysqli_query($this->link, $this->last);
        }
        
        function Count($sQuery){
            $this->last = $sQuery;
            $this->usage++;
            return mysqli_num_rows($this->link, $this->last);
        }
        
        function Select($sQuery){
            $this->last = $sQuery;
            $this->usage++;
            $result = mysqli_query($this->link, $this->last);
            return $result;
        }
        
        function Fetch($sQuery){
            $this->last = $sQuery;
            $this->usage++;
            $result = $this->Query($this->last);
            
                return $this->Fetch_Array($result);
            }
        
        function Fetch_Array($sQuery){
            $this->last = $sQuery;
            $this->usage++;
            return mysqli_fetch_array($this->last);
        }
        
        /* Misc */
        function Flush(){
            $this->last = null;
            $this->usage = 0;
        }
    }
?>
