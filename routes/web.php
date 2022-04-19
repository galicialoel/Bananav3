<?php

use App\Http\Controllers\BarcodeController;
use App\Http\Controllers\BoxProductController;
use App\Http\Controllers\FarmerController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\UserController;
use App\User;
use Illuminate\Support\Facades\Auth;
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


Auth::routes();

Route::get('/', 'HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {

    Route::resources([
        'users' => 'UserController',
        'providers' => 'ProviderController',
        'inventory/products' => 'ProductController',
        'inventory/categories' => 'ProductCategoryController',
        'transactions/transfer' => 'TransferController',
        'methods' => 'MethodController',
    ]);

    Route::post('out',function(){
        Session::flush();

        Auth::logout();

        return redirect('login');
    });

    Route::get('inventory/stats/{year?}/{month?}/{day?}', ['as' => 'inventory.stats', 'uses' => 'InventoryController@stats']);
    Route::resource('inventory/receipts', 'ReceiptController')->except(['edit', 'update']);
    Route::get('inventory/receipts/{receipt}/finalize', ['as' => 'receipts.finalize', 'uses' => 'ReceiptController@finalize']);
    Route::get('inventory/receipts/{receipt}/product/add', ['as' => 'receipts.product.add', 'uses' => 'ReceiptController@addproduct']);
    Route::get('inventory/receipts/{receipt}/product/{receivedproduct}/edit', ['as' => 'receipts.product.edit', 'uses' => 'ReceiptController@editproduct']);
    Route::post('inventory/receipts/{receipt}/product', ['as' => 'receipts.product.store', 'uses' => 'ReceiptController@storeproduct']);
    Route::match(['put', 'patch'], 'inventory/receipts/{receipt}/product/{receivedproduct}', ['as' => 'receipts.product.update', 'uses' => 'ReceiptController@updateproduct']);
    Route::delete('inventory/receipts/{receipt}/product/{receivedproduct}', ['as' => 'receipts.product.destroy', 'uses' => 'ReceiptController@destroyproduct']);


    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
    Route::match(['put', 'patch'], 'profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::match(['put', 'patch'], 'profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('icons', ['as' => 'pages.icons', 'uses' => 'PageController@icons']);
    Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'PageController@notifications']);
    Route::get('tables', ['as' => 'pages.tables', 'uses' => 'PageController@tables']);
    Route::get('typography', ['as' => 'pages.typography', 'uses' => 'PageController@typography']);
});


//my routess

Route::get('price',function(){
    $classes = App\Classification::where('class_name','!=','Class A - (Reject)')
    ->Where('class_name','!=','Class B - (Reject)')
    ->get();
    return view('price',compact('classes'));
});

Route::get('update/price/{id}',function($id){
$class = App\Classification::findOrFail($id);

return view('update-price',compact('class'));
});

Route::put('update/class/{id}',function($id){
    $class = App\Classification::findOrFail($id);
    $class->update(request()->all());
    return redirect()->back();
});

Route::post('add/user',[UserController::class,'add_user'])->name('add.user');

Route::get('farmer',[FarmerController::class,'index'])->name('farmer.index');
Route::get('farmer/create',[FarmerController::class,'create'])->name('farmer.create');
Route::post('farmer/store',[FarmerController::class,'store'])->name('farmer.store');
Route::get('farmer/harvest/{user}',[FarmerController::class,'harvest_details'])->name('farmer.harvest');


Route::get('barcode/',[BarcodeController::class,'barcode_scan']);
Route::post('barcode-log/',[BarcodeController::class,'add_product']);
Route::get('/settings',[InventoryController::class,'settings'])->name('settings.index');
Route::post('/settings/add',[InventoryController::class,'add_class'])->name('settings.store');
Route::post('sell/product',[SaleController::class,'sell'])->name('sell.store');
Route::get('report',[ReportController::class,'report'])->name('report.index');
Route::post('download/file',[BarcodeController::class,'download_file']);
Route::get('reject/list',[BoxProductController::class,'reject'])->name('reject.index');
Route::get('stock/list',[BoxProductController::class,'stock'])->name('stock.index');
Route::any('search/product',[BoxProductController::class,'search']);
Route::any('search/transaction',[BoxProductController::class,'search_transaction']);

Route::any('filter/date/report',[ReportController::class,'filter_by_date']);

Route::any('search/date',[ReportController::class,'search_date']);
Route::any('search/year',[ReportController::class,'search_year']);
Route::any('generate/pdf/today',[ReportController::class,'pdf_today']);


Route::get('/test',function(){
    $data =User::all();

    // share data to view
    // view()->share('employee',$data);
    $pdf = \PDF::loadView('test', $data);
    // return $pdf->download('test.pdf');

    return $pdf->stream('test');
    // download PDF file with download method
    return $pdf->download('test.pdf');

});
