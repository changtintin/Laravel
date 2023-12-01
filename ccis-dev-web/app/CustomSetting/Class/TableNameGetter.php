<?php
namespace App\CustomSetting\Class;
use Illuminate\Support\Str;
class TableNameGetter{    
    private String $tableName;
    private String $modelName;

    public function setModelName($modelName){
        $this -> modelName = $modelName;
    }

    public function getTableName(){
        $pattern = '~(.)([A-Z]+)~';
        $replacement = '$1_$2';
        $this -> tableName =  preg_replace($pattern, $replacement, $this -> modelName);
        $this -> tableName = Str::plural($this -> tableName);
        $this -> tableName = strtolower($this -> tableName);    
        return $this -> tableName;
    }
}