<?php
namespace Sulake;

class Template
    {
        /* Variables */
        var $output;

        /* Initialization! */
        function __construct($dir){
            global $funcs;
            $real = './sys/templates/'.$dir.'.tpl';
            
            if (!file_exists($real)){
                $funcs->Error('Template', $real.' was not found');
                return null;
            }
            
            ob_start();
            include($real);
            $data = ob_get_contents();
            ob_end_clean();	
            $this->output = $data;
        }
        
        /* Misc Actions */
        function Write($str){
            $this->output .= $str;
        }
        
        function WriteDiv(){
            $this->output .= '</div>';
        }
        
        function Bold($str, $line){
            if (!$line){
                return '<b>'.$str.'</b>';
            }
            $this->output .= '<b>'.$str.'</b>';
        }
        
        function BreakLine(){
            $this->output .= '<br />';
        }
        
        function Output(){
            echo $this->output;
        }
        
        function Fetch($dir){
            global $funcs;
            $real = './sys/templates/'.$dir.'.tpl';
            
            if (!file_exists($real)){
                $funcs->Error('Template', $real.' was not found');
                return null;
            }
            
            ob_start();
            include($real);
            $data = ob_get_contents();
            ob_end_clean();	
            $this->output .= $data;
        }
    }
?>
