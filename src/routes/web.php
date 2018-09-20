<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('testdatabase', function () {
    try {
        DB::connection()->getPdo();
        if(DB::connection()->getDatabaseName()){
            return "Yes! Successfully connected to the DB: " . DB::connection()->getDatabaseName();
        }
    } catch (\Exception $e) {
        die("Could not connect to the database: " . $e->getMessage());
    }
});

Route::get('testcache', function () {
    try {
        echo 'Setting User key...<br />';
        Redis::set('user', 'Juan Dela Cruz');
        echo 'User key value: ' . Redis::get('user') . '<br />';
        echo 'Removing User key.';
        Redis::del('user');
    } catch (\Exception $e) {
        die('Could not connect to the cache: ' . $e->getMessage());
    }
});
