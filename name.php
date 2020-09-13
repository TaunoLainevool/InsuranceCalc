<?php 

class LoopName{
    
   public $name;

   public function sayIt($name){

        echo "$name <br>";
        $chars = preg_split("//",$name,-1,PREG_SPLIT_NO_EMPTY);
        foreach($chars as $key => $value){
            echo "$value ";
        }
    }

}

$loopname = new LoopName;
$loopname->sayIt("Tauno Lainevool");