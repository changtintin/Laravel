<?php

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
    MY NOTE    
    =====================================================================
    Copied from https://github.com/piotr-jura-udemy/laravel-course-2023/blob/b4079c55ab5d1c370c034b65dff38aa308826d2f/l10-task-list-resources/task-list.php#L4
*/

// class Task{
//     public function __construct(
//         public int $id,
//         public string $title,
//         public string $description,

//         /*
//             MY NOTE    
//             =====================================================================
//             _ optional property: ?
//         */

//         public ?string $long_description,
//         public bool $completed,
//         public string $created_at,
//         public string $updated_at

//     ) {
//   }
// }

// $tasks = [
//     new Task(
//         1,
//         'Buy groceries',
//         'Task 1 description',
//         'Task 1 long description',
//         false,
//         '2023-03-01 12:00:00',
//         '2023-03-01 12:00:00'
//     ),

//     new Task(
//         2,
//         'Sell old stuff',
//         'Task 2 description',
//         null,
//         false,
//         '2023-03-02 12:00:00',
//         '2023-03-02 12:00:00'
//     ),

//     new Task(
//         3,
//         'Learn programming',
//         'Task 3 description',
//         'Task 3 long description',
//         true,
//         '2023-03-03 12:00:00',
//         '2023-03-03 12:00:00'
//     ),

//     new Task(
//         4,
//         'Take dogs for a walk',
//         'Task 4 description',
//         null,
//         false,
//         '2023-03-04 12:00:00',
//         '2023-03-04 12:00:00'
//     ),
// ];

Route::get('/',function(){

    return redirect() -> route('tasks.index');

});

Route::get('/tasks', function (){
    
    /*
        MY NOTE    
        =====================================================================
        _ View the specific blade template
        _ all(): fetch all data in a model
        _ query builder
    */
    
    $allTaskModel = \App\Models\Task::latest() -> orderBy('id') -> get();

    return view('index',[
        'tasks' => $allTaskModel
    ]);

})-> name('tasks.index');

Route::view('/tasks/create', 'create') -> name('tasks.create');

Route::get('/tasks/{task}/edit',function(Task $task){

    return view('edit', [
        'task' => $task
    ]);

}) -> name('tasks.edit');

Route::get('/tasks/{task}',function(Task $task){

    /*
        MY NOTE    
        =====================================================================
        _ Laravel Collections: 
                * laravel way to represent php array
                * convert arrays to laravel collection object

        _ Array is not an object in php, it's a data type
    */

    // $task = collect($tasks) -> firstWhere('id', $id);

    // if(!$task){
    //     abort(Response::HTTP_NOT_FOUND);
    // }
    // return view('show', ['task' => $task]);

    

    return view('show', [
        'task' => $task
    ]);

}) -> name('tasks.show');

/*
    MY NOTE    
    =====================================================================
    _ Request -> give us access to the data that is being sent
    _ Validation of form
        * validate(): write the rule inside
        * validated(): give you the validated data
        * Store inside the user session
*/

Route::post('/tasks', function(TaskRequest $request){
    // $data = $request -> validated();
    // $task = new Task;
    // $task -> title = $data['title'];
    // $task -> description = $data['description'];
    // $task -> long_description = $data['long_description'];
    // $task -> save();

    $task = Task::create($request -> validated());

    return redirect() -> route('tasks.show', ['task' => $task -> id]) -> with('success', 'Task Created Successfully!');

}) -> name('tasks.store');

Route::put('/tasks/{task}', function(Task $task, TaskRequest $request){    
    // $data = $request -> validated();
    // $task -> title = $data['title'];
    // $task -> description = $data['description'];
    // $task -> long_description = $data['long_description'];
    // $task -> save();

    $task -> update($request -> validated());

    /*
        MY NOTE    
        =====================================================================
        _  with(): one time session, if updating, it'd disappear.

    */

    return redirect() -> route('tasks.show', ['task' => $task -> id]) -> with('success', 'Task Updated Successfully!');
    
}) -> name('tasks.update');

/*
     =====================================================================
    |                     Introduction Practice code                      |                                   
     =====================================================================
    
*/

// Route::get('/all-food',function(){
//     return "<h2>Food Categories</h2>";
// }) -> name('food-route');

// Route::get('/food-categories',function(){    
    
//     /*
//         MY NOTE    
//         =====================================================================
//         _ Redirect using the route name instead of the url
//           e.g. return redirect('/food');
//     */
//     return redirect() -> route('food-route');
// });

// Route::get('/lang/{country}', function($country){
//     return '<h3>Language: {$country}</h3>';
// }) -> name('lang-route');

// /*
//     MY NOTE    
//     =====================================================================
//     _ Catch all URLs that don't fit any of the defined route
// */

// Route::fallback(function(){
//     return 'This is a Fallback Page';
// });

