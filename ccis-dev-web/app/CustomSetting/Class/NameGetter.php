<?php
namespace App\CustomSetting\Class;
use Illuminate\Support\Str;
class NameGetter{    
    public String $name;
    private String $tableName;
    private String $modelName;

    public function setTableName($name){
        $this -> tableName = Str::plural($name);                  
    }

    // NOTE: e.g. related_link -> RelatedLink
    public function setModelName($name){
        if($pos = strpos($name, "_")){
            $str1 = substr($name, 0, $pos);
            $str2 = substr($name, $pos + 1, strlen($name) - $pos + 1);            
            $str1[0] = strtoupper($str1[0]);
            $str2[0] = strtoupper($str2[0]);
            $this -> modelName = $str1 . $str2;               
        }
        else{
            $name[0] = strtoupper($name[0]);
            $this -> modelName = $name;
        }
    }

    public function getTableName(){
        return $this -> tableName;
    }

    public function getModelName(){
        return $this -> modelName;
    }
}