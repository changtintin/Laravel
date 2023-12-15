<?php
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use App\Models\Develop;

Route::get('/', function () {
    return view('page.index');       
}) -> name('index');

Route::get('/{title}/post/{id}', function($title, $id){   
    include "../app/CustomSetting/conf.php"; 
    $nameGetter -> setTableName($title);
    $tableName = $nameGetter -> getTableName();
    if(!Schema::hasTable($tableName)){
        return redirect() -> route('index');
    }       
    $nameGetter -> setModelName($title);
    $modelName = $nameGetter -> getModelName();

    $model = "App\\Models\\" . $modelName;    
    $model = $model::find($id);  
   
    return view('page.post',[
        'title' => $title,
        'model' => $model
    ]);
  
    if(!$model){
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

// NOTE: Theme pages
Route::get('/theme/{title}/{subtitle?}', 
    [ThemeController::class, 'show']
) -> name('theme');

Route::get('/admin_go_login',
    [AuthController::class, 'showLoginPage']
) -> name('admin-go-login');

Route::post('/admin_login',
    [AuthController::class, 'login']
) -> name('admin-login');

Route::get('/admin_logout',
    [AuthController::class, 'logout']
) -> name('admin-logout');

// NOTE: Admin homepage
Route::get('/admin', function () {
    return view('admin_contents.index');       
}) -> name('admin-index') -> middleware('auth');

Route::get('/admin/donate', function () {
    return view('admin_contents.donate');       
}) -> middleware('auth');
?>

