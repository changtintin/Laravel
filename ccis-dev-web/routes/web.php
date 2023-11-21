<?php
use App\Http\Controllers\ThemeController;
use Illuminate\Support\Facades\Route;
use App\Models\Develop;

Route::get('/', function () {
    return view('page.index');       
}) -> name('index');

Route::get('/{title}/post/{id}', function($title, $id){   
    include "../app/CustomSetting/conf.php";
    $themeVar = $navs[$title];
    $themeVar = "App\\Models\\" . $themeVar;    
    $model = $themeVar::find($id);  
    if($model){
        return view('page.post',[
            'title' => $title,
            'model' => $model
        ]);
    }
    else{
        return redirect() -> route('index');
    }
}) -> name('post');

Route::get('/{title}/dev_post/{id}', function($title, $id){
    $develop = Develop::find($id);
    return view('page.dev-post', [
        'title' => $title,
        'develop' => $develop
    ]);
}) -> name('dev-post');

Route::get('/theme/{title}/{subtitle?}', 
    [ThemeController::class, 'show']
) -> name('theme');

Route::get('/login', function () {        
    return view('page.login');
}) -> name('login');
?>

