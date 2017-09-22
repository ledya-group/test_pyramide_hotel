<?php

Route::get('/', function () { return view('main.index'); })->name('home');
// Route::get('/home', function () { return view('main.index'); });
Route::get('chambres', function () { return view('main.rooms'); });
Route::get('contact', function () { return view('main.contact'); });
Route::get('services', function () { return view('main.services'); });
Route::get('reservation', function () { return view('main.reservation'); });
// Route::get('reservation', 'ReservationsController@create');
Route::post('reservation', 'ReservationsController@postReservation');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {

// Route::group(['prefix' => 'admin'], function () {
    // Tableau de bord...
    Route::get('/', 'Admin\DashboardController@index')->name('dashboard');

    // Route::get('/', 'Admin\DashboardController@index')->name('dashboard');

    // Route::resource('facturation', 'Admin\DashboardController@index')->name('dashboard');

    // Gestion des categories de chambres
    Route::resource('rooms/categories', 'Admin\RoomTypesController', ['except' => [
        'show'
    ]]);

    // Gestion des chambres et salles disponibles
    Route::resource('rooms', 'Admin\RoomsController', ['except' => ['show']]);

    // Gestion des reservations
    Route::resource('reservations', 'Admin\ReservationsController');

    // Gestion des chambres et salles disponibles
    Route::resource('users', 'UsersController', ['only' => ['create']]);

    // Gestions des agents ou employes
    Route::resource('agents', 'Admin\AgentsController', ['except' => ['show']]);

    // Gestion des clients
    Route::resource('clients', 'Admin\ClientsController');

    // Gestions des postes et roles
    Route::resource('jobs', 'Admin\JobsController');

    // Gestion des profils utilisateurs
    Route::resource('profiles', 'Admin\ProfilesController', ['only' => ['index']]);
});

Route::get('pdf/download/{reservation}', 'PDFController@download')->name('pdf.download');

Route::get('/reserver_pour/{room}', 'Admin\ReservationsController@specialReservation')
    ->name('special.reservation.create');

Route::post('/reserver_pour/{room}', 'Admin\ReservationsController@storeSpecialReservation')
    ->name('special.reservation.store');

Route::get('logout', function () {
    Auth::logout();

    return redirect()->home();
});

Auth::routes();
