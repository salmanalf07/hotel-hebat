<?php

use App\Http\Controllers\ControllerFacilitieHotel;
use App\Http\Controllers\ControllerFacilitieRoom;
use App\Http\Controllers\ControllerRoom;
use App\Http\Controllers\ControllerTransaction;
use App\Models\FacilitieHotel;
use App\Models\FacilitieRoom;
use App\Models\Room;
use App\Models\transaction;
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

//tamu
Route::get('/', function () {
    return redirect('home');
});
Route::get('/home', function () {
    $data = Room::get();
    return view('home', ['data' => $data]);
});
Route::post('/store_transaction',  [ControllerTransaction::class, 'store'])->name('store_transaction');
Route::middleware(['auth:sanctum', 'verified'])->post('/edit_transaction',  [ControllerTransaction::class, 'edit']);
Route::middleware(['auth:sanctum', 'verified'])->post('/update_transaction/{id}',  [ControllerTransaction::class, 'update']);
Route::middleware(['auth:sanctum', 'verified'])->delete('/delete_room/{id}',  [ControllerTransaction::class, 'delete']);
//room
Route::get('/room', function () {
    $data = Room::with('facilitie')->get();
    return view('kamar', ['data' => $data]);
});
Route::get('/fasility', function () {
    $data = FacilitieHotel::get();
    return view('fasilitas', ['data' => $data]);
});

//admin
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $data = transaction::get();
    return view('home-admin', ['data' => $data]);
})->name('dashboard');
//admin - room
Route::middleware(['auth:sanctum', 'verified'])->get('/rooms', function () {
    $data = Room::get();
    return view('kamar-admin', ['data' => $data]);
})->name('facilities');
Route::middleware(['auth:sanctum', 'verified'])->post('/store_room',  [ControllerRoom::class, 'store']);
Route::middleware(['auth:sanctum', 'verified'])->post('/edit_room',  [ControllerRoom::class, 'edit']);
Route::middleware(['auth:sanctum', 'verified'])->post('/update_room/{id}',  [ControllerRoom::class, 'update']);
Route::middleware(['auth:sanctum', 'verified'])->delete('/delete_room/{id}',  [ControllerRoom::class, 'delete']);
//fasilitas hotel
Route::middleware(['auth:sanctum', 'verified'])->get('/facilities-hotel', function () {
    $data = FacilitieHotel::get();
    return view('fasilitas-hotel-admin', ['data' => $data]);
})->name('facilities-hotel');
Route::middleware(['auth:sanctum', 'verified'])->post('/store_facili_hotel',  [ControllerFacilitieHotel::class, 'store'])->name('store_facili_hotel');
Route::middleware(['auth:sanctum', 'verified'])->post('/edit_facili_hotel',  [ControllerFacilitieHotel::class, 'edit']);
Route::middleware(['auth:sanctum', 'verified'])->post('/update_facili_hotel/{id}',  [ControllerFacilitieHotel::class, 'update']);
Route::middleware(['auth:sanctum', 'verified'])->delete('/delete_facili_hotel/{id}',  [ControllerFacilitieHotel::class, 'delete']);
//fasilitas room
Route::middleware(['auth:sanctum', 'verified'])->get('/facilities-room', function () {
    $data = FacilitieRoom::with('room')->get();
    $room =  Room::get();
    return view('fasilitas-kamar-admin', ['data' => $data, 'room' => $room]);
})->name('facilities-room');
Route::middleware(['auth:sanctum', 'verified'])->post('/store_facili_room',  [ControllerFacilitieRoom::class, 'store']);
Route::middleware(['auth:sanctum', 'verified'])->post('/edit_facili_room',  [ControllerFacilitieRoom::class, 'edit']);
Route::middleware(['auth:sanctum', 'verified'])->post('/update_facili_room/{id}',  [ControllerFacilitieRoom::class, 'update']);
Route::middleware(['auth:sanctum', 'verified'])->delete('/delete_facili_room/{id}',  [ControllerFacilitieRoom::class, 'delete']);
