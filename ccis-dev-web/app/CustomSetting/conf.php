<?php
namespace app\CustomSetting;

use App\Models\Theme;
use App\CustomSetting\Class\ThemeNode;
use App\CustomSetting\Class\ThemeTree;
use App\CustomSetting\Class\JsonSetter;
use App\CustomSetting\Class\CurURLGetter;

// Build the theme tree
$themeRoot = new ThemeNode('創新與創造力研究中心');
$themeTree = new ThemeTree($themeRoot); 

$themes = Theme::all();
$themes = json_decode($themes);

// Initialize first level theme nodes
foreach($themes as $theme){
	if($theme -> level == 1){
		$themeNode = new ThemeNode($theme -> title);
		$themeTree -> root -> addChild($themeNode);
	}
}

// Initialize second level theme nodes
foreach($themes as $theme){
	$themeNode = new ThemeNode($theme -> title);
	if($theme -> parent_id){ 
		// Find parent title from Theme Model
		$parentData = Theme::where('id', $theme -> parent_id) -> get();
		$parentTitle = $parentData[0] -> title;
		// Find parent node from theme tree
		$parentNode = $themeTree -> search($themeTree -> root, $parentTitle);
		$parentNode -> addChild($themeNode);
	}     
}  
// Initialize variable translate json to php array
$jsonSetter = new JsonSetter();
$navsPath = "../public/json/navs.json";
$themeContentsPath = "../public/json/theme_contents.json";
$messagesPath = "../public/json/messages.json";

$jsonSetter -> setPath($navsPath);
$navs = $jsonSetter -> JsontoAry();
$navs = $navs['navs'];

$jsonSetter -> setPath($themeContentsPath);
$themeContents = $jsonSetter -> JsontoAry();
$postCols = $themeContents['post'];
$researchPlan = $themeContents['research_plan'];

$jsonSetter -> setPath($messagesPath);
$messages = $jsonSetter -> JsontoAry();
$errorMsg = $messages['error'];

// Initialize share btn links
$curURLGetter = new CurURLGetter();
$fb_sharer = "https://www.facebook.com/sharer/sharer.php?u=" . $curURLGetter -> getcurURL() . "&amp;src=sdkpreparse";
$line_sharer = "https://social-plugins.line.me/lineit/share?url=" . $curURLGetter -> getcurURL();
?>