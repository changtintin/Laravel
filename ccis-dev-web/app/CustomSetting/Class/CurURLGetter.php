<?php
namespace App\CustomSetting\Class;

class CurURLGetter{    
    private String $curUrl;

    public function __construct(){        
        $this -> curUrl = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $this -> curUrl = urlencode($this -> curUrl);
    }    

    public function getCurUrl(){
        return $this -> curUrl;
    }
}
?>