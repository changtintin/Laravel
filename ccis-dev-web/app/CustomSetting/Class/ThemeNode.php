<?php
namespace App\CustomSetting\Class;
class ThemeNode{
    public $title;
    public $children =[];

    public function __construct($title){
        $this -> title = $title;
    }

    public function addChild(ThemeNode $node){
        $this -> children[] = $node;
    }    
}
?>