<?php
namespace App\CustomSetting\Class;
class JsonSetter{
    public $path;
    function setPath($path){
        $this -> path = $path;
    }

    function JsontoAry(){   
        if(!$this -> path){
            return;
        }   
        $handle = fopen($this -> path, "r");
        $ary = "";
        while (!feof($handle)) {
            $ary.= fread($handle, 10000);
        }
        fclose($handle);
        $resultAry = json_decode($ary, true);
        return $resultAry;
    }
}
?>