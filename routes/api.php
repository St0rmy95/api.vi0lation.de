<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/cms/{page}', 'CmsController@pageAction')->where('page', '\w+');

Route::group(['prefix' => 'ranking'], function () {
    Route::get('/highscore', 'Ranking\HighscoreController@get');
});

Route::match(['PUT', 'POST'], 'pushsub', 'PushSubController@subscribe');
Route::delete('pushsub', 'PushSubController@unsubscribe');

Route::group(['prefix' => 'chromerivals'], function () {
    Route::get('/playerfame', 'Ranking\CRController@playerFame');
    Route::get('/brigfame', 'Ranking\CRController@brigadeFame');
    Route::get('/onlinecount', 'Ranking\CRController@onlinePlayers');
    Route::get('/ranking-timestamps', 'Ranking\CRController@rankingDates');
    Route::get('/topkillsinterval', 'Ranking\CRController@topKillsBetween');
    Route::get('/brigkillsinterval', 'Ranking\CRController@brigKillsBetween');
    Route::get('/fame-activity', 'Ranking\CRController@aggregatedFameHistory');
    Route::get('/omi', ['uses' => 'Ace\OmiQueryController@query', 'game' => 'cr']);
});
