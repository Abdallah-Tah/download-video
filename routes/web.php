<?php

use TikTok\VideoDownloader;
use TikTok\Driver\SnaptikDriver;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

//     $tiktok = new VideoDownloader(new SnaptikDriver());

//    //download video $tiktok->get('https://www.tiktok.com/@philandmore/video/6805867805452324102');

//    $download = $tiktok->get('https://www.tiktok.com/@philandmore/video/6805867805452324102');

//     dd($download);

    return view('welcome');
});
