<?php
namespace App\CustomSetting\Class;
use App\CustomSetting\Class\ThemeNode;

class ThemeTree{
    public ThemeNode $root;

    public function __construct(ThemeNode $node){
        $this -> root = $node;
    }

    public function search(ThemeNode $node, $title){
        if($node){
            if($node-> title == $title){      
                $targetNode = $node;                                             
                return $targetNode;
            }   
            foreach($node -> children as $childNode){                  
                if($this -> search($childNode, $title)){
                    $targetNode = $this -> search($childNode, $title);
                    return $targetNode;
                }
            }
        }
        return;
    }

    public function traverse(ThemeNode $node){
        if($node){
            if(empty($node -> children)){
                echo "___"; 
            }
            echo $node -> title."<br>";
            foreach($node -> children as $childNode){                  
                $this -> traverse($childNode);
            }
        }
    }
}
?>