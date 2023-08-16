<?php

use App\Http\Requests\makeupItemRequest;
use App\Models\MakeupItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
    "/" : redirect to makeup.index
*/

Route::get('/',function(){
    return redirect() -> route('makeup.index');
});


/*
    makeup.index
*/

Route::get('/index', function () {
    return view('index',[
        'makeupItems' => MakeupItem::orderBy('name', 'asc') -> paginate(8)
    ]);
}) -> name('makeup.index');

Route::view('/index/add', 'insert') -> name('makeup.insert');

/*
    makeup.edit

    MY NOTE    
    =====================================================================
    _ put the Model "MakeupItem" variable into function
*/

Route::get('/index/{makeupItem}/edit',function(MakeupItem $makeupItem){
    return view('edit', [
        'makeupItem' => $makeupItem
    ]);
}) -> name('makeup.edit');

/*
    makeup.show
*/

Route::get('/index/{makeupItem}',function(MakeupItem $makeupItem){
    return view('show_product', [
        'makeupItem' => $makeupItem
    ]);
}) -> name('makeup.show');

/*
    makeup.store
*/

Route::post('/index', function(makeupItemRequest $request){

    /*
        MY NOTE    
        =====================================================================
        _  validated(): Return the validated data
        _  with(): one time session, if updating, it'd disappear

    */
    $data = $request -> validated();
    $item = MakeupItem::create($data);
    return redirect() -> route('makeup.show',['makeupItem' => $item -> id]) -> with('successMsg', 'New Product Added!');
}) -> name('makeup.store');

/*
    makeup.update
*/

Route::put('/index/{makeupItem}', function(makeupItemRequest $request, MakeupItem $makeupItem){
    /*
    
        Move to httprequest function:
        app/Http/Requests/makeupItemRequest.php

    */

    // $data = $request ->validate([
    //     'name' => 'required | max:255',
    //     'type' => 'required',
    //     'description' => 'nullable',
    //     'price' => 'required',
    //     'bought' => 'required'
    // ]);
    
    $data = $request -> validated();
    $makeupItem -> update($data);
    return redirect() -> route('makeup.show',['makeupItem' => $makeupItem -> id]) -> with('successMsg', 'Product Infomation Updated Succesfully!');
}) -> name('makeup.update');

Route::delete('/index/{makeupItem}',function(MakeupItem $makeupItem){
    $delName = $makeupItem -> name;
    $makeupItem -> delete();
    return redirect() -> route('makeup.index') -> with('delMsg', 'Product " '.$delName.' " been deleted succesfully!');
}) -> name('makeup.destory');


Route::put('/index/{makeupItem}/toggle-bought', function(MakeupItem $makeupItem){
    $makeupItem -> toggleBought();
    return redirect() -> back() -> with('successMsg', 'Item status changed!');
}) -> name('tasks.toggle-bought');



