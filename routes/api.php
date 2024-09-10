<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectclientController;
use App\Models\Message;
use App\Models\Pesan;
use App\Models\Projectclient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// client/work start
Route::get("/client", [ClientController::class, "index"]);
Route::post("/addclient", [ClientController::class, "create"]);
Route::get("/limitedclient", [ClientController::class, "limitedclient"]);
Route::get('/clientdetail/{id}', [ClientController::class, 'detailclient']);
Route::delete('/clientdelete/{id}', [ClientController::class, 'destroy']);
Route::get('/filterclient/{type}', [ClientController::class, 'filter']);
// client/work end
// news start
Route::get('/newsall', [NewsController::class, 'index']);
Route::get('/limitednews', [NewsController::class, 'limitednews']);
Route::get('/detailnews/{id}', [NewsController::class, 'detailnews']);
Route::post('/addnews', [NewsController::class, 'create']);
Route::delete('/deletenews/{id}', [NewsController::class, 'destroy']);
// news end
//blog start
Route::get('/allblog', [BlogController::class, 'index']);
Route::get('/limitedblog', [BlogController::class, 'limitedblog']);
Route::get('/detailblog/{id}', [BlogController::class, 'detailblog']);
Route::post('/addblog', [BlogController::class, 'create']);
Route::delete('/deleteblog/{id}', [BlogController::class, 'destroy']);
//blog end
// event start
Route::get('/event', [EventController::class, 'index']);
Route::get('/detilevent/{id}', [EventController::class, 'detilevent']);
Route::post('/addevent', [EventController::class, 'create']);
Route::delete('/deleteevent/{id}', [EventController::class, 'destroy']);
// event end
//contact page start
Route::post('/addmessage', [MessageController::class, 'create']);
Route::get('/allmessage', [MessageController::class, 'index']);
Route::get('detailmessage/{id}', [MessageController::class, 'show']);
Route::post('/inqurymessage', [InquiryController::class, 'create']);
Route::get('/inquiries', [InquiryController::class, 'index']);
Route::get('/inquirymessage/{id}', [InquiryController::class, 'show']);
Route::get('/inqurymessagelimited', [InquiryController::class, 'limitedinquiry']);
//contact page end
//user start
Route::get('/alluser', [UserController::class, 'index']);
Route::get('/detailuser/{id}', [UserController::class, 'detail']);
Route::post('/login', [UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logout'])->middleware(['auth:sanctum']);
Route::get('/check', [UserController::class, 'dataloginuser'])->middleware(['auth:sanctum']);
Route::post('/register', [UserController::class, 'create']);
Route::delete('/deleteuser/{id}', [UserController::class, 'destroy']);

//user end
// client project img start
Route::post('/addimageclient', [ProjectclientController::class, 'create']);
Route::get('/allimageclient', [ProjectclientController::class, 'index']);

Route::get('/allimageclientid/{id}', [ProjectclientController::class, 'show']);
Route::delete('/deleteimageclient/{id}', [ProjectclientController::class, 'destroy']);
// client project img end
